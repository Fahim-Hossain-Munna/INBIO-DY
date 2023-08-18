<?php
include('./extends/upper.php');

$select = "SELECT * FROM mails";
$mails = mysqli_query($db_connect,$select);
$serial = 1;

?>

<div class="row">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-container">
        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
        <li class="breadcrumb-item"><a href="show_mails.php">Mails</a></li>
        <!-- <li class="breadcrumb-item"><a href="skill_list.php">Skill List</a></li> -->
        <!-- <li class="breadcrumb-item active" aria-current="page">Testimonial Details Show</li> -->
    </ol>
</nav>
</div>

<div class="row">
<div class="col">
    <div class="page-description">
        <h1>Client E-mails</h1>
    </div>
</div>
</div>

<div class="row">
    <div class="col-xl-12">
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

    <div class="accordion" id="accordionIconsExample">
    <?php if(isset($mails)) : foreach($mails as $mail) :  ?>
    <div class="accordion-item">
        <h2 class="accordion-header" id="fliconsush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#icons-collapseTwo<?= $mail['id'] ?>" aria-expanded="false" aria-controls="icons-collapseTwo">
                <i class="material-icons-two-tone">contact_mail</i>#<?= $serial++ ?> <?= $mail['subject'] ?>
            </button>
        </h2>
        <div id="icons-collapseTwo<?= $mail['id'] ?>" class="accordion-collapse collapse" aria-labelledby="icons-headingTwo" data-bs-parent="#accordionIconsExample">
            <div class="accordion-body">
                <span class="text-warning">Date : <?= $mail['date'] ?></span>
                <h2>Name : <?= $mail['name'] ?></h2>
                <p>E-mail : <?= $mail['email'] ?></p>
                <p>Contact : <?= $mail['contact'] ?></p>
                <p>Subject : <?= $mail['subject'] ?></p>
                <p>Message Body : </p>
                <strong><?= $mail['message'] ?></strong> 
                <br>
                <div class="d-flex justify-content-end">
                <a href="mail_delete.php?delete_mail_id=<?= $mail['id'] ?>" class="btn btn-danger btn-sm mt-5">Delete Mail</a>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; endif; ?>
  
</div>
    </div>
</div>


<?php
include('./extends/lower.php');

?>
