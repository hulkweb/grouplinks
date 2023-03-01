<?php session_start();
include 'connect.php';
if (isset($_SESSION['admin_login'])) {
    $admin_id = $_SESSION['admin_login'];
    $get_admin = mysqli_query($con, "SELECT * FROM admin WHERE user_id='$admin_id' ");
    $admin = mysqli_fetch_assoc($get_admin);
} else {
    header("Location:login.php");
}
include '../functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'partials/head.php' ?>

    <style type="text/css" data-css-vars>

    </style>
</head>

<body class="">
    <div id="loading" class="ajax-loader">Loading...</div>

    <div class="container-fluid">
        <div class="row">
            <?php include_once("partials/sidebar.php"); ?>
            <main class="col">

                <?php include_once("partials/nav.php"); ?>

                <div class="container">
                    <div class="header-container responsive">
                        <h1>
                            Blog Posts
                        </h1>


                    </div>





                    <div class="row">


                        <div class="col-sm-11 offset-sm-1 p-4 card">
                            <table class="table table-responsive" id="data_table">
                                <thead>
                                    <tr>
                                        <th>Num</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>category</th>

                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $groups = get_groups_all($pdo);
                                    foreach ($groups as $i => $group) {
                                    ?>
                                        <tr>
                                            <td><?= $i + 1 ?></td>
                                            <td> <img src=" <?= $group['image'] ?>" height="60" alt=""></td>

                                            <td><?= $group['name'] ?></td>
                                            <td><?= $group['category']['name'] ?></td>
                                          <td><a href="groups.php?del=<?= $group['id'] ?>"><div class="btn btn-danger">Delete</div> </a></td>  
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>

                        </div>


                    </div>




                </div>


                <div class="note mb-3">

                </div>

                <!-- <div class="text-right mt-4">
                        <a href="#" class="btn btn-primary btn-lg">
                            Continue to payment
                        </a>
                    </div> -->


        </div>
    </div>
    </main>
    </div>
    </div>
    <?php
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $d = mysqli_query($con, "DELETE FROM groups  WHERE id='$id' ");
        if ($d) {
            echo "<script> alert('Deleted'); location.replace('groups.php')</script>";
        }
    }



    ?>
    <footer class="pt-3">&nbsp;</footer>

    <div class="modal" id="spp-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"></div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#data_table').DataTable();
        });
    </script>



    <script src="js/jquery.pjax.js?v=08-10"></script>
    <script src="js/27-10/spp_clients.js"></script>






</body>

</html>