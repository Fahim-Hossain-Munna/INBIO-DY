<?php
include("./extends/upper.php");
include('../config/configdb.php');
$select_portfolios = "SELECT * FROM portfolios";
$portfolios = mysqli_query($db_connect,$select_portfolios);
$serial = 1;

?>
    <div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Portfolio</h1>
        </div>
    </div>
    </div>

    <div class="row">
    <?php if (isset($_SESSION['portfolio_edit_success'])) : ?>
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <h2 class="alert-text">Hello Cheif</h2>
                <h2 class="alert-text"><?= $_SESSION['portfolio_edit_success']; ?></h2>
            </div>
        </div>
    <?php endif;
    unset($_SESSION['portfolio_edit_success']); ?>

    <?php if (isset($_SESSION['portfolio_edit_error'])) : ?>
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
            <div class="alert-content">
                <h2 class="alert-text">Hello Cheif</h2>
                <h2 class="alert-text"><?= $_SESSION['portfolio_edit_error']; ?></h2>
            </div>
        </div>
    <?php endif;
    unset($_SESSION['portfolio_edit_error']); ?>

    <div class="col-xl-4">
                            <?php if (isset($_SESSION['portfolio_success'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text">Hello Cheif></h2>
                                        <h2 class="alert-text"><?= $_SESSION['portfolio_success']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['portfolio_success']); ?>

                            <?php if (isset($_SESSION['portfolio_error'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text">Hello Cheif</h2>
                                        <h2 class="alert-text"><?= $_SESSION['portfolio_error']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['portfolio_error']); ?>


                                <div class="card widget widget-list">
                                    <div class="card-header">
                                        <h5 class="card-title">Update Portfolio Info</h5>
                                    </div>
                                    <!-- <div class="ONE d-flex justify-content-center">
                                    <img style="width: 100px; height:100px; border-radius: 50%;" src="../uploads/portfo" alt="default_image">
                                    </div> -->
                                    <div class="card-body">
                                        <form action="portfolio_post.php" method="POST" enctype="multipart/form-data">
                                        <div class="example-container">
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Portfolio Title</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="portfolio_name">
                                            
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Portfolio Image</label>
                                                <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="portfolio_image">
                                            
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Portfolio Description</label>
                                                <!-- <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="image"> -->
                                                <textarea class="form-control" rows="4" name="portfolio_description"></textarea>
                                            
                                        </div>
                                        <div class="example-content">
                                                <button type="submit" class="btn btn-success btn-sm" name="portfolio_btn">update</button>
                                        </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                               
                            <div class="col-xl-8">
                            <?php if (isset($_SESSION['portfolio_status_change'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text">Hello Cheif></h2>
                                        <h2 class="alert-text"><?= $_SESSION['portfolio_status_change']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['portfolio_status_change']); ?>

                            <?php if (isset($_SESSION['portfolio_delete'])) : ?>
                                <div class="alert alert-custom" role="alert">
                                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                                    <div class="alert-content">
                                        <h2 class="alert-text">Hello Cheif></h2>
                                        <h2 class="alert-text"><?= $_SESSION['portfolio_delete']; ?></h2>
                                    </div>
                                </div>
                            <?php endif;
                            unset($_SESSION['portfolio_delete']); ?>

                                <div class="card">
                                <div class="card-header">
                                        <h5 class="card-title">Portfolio Info</h5>
                                </div>
                                <div class="card-body">
                                <table class="table">
                                <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                               <?php if(isset($portfolios)) : foreach ($portfolios as $portfolio) :
                                ?>
                                 <tr>
                                    <th scope="row"><?= $serial++ ?></th>
                                    <td><img style="width: 50px; height:50px; border-radius:50%;" src="../uploads/portfolio_images/<?= $portfolio['image'] ?>"></td>
                                    <td><?= $portfolio['name'] ?></td>
                                    <td><?= $portfolio['description'] ?></td>
            
                                    <td><?php if($portfolio['status'] == "deactive") :?>
                                        <a href="portfolio_post.php?id=<?= $portfolio['id'] ?>" class="btn btn-danger btn-sm" name="change_status"><?= $portfolio['status'] ?></a>
                                        <?php else :?>
                                        <a href="portfolio_post.php?id=<?= $portfolio['id'] ?>" class="btn btn-success btn-sm" name="change_status"><?= $portfolio['status'] ?></a>
                                        <?php endif;?>
                                    </td>
                                    <td>
                                    <!-- <a href="portfolio_post.php?edit_id=<?= $portfolio['id'] ?>" class="btn btn-info btn-sm">Edit</a> -->
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $portfolio['id'] ?>">
                                       Edit
                                    </button>
                                    <!-- edit Modal start -->
                                    <div class="modal fade" id="editModal<?= $portfolio['id'] ?>" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                        <h5 class="card-title">Update Portfolio Info</h5>
                                    </div>
                                    <div class="ONE d-flex justify-content-center">
                                    <img style="width: 100px; height:100px; border-radius: 50%;" src="../uploads/portfolio_images/<?= $portfolio['image'] ?>" alt="default_image">
                                    </div>
                                    <div class="card-body">
                                        <form action="portfolio_post.php" method="POST" enctype="multipart/form-data">
                                        <div class="example-container">
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Portfolio Title</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="portfolio_name" value="<?= $portfolio['name'] ?>">
                                                <input type="hidden" class="form-control"  name="portfolio_id" value="<?= $portfolio['id'] ?>">
                                            
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Portfolio Image</label>
                                                <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="portfolio_image">
                                            
                                        </div>
                                        <div class="example-content">
                                                <label for="exampleInputEmail1" class="form-label">Portfolio Description</label>
                                                <!-- <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="image"> -->
                                                <textarea class="form-control" rows="4" name="portfolio_description"><?= $portfolio['description'] ?></textarea>
                                            
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
                                            <button type="submit" class="btn btn-success" name="portfolio_update_btn">update</button>
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- edit Modal end -->
                                    <a href="portfolio_post.php?delete_id=<?= $portfolio['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
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