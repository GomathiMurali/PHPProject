<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM assets WHERE id= :userid");
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
<form action="saveeditassets.php" method="post" class = "form-group">
<div id="ac">
<input type="hidden" class = "form-control" name="memi" value="<?php echo $id; ?>" />
<span>Date : </span><input type="text" class = "form-control"  name="date" value="<?php echo $row['date']; ?>" />
<span>Property Name : </span><input type="text" class = "form-control"  name="name" value="<?php echo $row['name']; ?>" />
<span>Property Type : </span><input type="text" class = "form-control"  name="type" value="<?php echo $row['type']; ?>" />
<span>Property Amount : </span><input type="text" class = "form-control"  name="amount" value="<?php echo $row['amount']; ?>" />
<span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" value="save" class = "form-control" />
</div>
</form>
<?php
}
?>