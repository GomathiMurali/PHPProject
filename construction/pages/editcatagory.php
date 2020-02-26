<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM catagory_new WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>


 <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <body>
   
    

    

<br>
<br>
<br>

<form action="saveeditcatagory.php" method="post" class = "form-group">
<div id="ac">
	<h3>Edit Egg Cost</h3>
<input type="hidden" class = "form-control" name="memi" value="<?php echo $id; ?>" />
<span>S.num : </span><input type="text" class = "form-control"  name="sno" value="<?php echo $row['sno']; ?>" />
<span>Bill NUm : </span><input type="text" class = "form-control"  name="bill_num" value="<?php echo $row['bill_num']; ?>" />
<span>Egg Type : </span><input type="text" class = "form-control"  name="egg_type" value="<?php echo $row['egg_type']; ?>" />
<span>Total Tray : </span><input type="text" class = "form-control"  name="total_tray" value="<?php echo $row['total_tray']; ?>" />
<span>Total Egg : </span><input type="text" class = "form-control"  name="total_egg" value="<?php echo $row['total_egg']; ?>" />
<span>Egg Rate : </span><input type="text" class = "form-control"  name="egg_rate" value="<?php echo $row['egg_rate']; ?>" />
<span>Avg Rate : </span><input type="text" class = "form-control"  name="avg_rate" value="<?php echo $row['avg_rate']; ?>" />
<span>Total : </span><input type="text" class = "form-control"  name="total" value="<?php echo $row['total']; ?>" />
<span>Grand Total : </span><input type="text" class = "form-control"  name="grand_total" value="<?php echo $row['grand_total']; ?>" />


<span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" value="save" class = "form-control" />
</div>
</form>
<?php
}
?>
