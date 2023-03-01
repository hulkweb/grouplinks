<?php session_start();
include 'connect.php';
if (isset($_SESSION['admin_login'])) {
    $admin_id = $_SESSION['admin_login'];
    $get_admin = mysqli_query($con, "SELECT * FROM admin WHERE user_id='$admin_id' ");
    $admin = mysqli_fetch_assoc($get_admin);
} else {
    echo "<script>location.replace('login.php');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("partials/head.php"); ?>
    <style type="text/css" data-css-vars>
        #data .card {
            height: 200px;
            text-align: center;
            justify-content: center;
            align-items: center;
            background: white;
        }
    </style>

</head>

<body class="">
    <div id="loading" class="ajax-loader">Loading...</div>

    <div class="container-fluid">
        <div class="row">
            <?php include_once("partials/sidebar.php"); ?>
            <main class="col">

                <?php include_once("partials/nav.php");
                $count_user = mysqli_query($con, "SELECT * FROM groups ");
                $users = mysqli_num_rows($count_user);


                $count_links = mysqli_query($con, "SELECT * FROM categories ");
                $links = mysqli_num_rows($count_links);

                $count_sub = mysqli_query($con, "SELECT * FROM countries ");
                $subs = mysqli_num_rows($count_sub);

                $count_reports = mysqli_query($con, "SELECT * FROM reports ");
                $reportss = mysqli_num_rows($count_reports);
                ?>



                <div class="container">

                    <h1>Welcome</h1>
                  
                    <div class="mt-2">
                        <div class="row" id="data">
                            <div class="col-sm-3 p-4">
                                <div class="card shadow ">
                                    <h1><?= $users; ?></h1>
                                    <h3>Total Groups</h3>
                                </div>
                            </div>

                            <div class="col-sm-3 p-4">
                                <div class="card  shadow ">
                                    <h1><?= $links; ?></h1>
                                    <h3>Total Categories</h3>
                                </div>
                            </div>
                            <div class="col-sm-3 p-4">
                                <div class="card shadow ">
                                    <h1><?= $subs; ?></h1>
                                    <h3>Total Countries</h3>
                                </div>
                            </div>
                            <div class="col-sm-3 p-4">
                                <div class="card shadow ">
                                    <h1><?= $reportss; ?></h1>
                                    <h3>Total Reports</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>


                    <div class="text-right">

                    </div>
                    <style>
                        .mp0\.00 {
                            display: none;
                        }
                    </style>
                </div>
        </div>
        </main>
    </div>
    </div>

    <footer class="pt-3">&nbsp;</footer>

    <div class="modal" id="spp-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"></div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    </script>
    <script>

    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>



    <script src="./js/jquery.pjax.js?v=08-10"></script>
    <script src="./js/27-10/spp_clients.js"></script>






</body>

</html>