<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Link -->
    <!-- CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" />

    <!-- CSS -->
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <title>Dashboard</title>
</head>

<body>

    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand mx-auto" href="index.php">Accueil</a>
    </nav>


    <div class="container d-flex justify-content-center align-items-center">

        <div class="card">

            <div class="upper">

                <img src="https://img.freepik.com/free-vector/cartoon-forest-background-nature-landscape-with-deciduous-trees-moss-rocks-grass-bushes-sunlight-spots-ground-scenery-summer-spring-wood-parallax-natural-scene-vector-illustration_107791-9113.jpg?w=1380&t=st=1666862622~exp=1666863222~hmac=1ff34da2b17d6286326ac194de3129ab4a6f2bec22768e66a92af18b9478f0cb" class="img-fluid">

            </div>

            <div class="user text-center">

                <div class="profile">

                    <img src="https://img.freepik.com/free-vector/3d-cartoon-young-woman-sitting-using-laptop-character-illustration-vector-design_40876-3101.jpg?w=826&t=st=1666862528~exp=1666863128~hmac=2f6537b2069a356f850f1b7279c92c53d941f430fc8082b0e16aff28c868b0f9" class="rounded-circle" width="80">

                </div>

            </div>


            <div class="mt-5 text-center">

                <h4 class="mb-3 mt-3"><?php echo $_SESSION['pseudo'] ?></h4>
                <span class="text-muted d-block mb-2">bonjour</span>

                <a href="logout.php" class="btn btn-dark btn-sm follow">déconnexion</a>


            </div>

        </div>

    </div>



</body>

</html>