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
	$result = $db->prepare("SELECT * FROM addbank WHERE id= :userid");
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
<form action="saveeditbank.php" method="post" class = "form-group">
<div id="ac">
<input type="hidden" class = "form-control" name="memi" value="<?php echo $id; ?>" />
<span> Bank Name : </span><input type="text" class = "form-control"  name="name" value="<?php echo $row['bankname']; ?>" />
<span>Account No. : </span><input type="text" class = "form-control"  name="accno" value="<?php echo $row['accno']; ?>" />
<span>Branch : </span><input type="text" class = "form-control"  name="branch" value="<?php echo $row['branch']; ?>" />
<span>IFSC Code : </span><input type="text" class = "form-control"  name="ifsc" value="<?php echo $row['ifsc']; ?>" />
<span>Holder Name : </span><input type="text" class = "form-control"  name="holder" value="<?php echo $row['holder']; ?>" />
<span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" value="save" class = "form-control" />
</div>
</form>
<?php
}
?>
</body>

   </html>
