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
	<?php
    function productcode() {
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
    $pcode='P-'.productcode();
    ?>
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

<script>
function findSelected(){ 
  var rate= document.getElementById('ttype'); 
  var variable = document.getElementById('exempt'); 
  if(rate.value == "exempt"){
    
    document.getElementById('cgst').disabled=true;
    document.getElementById('sgst').disabled=true;
    document.getElementById('igst').disabled=true;    
  } else {
    document.getElementById('cgst').disabled=false;
    document.getElementById('sgst').disabled=false;
    document.getElementById('igst').disabled=false;
  }
}
</script>

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
	  
      <li class="nav-item active">
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
          <li class="breadcrumb-item active">Products</li>
        </ol>
		<h1>Products</h1>
        <hr>
        <div class="panel-body">
                    <!-- Button trigger modal -->
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addc">
                        Add Products
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="addc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Add Products</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                       <form action="saveuserproduct.php" method="post" class = "form-group" >
                        <div id="ac">
                            <span>Category: </span>
                            <select name="categ" class = "form-control" >
                            <?php
                                include('connect.php');
                                $result = $db->prepare("SELECT * FROM catagory");
                                $result->bindParam(':userid', $res);
                                $result->execute();
                                for($i=0; $row = $result->fetch(); $i++){
                                    ?>
                                    <option><?php echo $row['catagory_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            
                            <span>Product Name : </span><input type="text" name="bname" class = "form-control" />
							<input type="hidden" name="code" value = "<?php echo $pcode ?>" class = "form-control" />
							<span>HSN Code : </span><input type="text" name="hsncode" class = "form-control" />
                            <!--<span>Description Name : </span>--><input type="hidden" name="dname" class = "form-control" />
                            <span>Product Unit : </span>
                            <select name="unit" class = "form-control" >
                             <?php
                                include('connect.php');
                                $result = $db->prepare("SELECT * FROM addunit");
                                $result->bindParam(':userid', $res);
                                $result->execute();
                                for($i=0; $row = $result->fetch(); $i++){
                                    ?>
                                    <option><?php echo $row['uom']; ?></option>
                                    <?php
                                }
                                ?>
							
                            </select>
							 <br>
                            <input type="hidden" name="tray" id="tray"  placeholder="No.Tray" style="width:100px" value="1" oninput="calculate();"/> 
							<input type="text" name="pertray" id="pertray"  placeholder="No of pieces per Tray/Bags/Lots"  class = "form-control" oninput="calculate();"/>
							  <input type="hidden" name="tvalue" id="tvalue"  placeholder="No.Pices" style="width:100px" readonly />
                            <br>
                            <input type="hidden" name="cost" class = "form-control" />
							<input type="hidden" name="mrp"  class = "form-control" />
                            <input type="hidden" name="price"  class = "form-control" />
							<span>Tax Type : </span>
							<select name="ttype" id="ttype" onChange="findSelected()" class = "form-control" >
                            <option>Select</option>
                            <option>Taxable</option>
                            <option value="exempt">Exempt</option>
                            </select>
							<span>CGST : </span><input type="text" name="cgst" id="cgst"  class = "form-control" placeholder="%" />
							<span>SGST : </span><input type="text" name="sgst" id="sgst" class = "form-control" placeholder="%"/>
							<span>IGST : </span><input type="text" name="igst" id="igst" class = "form-control" placeholder="%"/>
							
							<!--<select name="btype" class = "form-control" >
                            <option>Select Bill type</option>
                            <option>Accountable</option>
                            <option>Unaccountable</option>
                            </select>-->
							
                            <span>Supplier : </span>
                            <select name="supplier" class = "form-control">
                                <?php
                                include('connect.php');
                                $result = $db->prepare("SELECT * FROM supliers");
                                $result->bindParam(':userid', $res);
                                $result->execute();
                                for($i=0; $row = $result->fetch(); $i++){
                                    ?>
                                    <option><?php echo $row['suplier_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <input type="hidden" name="qty" id="qty" class = "form-control" />
							<input type="hidden" name="user" class = "form-control" value="<?php echo $uname;?>" />
                            <!--<span>Date Delivered: </span>--><input style="display:none" type="date" name="date_del" class = "form-control" />
                            <!--<span>Due Date: </span>--><input style="display:none" type="date" name="ex_date" class = "form-control" />
                            <span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" class = "form-control" value="Save" />
                        </div>
                   
						</form>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
        <br>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Product List</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
                     <thead>
                            <tr>
                               <!--<th> Code </th>-->
                                <th> Product Name </th>
                                <!--<th> Description </th>-->
                                <th> Category </th>
                                
                                <!--<th> Price </th>-->
								
                                <th> Supplier </th>
                                <th witdh = "10%"> No of Pices/Tray </th>
                                <th witdh = "10%"> Product Unit </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>

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
                            include('connect.php');
                            $result = $db->prepare("SELECT * FROM userproducts where user=:c ORDER BY product_name");
							$result->bindParam(':c', $uname);
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
                                <tr class="record">
                                   <!--<td><?php echo $row['product_code']; ?></td>-->
                                    <td><?php echo $row['product_name']; ?></td>
                                    <!--<td style="display:none"><?php echo $row['description_name']; ?></td>-->
                                    <td><?php echo $row['category']; ?></td>
                                   
                                        <!--<td align="right"><?php
                                            $pprice=$row['price'];
                                            echo formatMoney($pprice, true);
                                            ?></td>-->
											
                                            <td><?php echo $row['supplier']; ?></td>
                                            <td align="right"><?php echo $row['qty_left']; ?></td>
                                            <td ><?php echo $row['unit']; ?></td>
                                            <td><a rel="facebox" class = "btn btn-primary" href="edituserproduct.php?id=<?php echo $row['product_id']; ?>">
                                                <i>Edit</i>  
                                            </a>  
                                             <a href="#" id="<?php echo $row['product_id']; ?>" class="btn btn-danger delbutton" title="Click To Delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>

                            </tbody>
                </table>
            </div>
          </div>
         
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
     url: "deleteproduct.php",
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
