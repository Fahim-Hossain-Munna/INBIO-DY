<?php
include("./extends/upper.php");
include('../config/configdb.php');
$select = "SELECT * FROM jobs";
$jobs = mysqli_query($db_connect,$select);
$serial = 1;

?>

<div class="row">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-container">
        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
        <li class="breadcrumb-item"><a href="jobs.php">Jobs</a></li>
        <!-- <li class="breadcrumb-item"><a href="skill_list.php">Skill List</a></li> -->
        <!-- <li class="breadcrumb-item active" aria-current="page">Testimonial Details Show</li> -->
    </ol>
</nav>
</div>


    <div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Jobs</h1>
        </div>
    </div>
    </div>

    <div class="row">
    <?php if (isset($_SESSION['job_edit_success'])) : ?>
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <h2 class="alert-text">Hello Cheif</h2>
                <h2 class="alert-text"><?= $_SESSION['job_edit_success']; ?></h2>
            </div>
        </div>
    <?php endif;
    unset($_SESSION['job_edit_success']); ?>

    <?php if (isset($_SESSION['job_edit_error'])) : ?>
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
            <div class="alert-content">
                <h2 class="alert-text">Hello Cheif</h2>
                <h2 class="alert-text"><?= $_SESSION['job_edit_error']; ?></h2>
            </div>
        </div>
    <?php endif;
    unset($_SESSION['job_edit_error']); ?>

    <div class="col-xl-4">
                            <?php if (isset($_SESSION['job_success'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text">Hello Cheif></h2>
                                        <h2 class="alert-text"><?= $_SESSION['job_success']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['job_success']); ?>

                            <?php if (isset($_SESSION['job_error'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text">Hello Cheif</h2>
                                        <h2 class="alert-text"><?= $_SESSION['job_error']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['job_error']); ?>


                                <div class="card widget widget-list">
                                    <div class="card-header">
                                        <h5 class="card-title">Update Jobs Info</h5>
                                    </div>
                                    <!-- <div class="ONE d-flex justify-content-center">
                                    <img style="width: 100px; height:100px; border-radius: 50%;" src="../uploads/portfo" alt="default_image">
                                    </div> -->
                                    <div class="card-body">
                                        <form action="job_post.php" method="POST" enctype="multipart/form-data">
                                        <div class="example-container">
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Job Title/Designation</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="job_title">
                                            
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Company Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="company_name">
                                            
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Company Image</label>
                                                <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="company_image">
                                            
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Job From</label>
                                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="job_from">
                                            
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Job To</label>
                                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="job_to">
                                            
                                        </div>
                                        
                                        
                                        <div class="example-content">
                                                <button type="submit" class="btn btn-success btn-sm" name="job_insert_btn">update</button>
                                        </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                               
                            <div class="col-xl-8">
                            <?php if (isset($_SESSION['status_change'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text">Hello Cheif></h2>
                                        <h2 class="alert-text"><?= $_SESSION['status_change']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['status_change']); ?>

                            <?php if (isset($_SESSION['job_delete'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text">Hello Cheif></h2>
                                        <h2 class="alert-text"><?= $_SESSION['job_delete']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['job_delete']); ?>

                                <div class="card">
                                <div class="card-header">
                                        <h5 class="card-title">Jobs Info</h5>
                                </div>
                                <div class="card-body">
                                <table class="table">
                                <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Company Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                               <?php if(isset($jobs)) : foreach ($jobs as $job) :
                                ?>
                                 <tr>
                                    <th scope="row"><?= $serial++ ?></th>
                                    <td><img style="width: 50px; height:50px; border-radius:50%;" src="../uploads/job_images/<?= $job['company_image'] ?>"></td>
                                    <td><?= $job['job_title'] ?></td>
                                    <td><?= $job['company_name'] ?></td>
            
                                    <td><?php if($job['status'] == "deactive") :?>
                                        <a href="job_post.php?id=<?= $job['id'] ?>" class="btn btn-danger btn-sm" name="change_status"><?= $job['status'] ?></a>
                                        <?php else :?>
                                        <a href="job_post.php?id=<?= $job['id'] ?>" class="btn btn-success btn-sm" name="change_status"><?= $job['status'] ?></a>
                                        <?php endif;?>
                                    </td>
                                    <td>
                                    <!-- <a href="portfolio_post.php?edit_id=<?= $job['id'] ?>" class="btn btn-info btn-sm">Edit</a> -->
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $job['id'] ?>">
                                       Edit
                                    </button>
                                    <!-- edit Modal start -->
                                    <div class="modal fade" id="editModal<?= $job['id'] ?>" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="card widget widget-list">
                                    <div class="card-header">
                                        <h5 class="card-title">Update Jobs Info</h5>
                                    </div>
                                    <div class="ONE d-flex justify-content-center">
                                    <img style="width: 100px; height:100px; border-radius: 50%;" src="../uploads/job_images/<?= $job['company_image'] ?>" alt="default_image">
                                    </div>
                                    <div class="card-body">
                                        <form action="job_post.php" method="POST" enctype="multipart/form-data">
                                        <div class="example-container">
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Job Title/Designation</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="job_title" value="<?= $job['job_title'] ?>">
                                                <input type="hidden" class="form-control" name="job_id" value="<?= $job['id'] ?>">
                                            
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Company Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="company_name" value="<?= $job['company_name'] ?>">
                                            
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Company Image</label>
                                                <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="company_image">
                                            
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Job From</label>
                                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="job_from" value="<?= $job['job_from'] ?>">
                                            
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Job To</label>
                                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="job_to" value="<?= $job['job_to'] ?>">
                                            
                                        </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success" name="job_update_btn">update</button>
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- edit Modal end -->
                                    <a href="job_post.php?delete_id=<?= $job['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; endif;
                                ?>
                                </tbody>
                            </table>
                                </div>
                                </div>
                            </div>
    </div>

<?php
include("./extends/lower.php");
?>