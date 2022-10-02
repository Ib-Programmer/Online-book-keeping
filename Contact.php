
<!DOCTYPE HTML>
<html>
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>Contact US </title>
<style>

    label{
        font-size: 19px;

    }
    .form-control{
        font-size: 17px;
    }
    .pageheading{
        font-size: 23px;  
        font-weight: bold;
    
    }
    .navbar-brand h2{
color :black;
 }
 .navbar .nav-item .nav-link{
  color :black;
 }
</style>
</head>
<body>
<?php include 'Header.php';
require  'Connection.php';
$errormsg = $success = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        
        function validate_input($data){
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
        }
       $name = $email = $subject = $message = "";
       $stmt = $connection->prepare("INSERT INTO suggestions(Name,
       Email,Subject,Message)
       VALUES (?,?,?,?)");
       if(isset($_POST['contact'])){
         $name =  validate_input($_POST['name']);
         $email =  validate_input($_POST['email']);
         $subject =  validate_input($_POST['subject']);
         $message =  validate_input($_POST['message']);
         $stmt->bind_param("ssss", $name, $email, $subject,$message);
         If($stmt->execute() === TRUE){
            $success = "<div class='alert alert-success' role='alert'>"." Your message is  succcessfully submitted"."</div>";
         } 
         else {
            $errormsg = "<div class='alert alert-danger' role='alert'>"."We are sorry something was went wronged your message was not submitted"."</div>";   
         }  
       }
}
?>  
    <form class="form-signup text-center mt-5" method="POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="row">
       <div class="col-md-3 col-lg-3 col-sm-4"></div>
       <div class="col-md-5 col-lg-5 col-sm-5">
       <h1 class="pageheading mb-5 font-weight-normal"> Contact Us </h1>
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
           <div class="row mx-0 ">
          <div class="col-md-3 col-lg-3 col-sm-4"></div>
          <div class="col-md-5 col-lg-5 col-sm-5">
          <label for="inputname" class="mb-3">Name</label>
          <input type="text" name="name" id="inputname" class="form-control  mb-5" placeholder="name" required autofocus>
          </div>
          <div class="col-md-4 col-lg-4 col-sm-3"></div>
        </div>
         
      <div class="row mx-0">
          <div class="col-md-3 col-lg-3 col-sm-4"></div>
          <div class="col-md-5 col-lg-5 col-sm-5">
          <label for="inputEmail" class="mb-3" >Email address</label>
          <input type="email" name="email" id="inputEmail" class="form-control  mb-5" placeholder="Email address" required autofocus>
          </div>
          <div class="col-md-4 col-lg-4 col-sm-3"></div>
        </div>
        <div class="row mx-0">
          <div class="col-md-3 col-lg-3 col-sm-4"></div>
          <div class="col-md-5 col-lg-5 col-sm-5">
          <label for="inputname" class="mb-3">Subject</label>
          <input type="text" name="subject" id="inputname" class="form-control  mb-5" placeholder="Subject" required autofocus>
          </div>
          <div class="col-md-4 col-lg-4 col-sm-3"></div>
        </div>


        <div class="row mx-0">
          <div class="col-md-3 col-lg-3 col-sm-4"></div>
          <div class="col-md-5 col-lg-5 col-sm-5">
          <label for="inputname" class="mb-3">Message</label>
          <textarea  name="message" placeholder="Type your message  here" class="form-control is-invalid mt-5 mb-5"  id="validationTextarea" rows="10" cols="30" required></textarea>
          </div>
          <div class="col-md-4 col-lg-4 col-sm-3"></div>
        </div>
        <div class="row mx-0">
          <div class="col-md-3 col-lg-3 col-sm-4"></div>
          <div class="col-md-5 col-lg-5 col-sm-5">
          <input type="submit" class="btn  btn-lg btn-primary btn-block mb-5" name="contact" value="Submit"/><br>
          </div>
          <div class="col-md-4 col-lg-4 col-sm-3"></div>
        </div>
   
</form>
<?php include 'Footer.php'?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>