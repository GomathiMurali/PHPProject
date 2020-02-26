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
				$from = $_POST['fromdate'];
				$from1 = date( 'd-m-Y', strtotime( $from) );
				$to = $_POST['todate'];
				$to1 = date( 'd-m-Y', strtotime( $to) );
				$name=$_POST['name'];
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
          <li class="breadcrumb-item active">Purchase Report</li>
        </ol>
		<h2><?php echo $name;?> Purchase Report <?php echo $from1;?> to <?php echo $to1;?>
					</h2>
        <hr>   

    <!-- Page Content -->
   <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Purchase Report</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
                    
                       <thead>
						<tr><th colspan="7">Purchase Report</th></tr>
                            <tr>
                                <!--<th >  ID </th>-->
                                <th > Date </th>
                                <!--<th > Customer Name </th>-->
                                <th > Invoice Number </th>
								<th > Total Amount </th>
                                <!--<th > Overall Balance </th>
                                <th > Due Date </th>-->
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            include('connect.php');
                            $c=$from1;
                            $d=$to1;
							$name=$_POST['name'];
                            $result = $db->prepare("SELECT * FROM salesform where student= :user AND STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$c', '%d-%m-%Y') AND STR_TO_DATE('$d', '%d-%m-%Y')");
                            $result->bindParam(':user', $name);
                            
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
                                <tr class="record">
                                    <!--<td>STI-000<?php echo $row['id']; ?></td>-->
                                    <td><?php echo $row['date']; ?></td>
                                    <!--<td><?php echo $row['student']; ?></td>-->
                                    <td><?php echo $row['invoice']; ?></td>
									<td><?php
                                        $dsdsdf=$row['total_amount'];
                                        echo formatMoney($dsdsdf, true);
                                        ?></td>
                                    <!--<td><?php
                                        $dsdsd=$row['balance'];
                                        echo formatMoney($dsdsd, true);
                                        ?></td>
                                        <td><?php echo $row['due_date']; ?></td>-->
                                    </tr>
                                    <?php
                                }
                                ?>

                            </tbody>
                            <thead>
                                <tr>
                                    <th colspan="2" style="border-top:1px solid #999999"> Total Purchase Amount </th>
                                    <th colspan="1" style="border-top:1px solid #999999"> 
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
										$name=$_POST['name'];
                                        $results = $db->prepare("SELECT sum(total_amount) FROM salesform where student= :user AND STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$c', '%d-%m-%Y') AND STR_TO_DATE('$d', '%d-%m-%Y')");
                                        $results->bindParam(':user', $name);
										
                                        $results->execute();
                                        for($i=0; $rows = $results->fetch(); $i++){
                                            $dsdsdf=$rows['sum(total_amount)'];
                                            echo formatMoney($dsdsdf, true);
                                        }
                                        ?>
                                    </th>
                                </tr>
								<!--<tr>
                                    <th colspan="5" style="border-top:1px solid #999999"> Total Balance Amount </th>
                                    <th colspan="3" style="border-top:1px solid #999999"> 
									 <?php
									 
										$c='credit';
                                        $results = $db->prepare("SELECT sum(balance) FROM sales");
                                        $results->bindParam(':c', $c);
                                        $results->execute();
                                        for($i=0; $rows = $results->fetch(); $i++){
                                            $dsdsd=$rows['sum(balance)'];
                                            //echo formatMoney($dsdsd, true);
                                        }
										?>
                                    </th>
                                </tr>-->
                            </thead>
							
							</table>
                     </div>
          </div>
         
        </div>

                    <a href="" onclick="window.print()" class="btn btn-primary"><i class="icon-print icon-large"></i> Print</a>
					<input type="button" onclick="tableToExcel('dataTable')" value="Export to Excel" class="btn btn-primary">

					<div class="clearfix"></div>
                </div>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->


       <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © <a href="http://bhemyasoftwaresolutions.com/">Bhemya Software Solutions Pvt Ltd.,</span>
          </div>
        </div>
      </footer>

    </div>
   

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

		
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable({
                    responsive: true
                });
            });
			
        </script>
		<script>
		  var tableToExcel = (function() {
		  var uri = 'data:application/vnd.ms-excel;base64,'
			, template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
			, base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
			, format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
		  return function(table, name) {
			if (!table.nodeType) table = document.getElementById(table)
			var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
			window.location.href = uri + base64(format(template, ctx))
		  }
		})()
  </script>
		  
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
