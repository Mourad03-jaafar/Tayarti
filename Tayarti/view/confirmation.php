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
            <div class="col-md-6 mt-3 bg-infos p-2 rounded">
                <h2 class="bg-lights p-2 rounded text-center ">Ticket N° : <?= $row2['id']; ?></h2>
                <h4 class="text-light">Surname : <?= $row2['nom']; ?> </h4>
                <h4 class="text-light">Name : <?= $row2['prenom'] ?> </h4>
                <h4 class="text-light">Age : <?= $row2['age']; ?> </h4>
                <h4 class="text-light">Country : <?= $row2['pays'] ?> </h4>
                <h4 class="text-light">Departure : <?= $row1['depart']; ?> </h4>
                <h4 class="text-light">Destination : <?= $row1['destination'] ?> </h4>
                <h4 class="text-light">Departure Date : <?= $row1['date_depart']; ?> </h4>
                <h4 class="text-light">Price : <?= $row1['prix'] ?>TND </h4>
                <hr>
                <button type="button" id="printPdf" class="btn rn btn-info bg-lights p-2 rounded text-center text-dark">
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script>
        document.getElementById('printPdf').addEventListener('click', function() {
            var doc = new jsPDF();
            doc.text('Ticket N° : ' + '<?= $row2['id']; ?>', 10, 10);
            doc.text('Surname : ' + '<?= $row2['nom']; ?>', 10, 20);
            doc.text('Name : ' + '<?= $row2['prenom'] ?>', 10, 30);
            doc.text('Age : ' + '<?= $row2['age']; ?>', 10, 40);
            doc.text('Country : ' + '<?= $row2['pays'] ?>', 10, 50);
            doc.text('Departure : ' + '<?= $row1['depart']; ?>', 10, 60);
            doc.text('Destination : ' + '<?= $row1['destination'] ?>', 10, 70);
            doc.text('Departure Date : ' + '<?= $row1['date_depart']; ?>', 10, 80);
            doc.text('Price : ' + '<?= $row1['prix'] ?>', 10, 90);
            doc.save('detail_vol.pdf');
        });
    </script>
</body>

</html>