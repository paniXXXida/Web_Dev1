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
        <div class="account">
            <h2>Make appointment</h2>
            <form action="/add_appointment" method="post">
                <p>Select animal:</p>
                <select name="pet_id">
                    <?php foreach ($userAnimals as $animal):?>
                        <option value="<?= $animal['id']?>"><?= $animal['name']?></option>
                    <?php endforeach;?>
                </select>

                <p>Description</p>
                <input type="text" placeholder="..." name="description" required>

                <p>Select desire date (doctor approved or update this date later):</p>
                <input type="date" name="date" value="">

                <input type="hidden" name="doctor_id" value="<?= $doctorId ?>">

                <button type="submit">Send</button>
            </form>
        </div>
    </main>
    <?php include('views/partials/footer.php')?>
</div>
<!-- Swiper JS -->
<script src="../script/menu.js"></script>
</body>
</html>