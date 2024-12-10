<?php

include('../model/usersclass.php');
include('../model/reservation_class.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php
include('heder.php');

?>
<link type="text/css" rel="stylesheet" href="../public/css/table.css" />

<body>
    <?php
include('navbar.php');
?>
    <div id="historique">
        <h1 class="title">Historique des commandes</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Date reservation</th>
                    <th scope="col">Détails</th>
                </tr>
            </thead>

            <?php
            
            $id_user = $_SESSION["id_user"];
            
			$info = new Reservation();
			$res = $info -> reservation_join($id_user);
			?>
            <tbody>
                <tr>
                    <?php while ($row = $res->fetch_assoc()) { ?>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['date_reservation']; ?></td>
                    <td>
                        <input type="button" name="view" value="Détails" id="<?= $row['id']; ?>"
                            class="btn btn-info btn-xs view_data">
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalCenterTitle">détails de Reservation</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="detail">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<?php
    include('script.php');
    ?>
<script>
        $(document).ready(function () {
            $('.view_data').click(function () {
                var rid = $(this).attr("id");
                $.ajax({
                    url: "../controller/user_back.php",
                    method: "post",
                    data: {
                        rid: rid
                    },
                    success: function (data) {
                        $('#detail').html(data);
                        $('#exampleModalCenter').modal("show");
                    }
                });
            });
        });
    </script>

    