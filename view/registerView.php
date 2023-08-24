<?php
session_start();
require_once "../controller/userCtrl.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>

<body style="background-color: #0d0f10; color: #ffffff;">

    <div class="container mt-5 col-sm-4">
        <form action="../controller/registerCtrl.php" method="post">
            <h2 class="text-center">REGISTER:</h2>

            <div class="mb-3 mt-5">
                <div class="input-group mb-3">
                    <span class="input-group-text">👤</span>
                    <input type="text" class="form-control" placeholder="Enter name" name="name" maxlength="30">
                </div>
            </div>
            <div class="mb-3 mt-3">
                <div class="input-group mb-3">
                    <span class="input-group-text">@</span>
                    <input type="email" class="form-control" placeholder="E-mail" name="email">
                </div>
            </div>
            
            <div class="mb-3 mt-3">
                <div class="input-group mb-3">
                    <span class="input-group-text">🕿</span>
                    <input type="tel" class="form-control" placeholder="Enter telephone" name="telephone" maxlength="15">
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group mb-3">
                    <span class="input-group-text">🔒</span>
                    <input type="password" class="form-control" placeholder="Enter password" name="pwd" maxlength="30">
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group mb-3">
                    <span class="input-group-text">🔒</span>
                    <input type="password" class="form-control" placeholder="Confirm password" name="pwdConfirm" maxlength="30">
                </div>
            </div>
            <div class="container mt-4 text-center">
                <form action="view/registerView.php" method="post">
                    <input type="submit" class="btn btn-dark" name="submit" value="REGISTER">
                </form>
                <div class="container mt-2">
                    <form action="../view/index.php" method="post">
                        <input type="submit" class="btn btn-dark" name="submit" value="BACK">
                    </form>

                    <div class="container mt-2">

                        <?php
                        $user = new UserCtrl("name", "email", "telephone", "pwd", "pwdConfirm");
                        $user->errorDisplay();
                        ?>

                    </div>

                </div>
            </div>
        </form>
    </div>

</body>

</html>