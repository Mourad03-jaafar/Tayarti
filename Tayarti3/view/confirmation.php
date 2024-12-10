<?php
include '../controller/confirmation-back.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
include('header.php');
?>

<body>
    <?php
    include('navbar.php');
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-3 bg-info p-2 rounded">
                <h2 class="bg-lights p-2 rounded text-center text-dark">Ticket N° : <?= $row2['id']; ?></h2>
                <h4 class="text-light">Surname : <?= $row2['nom']; ?> </h4>
                <h4 class="text-light">Name : <?= $row2['prenom'] ?> </h4>
                <h4 class="text-light">Age : <?= $row2['age']; ?> </h4>
                <h4 class="text-light">Country : <?= $row2['pays'] ?> </h4>
                <h4 class="text-light">Departure : <?= $row1['depart']; ?> </h4>
                <h4 class="text-light">Destination : <?= $row1['destination'] ?> </h4>
                <h4 class="text-light">Departure Date : <?= $row1['date_depart']; ?> </h4>
                <h4 class="text-light">Price : <?= $row1['prix'] ?> </h4>
                <hr>
                <button type="button" class="btn bg-lights p-2 rounded text-center text-dark">
                    <a href="index2.php"> Confirm</a>
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