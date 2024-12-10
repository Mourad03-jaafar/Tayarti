<?php
include('../model/usersclass.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sky flight </title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="../public/css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Sky flight </div>
            <div class="list-group list-group-flush">
                <a href="admin.php" class="list-group-item list-group-item-action bg-light">List des vols</a>
                <a href="admin_profile.php" class="list-group-item list-group-item-action bg-light">Profile</a>
            </div>
        </div>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle"> Menu</button>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    </ul>

                    <?php if (isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['statut'])) {?>
                    <ul class="navbar-nav ">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <?= $_SESSION["nom"]; ?> <?= $_SESSION["prenom"]; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Statut : <samp><?= $_SESSION["statut"]; ?></samp></a>
                                <a class="dropdown-item" href="logout.php">Je me déconnecte</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                    </ul>
                    <?php } else { ?>
                        <ul style='margin-left: 90%;' class="navbar-nav  ">
                        <li class="nav-item ">
                        <a class="nav-lik " href="login.php">Login</a>
                        </li>
                        </ul>
                    


                    <?php }; ?>
            </nav>


        
            


            <?php if (isset($_SESSION["id_user"])) {
			
			$id = $_SESSION["id_user"];
			$user = new User();
			$res = $user -> user_show($id);
			$row = $res->fetch_assoc(); 
			?>

            <div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Admin Profile</h4>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form method="POST" action="../controller/admin_back.php">
                                                <div class="form-group row">
                                                    <label for="username" class="col-4 col-form-label">
                                                        NOM</label>
                                                    <div class="col-8">
                                                        <input name="id" value="<?= $row['id_user']; ?>" type="hidden">

                                                        <input id="username" name="nom" value="<?= $row['nom']; ?>"
                                                            class="form-control here" required="required" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="name" class="col-4 col-form-label">PRENOM</label>
                                                    <div class="col-8">
                                                        <input id="name" name="prenom" value="<?= $row['prenom']; ?>"
                                                            class="form-control here" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="lastname" class="col-4 col-form-label">EMAIL</label>
                                                    <div class="col-8">
                                                        <input id="lastname" name="mail" value="<?= $row['email']; ?>"
                                                            class="form-control here" type="email">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="text" class="col-4 col-form-label">PASSWORD</label>
                                                    <div class="col-8">
                                                        <input id="text" name="password"
                                                            value="<?= $row['password']; ?>" class="form-control here"
                                                            required="required" type="password">
                                                    </div>
                                                </div>



                                                <div class="form-group row">
                                                    <div class="offset-4 col-8">
                                                        <button name="update_admin_info" type="submit"
                                                            class="btn btn-primary">Modifier mon Profile</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 






		<?php }
		?>






</body>

</html>
<?php
	include('script.php');
	?>
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
