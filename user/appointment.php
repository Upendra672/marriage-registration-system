<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['omrsuid'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $date = $_POST['date'];
        $time = $_POST['time'];
    
        $sql = "insert into appointments (name, phone, date, time) values (:name, :phone, :date, :time)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':time', $time, PDO::PARAM_STR);
        $stmt->execute();
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <!-- custom css -->
        <!-- <link rel="stylesheet" href="./css/Dashboard.css"> -->
        <title>Online Marriage Registration System || Appointment Booking</title>

        <!-- vendor css -->
        <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
        <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
        <link href="lib/jquery-toggles/toggles-full.css" rel="stylesheet">
        <link href="lib/highlightjs/github.css" rel="stylesheet">
        <link href="lib/datatables/jquery.dataTables.css" rel="stylesheet">
        <link href="lib/select2/css/select2.min.css" rel="stylesheet">

        <!-- Amanda CSS -->
        <link rel="stylesheet" href="css/amanda.css">
    </head>

    <body>

        <?php include_once('includes/header.php'); ?>
        <?php include_once('includes/sidebar.php'); ?>



        <div class="am-pagetitle">
            <h5 class="am-title">Appointment Booking</h5>

        </div><!-- am-pagetitle -->

        <div class="am-mainpanel">
            <div class="am-pagebody">
                <!-- ---------------------------------------------------------------------------------------------------------- -->
                <form id="basic-form" method="post" enctype="multipart/form-data">

                    <h3 class="card-body-title" style="padding-top: 20px;color: red"> Appointment Details</h3>
                    <hr />
                    <div class="row pd-b-12">
                        <label class="col-sm-4 form-control-label">Name: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" name="name" value="" class="form-control" required='true'>
                        </div>
                    </div>

                    <div class="row pd-b-12">
                        <label class="col-sm-4 form-control-label">Mobile number: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="number" name="phone" value="" class="form-control" required='true'>
                        </div>
                    </div>

                    <div class="row pd-b-12">
                        <label class="col-sm-4 form-control-label">Date: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="Date" class="form-control fc-datepicker" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" name="date">
                        </div>
                    </div>

                    <div class="row mg-t-12">
                        <label class="col-sm-4 form-control-label">Time: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select type="text" name="time" value="" class="form-control" required='true'>
                                <option value="">Select Time</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="12:00">12:00</option>
                                <option value="13:00">13:00</option>
                                <option value="14:00">14:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>    
                            </select>
                        </div>
                    </div>
                    <div class="form-layout-footer mg-t-30">
                        <p style="text-align: center;"><button class="btn btn-info mg-r-5" name="submit" id="submit">Book Appointment</button></p>
                    </div>

                </form>


                <!-- ---------------------------------------------------------------------------------------------------------- -->


            </div><!-- am-pagebody -->
            <?php include_once('includes/footer.php'); ?>
        </div><!-- am-mainpanel -->

        <script src="lib/jquery/jquery.js"></script>
        <script src="lib/popper.js/popper.js"></script>
        <script src="lib/bootstrap/bootstrap.js"></script>
        <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
        <script src="lib/jquery-toggles/toggles.min.js"></script>
        <script src="lib/highlightjs/highlight.pack.js"></script>
        <script src="lib/datatables/jquery.dataTables.js"></script>
        <script src="lib/datatables-responsive/dataTables.responsive.js"></script>
        <script src="lib/select2/js/select2.min.js"></script>

        <script src="js/amanda.js"></script>
        <script>
            $(function() {
                'use strict';

                $('#datatable1').DataTable({
                    responsive: true,
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: '',
                        lengthMenu: '_MENU_ items/page',
                    }
                });

                $('#datatable2').DataTable({
                    bLengthChange: false,
                    searching: false,
                    responsive: true
                });

                // Select2
                $('.dataTables_length select').select2({
                    minimumResultsForSearch: Infinity
                });

            });
        </script>
    </body>

    </html>
<?php }  ?>