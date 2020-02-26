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
	$result = $db->prepare("SELECT * FROM addunit_new WHERE id= :userid");
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

<form action="saveedituom.php" method="post" class = "form-group">
<div id="ac">
  <h4>Unit Measerment</h4>
<input type="hidden" class = "form-control" name="memi" value="<?php echo $id; ?>" />
<span>S.no : </span><input type="text" class = "form-control"  name="sno" value="<?php echo $row['sno']; ?>" />

<span>Invoice : </span><input type="text" class = "form-control"  name="invoice" value="<?php echo $row['invoice']; ?>" />
<span>Master Type : </span><input type="text" class = "form-control"  name="master_type" value="<?php echo $row['master_type']; ?>" />
<span>quantity : </span><input type="text" class = "form-control"  name="quantity" value="<?php echo $row['quantity']; ?>" />
<span>Rate : </span><input type="text" class = "form-control"  name="rate" value="<?php echo $row['rate']; ?>" />
<span>Medicine : </span><input type="text" class = "form-control"  name="medicine" value="<?php echo $row['medicine']; ?>" />
<span>Radi Rate : </span><input type="text" class = "form-control"  name="radi_rate" value="<?php echo $row['radi_rate']; ?>" />
<span>Total : </span><input type="text" class = "form-control"  name="total" value="<?php echo $row['total']; ?>" />

<span>Grand Total : </span><input type="text" class = "form-control"  name="grand_total" value="<?php echo $row['grand_total']; ?>" />


<span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" value="save" class = "form-control" />
</div>
</form>
<?php
}
?>
 </body>

   </html>
