<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM expense WHERE expense_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<!DOCTYPE html>
<html lang="en">

	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<br>
<br>
<br>
<br>

<body>
<form action="saveeditexpense.php" method="post" class = "form-group" enctype="multipart/form-data">
<div id="ac">
<input type="hidden" class = "form-control" name="memi" value="<?php echo $id; ?>" />
<input type="hidden" class = "form-control" name="pp" value="<?php echo $row['trans']; ?>" />
<span>Select a School</span>
<select id="id_select" name="school" class = "form-control">
	 <option value="<?php echo $row['school']; ?>"><?php echo $row['school']; ?></option>
	 <option value="">---Select---</option>
	 <option value="Malar Matric Hr Sec School"> Malar Matric Hr Sec School </option>
	 <option value="Malar Nursery & Primary School"> Malar Nursery & Primary School </option>
	 <option value="Public School"> Public School </option>
	 <option value="Trust"> Trust </option>
	 <option value="Other Receipts"> Other Receipts </option>
	 <option value="Other Expenses"> Other Expenses </option>
</select>
<span>Catagory Name : </span>
<!--<input type="text" class = "form-control"  name="name" value="<?php echo $row['catagory_name']; ?>" />-->
<select id="name" name="name" class = "form-control">
	<option value="<?php echo $row['catagory_name']; ?>"><?php echo $row['catagory_name']; ?></option>
	<option value="">---Select---</option>
	 <?php
	  include('connect.php');
			$result = $db->prepare("SELECT * FROM print");
			$result->bindParam(':userid', $res);
			$result->execute();
			for($i=0; $rk = $result->fetch(); $i++){
	  ?>
	  <option><?php echo $rk['catagory_name']; ?></option>
	  <?php
	  }
	  ?>
</select>
<span>Date : </span><input type="text" class = "form-control"  name="date" value="<?php echo $row['date']; ?>" />
<span>Sub Catagory : </span>
<!--<input type="text" class = "form-control"  name="sc" value="<?php echo $row['subcatagory']; ?>" />-->
<select id="sc" name="sc" class = "form-control">
	<option value="<?php echo $row['subcatagory']; ?>"><?php echo $row['subcatagory']; ?></option>
	<option value="">---Select---</option>
	 <?php
	 include('connect.php');
	$result = $db->prepare("SELECT * FROM subcatagory");
	$result->bindParam(':userid', $res);
	$result->execute();
	for($i=0; $rw = $result->fetch(); $i++){
	  ?>
	  <option><?php echo $rw['catagory_name']; ?></option>
	  <?php
	  }
	  ?>
</select>
<span>Transaction Type</span>
<select id="trans" name="trans" class = "form-control">
	<option value="<?php echo $row['trans']; ?>"><?php echo $row['trans']; ?></option>
	<option value="">---Select---</option>
	<option value="Cash">Cash</option>
	<option value="Bank">Bank</option>
</select>
<span>Select Bank</span>
<select id="bank" name="bank" class = "form-control">
	<option value="<?php echo $row['bank']; ?>"><?php echo $row['bank']; ?></option>
	<option value="">---Select---</option>
	 <?php
	  include('connect.php');
			$result = $db->prepare("SELECT * FROM bank");
			$result->bindParam(':userid', $res);
			$result->execute();
			for($i=0; $ro = $result->fetch(); $i++){
	  ?>
	  <option><?php echo $ro['accno']; ?></option>
	   <?php
	  }
	  ?>
	   <option value="">None</option>
</select>
<span>Description : </span><input type="text" class = "form-control"  name="description" value="<?php echo $row['description']; ?>" />
<span>Amount : </span><input type="text" class = "form-control"  name="amount" value="<?php echo $row['amount']; ?>" />
<br>
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
<span>Bill Attachments:
<?php include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM expense_file WHERE expense_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row1 = $result->fetch(); $i++){
	?>
	<!--<img src="<?php echo $row1['bill']; ?>" height="100" width="100"/>  -->
	<a href="<?php echo $row1['bill']; ?>" target='_blank' style="background-color:#337ab7;color:#FFFFFF;">Bill Attachement</a>
	<?php } ?></span><br>
<span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" value="save" class = "form-control" />
</div>
</form>
<?php
}
?>
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