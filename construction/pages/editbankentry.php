<?php
	include('connect.php');
	$id=$_GET['id'];
	$ac=$_GET['no'];
	$result = $db->prepare("SELECT * FROM bankentry WHERE id= :userid");
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
<form action="saveeditbankentry.php" method="post" class = "form-group">
<div id="ac">
<input type="hidden" class = "form-control" name="memi" value="<?php echo $id; ?>" />
<span>School : </span><input type="text" class = "form-control"  name="school" value="<?php echo $row['school']; ?>" />

<input type="hidden" class = "form-control"  name="no1" value="<?php echo $ac; ?>" />
<span>Account : </span><input type="text" class = "form-control"  name="name" value="<?php echo $row['account']; ?>" />
<span>Date : </span><input type="text" class = "form-control"  name="date" value="<?php echo $row['date']; ?>" />

<span>Description : </span><input type="text" class = "form-control"  name="description" value="<?php echo $row['description']; ?>" />
<span> Credit Amount : </span><input type="text" class = "form-control"  name="camount" value="<?php echo $row['amount']; ?>" />
<span>Debit Amount : </span><input type="text" class = "form-control"  name="damount" value="<?php echo $row['debit_amount']; ?>" />


<span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" value="save" class = "form-control" />
</div>
</form>
<?php
}
?>
</html>