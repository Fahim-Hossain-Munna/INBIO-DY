<?php
include("./extends/upper.php");

?>
            
                        <div class="row">
                        <?php if (isset($_SESSION['login_success'])) : ?>
                            <div class="alert alert-custom" role="alert">
                                <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">face</i></div>
                                <div class="alert-content">
                                    <span class="alert-text"><?= $_SESSION['login_success']; ?></span>
                                </div>
                            </div>
                        <?php endif;
                        unset($_SESSION['login_success']); ?>
                            <div class="col">
                                <div class="page-description">
                                    <h1>Dashboard</h1>
                                </div>
                            </div>
                        </div>

                        <?php 
                        $users_query = "SELECT * FROM users";
                        $users_count_query = "SELECT COUNT(*) AS 'count' FROM users";
                        $users_count_query_connect = mysqli_query($db_connect,$users_count_query);
                        $connect_query = mysqli_query($db_connect,$users_query);
                        $loop_num = 1;
                        $count_user = mysqli_fetch_assoc($users_count_query_connect);
                        
                        ?>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card widget widget-list">
                                    <div class="card-header">
                                        <h5 class="card-title">USERS INFORMATIONS<span class="badge badge-success badge-style-light"><?= $count_user['count'] ?> completed</span></h5>
                                    </div>
                                    <div class="card-body" style="overflow-y: scroll; height:450px;">
                                        <span class="text-muted m-b-xs d-block">showing 5 out of 23 active tasks.</span>
                                        <ul class="widget-list-content list-unstyled">
                                            <?php foreach($connect_query as $user) : ?>
                                            <li class="widget-list-item widget-list-item-green">
                                                <!-- <span class="widget-list-item-icon"><i class="material-icons-outlined"><?= $user['id'] ?></i></span> -->
                                                <span class="me-4 text-primary"><?= $loop_num++ ?></span>
                                                <span class="widget-list-item-description">
                                                    <a href="#" class="widget-list-item-description-title">
                                                        <?= $user['email'] ?>
                                                    </a>
                                                    <span class="widget-list-item-description-subtitle">
                                                    <?= $user['name'] ?>
                                                    </span>
                                                </span>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                            <?php if (isset($_SESSION['registration_successfull'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text"><?= $_SESSION['session_name']; ?></h2>
                                        <h2 class="alert-text"><?= $_SESSION['registration_successfull']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['registration_successfull']); ?>
                                <div class="card widget widget-list">
                                    <div class="card-header">
                                        <h5 class="card-title">New user Add</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="users_create_post.php" method="POST">
                                        <div class="example-container">
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">User Name</label>
                                                <input type="text" class="form-control <?= (isset($_SESSION['name_error'])) ? 'is-invalid' : '';  ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                                                <?php if(isset( $_SESSION['name_error'])) : ?>
                                                    <div id="emailHelp" class="form-tex text-danger text-center"><?= $_SESSION['name_error'] ?></div>
                                                <?php endif; unset($_SESSION['name_error']); ?>
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                                <input type="email" class="form-control <?= (isset($_SESSION['email_error'])) ? 'is-invalid' : '';  ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                                                <?php if(isset( $_SESSION['email_error'])) : ?>
                                                    <div id="emailHelp" class="form-text text-danger text-center"><?= $_SESSION['email_error'] ?></div>
                                                <?php endif; unset($_SESSION['email_error']); ?>
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Password</label>
                                                <input type="password" class="form-control <?= (isset($_SESSION['password_error'])) ? 'is-invalid' : '';  ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="password">
                                                <?php if(isset( $_SESSION['password_error'])) : ?>
                                                    <div id="emailHelp" class="form-text text-danger text-center"><?= $_SESSION['password_error'] ?></div>
                                                <?php endif; unset($_SESSION['password_error']); ?>
                                        </div>
                                        <div class="example-content">
                                                <button type="submit" class="btn btn-success btn-sm">update</button>
                                        </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
            <!-- cut from here -->
 <?php
 
 include("./extends/lower.php");
 ?>