<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Register Admin </title>
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
    label{
        font-size: 19px;
        font-weight: bold;

    }
        </style>
    </head>
    <body>
      <?php  require 'Authentication.php';
             require 'Connection.php';
             $errormsg = $success =   " ";
             if ($_SERVER["REQUEST_METHOD"] == "POST") {
                   $name = $email = $phonenumber = $password = "";
                   $privilege = "Admin";
                 function validate_input($data){
                     $data = trim($data);
                     $data = stripslashes($data);
                     $data = htmlspecialchars($data);
                     $data = filter_var($data,FILTER_SANITIZE_STRING);
                     return $data;
                   }
                   $name = validate_input($_POST["name"]);
                   $email = validate_input($_POST["email"]);
                   $phonenumber   = validate_input($_POST["phonenumber"]);
                   $password = validate_input($_POST["password"]);
                   $stmt = $connection->prepare("INSERT INTO users(Name,
                   Email, Phonenumber, Password,Privilege)
                   VALUES (?,?,?,?,?)");
                    $hash = password_hash($password,PASSWORD_DEFAULT);
                    $stmt->bind_param("sssss",$name, $email, $phonenumber,$hash,$privilege);
                    if( $stmt->execute() === TRUE){
                     $success = "<div class='alert alert-success' role='alert'>"." You are succcessfully signup"."</div>";
                    }
                    else{
                     $errormsg = "<div class='alert alert-danger' role='alert'>"."We are sorry something was went wronged you are not registered"."</div>"; 
                    }
                 }
             ?>        
      ?>;
         <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-grey"><h5>Admin Dashboard</h5></div>
                <div class="list-group list-group-flush bg-secondary">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Admindashboard.php"><h5>Dashboard</h5></a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Adminprofile.php"><h5>Profile</h5></a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Viewusers.php"><h5>View Users</h5></a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Viewsuggestion.php"><h5>Users Message</h5></a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Registeradmin.php"><h5>Register Admin</h5></a>
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

              <form class="form-signup text-center mt-5" method="POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      
      <div class="row  mx-0">
             <div class="col-md-3 col-lg-3 col-sm-4"></div>
             <div class="col-md-5 col-lg-5 col-sm-5">
             <h1 class="pageheading mb-5 font-weight-normal">Register Admin</h1>
             </div>
             <div class="col-md-4 col-lg-4 col-sm-3"></div>
            </div>
            <div class="row">
             <div class="col-md-3 col-lg-3 col-sm-4"></div>
             <div class="col-md-5 col-lg-5 col-sm-5">
              <?php echo $errormsg;
               echo $success; ?>
             </div>
             <div class="col-md-4 col-lg-4 col-sm-3"></div>
            </div>
            
            <div class="row  mx-0">
                <div class="col-md-3 col-lg-3 col-sm-4"></div>
                <div class="col-md-5 col-lg-5 col-sm-5">
                <label for="inputname" class="mb-3">Name</label>
                <input type="text" name="name" id="inputname" class="form-control  mb-5" placeholder="name" required autofocus>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-3"></div>
              </div>
           
            
            <div class="row  mx-0">
                <div class="col-md-3 col-lg-3 col-sm-4"></div>
                <div class="col-md-5 col-lg-5 col-sm-5">
                <label for="inputEmail" class="mb-3" >Email address</label>
                <input type="email" name="email" id="inputEmail" class="form-control  mb-5" placeholder="Email address" required autofocus>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-3"></div>
              </div>
      
              
            <div class="row  mx-0">
                <div class="col-md-3 col-lg-3 col-sm-4"></div>
                <div class="col-md-5 col-lg-5 col-sm-5">
                <label for="inputphonenumber"  class="mb-3" >Phonenumber</label>
                <input type="text" name="phonenumber" id="inputEmail" class="form-control  mb-5" placeholder="Phonenumber" required autofocus>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-3"></div>
              </div>
      
            <div class="row mx-0">
                <div class="col-md-3 col-lg-3 col-sm-4"></div>
                <div class="col-md-5 col-lg-5 col-sm-5">
                <label for="inputPassword" class="mb-3">Password</label>
            <input type="password" name = "password" id="inputPassword" class="form-control mb-5" placeholder="Password" required>
            </div>
                <div class="col-md-4 col-lg-4 col-sm-3"></div>
              </div>
      
              <div class="row mx-0 ">
                <div class="col-md-3 col-lg-3 col-sm-3"></div>
                <div class="col-md-5 col-lg-5 col-sm-5">
                <button class="btn btn-lg btn-primary mb-5" type="submit">Register</button>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-3"></div>
              </div>  
            </form>
    
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
        <script src="js/sidebarscripts.js"></script>
    </body>
</html>
