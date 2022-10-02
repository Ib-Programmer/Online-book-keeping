<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        
      
        <title></title>
    </head>
    <body>
    <?php  require 'Authentication.php';
               require 'Connection.php';
          if(isset($_GET['deltran'])){
               $id = $_GET['deltran'];
               $sql = $connection->prepare("DELETE FROM transactions  WHERE Id= ?"); 
               $sql->bind_param('s',$id); 
               $sql->execute();
             if($sql->execute() === TRUE){
               header("Location: Viewtransaction.php");
            }
          else {
          ?>

        <script>alert("Something wrong cannot delete trancstion.");</script>
       <?php 
      }
   }
   else if (isset($_GET['deluser'])){
      $id = $_GET['deluser'];
      $sql = $connection->prepare("DELETE FROM users  WHERE Id= ?"); 
      $sql->bind_param('s',$id); 
      $sql->execute();
      if($sql->execute() === TRUE){
       header("Location: Viewusers.php");
      }
   else {
   ?>

   <script>alert("Something wrong cannot delete user.");</script>
  <?php 
  }
 }
 else if (isset($_GET['delmsg'])){
  $id = $_GET['delmsg'];
  $sql = $connection->prepare("DELETE FROM suggestions  WHERE Id= ?"); 
  $sql->bind_param('s',$id); 
  $sql->execute();
  if($sql->execute() === TRUE){
   header("Location: Viewsuggestion.php");
  }
else {
?>

<script>alert("Something wrong cannot delete user Meassage.");</script>
<?php 
}
}
 else {

 }
  ?>
</body>
</html>