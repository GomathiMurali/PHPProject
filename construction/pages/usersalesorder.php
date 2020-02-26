<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>BSS</title>
  <link rel="shortcut icon" href="">
	<?php
include_once('auth2.php');

?>
<?php $uname = $session_cashier_name; ?>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  
   <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
        <script src="lib/jquery.js" type="text/javascript"></script>
        <script src="src/facebox.js" type="text/javascript"></script>
        <script type="text/javascript">
          jQuery(document).ready(function($) {
            $('a[rel*=facebox]').facebox({
              loadingImage : 'src/loading.gif',
              closeImage   : 'src/closelabel.png'
          })
        })
    </script>
	
	<script>


    function calculate() {
        var myBox1 = document.getElementById('tray').value; 
        var myBox2 = document.getElementById('pertray').value;
        var result = document.getElementById('tvalue'); 
        var myResult = myBox1 * myBox2;
          document.getElementById('tvalue').value = myResult;
		  document.getElementById('qty').value = myResult;

    }
</script>
	<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
$finalcode1='PR-'.createRandomPassword();
?>

<?php 
$invoice = $_GET['invoice'];

$bank = $_GET['bank'];

?>

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="userhome.php">BSS Poultry Farm</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

 <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <!--<li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>-->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
		
          <!--<a class="dropdown-item" href="#myModal" data-toggle="modal">Add User</a>-->
          <!--<a class="dropdown-item" href="#">Activity Log</a>-->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
	<li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-user"></i>
          <span><?php echo $uname;?></span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="userhome.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
	  
      <li class="nav-item">
        <a class="nav-link" href="userproducts.php">
          <i class="fa fa-table fa-fw"></i>
          <span>Products</span></a>
      </li>
	  
	   <li class="nav-item">
        <a class="nav-link" href="userpurchaseordergroup.php?invoice=<?php echo $finalcode;?>">
          <i class="fa fa-list-alt fa-fw"></i>
          <span></span>Sales Order</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="userpurchasegroup.php?invoice=<?php echo $finalcode;?>">
          <i class="fa fa-list-alt fa-fw"></i>
          <span></span>Sales</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="usersalesordergroup.php?invoice=<?php echo $finalcode1;?>">
          <i class="fa fa-list-alt fa-fw"></i>
          <span></span>Purchase Order</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="usersalesgroup.php?invoice=<?php echo $finalcode1;?>">
          <i class="fa fa-list-alt fa-fw"></i>
          <span></span>Purchase</a>
      </li>
	  <!--<li class="nav-item">
        <a class="nav-link" href="voucher.php">
          <i class="fa fa-list-alt fa-fw"></i>
          <span></span>Voucher</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="receipt.php">
          <i class="fa fa-list-alt fa-fw"></i>
          <span></span>Receipt</a>
      </li>-->
	   <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Reports</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Sales Report:</h6>
          <a class="dropdown-item" href="usersalesdate.php">Date Wise Report</a>
		  <a class="dropdown-item" href="usersalesmonth.php">Monthly Report</a>
		  <a class="dropdown-item" href="usersalesyear.php">Yearly Report</a>
          <!--<a class="dropdown-item" href="salesdatecustomer.php">Customer Wise Report</a>-->
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Purchase Report:</h6>
          <a class="dropdown-item" href="userpurchasedate.php">Date Wise Report</a>
		  <a class="dropdown-item" href="userpurchasemonth.php">Monthly Report</a>
		  <a class="dropdown-item" href="userpurchaseyear.php">Yearly Report</a>
          <!--<a class="dropdown-item" href="purchasedatecustomer.php">Customer Wise Report</a>-->
        </div>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Purchase Order</li>
        </ol>
		<h3>Purchase Order &nbsp; 
		Total Amount:
		<?php
		    $sdsd=$_GET['invoice'];
			$resultas = $db->prepare("SELECT sum(total_amount) FROM salesorder WHERE invoice= :a");
			$resultas->bindParam(':a', $sdsd);
			$resultas->execute();
			for($i=0; $rowas = $resultas->fetch(); $i++){
			  $fgfg=$rowas['sum(total_amount)'];
			  echo formatMoney($fgfg, true);
			}
       ?></h3>
        <hr>
        <div class="panel-body">
                    
         <form action="usersavesalesorder.php" method="post" class ="form-group">
		 <?php 
	   include('connect.php');
	    $results = $db->prepare("SELECT max(id) FROM salesorder");
        
        $results->execute();
        for($i=0; $rows = $results->fetch(); $i++){
        $dsdsdf=$rows['max(id)'];
        
        }
        ?>
		<?php $y=date('y'); ?>
         <?php $vno="CP".$y.'-'. str_pad($dsdsdf+1,4,'0',STR_PAD_LEFT)?>


          <label>Invoice </label><input type="text" name="invoice" style="width: 300px;" class = "form-control" value="<?php echo $_GET['invoice']; ?>" />
		  <label>Voucher No: </label><input type="text" name="voucherno"  style="width: 300px;" class = "form-control" value="<?php echo $vno; ?>" />
		  <input type="hidden" name="groupname" class = "form-control" value="<?php echo $_GET['groupname']; ?>" />
		 
		  <input type="hidden" name="bank" class = "form-control" value="<?php echo $_GET['bank']; ?>" />
		  
		  <?php
        $today = date('d-m-Y');
        ?>
        <label>Date : </label><input type="text"  style="width: 300px;" class = "form-control" name="date" value = "<?php echo $today; ?>" />
		
		<label>From </label><input type="text"  style="width: 300px;" class = "form-control" name="supplier" value = "<?php echo $uname?>" />
		<label>To </label><input type="text" name="toname"  style="width: 300px;" class = "form-control" value="BSS" />
 
											
          <label>Select a Product</label><br />
          <select  name="product"  style="width:300px;" class="chzn-select">
           <option></option>
           <?php
           include('connect.php');
           $result = $db->prepare("SELECT * FROM userproducts where user= :c");
           $result->bindParam(':c', $uname);
           $result->execute();
           for($i=0; $row = $result->fetch(); $i++){
            ?>
            <option value="<?php echo $row['product_code'];?>" >
             
              <?php echo $row['product_name']; ?>
              - <?php echo $row['unit']; ?>
              - <?php echo $row['qty_left']; ?>

            </option>
            <?php
          }
          ?>
        </select>
        <br />
		<br>
                          
                             <input type="text" name="tray" id="tray"  placeholder="No Of Bags/Trays/Lots" style="width:200px" required  oninput="calculate();"  /><br><br>
							<input type="text" name="pertray" id="pertray" placeholder="per Tray/Bags/Lots"  value="" style="width:200px" required oninput="calculate();"  />
							  <input type="hidden" name="tvalue" id="tvalue"  placeholder="No.Pices" style="width:100px" readonly />
                            <br>
        <label>Number of Item</label>
        <input type="number" name="qty" id="qty" value="1" min = "1" class = "form-control"  autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
		 <label>Rate </label><input type="text"  style="width: 100px;" class = "form-control" name="price" value = "" required />
		 <!--<label>CGST</label>
        <input type="text" name="cgst" value="" placeholder= "%" class = "form-control"  autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
       <label>SGST</label>
       <input type="text" name="sgst" value="" placeholder= "%" class = "form-control"  autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
   <label>IGST</label>
        <input type="text" name="igst" value="" placeholder= "%" class = "form-control"  autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
   -->


	  
        <input type="hidden" name="discount" value="0" class = "form-control"  autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
        <br>
        <button class="btn btn-primary" type="submit">Add Product</button>
    </form>
 <?php
    $id=$_GET['invoice'];
    include('connect.php');
    $resultaz = $db->prepare("SELECT * FROM salesorder WHERE invoice= :xzxz");
    $resultaz->bindParam(':xzxz', $id);
    $resultaz->execute();
    for($i=0; $rowaz = $resultaz->fetch(); $i++){
        $invoicenumber = $rowaz['invoice'].'<br>';
        //$dateorder = $rowaz['date_order'].'<br>';
        $supp = $rowaz['student'].'<br>';
//$datedeliver = $rowaz['date_deliver'].'<br>';
	    $duedate = $rowaz['date'].'<br>';
//echo 'Status : '.$rowaz['status'].'<br>';
    }
    ?>
 
      <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
         <tr>
          <th> Product Name </th>
          <th> Quantity </th>
          <th> Price </th>
		  <th> CGST </th>
		  <th> SGST </th>
		  <th> IGST </th>
          <!--<th> Discount </th>-->
          <th> Total Amount </th>
        </tr>
      </thead>
      <tbody>

       <?php
       $id=$_GET['invoice'];
       include('connect.php');
       $result = $db->prepare("SELECT * FROM salesorder WHERE invoice= :userid");
       $result->bindParam(':userid', $id);
       $result->execute();
       for($i=0; $row = $result->fetch(); $i++){
        ?>
        <tr class="record">
         <td><?php
          $rrrrrrr=$row['product'];
          $resultss = $db->prepare("SELECT * FROM userproducts WHERE product_code= :asas");
          $resultss->bindParam(':asas', $rrrrrrr);
          $resultss->execute();
          for($i=0; $rowss = $resultss->fetch(); $i++){
            echo $rowss['product_name'];
          }
          ?></td>
         <td><?php echo $row['qty']; ?></td>
         <td>
          <?php
          $ppp=$row['price'];
          echo formatMoney($ppp, true);
          ?>
        </td>
		<td><?php echo $row['cgst']; ?></td>
		<td><?php echo $row['sgst']; ?></td>
		<td><?php echo $row['igst']; ?></td>
        <!--<td>
          <?php
          $ddd=$row['discount'];
          echo formatMoney($ddd, true);
          ?>
        </td>-->
        <td>
          <?php
          $dfdf=$row['total_amount'];
          echo formatMoney($dfdf, true);
          ?>
        </td>
      </tr>
      <?php
    }
    ?>
    <tr>
      <td colspan="6"><strong style="font-size: 12px; color: #222222;">Total:</strong></td>
      <td colspan="2"><strong style="font-size: 12px; color: #222222;">
       <?php
       function formatMoney($number, $fractional=false) {
        if ($fractional) {
         $number = sprintf('%.2f', $number);
       }
       while (true) {
         $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
         if ($replaced != $number) {
          $number = $replaced;
        } else {
          break;
        }
      }
      return $number;
    }
    $sdsd=$_GET['invoice'];
    $resultas = $db->prepare("SELECT sum(total_amount) FROM salesorder WHERE invoice= :a");
    $resultas->bindParam(':a', $sdsd);
    $resultas->execute();
    for($i=0; $rowas = $resultas->fetch(); $i++){
      $fgfg=$rowas['sum(total_amount)'];
      echo formatMoney($fgfg, true);
    }
    ?>
  </strong></td>
</tr>

</tbody>
</table><br>
<a  class="btn btn-primary"  href="userprintpur1order.php?invoice=<?php echo $_GET['invoice'];?>&total=<?php echo $fgfg; ?>&name=<?php echo $supp; ?>&date=<?php echo $duedate; ?>&bank=<?php echo $bank; ?>">Print</a>


									
									
									
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
       

        <script src="js/jquery.js"></script>
        <script type="text/javascript">
            $(function() {


                $(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
if(confirm("Sure you want to delete this update? There is NO undo!"))
{

   $.ajax({
     type: "GET",
     url: "deletesupplier.php",
     data: info,
     success: function(){

     }
 });
   $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
   .animate({ opacity: "hide" }, "slow");

}

return false;

});

            });
        </script>
				
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © <a href="http://bhemyasoftwaresolutions.com/">Bhemya Software Solutions Pvt Ltd.,</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 <!-- Add user Modal-->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                
                    
                    <h4 class="modal-title" id="myModalLabel">Add User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">


                    <form action="saveuser.php" method="post" class = "form-group" >
                        <div id="ac">
                            <span>USERNAME : </span><input type="text" name="user" class = "form-control" />
                            <span>PASSWORD: </span><input type="PASSWORD" name="pass" class = "form-control" />
                            <span>FULL NAME : </span><input type="text" name="name" class = "form-control" />
                            <span>POSITION: </span>
                            <select name = "post" class = "form-control">
                                <option>User</option>
								<option>Customer</option>
                            </select>    
                            <span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" class = "form-control" value="save" />
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
