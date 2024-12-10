<?php
include '../controller/confirmation-back.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
    include('heder.php');
    ?>

<body>
    <?php
include('navbar.php');
?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-3 bg-info p-2 rounded">
                <h2 class="bg-light p-2 rounded text-center text-dark">Ticket N° : <?= $row2['id']; ?></h2>
                <h4 class="text-light">Nom : <?= $row2['nom']; ?> </h4>
                <h4 class="text-light">Prenom : <?= $row2['prenom'] ?> </h4>
                <h4 class="text-light">Age : <?= $row2['age']; ?> </h4>
                <h4 class="text-light">Pays : <?= $row2['pays'] ?> </h4>
                <h4 class="text-light">Depart : <?= $row1['depart']; ?> </h4>
                <h4 class="text-light">Destination : <?= $row1['destination'] ?> </h4>
                <h4 class="text-light">Date De Part : <?= $row1['date_depart']; ?> </h4>
                <h4 class="text-light">Prix : <?= $row1['prix'] ?> </h4>
                <hr>
                <button type="button" class="btn bg-light p-2 rounded text-center text-dark">
                    <a href="index2.php"> Confirmer</a>
                </button>
            </div>
        </div>
    </div>
    </div>
    <div class="blink" style="margin-top: 200px;"></div>


    <?php
    include('script.php');
    ?>
</body>

</html>