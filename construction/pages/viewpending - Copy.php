<?php include('auth.php');
include_once('headerpage.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Malar</title>
    
    <link rel="shortcut icon" href="logo.jpg">
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

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
</head>
<body>
    <?php include('navfixed.php');?>    
	<?php
		$frmm = $_GET["frm"];
		$tom = $_GET["too"];			
		$from 	= date('d-m-Y', strtotime($frmm));
		$to 	= date('d-m-Y', strtotime($tom));				
	?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">View Expense Pending Report [From :<?php echo $from;?> To <?php echo $to;?>]</h2>
                </div>
                <div id="maintable">
                    <div style="margin-top: -19px; margin-bottom: 21px;">
                    </div>
                    <div class="panel-body">
                        <!-- Button trigger modal -->
                        <!--<button class="btn btn-primary" data-toggle="modal" data-target="#adds">
                            Add Expense Pending
                        </button>-->
                        <!-- Modal -->
                        <div class="modal fade" id="adds" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Add Expense Pending</h4>
                                    </div>
                                    <div class="modal-body">

                                     <form action="saveexpensepending.php" method="post" class = "form-group">
                                        <div id="ac">
										<label>Select a Catagory</label><br />
											<select name="name" style="width: 400px;" class="chzn-select">
											 <?php
											  include('connect.php');
													$result = $db->prepare("SELECT * FROM print");
													$result->bindParam(':userid', $res);
													$result->execute();
													for($i=0; $row = $result->fetch(); $i++){
											  ?>
											  <option><?php echo $row['catagory_name']; ?></option>
											  <?php
											  }
											  ?>
											  </select><br /> 
											  <?php
												$today = date('d-m-Y');
												?>
											<label>Date : </label><input type="text"  style="width: 400px;" class = "form-control" name="date" value = "<?php echo $today; ?>" />
											<label>Sub Catagory : </label><br>
											<select name="sc" style="width: 400px;" class="chzn-select">
											 <?php
											  include('connect.php');
													$result = $db->prepare("SELECT * FROM subcatagory");
													$result->bindParam(':userid', $res);
													$result->execute();
													for($i=0; $row = $result->fetch(); $i++){
											  ?>
											  <option><?php echo $row['catagory_name']; ?></option>
											  <?php
											  }
											  ?>
											  </select><br />
											<?php
											include('connect.php');
											$d=$_GET['name'];
											?>
											<label>Description : </label><input type="text"  style="width: 400px;" class = "form-control" name="description" value = "<?php echo $d; ?>" />
											<label>Amount : </label><input type="text"  style="width: 400px;" class = "form-control" name="amount"  />
											<label>Status</label><br />
											<select name="status" style="width: 400px;" class="chzn-select">
											<option>Pending</option>
											<option>Paid</option>
											</select><br /> 
                                            
                                            <span>&nbsp;</span><input class="btn btn-primary btn-block"  type="submit" value="save" class = "form-control" />
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>

                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Catagory Name </th>
							<th>Date </th>
							<th>Sub Catagory </th>
							<th>Description </th>
							<th>Credit</th>
							<th>Debit</th>
							<th>Balance</th>
							<th>Status</th>
							<th>Transaction Type</th>
							<th>Bank</th>
                           <!--<th>Bill Attachement </th>
                            <th width="10%"> Action </th>-->
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include_once('connect.php');
						$d=$_GET["no"];
						//$d=@($_POST['no']);
						$frmm = $_GET["frm"];
						$tom = $_GET["too"];			
						$from 	= date('d-m-Y', strtotime($frmm));
						$to 	= date('d-m-Y', strtotime($tom));
                        $result = $db->prepare("SELECT * FROM expensepending where STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$from', '%d-%m-%Y') AND STR_TO_DATE('$to', '%d-%m-%Y') and description= :d ORDER BY id asc");
						$result->bindParam(':d', $d);
                        $result->execute();
						$balance = 0;
                        for($i=0; $row = $result->fetch(); $i++){
							$pending_id=$row['pending_id'];
                            ?>
                            <tr class="record">
                                <td><?php echo $row['catagory_name']; ?></td>
								<td><?php echo $row['date']; ?></td>
								<td><?php echo $row['subcatagory']; ?></td>
								<td><?php echo $row['description']; ?></td>
								<td><?php echo $row['amount']; ?></td>
								<td><?php echo $row['paidamount']; ?></td>
								<td>
									<?php echo $balance = ($balance + $row['amount'] - $row['paidamount']) ;?>
									<?php /* $res = $db->prepare("SELECT * FROM expensepending where STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$from', '%d-%m-%Y') AND STR_TO_DATE('$to', '%d-%m-%Y') and pending_id= :pending_id");
									$res->bindParam(':pending_id', $pending_id);
									$res->execute();
									$balance = 0;
									$res1 = $res->fetch(); 
									echo $balance = ($balance + $res1['amount'] - $res1['paidamount']) ; */
									?>  
									<?php /* $res = $db->prepare("SELECT balance FROM expensepending_balance where pending_id= :pending_id");
									$res->bindParam(':pending_id', $pending_id);
									$res->execute();
									for($i=0; $ro = $res->fetch(); $i++){ 
										echo $ro['balance'];
										} */
									?>  
								</td>
								<td><?php echo $row['status']; ?></td>
								<td><?php echo $row['trans']; ?></td>
								<td><?php echo $row['bank']; ?></td>
                               <!-- <td>
									<?php $result2 = $db->prepare("SELECT * FROM bill_file where pending_id= :pending_id");
									$result2->bindParam(':pending_id', $pending_id);
									$result2->execute();
									for($i=0; $row2 = $result2->fetch(); $i++){ ?>
									<a href="<?php echo $row2['bill_attach']; ?>" target='_blank' style="background-color:#337ab7;color:#FFFFFF;">Bill Attachement<br/></a>
									<?php 
										}
									?>  
								</td>-->
								
                              <!-- <td><a rel="facebox" class="btn btn-primary" href="editexpensepending.php?id=<?php echo $row['pending_id'];?>&from1=<?php echo $from; ?>&to1=<?php echo $to; ?>"> <i class="fa fa-pencil"></i> </a>             
								<a href="deleteexpensepending.php?id=<?php echo $row['pending_id']; ?>&c=<?php echo $row['description'];?>&status=<?php echo $row['status']; ?>&from1=<?php echo $from; ?>&to1=<?php echo $to; ?>" class="btn btn-danger delbutton" title="Click To Delete"><i class = "fa fa-trash"></i></a></td>-->
                            </tr>
                            <?php
							
                        }
                        ?>
                    </tbody>
					<thead>
                            <tr>
                                <th colspan="6" style="border-top:1px solid #999999"> Total Pending Amount </th>
                                <th colspan="4" style="border-top:1px solid #999999"> 
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
                                    $results = $db->prepare("SELECT sum(amount)-sum(paidamount) as balance FROM expensepending where STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$from', '%d-%m-%Y') AND STR_TO_DATE('$to', '%d-%m-%Y') and description= :d ");
									
                                    $results->bindParam(':d', $d);
									
                                    $results->execute();
                                    for($i=0; $rows = $results->fetch(); $i++){
                                        $dsdsd=$rows['balance'];
                                        echo formatMoney($dsdsd, true);
                                    }
                                    ?>
                                </th>
                            </tr>
                        </thead>
                </table>
                <div class="clearfix"></div>
            </div>
            <script src="js/jquery.js"></script>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->


<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>


<!-- DataTables JavaScript -->
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>


</body>

</html>
