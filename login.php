<?php
session_start();
include('connection.php');


if (isset($_POST['submit'])) {
    $email = $_POST['ename'];
    $password = $_POST['password'];

    $travels = $_POST['as'];


    if ($travels == '0') {

        $select_query = "SELECT * FROM `parent_register` WHERE Pemail = '$email'  ";
        $run_squery = mysqli_query($conn, $select_query);

        $row = mysqli_fetch_array($run_squery);
      
        if (mysqli_num_rows($run_squery) > 0) {
            if ($password == $row["password"] && $email == $row["Pemail"]) {
                $_SESSION['parent_name'] = $row['Pname'];
                $_SESSION['parent_id'] = $row['id'];

                header('location:index.php');
                exit();
            }
        }else{
            echo "<script> alert('User not Registered')</script>";
        }

        






    } elseif ($travels == '1') {
        $select_query2 = "SELECT * FROM `hospital_register` WHERE Hemail = '$email' ";
        $run_squery2 = mysqli_query($conn, $select_query2);

        $rows = mysqli_fetch_array($run_squery2);
        if (mysqli_num_rows($run_squery2) > 0) {
        if ($password == $rows["Hpass"] && $email == $rows["Hemail"]) {
            $_SESSION['hospital_name'] = $rows['Hname'];
            $_SESSION['hospital_logo'] = $rows['Hlogo'];
            
            header('location:index.php');
            exit();

        }

    } }
    else{
        echo "<script> alert('User not Registered')</script>";
    }

    




}


?>


<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Hospital</title>
    <link rel="icon" href="img/logo.png" type="image/png">

    <link rel="stylesheet" href="css/bootstrap1.min.css" />

    <link rel="stylesheet" href="vendors/themefy_icon/themify-icons.css" />

    <link rel="stylesheet" href="vendors/swiper_slider/css/swiper.min.css" />

    <link rel="stylesheet" href="vendors/select2/css/select2.min.css" />

    <link rel="stylesheet" href="vendors/niceselect/css/nice-select.css" />

    <link rel="stylesheet" href="vendors/owl_carousel/css/owl.carousel.css" />

    <link rel="stylesheet" href="vendors/gijgo/gijgo.min.css" />

    <link rel="stylesheet" href="vendors/font_awesome/css/all.min.css" />
    <link rel="stylesheet" href="vendors/tagsinput/tagsinput.css" />

    <link rel="stylesheet" href="vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="vendors/datatable/css/buttons.dataTables.min.css" />

    <link rel="stylesheet" href="vendors/text_editor/summernote-bs4.css" />

    <link rel="stylesheet" href="vendors/morris/morris.css">

    <link rel="stylesheet" href="vendors/material_icon/material-icons.css" />

    <link rel="stylesheet" href="css/metisMenu.css">

    <link rel="stylesheet" href="css/style1.css" />
    <link rel="stylesheet" href="css/colors/default.css" id="colorSkinCSS">

</head>
<style>
    body{
         background-color: lightblue;
    }
</style>


<body class="">

<h1 class ="text-center mb-5">Vaccsy</h1>


    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="mb_30">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">

                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Log in</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post">

                                            <div class="mt-2">
                                                <input type="text" name="ename" class="form-control form-control-lg "
                                                    placeholder="Enter your email">
                                            </div>
                                            <div class=" mt-3">
                                                <input type="password" name="password"
                                                    class="form-control form-control-lg" placeholder="Password">
                                            </div>



                                            <select name="as" class="form-control form-control-lg mt-3 ">
                                                <option value="1" class="text-dark">Hospital</option>
                                                <option value="0" selected>Parent</option>
                                            </select>


                                            <button class="btn btn-primary form-control mt-4" type="submit"
                                                name="submit" value="submit">Submit</button>

                                        </form>
                                        <p>Need an account? <a href="register.php"> Sign Up</a></p>
                                        <div class="text-center">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#forgot_password"
                                                data-bs-dismiss="modal" class="pass_forget_btn">Forget Password?</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        </section>



        <script src="js/jquery1-3.4.1.min.js"></script>

        <script src="js/popper1.min.js"></script>

        <script src="js/bootstrap1.min.js"></script>

        <script src="js/metisMenu.js"></script>

        <script src="vendors/count_up/jquery.waypoints.min.js"></script>

        <script src="vendors/chartlist/Chart.min.js"></script>

        <script src="vendors/count_up/jquery.counterup.min.js"></script>

        <script src="vendors/swiper_slider/js/swiper.min.js"></script>

        <script src="vendors/niceselect/js/jquery.nice-select.min.js"></script>

        <script src="vendors/owl_carousel/js/owl.carousel.min.js"></script>

        <script src="vendors/gijgo/gijgo.min.js"></script>

        <script src="vendors/datatable/js/jquery.dataTables.min.js"></script>
        <script src="vendors/datatable/js/dataTables.responsive.min.js"></script>
        <script src="vendors/datatable/js/dataTables.buttons.min.js"></script>
        <script src="vendors/datatable/js/buttons.flash.min.js"></script>
        <script src="vendors/datatable/js/jszip.min.js"></script>
        <script src="vendors/datatable/js/pdfmake.min.js"></script>
        <script src="vendors/datatable/js/vfs_fonts.js"></script>
        <script src="vendors/datatable/js/buttons.html5.min.js"></script>
        <script src="vendors/datatable/js/buttons.print.min.js"></script>
        <script src="js/chart.min.js"></script>

        <script src="vendors/progressbar/jquery.barfiller.js"></script>

        <script src="vendors/tagsinput/tagsinput.js"></script>

        <script src="vendors/text_editor/summernote-bs4.js"></script>
        <script src="vendors/apex_chart/apexcharts.js"></script>

        <script src="js/custom.js"></script>
</body>

</html>