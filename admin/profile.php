<?php session_start();
include 'connect.php';
if (isset($_SESSION['admin_login'])) {
    $admin_id = $_SESSION['admin_login'];
    $get_admin = mysqli_query($con, "SELECT * FROM admin WHERE user_id='$admin_id' ");
    $admin = mysqli_fetch_assoc($get_admin);
} else {
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("partials/head.php"); ?>
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



                <div class="container container-sm">
                    <h1>Edit your details</h1>

                    <form role="form" method="post" action="code/profile_.php" enctype="multipart/form-data">

                        <input type="hidden" name="user_id" value="<?php echo $admin['user_id']; ?>" id="user_id">
                        <section>
                            <div class="form-group">
                                <label for="email">Email</label>


                                <input type="email" class="form-control" name="email" value="<?php echo $admin['email']; ?>">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control w-50" name="password" id="password" value="<?php echo $admin['password']; ?>">
                                <i style="position:absolute;margin-top:-26px;margin-left:230px" class="fa fa-eye text-secondary" id="eye" aria-hidden="true"></i>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="name_f">First name</label>
                                    <input type="text" class="form-control" id="name_f" name="name_f" value="<?php echo $admin['name_f']; ?>" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="name_l">Last name</label>
                                    <input type="text" class="form-control" id="name_l" name="name_l" value="<?php echo $admin['name_l']; ?>">
                                </div>
                            </div>

                            <div class="form-row mt-3">
                                <div class="form-group col-md-6 d-flex align-items-center">
                                    <div>
                                        <?php if ($admin['profile'] == NULL) {   ?>
                                            <div class="avatar css-avatar"><span><?php echo $admin['name_f'][0]; ?></span></div>
                                        <?php } else {
                                            $profile = $admin['profile'];
                                            echo "<img src='profiles/$profile' class='rounded-circle' height='50'>";
                                        }
                                        ?>
                                    </div>


                                    <div class="ml-2 nowrap d-flex">
                                        <!-- <div class="btn btn-secondary" data-toggle="file" data-target="#avatar"
                                            data-status=".upload-status">

                                           
                                           
                                        </div> -->
                                        <label for="file" class="btn btn-secondary"> Upload photo</label>
                                        <input type="file" name="profile" accept="image/*" id="file" style="visibility: hidden;">


                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div id="name_file"></div>
                                    <div class="upload-status flex-fill ml-md-3" id="upload_status"></div>
                                </div>
                            </div>




                        </section>


                        <!-- Start custom CRM fields -->
                        <!-- End custom CRM fields -->

                        <div class="text-right mt-3">
                            <button type="submit" class="btn btn-primary">
                                Save changes </button>
                        </div>
                    </form>


                </div>
        </div>
        </main>
    </div>
    </div>

    <footer class="pt-3">&nbsp;</footer>




    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        !window.jQuery && document.write('<script src="/js/jquery-3.5.1.min.js"><\/script>')
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script>
        $("#eye").click(function() {
            if ($("#password").attr("type") == "text") {
                $("#password").attr("type", "password");
            } else {
                $("#password").attr("type", "text");
            }

        })
        $('#file').change(function() {

            var file = $('#file')[0].files[0].name;

            $('#name_file').text(file);
            $("#upload_status").html(`<div class="progress">
  <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
</div>
`);
        });
    </script>

    <script src="js/jquery.pjax.js?v=08-10"></script>
    <script src="js/27-10/spp_clients.js"></script>






</body>

</html>