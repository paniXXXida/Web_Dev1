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
            <h2>My pets</h2>
            <?php foreach ($pets as $pet):?>
                <form>
                    <p>Name:</p>
                    <input type="text" value="<?= $pet['name']?>" disabled>

                    <p>Type:</p>
                    <input type="text" value="<?= $pet['type']?>" disabled>

                    <p>Age of the pet:</p>
                    <input type="text" value="<?= $pet['year']?>" disabled>
                </form>
            <?php endforeach;?>
        </div>

        <div class="account">
            <h2>Add my pet</h2>
            <form class="form-add" action="add_pet" method="post">
                <input type="text" placeholder="Name" name="pet_name" required>
                <select name="pet_type">
                    <option value="Cat">Cat</option>
                    <option value="Dog">Dog</option>
                </select>
                <input type="text" placeholder="Age of the pet" name="pet_year" required>
                <button type="submit">Add</button>
            </form>
        </div>
    </main>
    <?php include('views/partials/footer.php')?>
</div>
<!-- Swiper JS -->
<script src="../script/menu.js"></script>
</body>
</html>