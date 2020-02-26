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
	$result = $db->prepare("SELECT * FROM userproducts WHERE product_id= :userid");
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
	 <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

  <body>
   
 
<br>
<br>
<br>
<br>
<form action="saveedituserproduct.php" method="post" class = "form-group">
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<!--<span>Product Code : </span>--><input type="hidden" name="code" class = "form-control" value="<?php echo $row['product_code']; ?>" />
<span>Product Name : </span><input type="text" name="bname" class = "form-control" value="<?php echo $row['product_name']; ?>" />
<!--<span>Description Name : </span>--><input type="hidden" name="dname" class = "form-control" value="<?php echo $row['description_name']; ?>" />
<input type="hidden" name="cost" class = "form-control" value="<?php echo $row['cost']; ?>" />
<input type="hidden" name="price" class = "form-control" value="<?php echo $row['price']; ?>" />
 <input type="hidden" name="mrp" class = "form-control" value="<?php echo $row['mrp']; ?>" />
<span>Qty : </span> <input type="text" name="qty" class = "form-control" value="<?php echo $row['qty_left']; ?>" />
<span>Supplier : </span>
<select name="supplier" class = "form-control" >
	<option><?php echo $row['supplier']; ?></option>
	<?php
	$results = $db->prepare("SELECT * FROM supliers");
		$results->bindParam(':userid', $res);
		$results->execute();
		for($i=0; $rows = $results->fetch(); $i++){
	?>
		<option><?php echo $rows['suplier_name']; ?></option>
	<?php
	}
	?>
</select>
<span>Category: </span>
<select name="categ" class = "form-control" >
                         <?php
                                include('connect.php');
                                $result = $db->prepare("SELECT * FROM catagory");
                                $result->bindParam(':userid', $res);
                                $result->execute();
                                for($i=0; $row = $result->fetch(); $i++){
                                    ?>
                                    <option><?php echo $row['catagory_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
<span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" class = "form-control" value="Update" />
</div>
</form>

<?php
}
?>
 </body>

   </html>
