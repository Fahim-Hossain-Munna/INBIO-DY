<?php
include("./extends/upper.php");
include("../config/configdb.php");

$select = "SELECT * FROM educations";
$educations = mysqli_query($db_connect,$select);
$serial =1;

?>

<div class="row">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-container">
        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
        <li class="breadcrumb-item"><a href="experience.php">Education</a></li>
        <li class="breadcrumb-item"><a href="education_list.php">Education List</a></li>
        <!-- <li class="breadcrumb-item active" aria-current="page">Testimonial Details Show</li> -->
    </ol>
</nav>
</div>

<div class="row">
<div class="col">
    <div class="page-description">
        <h1>Experiences</h1>
    </div>
</div>
</div>

<div class="row">
<div class="col-xl-12">
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

                            <?php if (isset($_SESSION['delete_status'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text">Hello Cheif></h2>
                                        <h2 class="alert-text"><?= $_SESSION['delete_status']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['delete_status']); ?>

                            <?php if (isset($_SESSION['input_error'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text">Hello Cheif></h2>
                                        <h2 class="alert-text"><?= $_SESSION['input_error']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['input_error']); ?>

                            <?php if (isset($_SESSION['input_status'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text">Hello Cheif></h2>
                                        <h2 class="alert-text"><?= $_SESSION['input_status']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['input_status']); ?>

                                <div class="card">
                                <div class="card-header">
                                        <h5 class="card-title">Education Info</h5>
                                </div>
                                <div class="card-body">
                                <table class="table">
                                <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                               <?php if(isset($educations)) : foreach ($educations as $education) :
                                ?>
                                 <tr>
                                    <th scope="row"><?= $serial++ ?></th>
                                    <td><?= $education['name'] ?></td>
                                    <td><?= $education['position'] ?></td>
                                    <td><?= $education['location'] ?></td>
            
                                    <td><?php if($education['status'] == "deactive") :?>
                                        <a href="edu_skill_course_post.php?id=<?= $education['id'] ?>" class="btn btn-danger btn-sm" name="change_status"><?= $education['status'] ?></a>
                                        <?php else :?>
                                        <a href="edu_skill_course_post.php?id=<?= $education['id'] ?>" class="btn btn-success btn-sm" name="change_status"><?= $education['status'] ?></a>
                                        <?php endif;?>
                                    </td>
                                    <td>
                                    <!-- <a href="portfolio_post.php?edit_id=<?= $education['id'] ?>" class="btn btn-info btn-sm">Edit</a> -->
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $education['id'] ?>">
                                       Edit
                                    </button>
                                    <!-- edit Modal start -->
                                    <div class="modal fade" id="editModal<?= $education['id'] ?>" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                        <h5 class="card-title">Update Education Info</h5>
                                    </div>

                                    <div class="card-body">
                                        <form action="edu_skill_course_post.php" method="POST">
                                        <div class="example-container">
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Institute Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="<?= $education['name'] ?>">
                                                <input type="hidden" class="form-control"  name="edu_id" value="<?= $education['id'] ?>">
                                            
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Institute Position/Examination You Attend</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="position" value="<?= $education['position'] ?>">
                                            
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Start Study From</label>
                                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="study_from" value="<?= $education['study_from'] ?>">
                                            
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Start Study To</label>
                                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="study_to" value="<?= $education['study_to'] ?>">
                                            
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Institute Location</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="location" value="<?= $education['location'] ?>">
                                            
                                        </div>
                       
                                        </div>
                                        
                                    </div>
                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success" name="education_update_btn">update</button>
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- edit Modal end -->
                                    <a href="edu_skill_course_post.php?delete_id=<?= $education['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
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