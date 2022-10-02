<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" />
        <style>
       .navbar {
        box-shadow: 3px 3px 3px grey; 
          }
          .border-end {
        box-shadow: 5px 5px 5px grey; 
          }
        .navbar-brand h2{
          color :black;
          }
      h5{
      color :black;
       }
     .navbar .nav-item .nav-link{
     color :black;
    }     


        </style>
    </head>
    <body>
      <?php  require 'Authentication.php';
             require 'Connection.php';
      ?>;
         <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-grey"><h5>Dashboard</h5></div>
                <div class="list-group list-group-flush bg-secondary">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Dashboard.php"><h5>Dashboard</h5></a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Profile.php"><h5>Profile</h5></a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Transaction.php"><h5>Record Transaction</h5></a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Viewtransaction.php"><h5>View Transaction</h5></a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Printinvoice.php"><h5>Print Invoice</h5></a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Index.php"><h5>Home</h5></a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                 <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom p-3">
                    <div class="container-fluid"> 
                        <button class="btn btn-primary" id="sidebarToggle">
                        <span class="navbar-toggler-icon"></span>   
                        </button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="Index.php"><h5>Home</h5></a></li>
                                <li class="nav-item"><a class="nav-link" href="Logout.php"><h5>Logout</h5></a></li>
                            </ul>
                        </div>
                    </div>
                </nav> 
                <!-- Page content-->
                <div class="container-fluid">
                    <div class="row text-center">
                        <h1 class="mt-4">Dashboard</h1>
                        <p><h6>Select any action you want to perform at the side menu.</h6></p>
                    </div>
                    <div class="row text-center">
                          <div class="col-md-3 "></div>
                          <div class="col-md-5 "><img src="Assets/Booking.png" class="h-60" alt="picture of booking"></div>
                          <div class="col-md-4 "></div>
                    </div>  
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
       <script src="js/sidebarscripts.js"></script>
    </body>
</html>
