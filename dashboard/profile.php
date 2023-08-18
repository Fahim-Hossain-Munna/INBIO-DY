<?php
include("./extends/upper.php");
?>
    <div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Profile</h1>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-xl-4">
                            <?php if (isset($_SESSION['update_successful'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text"><?= $_SESSION['admin_user_name']; ?></h2>
                                        <h2 class="alert-text"><?= $_SESSION['update_successful']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['update_successful']); ?>


                                <div class="card widget widget-list">
                                    <div class="card-header">
                                        <h5 class="card-title">Update Name</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="update_post.php" method="POST">
                                        <div class="example-container">
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">User Name</label>
                                                <input type="text" class="form-control <?= (isset($_SESSION['name_error'])) ? 'is-invalid' : '';  ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                                                <?php if(isset( $_SESSION['name_error'])) : ?>
                                                    <div id="emailHelp" class="form-tex text-danger text-center"><?= $_SESSION['name_error'] ?></div>
                                                <?php endif; unset($_SESSION['name_error']); ?>
                                        </div>
                                        <div class="example-content">
                                                <button type="submit" class="btn btn-success btn-sm" name="change_name">update</button>
                                        </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
        <div class="col-xl-4">
                            <?php if (isset($_SESSION['update_image_success'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text"><?= $_SESSION['admin_user_name']; ?></h2>
                                        <h2 class="alert-text"><?= $_SESSION['update_image_success']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['update_image_success']); ?>

                            <?php if (isset($_SESSION['update_image_error'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text"><?= $_SESSION['admin_user_name']; ?></h2>
                                        <h2 class="alert-text"><?= $_SESSION['update_image_error']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['update_image_error']); ?>


                                <div class="card widget widget-list">
                                    <div class="card-header">
                                        <h5 class="card-title">Update Profile Picture</h5>
                                    </div>
                                    <div class="ONE d-flex justify-content-center">
                                    <img style="width: 100px; height:100px; border-radius: 50%;" src="../uploads/profile_images/<?= $_SESSION['admin_user_picture'] ?>" alt="default_image">
                                    </div>
                                    <div class="card-body">
                                        <form action="update_post.php" method="POST" enctype="multipart/form-data">
                                        <div class="example-container">
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Picture</label>
                                                <input type="file" class="form-control <?= (isset($_SESSION['update_image_error'])) ? 'is-invalid' : '';  ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="image">
                                            
                                        </div>
                                        <div class="example-content">
                                                <button type="submit" class="btn btn-success btn-sm" name="change_image">update</button>
                                        </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
        <div class="col-xl-4">
                            <?php if (isset($_SESSION['update_pass_update'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text"><?= $_SESSION['admin_user_name']; ?></h2>
                                        <h2 class="alert-text"><?= $_SESSION['update_pass_update']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['update_pass_update']); ?>

                            <?php if (isset($_SESSION['update_pass_error'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text"><?= $_SESSION['admin_user_name']; ?></h2>
                                        <h2 class="alert-text"><?= $_SESSION['update_pass_error']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['update_pass_error']); ?>


                                <div class="card widget widget-list">
                                    <div class="card-header">
                                        <h5 class="card-title">Update Name</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="update_post.php" method="POST">
                                        <div class="example-container">
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Current Password</label>
                                                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="current_password">
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">New Password</label>
                                                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="new_password">
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Confirm password</label>
                                                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="confirm_password">
                                        </div>
                                        <div class="example-content">
                                                <button type="submit" class="btn btn-success btn-sm" name="change_password">update</button>
                                        </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
    </div>
    <div class="row">
    <div class="col-xl-4">
                            <?php if (isset($_SESSION['update_contact_success'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text"><?= $_SESSION['admin_user_name']; ?></h2>
                                        <h2 class="alert-text"><?= $_SESSION['update_contact_success']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['update_contact_success']); ?>

                            <?php if (isset($_SESSION['update_contact_error'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text"><?= $_SESSION['admin_user_name']; ?></h2>
                                        <h2 class="alert-text"><?= $_SESSION['update_contact_error']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['update_contact_error']); ?>


                                <div class="card widget widget-list">
                                    <div class="card-header">
                                        <h5 class="card-title">Contact No</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="update_post.php" method="POST">
                                        <div class="example-container">
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Contact</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="contact">
                                               
                                        </div>
                                        <div class="example-content">
                                                <button type="submit" class="btn btn-success btn-sm" name="change_contact">update</button>
                                        </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
    <div class="col-xl-4">
                            <?php if (isset($_SESSION['update_address_success'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text"><?= $_SESSION['admin_user_name']; ?></h2>
                                        <h2 class="alert-text"><?= $_SESSION['update_address_success']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['update_address_success']); ?>

                            <?php if (isset($_SESSION['update_address_error'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text"><?= $_SESSION['admin_user_name']; ?></h2>
                                        <h2 class="alert-text"><?= $_SESSION['update_address_error']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['update_address_error']); ?>


                                <div class="card widget widget-list">
                                    <div class="card-header">
                                        <h5 class="card-title">Home Address</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="update_post.php" method="POST">
                                        <div class="example-container">
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="address">
                                                
                                        </div>
                                        <div class="example-content">
                                                <button type="submit" class="btn btn-success btn-sm" name="change_address">update</button>
                                        </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
    <div class="col-xl-4">
                            <?php if (isset($_SESSION['update_about_success'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text"><?= $_SESSION['admin_user_name']; ?></h2>
                                        <h2 class="alert-text"><?= $_SESSION['update_about_success']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['update_about_success']); ?>

                            <?php if (isset($_SESSION['update_about_error'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text"><?= $_SESSION['admin_user_name']; ?></h2>
                                        <h2 class="alert-text"><?= $_SESSION['update_about_error']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['update_about_error']); ?>


                                <div class="card widget widget-list">
                                    <div class="card-header">
                                        <h5 class="card-title">About ME</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="update_post.php" method="POST">
                                        <div class="example-container">
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">About</label>
                                                <!-- <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title"> -->
                                                <textarea rows="5" class="form-control" id="exampleInputEmail1" name="about"></textarea>
                                                
                                        </div>
                                        <div class="example-content">
                                                <button type="submit" class="btn btn-success btn-sm" name="change_about">update</button>
                                        </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
    </div>
    
<?php
include("./extends/lower.php");
?>