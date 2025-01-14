<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinary Clinic | Register</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/media.css">
</head>

<body>
<div class="wrapper">
    <div class="wrapper__top">
        <div class="login">
            <form action="/register" method="post">
                <h2>Registration</h2>
                <p>Email</p>
                <input type="email" placeholder="test@gmail.com" name="email" required>
                <p>Login</p>
                <input type="text" placeholder="login" name="login" required>
                <p>Name</p>
                <input type="text" placeholder="name" name="name" required>
                <p> Phone</p>
                <input type="text" placeholder="+380969352123" name="phone" required>
                <p>Password</p>
                <input type="text" placeholder="password" name="password" required>
                <div class="login__wrapper">
                    <div>
                        <input type="radio" name="type" value="0" required>
                        <p>User</p>
                    </div>
                    <div>
                        <input type="radio" name="type" value="1">
                        <p>Doctor</p>
                    </div>
                </div>
                <button type="submit">Sign in</button>
                <span>If you have an account - <a href="/login">log in</a></span>
            </form>
        </div>
    </div>
</div>
</body>
</html>
