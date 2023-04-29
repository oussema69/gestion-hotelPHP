<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="../accueil.css">
</head>

<body>
    <ul>
        <?php
        session_start();

        if (isset($_SESSION['role']) && $_SESSION['role'] == 2) {
            // user is logged in with a role of 2
            $user_email = $_SESSION['email'];
        } else {
            // user is not logged in or does not have the required role
            header("location:../login/signin.php");
        }

        require '../connection.php';
        include '../User.php';
        // Set the INSERT SQL data
        $user = new User(null, "", "", "", "", "", "", "");
        $res = $user->__selectionbyemailClient($conn, $user_email);

        if ($res !== false && $res->rowCount() > 0) {
            $row = $res->fetch();
            //var_dump($row); 
        }



        ?>
        <a href="login\logout.php">Logout</a>

        <li><a href="../home.php">Home</a></li>
        <li><a href="../ClientSide/chambre.php">Create New Reservation</a></li>
        <li><a href="../HTML project/contact.html">Contact</a></li>
        <li><a href="../HTML project/about.html" id="id1">About</a></li>
        <li><img src="test2.jpg" alt="" id="id1"></li>
    </ul>

    <?php
    require '../connection.php';
    include '../Chambre.php';

    $chambre = new Chambre();
    $filter = [];

    if (isset($_GET['categorie']) && !empty($_GET['categorie'])) {
        $filter['categorie'] = $_GET['categorie'];
    }

    if (isset($_GET['prix_min']) && !empty($_GET['prix_min'])) {
        $filter['prix_min'] = $_GET['prix_min'];
    }

    if (isset($_GET['prix_max']) && !empty($_GET['prix_max'])) {
        $filter['prix_max'] = $_GET['prix_max'];
    }
    if (isset($_GET['nbr_personne']) && !empty($_GET['nbr_personne'])) {
        $filter['nbr_personne'] = $_GET['nbr_personne'];
    }



    $results = $chambre->getAllChambres($conn, $filter);
    ?>

    <form method="GET" action="chambre.php">
        <label for="categorie">Catégorie:</label>
        <select name="categorie" id="categorie">
            <option value="">Toutes</option>
            <option value="simple">Simple</option>
            <option value="double">Double</option>
            <option value="suite">Suite</option>
        </select>
        <label for="prix_min">Prix minimum:</label>
        <input type="number" name="prix_min" id="prix_min">
        <label for="prix_max">Prix maximum:</label>
        <input type="number" name="prix_max" id="prix_max">
        <label for="nbr_personne">Nombre de personne:</label>
        <input type="number" name="nbr_personne" id="nbr_personne">

        <button type="submit">Filtrer</button>
    </form>



    <div class="center">
    <div class="row">
        <?php while ($row = $results->fetch()) { ?>
            <div class="column col-3">
                <div class="card">
                    <h3>Chambre numero:<?php echo $row['id']; ?></h3>

                    <img src="../images/<?php echo $row['image']; ?>" class="pic1" />

                    <p>Prix :<?php echo $row['prix']; ?> DT</p>
                    <p>categorie : <?php echo $row['categorie']; ?></p>
                    <p>nombre de personne: <?php echo $row['nbr_personne']; ?> </p>
                    <?php if ($row['etat'] == 1) { ?>
                        <p>Disponible<span style="color:green;">&#x25cf;</span></p>
                        <a href="reservation.php?id=<?php echo $row['id']; ?>">Reserver</button>
                    <?php } else { ?>
                        <p>Réservé<span style="color:red;">&#x25cf;</span></p>
                    <?php } ?>

                </div>
            </div>
        <?php } ?>

    </div>
</div>



    <footer class="footer-distributed">
        <div class="footer-left">
            <h3>Company<span>logo</span></h3>
            <p class="footer-links">
                <a href="#" class="link-1">Home</a>
                <a href="#">Blog</a>
                <a href="#">Pricing</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
            </p>

            <p class="footer-company-name">Reservation hotelière © 2022.All rights deserved</p>
        </div>

        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>Tunisie</span> Ariana</p>
            </div>
            <div>
                <i class="fa fa-phone"></i>
                <p>+216 29 041 481</p>
            </div>

            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="samirchemkhi09@gmail.com">samirchemkhi09@gmail.com </br>oussemamhatli62@gmail.com</a></p>
            </div>

        </div>

        <div class="footer-right">

            <p class="footer-company-about">
                <span>About the company</span>
                Our agency seeks the satisfaction of our customers in advance by providing a service that reflects the expected good quality.
            </p>



        </div>

    </footer>

</body>

</html>