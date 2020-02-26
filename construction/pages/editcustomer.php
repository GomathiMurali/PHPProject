<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mahendra Feeds & Foods</title>
    
    <link rel="shortcut icon" href="mff.jpg">
	<?php
include('auth.php');


?>
<?php
include('connect.php');
$id=$_GET['id'];
$result = $db->prepare("SELECT * FROM customer WHERE customer_id= :userid");
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
	<form action="saveeditcustomer.php" method="post" class = "form-group">
		<div id="ac">
			<input type="hidden" name="memi" value="<?php echo $id; ?>" />
			
			<span>Name : </span><input type="text" name="name" class = "form-control" value="<?php echo $row['first_name']; ?>" />
			<input type="hidden" name="tname" class = "form-control" value="<?php echo $row['middle_name']; ?>" />
			<input type="hidden" name="pname" class = "form-control" value="<?php echo $row['last_name']; ?>" />
			<input type="hidden" name="memno" class = "form-control" value="<?php echo $row['membership_number']; ?>" />
			<!--<span>Address : </span><textarea name="address" class = "form-control" value="<?php echo $row['address']; ?>" />-->
			
			<span>GST No : </span><input type="text" name="gstno" class = "form-control" value="<?php echo $row['gstno']; ?>" />
			<span>PAN No : </span><input type="text" name="panno" class = "form-control" value="<?php echo $row['panno']; ?>" />
			<span>Phone No : </span><input type="text" name="phone" class = "form-control" value="<?php echo $row['contact']; ?>" />
			<span>Mobile No : </span><input type="text" name="mobile" class = "form-control" value="<?php echo $row['mobile']; ?>" />
			<span>Email : </span><input type="text" name="email" class = "form-control" value="<?php echo $row['email']; ?>" />
			
			<span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" class = "form-control" value="Update" />
		</div>
	</form>
	<?php
}
?>
</body>

   </html>
