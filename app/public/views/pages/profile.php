<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinary Clinic | Register</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/media.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
<div class="wrapper">
    <div class="wrapper__top">
        <?php include('views/partials/header.php')?>
        <div class="login">
            <form action="" method="post" enctype="multipart/form-data" id="myform">
                <input type="hidden" id="user_id" value="<?= $userId?>">
                <h2>Your profile photo</h2>

                <div class="preview">
                    <img src="<?= !empty($imgName['img_name']) ? '../upload_images/'. $imgName['img_name'] : '' ?>" id="img" width="auto" height="auto">
                </div>

                <input type="file" id="file" name="img">
                <button id="upload_img" type="submit">Upload</button>
            </form>
        </div>
    </div>
    <?php include('views/partials/footer.php')?>
</div>
<!-- Swiper JS -->
<script src="../script/menu.js"></script>
<script src="../script/upload.js"></script>
</body>
</html>
