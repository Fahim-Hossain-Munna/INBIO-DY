
<?php
include("./extends/upper.php");
include("../config/configdb.php");

$id = $_GET['show_id'];

$query = "SELECT * FROM testimonials WHERE id='$id'";
$connect = mysqli_fetch_assoc(mysqli_query($db_connect,$query ));

?>

<div class="row">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-container">
        <li class="breadcrumb-item"><a href="testimonial.php">Testimonial</a></li>
        <li class="breadcrumb-item"><a href="testimonials_list.php">Testimonial List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Testimonial Details Show</li>
    </ol>
</nav>
</div>

<div class="row">
    <div class="card">
        <div class="card-header d-flex justify-content-center">
            ID NO : <?= $connect['id'] ?>
        </div>
        <div class="card-body">
        <div class="widget-info-container">
        <div class="widget-info-image">
        <img style="width: 200px; height:200px; border-radius: 50%;" src="../uploads/testimonial_images/<?= $connect['client_image'] ?>" alt="default_image">
        </div>
        <p class="widget-info-text mt-4"><?= $connect['client_company'] ?></p>
        <h2 class="widget-info-title"><?= $connect['client_name'] ?></h2>
        <h5 class="widget-info-text"><?= $connect['client_designation'] ?></h5>
        <p class="widget-info-text">Feedback Subject : <?= $connect['feedback_subject'] ?></p>
        <p class="widget-info-text">Working Form : <?= $connect['working_form'] ?></p>
        <p class="widget-info-text">Working To : <?= $connect['working_to'] ?></p>
        <p class="widget-info-text">Feedback Message : <?= $connect['feedback_message'] ?></p>
        <!-- <a href="#" class="btn btn-primary widget-info-action">Upgrade Now</a> -->
        </div>
        </div>
    </div>
</div>


<?php
include("./extends/lower.php");
?>