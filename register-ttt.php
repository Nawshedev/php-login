<?php

session_start();
$database = new PDO('mysql:host=localhost;dbname=account;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));



if (isset($_POST["password"]) && isset($_POST["pseudo"])) {
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $pseudo = $_POST["pseudo"];

    $regex = preg_match('/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z !"#$%&\'()*+,-.\/:;<=>?@\[\\\\\]^_`{|}~]{8,255}/', $_POST["password"]);

    if ((!empty($pseudo)) && (!empty($_POST["password"])) && $regex) {

        $checkPseudo = $database->prepare("SELECT * from user WHERE pseudo=?");
        $checkPseudo->execute([$pseudo]);
        $resultPseudo = $checkPseudo->rowCount();
        var_dump($resultPseudo);
        if ($resultPseudo > 1) {
            header("Location:register.php?error=Merci de choisir un autre pseudo.Celui-ci est déjà pris.");
        } else {
            $result = $database->prepare("INSERT INTO user(password, pseudo) VALUE(?, ?)");
            $result->execute([$password, $pseudo]);
            $_SESSION['pseudo'] = $pseudo;
            header("Location:dashboard.php");
        }
    } else {
        if (empty($pseudo) && empty($_POST["password"])) {
            header("Location:register.php?error=Merci de remplir tous les champs.");
        } else if (empty($pseudo)) {
            header("Location:register.php?error=Merci de choisir un pseudo");
        } else if (empty($_POST["password"]) || !$regex) {
            header("Location:register.php?error=Merci de choisir un mot de passe de plus de 8 caractères et avec une majuscule au minimum'");
        }
    }
}

//admin mp : Motde-passe5ecur



//     if ((!empty($pseudo)) && (!empty($password)) && $regex) {

//         $checkPseudo = $database->prepare("SELECT * from user WHERE pseudo=?");
//         $checkPseudo->execute([$pseudo]);
//         $resultPseudo = $checkPseudo->rowCount();
//         var_dump($resultPseudo);
//         if ($resultPseudo > 0) {
//             header("Location:register.php?error=Merci de choisir un autre pseudo.Celui-ci est déjà pris.");
//         } else {
//             if ((!empty($password)) && $regex) {
//                 $result = $database->prepare("INSERT INTO user(password, pseudo) VALUE(?, ?)");
//                 $result->execute([$password, $pseudo]);
//                 echo "bravo, vous avez créé un compte";
//             } else if (empty($pseudo) && empty($password)) {
//                 header("Location:register.php?error=Merci de remplir tous les champs.");
//             } else if (empty($pseudo)) {
//                 header("Location:register.php?error=Merci de choisir un pseudo");
//             } else if (empty($password) && $regex) {
//                 header("Location:register.php?error=Merci de choisir un mot de passe de plus de 8 caractères et avec une majuscule au minimum'");
//             }
//         }
//     } else if (empty($pseudo) || empty($password)) {
//         header("Location:register.php?error=Merci de remplir tous les champs.");
//     } else if (empty($pseudo)) {
//         header("Location:register.php?error=Merci de choisir un pseudo");
//     } else if (empty($password)) {
//         header("Location:register.php?error=Merci de choisir un mot de passe de plus de 8 caractères et avec une majuscule au minimum'");
//     }
// }
