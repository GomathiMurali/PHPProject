<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PPF</title>
  <link rel="shortcut icon" href="ppf.jpg">
	<?php
include_once('auth.php');

?>

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


</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="home.php">Poongodi Poultry Farm</a>

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
		
          <a class="dropdown-item" href="#myModal" data-toggle="modal">Add User</a>
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
        <a class="nav-link" href="home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
	   <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Inventory</span>
        </a>
		<div class="dropdown-menu" aria-labelledby="pagesDropdown">
	 
        <a class="dropdown-item" href="group.php">
          <i class="fa fa-table fa-fw"></i>
          <span>Egg Details</span></a>
     
        <a class="dropdown-item" href="uom.php">
          <i class="fa fa-table fa-fw"></i>
          <span>Feed Details</span></a>
      
        
        <a class="dropdown-item" href="catagory.php">
          <i class="fa fa-table fa-fw"></i>
          <span>Catagory</span></a>
     
        <a class="dropdown-item" href="products.php">
          <i class="fa fa-table fa-fw"></i>
          <span>Products</span></a>
      </div>
	  </li>
	  
	   <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Accounting Master</span>
        </a>
	   <div class="dropdown-menu" aria-labelledby="pagesDropdown">
	 
         <a class="dropdown-item" href="supplier.php">
          <i class="fa fa-truck fa-fw"></i>
          <span>Supplier Master</span></a>
     
        <a class="dropdown-item" href="customer.php">
          <i class="fa fa-user fa-fw"></i>
          <span>Customer Master</span></a>
		  
		  <a class="dropdown-item" href="addbank.php">
          <i class="fa fa-table fa-fw"></i>
          <span>Bank Master</span></a>
      </div>
	  </li>
	   <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Transaction</span>
        </a>
		
	 <div class="dropdown-menu" aria-labelledby="pagesDropdown">
	  
        <a class="dropdown-item" href="purchaseordergroup.php?invoice=<?php echo $finalcode1;?>">
          <i class="fa fa-list-alt fa-fw"></i>
          <span></span>Purchase Order</a>
	  
        <a class="dropdown-item" href="purchasegroup.php?invoice=<?php echo $finalcode1;?>">
          <i class="fa fa-list-alt fa-fw"></i>
          <span></span>Purchase</a>
      
	    <a class="dropdown-item" href="salesordergroup.php?invoice=<?php echo $finalcode;?>">
          <i class="fa fa-list-alt fa-fw"></i>
          <span></span>Sales Order</a>
	  
        <a class="dropdown-item" href="salesgroup.php?invoice=<?php echo $finalcode;?>">
          <i class="fa fa-list-alt fa-fw"></i>
          <span></span>Sales</a>
      
        <a class="dropdown-item" href="voucher.php">
          <i class="fa fa-list-alt fa-fw"></i>
          <span></span>Voucher</a>
     
	 
        <a class="dropdown-item" href="receipt.php">
          <i class="fa fa-list-alt fa-fw"></i>
          <span></span>Receipt</a>
     
	  </div>
	  </li>
	   <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Reports</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Sales Report:</h6>
          <a class="dropdown-item" href="salesdate.php">Date Wise Report</a>
          <a class="dropdown-item" href="salesdatecustomer.php">Customer Wise Report</a>
		  <a class="dropdown-item" href="salesmonth.php">Monthly Report</a>
		  <a class="dropdown-item" href="salesyear.php">Yearly Report</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Purchase Report:</h6>
          <a class="dropdown-item" href="purchasedate.php">Date Wise Report</a>
          <a class="dropdown-item" href="purchasedatecustomer.php">Customer Wise Report</a>
		  <a class="dropdown-item" href="purchasemonth.php">Monthly Report</a>
		  <a class="dropdown-item" href="purchaseyear.php">Yearly Report</a>
        </div>
      </li>
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>User Maintanance</span>
        </a>
		<div class="dropdown-menu" aria-labelledby="pagesDropdown">
		<a class="dropdown-item" href="user.php">
          <i class="fa fa-table fa-fw"></i>
          <span>User</span></a>
      </div></li>
    </ul>
	
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Supplier</li>
        </ol>
		<h1>Supplier</h1>
        <hr>
        <div class="panel-body">
                    <!-- Button trigger modal -->
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addc">
                        Add Supplier
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="addc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Add Supplier</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                     <form action="savesupplier.php" method="post" class = "form-group">
                                        <div id="ac">
                                            <span>Supplier Name : </span><input type="text" name="name" class = "form-control" />
											<span>Address : </span><textarea type="text" name="address" class = "form-control" /></textarea>
											<span>Country : </span><input type="text" name="country" class = "form-control" />
											<span>State : </span><input type="text" name="state" class = "form-control" />
											<span>Pin Code : </span><input type="text" name="pincode" class = "form-control" />
											 <span>GST Type: </span>
											 <select name="gsttype" class="form-control">
											 <option>Regular</option>
											 <option>UnRegistered</option>
											 </select>
											<span>GST No : </span><input type="text" name="gstno" class = "form-control" />
											<span>PAN No : </span><input type="text" name="panno" class = "form-control" />
											<span>Contact Name : </span><input type="text" name="cname" class = "form-control" />
											
											<span>Phone No : </span><input type="text" name="phone" class = "form-control" />
											<span>Mobile No : </span><input type="text" name="mobile" class = "form-control" />
											<span>Email Id : </span><input type="text" name="email" class = "form-control" />
											<span>Cc : </span><input type="text" name="emailcc" class = "form-control" />
											<span>Bank Name : </span><input type="text" name="bank" class = "form-control" />
											<span>Account No : </span><input type="text" name="accno" class = "form-control" />
											<span>Branch : </span><input type="text" name="branch" class = "form-control" />
											<span>IFSC Code : </span><input type="text" name="ifsc" class = "form-control" />
                                            <span>&nbsp;</span><input class="btn btn-primary btn-block"  type="submit" value="save" class = "form-control" />
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
            Supplier List</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
                    <thead>
                        <tr>
                            <th> Supplier</th>
							<th> Address </th>
							<th> GST No </th>
							
				
							<th> Phone </th>
							<th> Mobile </th>
							<th> Email </th>
							<th> Bank Name </th>
							<th> Account No </th>
                            <th width="15%"> Action </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include('connect.php');
                        $result = $db->prepare("SELECT * FROM supliers ORDER BY suplier_id DESC");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record">
                                <td><?php echo $row['suplier_name']; ?></td>
								<td><?php echo $row['address']; ?></td>
								<td><?php echo $row['gstno']; ?></td>
								<td><?php echo $row['phone']; ?></td>
								<td><?php echo $row['mobile']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['bank']; ?></td>
								<td><?php echo $row['accno']; ?></td>
                                <td><a rel="facebox" class="btn btn-primary" href="editsupplier.php?id=<?php echo $row['suplier_id']; ?>"> <i class="">Edit</i> </a> 
								<a href="#"id="<?php echo $row['suplier_id']; ?>" class="btn btn-danger delbutton" title="Click To Delete"><i class = "fa fa-trash"></i></a></td>
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
