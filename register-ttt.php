<?php


$database = new PDO('mysql:host=localhost;dbname=account;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));



if (isset($_POST["password"]) && isset($_POST["pseudo"])) {
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $pseudo = $_POST["pseudo"];

    $regex = ^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$;

    if ((!empty($pseudo)) && (!empty($password)) && (strlen("$password") > 8) && (preg_match($regex, $password))) {

        $checkPseudo = $database->prepare("SELECT * from user WHERE pseudo=?");
        $checkPseudo->execute([$pseudo]);
        $resultPseudo = $checkPseudo->rowCount();
        var_dump($resultPseudo);
        if ($resultPseudo > 0) {
            header("Location:register.php?error=Merci de choisir un autre pseudo.Celui-ci est déjà pris.");
        } else {
            $result = $database->prepare("INSERT INTO user(password, pseudo) VALUE(?, ?)");
            $result->execute([$password, $pseudo]);
            echo "bravo, vous avez créé un compte";
        }
    } else if (empty($pseudo) && empty($password)) {
        header("Location:register.php?error=Merci de remplir tous les champs.");
    } else if (empty($pseudo)) {
        header("Location:register.php?error=Merci de choisir un pseudo");
    } else if (empty($password) || strlen("$password") < 8) {
        header("Location:register.php?error=Merci de choisir un mot de passe de plus de 8 caractères et avec une majuscule au minimum'");
    }
} else {
    echo "password and pseudo not set";
}
