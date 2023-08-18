<?php
include("./extends/upper.php");
include("../config/configdb.php");

$serial=1;
$testimonial_query = "SELECT * FROM testimonials";
$testimonials = mysqli_query($db_connect,$testimonial_query);

?>

<div class="row">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-container">
        <li class="breadcrumb-item"><a href="testimonial.php">Testimonial</a></li>
        <li class="breadcrumb-item"><a href="testimonials_list.php">Testimonial List</a></li>
        <!-- <li class="breadcrumb-item active" aria-current="page">Testimonial ADD</li> -->
    </ol>
</nav>
</div>

<div class="row">
    
<div class="col-xl-12">
                            <?php if (isset($_SESSION['testimonial_status_change'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text">Hello Cheif></h2>
                                        <h2 class="alert-text"><?= $_SESSION['testimonial_status_change']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['testimonial_status_change']); ?>

                            <?php if (isset($_SESSION['testimonial_edit_error'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text">Hello Cheif></h2>
                                        <h2 class="alert-text"><?= $_SESSION['testimonial_edit_error']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['testimonial_edit_error']); ?>

                            <?php if (isset($_SESSION['testimonial_edit_success'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text">Hello Cheif></h2>
                                        <h2 class="alert-text"><?= $_SESSION['testimonial_edit_success']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['testimonial_edit_success']); ?>

                            <?php if (isset($_SESSION['testimonial_delete'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text">Hello Cheif></h2>
                                        <h2 class="alert-text"><?= $_SESSION['testimonial_delete']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['testimonial_delete']); ?>

                                <div class="card">
                                <div class="card-header">
                                        <h5 class="card-title">Testimonial List</h5>
                                </div>
                                <div class="card-body">
                                <table class="table">
                                <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Client Image</th>
                                    <th scope="col">Client Name</th>
                                    <th scope="col">Client Designation</th>
                                    <th scope="col">Client Company</th>
                                    <!-- <th scope="col">Client Feedback subject</th>
                                    <th scope="col">Working From</th>
                                    <th scope="col">Working To</th>
                                    <th scope="col">Feedback Message</th> -->
                                    <th scope="col">status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                               <?php if(isset($testimonials)) : foreach ($testimonials as $testi) :
                                ?>
                                 <tr>
                                    <th scope="row"><?= $serial++ ?></th>
                                    <td><img style="width: 50px; height:50px; border-radius:50%;" src="../uploads/testimonial_images/<?= $testi['client_image'] ?>"></td>
                                    <td><?= $testi['client_name'] ?></td>
                                    <td><?= $testi['client_designation'] ?></td>
                                    <td><?= $testi['client_company'] ?></td>
                                    <!-- <td><?= $testi['feedback_subject'] ?></td>
                                    <td><?= $testi['working_form'] ?></td>
                                    <td><?= $testi['working_to'] ?></td>
                                    <td><?= substr_replace($testi['feedback_message'],"...",70); ?></td> -->
            
                                    <td><?php if($testi['status'] == "deactive") :?>
                                        <a href="testimonial_post.php?id=<?= $testi['id'] ?>" class="btn btn-danger btn-sm" ><?= $testi['status'] ?></a>
                                        <?php else :?>
                                        <a href="testimonial_post.php?id=<?= $testi['id'] ?>" class="btn btn-success btn-sm" ><?= $testi['status'] ?></a>
                                        <?php endif;?>
                                    </td>
                                    <td>
                                    <!-- <a href="portfolio_post.php?edit_id=<?= $testi['id'] ?>" class="btn btn-info btn-sm">Edit</a> -->
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $testi['id'] ?>">
                                       Edit
                                    </button>
                                    <!-- edit Modal start -->
                                    <div class="modal fade" id="editModal<?= $testi['id'] ?>" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                        <h5 class="card-title">Update Testimonial Info</h5>
                                    </div>
                                    <div class="ONE d-flex justify-content-center">
                                    <img style="width: 100px; height:100px; border-radius: 50%;" src="../uploads/testimonial_images/<?= $testi['client_image'] ?>" alt="default_image">
                                    </div>
                                    <div class="card-body">
                                        <form action="testimonial_post.php" method="POST" enctype="multipart/form-data">
                                        <div class="example-container">
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Client Image</label>
                                                <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="client_image" value="<?= $testi['client_image'] ?>">
                                                
                                            </div>
                                            <div class="example-content">
                                                <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="testimonial_id" value="<?= $testi['id'] ?>">
                                                <label for="exampleInputEmail1" class="form-label">Client Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="client_name" value="<?= $testi['client_name'] ?>">
                                            
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Client Designation</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="client_designation" value="<?= $testi['client_designation'] ?>">
                                            
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Client Company Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="client_company" value="<?= $testi['client_company'] ?>">
                                            
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Feedback subject</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="feedback_subject" value="<?= $testi['feedback_subject'] ?>">
                                            
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Working From</label>
                                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="working_form" value="<?= $testi['working_form'] ?>">
                                            
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Working To</label>
                                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="working_to" value="<?= $testi['working_to'] ?>">
                                            
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Feedback Message</label>
                                                <!-- <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="feedback_message"> -->
                                                <textarea rows="5" class="form-control" id="exampleInputEmail1" name="feedback_message"><?= $testi['feedback_message'] ?></textarea>
                                            
                                        </div>      
                                        <!-- <div class="example-content">
                                                <button type="submit" class="btn btn-success btn-sm" name="portfolio_update_btn">update</button>
                                        </div> -->
                                        </div>
                                        
                                    </div>
                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success" name="testimonial_update_btn">update</button>
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- edit Modal end -->
                                    <a href="testimonial_post.php?delete_id=<?= $testi['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                                    <a href="testimonial_show.php?show_id=<?= $testi['id'] ?>" class="btn btn-success btn-sm">Details</a>
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