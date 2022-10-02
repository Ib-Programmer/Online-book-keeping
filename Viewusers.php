<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>View Users</title>
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
   font-weight : bold;
 }
        </style>
    </head>
    <body>
      <?php  require 'Authentication.php';
             require 'Connection.php';
             $email = $_SESSION["Name"];
             ?>
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
                <div class=" col-md-9 col-sm-10  container-fluid">
                    <div class="row ">
                    <h2 class="mt-4 mb-5"> View Users</h2>
                    <?php
                    $per_page_record = 5;
                    if(isset($_GET['page'])){
                     $page = $_GET["page"];
                     }
                     else {
                      $page = 1;
                   }
                  $start_from = ($page-1) * $per_page_record;
                  $sql = "SELECT * FROM users  LIMIT $start_from ,$per_page_record";
                  $result = $connection->query($sql);
                 ?>
                <table class="table table-responsive table-bordered">
                  <tr class="mb-3">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phonenumber</th>
                    <th>Command</th>
                 </tr>
                <?php 
                 if($result->num_rows > 0){ 
                    while($row = $result->fetch_assoc()){
                       ?>
                      <tr><td>
                         <?php echo $row["Id"]; ?>
                             </td><td>
                                <?php echo $row["Name"]; ?>
                                </td><td>
                                <?php echo $row["Email"]; ?>
                                </td><td>
                                <?php echo $row["Phonenumber"]; ?>
                                </td><td>
                                 <a href="Delete.php?deluser=<?php echo $row['Id'];?>"><button class="btn btn-danger mb-2">Delete</button></a>
                                 </td>
                                </tr><br>
  
                               <?php 
                                 }
                             }
                                 $sql = "SELECT  COUNT(*) FROM users ";
                                 $result = $connection->query($sql);
                                 $row = $result->fetch_row();
                                 $total_records = $row[0];?>
                     </table>
                     <p>
                        <?php 
                         $total_pages = ceil($total_records/ $per_page_record); 
                         $pagelink = "";
                         echo "<nav aria-label='Page navigation example'>";
                         echo "<ul class='pagination'>";
                        if($page>=2){
    
                             echo "<li class='page-item'><a class = 'page-link' href='Viewusers.php?page=".($page-1)."'>Pre </a></li>";
                         }
                      for($i=1;$i<=$total_pages;$i++){
                      if($i==$page){
                          $pagelink .="<li class='page-item'><a class= 'page-link' href='Viewusers.php?page=".$i."'>".$i."</a></li>";
                        }
                     else{
                      $pagelink .= "<li class='page-item'><a class='page-link' href='Viewusers.php?page=".$i."'>".$i."</a></li>";
                     }
                   };
                   echo $pagelink;
                 if($page<$total_pages){
                   echo "<li class='page-item'><a class='page-link' href ='Viewusers.php?page=".($page + 1)."'>Next </a></li>";
                   }
                   echo "</ul>";
                   echo "</nav>";
                   $connection->close();
                 ?>
                </div>
              </div>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
        <script src="js/sidebarscripts.js"></script>
    </body>
</html>        