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

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Income</h1>
                </div>
                <div id="maintable">
                    <div style="margin-top: -19px; margin-bottom: 21px;">
                    </div>
                    <div class="panel-body">
                        <!-- Button trigger modal -->
                        <button class="btn btn-primary" data-toggle="modal" data-target="#adds">
                            Add Income
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="adds" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Add Income</h4>
                                    </div>
                                    <div class="modal-body">

                                     <form action="saveincome.php" method="post" class = "form-group">
                                        <div id="ac">
										<?php 	
										include('config.php');
										$sql2 = mysql_query("SELECT max(in_id) as food FROM income ORDER BY in_id DESC LIMIT 1");
										$jj2 = mysql_fetch_array($sql2);
										$b_count2 = mysql_num_rows($sql2);
										if($b_count2 !=0)
										{
										$foodno = $jj2['food'];
										$foodno++;
										}
										else 
										{
										 $foodno=1;   
										} 
										
									?>
										<input type="text" class="form-control" style="display:none;" name="income_id" id="foodno" value="<?php echo $foodno; ?>" readonly>
										<label>Select a School</label><br />
												<select id="id_select" name="school"  style="width:400px;" class = "form-control">
													 <option value="Malar Matric Hr Sec School"> Malar Matric Hr Sec School </option>
													 <option value="Malar Nursery & Primary School"> Malar Nursery & Primary School </option>
													 <option value="Public School"> Public School </option>
													 <option value="Trust"> Trust </option>
													 <option value="Other Receipts"> Other Receipts </option>
													 <option value="Other Expenses"> Other Expenses </option>
												</select><br>
										<label>Select a Catagory</label><br />
											<select name="name" style="width: 400px;" class = "form-control">
											 <?php
											  include('connect.php');
													$result = $db->prepare("SELECT * FROM catagory3");
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
											<select name="sc" style="width: 400px;" class = "form-control">
											 <?php
											  include('connect.php');
													$result = $db->prepare("SELECT * FROM incomesubcatagory");
													$result->bindParam(':userid', $res);
													$result->execute();
													for($i=0; $row = $result->fetch(); $i++){
											  ?>
											  <option><?php echo $row['catagory_name']; ?></option>
											  <?php
											  }
											  ?>
											  </select><br />
												
												<label>Transaction Type :</label><br>
												<select name="trans" style="width: 400px;" class = "form-control">
													<option value="Cash">Cash</option>
													<option value="Bank">Bank</option>
												</select>
												<br />

                                            <label>Select Bank:</label><br>
												<select name="bank" style="width: 400px;" class = "form-control">
												<option value="">None</option>
													<?php
											  include('connect.php');
													$result = $db->prepare("SELECT * FROM bank");
													$result->bindParam(':userid', $res);
													$result->execute();
													for($i=0; $row = $result->fetch(); $i++){
											  ?>
											  <option><?php echo $row['accno']; ?></option>
											   <?php
											  }
											  ?>
												</select>	
												<br/>											
											<label>Description : </label><input type="text"  style="width: 400px;" class = "form-control" name="description" />
											<label>Amount : </label><input type="text"  style="width: 400px;" class = "form-control" name="amount"  />
											
											
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
							<th>Date_Month_Year</th>
							<th>Sub Catagory </th>
							<th>Description </th>
							<th>Transaction Type</th>
							<th>Bank Name</th>
							<th>Amount </th>
                            <th width="10%"> Action </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include('connect.php');
                        $result = $db->prepare("SELECT * FROM income ORDER BY in_id ASC");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record">
                                <td><?php echo $row['catagory_name']; ?></td>
								<td><?php echo $row['date']; ?></td>
								<td><?php echo $row['subcatagory']; ?></td>
								<td><?php echo $row['description']; ?></td>
								<td><?php echo $row['trans']; ?></td>
								<td><?php echo $row['bank']; ?></td>
								<td><?php echo $row['amount']; ?></td>
                               
                               <!-- <td><a rel="facebox" class="btn btn-primary" href="editincome.php?id=<?php echo $row['income_id']; ?>"> <i class="fa fa-pencil"></i> </a>               
								<a href="deleteincome.php?id=<?php echo $row['income_id']; ?>" class="btn btn-danger delbutton" title="Click To Delete"><i class = "fa fa-trash"></i></a></td>-->
								
								 <td><a rel="facebox" class="btn btn-primary" href="editincome.php?id=<?php echo $row['income_id']; ?>"> <i class="fa fa-pencil"></i> </a>      
								<a href="deleteincome.php?id=<?php echo $row['income_id']; ?>" class="btn btn-danger delbutton" title="Click To Delete"><i class = "fa fa-trash"></i></a></td>
                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
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
