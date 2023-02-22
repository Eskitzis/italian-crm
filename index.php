<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" type="image/x-icon" href="assets/login.png">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <title>CRM</title>
</head>
<body class="bodyclass">
    <form class="login" action="proccess-login.php" method="post">
        <input type="text" name="user" id="user" placeholder="Username*" required>
        <input type="password" name="pass" id="pass" placeholder="Password*" required>
        <button>Login</button>
    </form>
</body>
</html>
