<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM income WHERE income_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>


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
<form action="saveeditincome.php" method="post" class = "form-group">
<div id="ac">
<input type="hidden" class = "form-control" name="memi" value="<?php echo $id; ?>" />
<input type="hidden" class = "form-control" name="pp" value="<?php echo $row['trans']; ?>" />
<span>Select a School</span>
<select id="id_select" name="school" class = "form-control">
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
			$result = $db->prepare("SELECT * FROM catagory3");
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
	$result = $db->prepare("SELECT * FROM incomesubcatagory");
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



<span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" value="save" class = "form-control" />
</div>
</form>
<?php
}
?>