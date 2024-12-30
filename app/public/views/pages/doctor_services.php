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
    <main class="container">
        <h2>Your services</h2>
        <?php foreach ($doctorServices as $service):?>
            <div class="account">
                <form class="form-add" action="update_service" method="post">
                    <input type="text" placeholder="Name services" name="service_name" value="<?= $service['name']?>" required>

                    <input type="hidden" name="service_id" value="<?= $service['id']?>">
                    <button type="submit">Update service</button>
                </form>
            </div>
        <?php endforeach;?>

        <div class="account">
            <h2>Add services</h2>
            <form class="form-add" action="add_service" method="post">
                <input type="text" placeholder="Name services" name="service_name" required>

                <input type="hidden" name="doctor_id" value="<?= $doctorId?>">
                <button type="submit">Add services</button>
            </form>
        </div>
    </main>
    <?php include('views/partials/footer.php')?>
</div>
<!-- Swiper JS -->
<script src="../script/menu.js"></script>
</body>
</html>