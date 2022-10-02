<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Print Invoice</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" />
     </head>  
     <body>
      <?php  require 'Authentication.php';
             require 'Connection.php';
             $email = $_SESSION["Name"];   
            $sql = "SELECT * FROM transactions WHERE Email = '$email' ";
            $result = $connection->query($sql);
                 ?>
                 <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-0">
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12">
                         <a href="Dashboard.php"  class="btn btn-lg btn-primary btn-block mt-5 mb-5">Back</a>
                         <input class="btn btn-lg btn-primary btn-block mt-5 mb-5" type="button" name="Print" value = "Print" onclick="Printpage();">
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-0"></div>
                 </div>
                 <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-0">
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-12">
                          <h2 class="mt-4 mb-5 "> Transactions</h2>
                  </div>
                        <div class="col-md-5 col-lg-5 col-sm-0"></div>
                 </div>
                 <div class="row container-fluid">
                <table class="table table-responsive table-bordered">
                  <tr class="mb-3">
                    <th>SN</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Time</th>
                 </tr>
                <?php 
                 if($result->num_rows > 0){ 
                    $counter= 1;
                    while($row = $result->fetch_assoc()){
                       ?>
                      <tr><td>
                         <?php echo $counter ?>
                             </td><td>
                                <?php echo $row["Product"]; ?>
                                </td><td>
                                <?php echo $row["Quantity"]; ?>
                                </td><td>
                                <?php echo $row["Price"]; ?>
                                </td><td>
                                <?php echo $row["Total"]; ?>
                                </td><td>
                                <?php echo $row["Date"]; ?>
                                 </td><td>
                                <?php echo $row["Time"]; ?>
                                 </td>
                                </tr><br>
  
                               <?php 
                                $counter++;
                                 }
                             }
                             
                 ?>  
              </div> 
              <script type="text/javascript">     
                   function Printpage() {   
                    var printContent = document.getElementsByTagName('body')[0];
                    var WinPrint = window.open('', '', 'width=700,height=650');
                    WinPrint.document.write(printContent.innerHTML);
                   WinPrint.document.close();
                  WinPrint.focus();
                   WinPrint.print();
                WinPrint.close();  
            }
       </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
        <script src="js/sidebarscripts.js"></script>
    </body>
</html>                    