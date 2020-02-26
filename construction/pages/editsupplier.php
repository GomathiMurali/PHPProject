<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BSS</title>
    
    <link rel="shortcut icon" href="mff.jpg">
	<?php
include('auth.php');


?>

<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM supliers WHERE suplier_id= :userid");
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
<form action="saveeditsupplier.php" method="post" class = "form-group">
<div id="ac">
<input type="hidden" class = "form-control" name="memi" value="<?php echo $id; ?>" />
<span>Name : </span><input type="text" class = "form-control"  name="name" value="<?php echo $row['suplier_name']; ?>" />
<!--<input type="text" class = "form-control"  name="address" value="<?php echo $row['address']; ?>" />-->
<span>GST No : </span><input type="text" class = "form-control"  name="gstno" value="<?php echo $row['gstno']; ?>" />
<span>PAN No : </span><input type="text" class = "form-control"  name="panno" value="<?php echo $row['panno']; ?>" />
<span>Contact Name : </span><input type="text" class = "form-control"  name="cname" value="<?php echo $row['cname']; ?>" />
<span>Phone No : </span><input type="text" class = "form-control"  name="phone" value="<?php echo $row['phone']; ?>" />
<span>Mobile No : </span><input type="text" class = "form-control"  name="mobile" value="<?php echo $row['mobile']; ?>" />
<span>Email ID : </span><input type="text" class = "form-control"  name="email" value="<?php echo $row['email']; ?>" />
<span>Cc : </span><input type="text" class = "form-control"  name="emailcc" value="<?php echo $row['emailcc']; ?>" />
<span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" value="save" class = "form-control" />
</div>
</form>
<?php
}
?>
</body>

   </html>
