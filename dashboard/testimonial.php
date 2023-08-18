<?php
include("./extends/upper.php");
include("../config/configdb.php");

?>

<div class="row">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-container">
        <li class="breadcrumb-item"><a href="testimonial.php">Testimonial</a></li>
        <li class="breadcrumb-item"><a href="testimonials_list.php">Testimonial List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Testimonial ADD</li>
    </ol>
</nav>
</div>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Testimonial</h1>
        </div>
    </div>
</div>

<div class="row">
<div class="col-xl-12">
<?php if (isset($_SESSION['testimonial_success'])) : ?>
    <div class="alert alert-custom" role="alert">
        <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
        <div class="alert-content">
            <h2 class="alert-text">Hello Cheif></h2>
            <h2 class="alert-text"><?= $_SESSION['testimonial_success']; ?></h2>
        </div>
    </div>
<?php endif;
unset($_SESSION['testimonial_success']); ?>

<?php if (isset($_SESSION['testimonial_edit_error'])) : ?>
    <div class="alert alert-custom" role="alert">
        <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
        <div class="alert-content">
            <h2 class="alert-text">Hello Cheif</h2>
            <h2 class="alert-text"><?= $_SESSION['testimonial_edit_error']; ?></h2>
        </div>
    </div>
<?php endif;
unset($_SESSION['testimonial_edit_error']); ?>


    <div class="card widget widget-list">
        <div class="card-header">
            <h5 class="card-title">Update Testimonial Client Info</h5>
        </div>
        <!-- <div class="ONE d-flex justify-content-center">
        <img style="width: 100px; height:100px; border-radius: 50%;" src="../uploads/testimonial_images/" alt="default_image">
        </div> -->
        <div class="card-body">
            <form action="testimonial_post.php" method="POST" enctype="multipart/form-data">
            <div class="example-container">
            <div class="example-content">
                    <label for="exampleInputEmail1" class="form-label">Client Image</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="client_image">
                
            </div>
            <div class="example-content">
                    <label for="exampleInputEmail1" class="form-label">Client Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="client_name">
                
            </div>
            <div class="example-content">
                    <label for="exampleInputEmail1" class="form-label">Client Designation</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="client_designation">
                
            </div>
            <div class="example-content">
                    <label for="exampleInputEmail1" class="form-label">Client Company Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="client_company">
                
            </div>
            <div class="example-content">
                    <label for="exampleInputEmail1" class="form-label">Feedback subject</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="feedback_subject">
                
            </div>
            <div class="example-content">
                    <label for="exampleInputEmail1" class="form-label">Working From</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="working_form">
                
            </div>
            <div class="example-content">
                    <label for="exampleInputEmail1" class="form-label">Working To</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="working_to">
                
            </div>
            <div class="example-content">
                    <label for="exampleInputEmail1" class="form-label">Feedback Message</label>
                    <!-- <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="feedback_message"> -->
                    <textarea rows="5" class="form-control" id="exampleInputEmail1" name="feedback_message"></textarea>
                
            </div>

            <div class="example-content">
                    <button type="submit" class="btn btn-success btn-sm" name="testi_insert_btn">update</button>
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