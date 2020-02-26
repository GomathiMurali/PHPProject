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
	$result = $db->prepare("SELECT * FROM products WHERE product_id= :userid");
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
<form action="saveeditproduct.php" method="post" class = "form-group">
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
