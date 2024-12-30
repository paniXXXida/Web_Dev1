<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinary Clinic | Main pages</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/media.css">
</head>

<body>
<div class="wrapper">
    <?php include('views/partials/header.php')?>
    <!-- content -->
    <main class="container">
        <div class="account">
            <h2>Edit appointment</h2>
            <form action="edit_appointment" method="post">
                <p>Edit time:</p>
                <input type="date" name="date" value="<?= $date?>">
                <input type="hidden" name="id" value="<?= $id ?>">
                <button type="submit">Edit</button>
            </form>
        </div>
    </main>
    <?php include('views/partials/footer.php')?>
</div>
<!-- Swiper JS -->
<script src="../script/menu.js"></script>
</body>
</html>