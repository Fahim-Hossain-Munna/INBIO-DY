<?php
include('./extends/upper.php');
?>
<div class="row">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-container">
        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
        <li class="breadcrumb-item"><a href="education_list.php">Education List</a></li>
        <li class="breadcrumb-item"><a href="experience.php">Education</a></li>
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
    <div class="col-xl-4">
    <?php if (isset($_SESSION['edu_success'])) : ?>
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                <div class="alert-content">
                    <h2 class="alert-text">Hello Cheif></h2>
                    <h2 class="alert-text"><?= $_SESSION['edu_success']; ?></h2>
                </div>
            </div>
        <?php endif;
        unset($_SESSION['edu_success']); ?>

        <?php if (isset($_SESSION['edu_error'])) : ?>
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
                <div class="alert-content">
                    <h2 class="alert-text">Hello Cheif></h2>
                    <h2 class="alert-text"><?= $_SESSION['edu_error']; ?></h2>
                </div>
            </div>
        <?php endif;
        unset($_SESSION['edu_error']); ?>

        <div class="card widget widget-list">
            <div class="card-header">
                <h5 class="card-title">Update Education Experience</h5>
            </div>
            <div class="card-body">
                <form action="experience_post.php" method="POST" enctype="multipart/form-data">
                    <div class="example-container">
                        <div class="example-content">
                            <label for="exampleInputEmail1" class="form-label">Institute Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="name">

                        </div>
                        <div class="example-content">
                            <label for="exampleInputEmail1" class="form-label">Institute Position/Examination You
                                Attend</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="position">

                        </div>
                        <div class="example-content">
                            <label for="exampleInputEmail1" class="form-label">Start Study From</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="study_from">

                        </div>
                        <div class="example-content">
                            <label for="exampleInputEmail1" class="form-label">Start Study To</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="study_to">

                        </div>
                        <div class="example-content">
                            <label for="exampleInputEmail1" class="form-label">Institute Location</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="location">

                        </div>
                        <div class="example-content">
                            <button type="submit" class="btn btn-success btn-sm" name="education_btn">update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <?php if (isset($_SESSION['skills_success'])) : ?>
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                <div class="alert-content">
                    <h2 class="alert-text">Hello Cheif></h2>
                    <h2 class="alert-text"><?= $_SESSION['skills_success']; ?></h2>
                </div>
            </div>
        <?php endif;
        unset($_SESSION['skills_success']); ?>

        <?php if (isset($_SESSION['skills_error'])) : ?>
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
                <div class="alert-content">
                    <h2 class="alert-text">Hello Cheif></h2>
                    <h2 class="alert-text"><?= $_SESSION['skills_error']; ?></h2>
                </div>
            </div>
        <?php endif;
        unset($_SESSION['skills_error']); ?>

        <div class="card widget widget-list">
            <div class="card-header">
                <h5 class="card-title">Update Skills Experience</h5>
            </div>
            <div class="card-body">
                <form action="experience_post.php" method="POST">
                    <div class="example-container">
                        <div class="example-content">
                            <label for="exampleInputEmail1" class="form-label">Title of Skills</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="title_of_skills">

                        </div>
                        <div class="example-content">
                            <label for="exampleInputEmail1" class="form-label">Percentage of Skills</label>
                            <select name="percentage_of_skills" class="form-control">
                            <option disabled selected >Select Your Skills Rate</option>
                            <option value="10">10%</option>
                            <option value="15">15%</option>
                            <option value="20">20%</option>
                            <option value="25">25%</option>
                            <option value="30">30%</option>
                            <option value="35">35%</option>
                            <option value="40">40%</option>
                            <option value="45">45%</option>
                            <option value="50">50%</option>
                            <option value="55">55%</option>
                            <option value="60">60%</option>
                            <option value="65">65%</option>
                            <option value="70">70%</option>
                            <option value="75">75%</option>
                            <option value="80">80%</option>
                            <option value="85">85%</option>
                            <option value="90">90%</option>
                            <option value="95">95%</option>
                            <option value="100">100%</option>
                            
                            </select>

                        </div>
                        
                        <div class="example-content">
                            <button type="submit" class="btn btn-success btn-sm" name="skills_btn">update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
    <?php if (isset($_SESSION['course_success'])) : ?>
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                <div class="alert-content">
                    <h2 class="alert-text">Hello Cheif></h2>
                    <h2 class="alert-text"><?= $_SESSION['course_success']; ?></h2>
                </div>
            </div>
        <?php endif;
        unset($_SESSION['course_success']); ?>

        <?php if (isset($_SESSION['course_error'])) : ?>
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
                <div class="alert-content">
                    <h2 class="alert-text">Hello Cheif></h2>
                    <h2 class="alert-text"><?= $_SESSION['course_error']; ?></h2>
                </div>
            </div>
        <?php endif;
        unset($_SESSION['course_error']); ?>

        <div class="card widget widget-list">
            <div class="card-header">
                <h5 class="card-title">Update Course Experience</h5>
            </div>
            <div class="card-body">
                <form action="experience_post.php" method="POST" enctype="multipart/form-data">
                    <div class="example-container">
                        <div class="example-content">
                            <label for="exampleInputEmail1" class="form-label">Title of Course</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="course_name">

                        </div>
                        <div class="example-content">
                            <label for="exampleInputEmail1" class="form-label">Institute Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="name_of_institute">

                        </div>
                        <div class="example-content">
                            <label for="exampleInputEmail1" class="form-label">Start From</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="course_from">

                        </div>
                        <div class="example-content">
                            <label for="exampleInputEmail1" class="form-label">Start To</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="course_to">

                        </div>
                        <div class="example-content">
                            <label for="exampleInputEmail1" class="form-label">Location</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="location">

                        </div>
                        <div class="example-content">
                            <button type="submit" class="btn btn-success btn-sm" name="course_btn">update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



</div>

<?php
include('./extends/lower.php');
?>