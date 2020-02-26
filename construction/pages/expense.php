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
                    <h1 class="page-header">Expense</h1>
                </div>
                <div id="maintable">
                    <div style="margin-top: -19px; margin-bottom: 21px;">
                    </div>
                    <div class="panel-body">
                        <!-- Button trigger modal -->
                        <button class="btn btn-primary" data-toggle="modal" data-target="#adds">
                            Add Expense
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="adds" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Add Expense</h4>
                                    </div>
                                    <div class="modal-body">

                                     <form action="saveexpense.php" method="post" class = "form-group" enctype="multipart/form-data">
                                        <div id="ac">
										<?php 	
										//Expense
										 include('config.php');
										$sql2 = mysql_query("SELECT max(ex_id) as food FROM expense ORDER BY ex_id DESC LIMIT 1");
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
									//Income
										$sql22 = mysql_query("SELECT max(in_id) as fd FROM income ORDER BY in_id DESC LIMIT 1");
										$jj22 = mysql_fetch_array($sql22);
										$b_count22 = mysql_num_rows($sql22);
										if($b_count22 !=0)
										{
										$foodno1 = $jj22['fd'];
										$foodno1++;
										}
										else 
										{
										 $foodno1=1;   
										} 
										
									?>
										<input type="text" class="form-control" style="display:none;" name="income_id" id="foodno" value="<?php echo $foodno; ?>" readonly>
										<input type="text" class="form-control" style="display:none;" name="income_idd" id="foodnod" value="<?php echo $foodno1; ?>" readonly>
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
											<select name="sc" style="width: 400px;" class = "form-control">
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
											<label>Transaction Type :</label><br>
												<select name="trans" style="width: 400px;" class = "form-control">
													<option value="Cash">Cash</option>
													<option value="Bank">Bank</option>
												</select>
												<br />
                                            <label>Select Bank:</label><br>
												<select name="bank" style="width: 400px;" class = "form-control">
												<option value="None">None</option>
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
											<br/>
												<div class="row">
												<div class="col-md-5" style="margin-left: 16px; " >
													<div class="form-group">
														<input type="button" style="margin-left: 16px;margin-top: -5px;border-radius: 5px;" class="btn btn-primary" value="Add File" id="lab_add" name="lab_add" > 
													</div>
												</div>
											</div>
											<table class="table" id="partsdetail">
												<tr>
													<td><b><center>Bill Attachment</center></b></td>
												</tr>
												<tr style="visibility:hidden;" >
													<td colspan="8"><b></b></td>
													<td  colspan="2"><input type="text"  class=" form-control input-md" style="border: none;float:left;border: 1px solid #33ccff;width:100%;" /></td>
												</tr>
											</table>
											<input type='hidden' id='row_count' name='row_count' value=''/>
											<input type="hidden" id="partsaddrow" name="partsaddrow" value="-1" />
											<br>
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
                           <th>Attachment </th>
                            <th width="10%"> Action </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include('connect.php');
                        $result = $db->prepare("SELECT * FROM expense where credit_type!='Credited' ORDER BY ex_id DESC");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
							$expense_id=$row['expense_id'];
                            ?>
                            <tr class="record">
                                <td><?php echo $row['catagory_name']; ?></td>
								<td><?php echo $row['date']; ?></td>
								<td><?php echo $row['subcatagory']; ?></td>
								<td><?php echo $row['description']; ?></td>
								 <td><?php echo $row['trans']; ?></td>
									   <td><?php echo $row['bank']; ?></td>
								<td><?php echo $row['amount']; ?></td>
							   <td>
									<?php $result2 = $db->prepare("SELECT * FROM expense_file where expense_id= :expense_id");
									$result2->bindParam(':expense_id', $expense_id);
									$result2->execute();
									for($i=0; $row2 = $result2->fetch(); $i++){ ?>
									<a href="<?php echo $row2['bill']; ?>" target='_blank' style="background-color:#337ab7;color:#FFFFFF;">Bill Attachement<br/></a>
									<?php 
										}
									?>  
								</td>
                                <td><a rel="facebox" class="btn btn-primary" href="editexpense.php?id=<?php echo $row['expense_id']; ?>"> <i class="fa fa-pencil"></i> </a>             
								<!--<a href="" id="<?php echo $row['income_id']; ?>" class="btn btn-danger delbutton" title="Click To Delete"><i class = "fa fa-trash"></i></a></td>-->
								<a href="deleteexpense.php?id=<?php echo $row['expense_id']; ?>" class="btn btn-danger delbutton" title="Click To Delete"><i class = "fa fa-trash"></i></a></td>
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
<script>
		var r_array = [];
		var count_row = 0;
		/*$.validator.setDefaults({
		submitHandler: function() { alert("submitted!"); }
		});*/
		
		function acc_delete(row_c)
		{
		//alert(row_c);
		$('#partsdetail tr#row_' + row_c + '').remove();
		//$('#partsaddrow').val(row_c - 1);
		var partrow = document.getElementById("partsaddrow").value;
		partrow = parseInt(partrow);
		partrow = partrow - 1;
		$('#partsaddrow').val(partrow);

		r_array[row_c] ='d';
		//alert(r_array.join());
		$('#row_count').val(r_array.join());
		//alert(row_c);
		tot_bill_amt_calc(row_c);
		}
</script>	
<script type="text/javascript">
		
	document.getElementById("lab_add").addEventListener("click", function()
		{
			//		alert ("OK Success");
			var rowCount = count_row;

			r_array.push(rowCount);


			$('#row_count').val(r_array.join());

			var ad = "add";

			document.getElementById('partsaddrow').value = rowCount;
			$('#partsdetail tr').last().before("<tr class='warning' id='row_"+rowCount+"'><td style='width: 95%;' ><input type='hidden' name='h_acsid_[]' id='h_acsid_"+rowCount+"'> <input type='file' name='bill_file"+rowCount+"' id='bill_file"+rowCount+"'  placeholder='Choose File Here' class='form-control input-md' autocomplete='off' style='border: none;border: 1px solid #33ccff;width:100%;'  />  </td> <td> <input type='button' class='btn btn-danger btn-small active'  id='delete_" + rowCount+"'  name='delete_[]'  value='x' onClick='acc_delete(\""+rowCount+"\");' style=' margin-right: -48px;'/></td> </tr>");
			$('#partsaddrow').val(rowCount);
			//alert(rowCount);
			count_row = count_row+1;
			
		});
</script>
</body>
</html>