<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprint</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
        if (
            isset($_POST['login'])
            && !empty($_POST['username'])
            && !empty($_POST['password'])
        ) {
            if (
                $_POST['username'] == 'Agne' &&
                $_POST['password'] == '1111'
            ) {
                $_SESSION['logged_in'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['username'] = 'Agne';
                header('Location: second.php');
            } else {
               $err = 'Wrong username or password! :)' ;
            }
        }
        ?>


<div class='loginAll'>
            <h2>Login</h2>
            <form action='' method='POST'>
                <div class='login'>
                    <label>Username</label>
                    <input type='text' name='username' class='form-control' placeholder="Agne" >

                </div>
                <div class='login'>
                    <label>Password</label>
                    <input type='password' name='password' class='form-control' placeholder="1111">

                </div>
                <div class='login'>
                    <input type='submit' class='btn btn-primary' name='login'> <?php print($err); ?>
                </div>
            </form>
        
        </div>

</body>
</html>