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


<script src="/assets/javascript/doctor_services_api.js"></script>
<body>
<div class="wrapper">
    <?php include('views/partials/header.php')?>
    <main class="container">
        <h2>Your services</h2>
            <div id="services" class="account"></div>
        <div class="account">
            <h2>Add services</h2>
            <form class="form-add" action="/doctor_services" method="post">
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