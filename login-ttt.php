<?php
session_start();

$database = new PDO('mysql:host=localhost;dbname=account;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


if (isset($_POST["password"]) && isset($_POST["pseudo"])) {

    $password = $_POST["password"];
    $pseudo = $_POST["pseudo"];

    if ((!empty($password)) && (!empty($pseudo))) {


        $checkUser = $database->prepare("SELECT * FROM user WHERE pseudo=?");
        $checkUser->execute([$pseudo]);


        if ($checkUser->rowCount() > 0) {
            $user = $checkUser->fetch(PDO::FETCH_OBJ);
            var_dump($user);
            var_dump($user->pseudo);
            var_dump($pseudo);
            var_dump($password);
            var_dump($user->password);
            if (($user->pseudo) == $pseudo) {
                var_dump(password_verify($password, ($user->password)));
                if (password_verify($password, ($user->password))) {
                    $_SESSION['pseudo'] = $pseudo;
                    header('Location:dashboard.php');
                } else {
                    header("Location:login.php?error=Le pseudo et le mot de passe ne correspondent pas");
                }
            } else {
                header("Location:login.php?error=Le pseudo et le mot de passe ne correspondent pas");
            }
        }
    } else if (empty($pseudo)) {
        header("Location:login.php?error=Merci d'indiquer votre pseudo");
    } else if (empty($password)) {
        header("Location:login.php?error=Merci d'indiquer votre mot de passe");
    }
} else {
    echo "password and pseudo not set";
}
