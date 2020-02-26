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
	$result = $db->prepare("SELECT * FROM addgroup4 WHERE id= :userid");
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

<form action="kmedit.php" method="post" class = "form-group">
<div id="ac">
  <h3>Construction Details</h3>
<input type="hidden" class = "form-control" name="memi" value="<?php echo $id; ?>" />
<span>S.no : </span><input type="text" class = "form-control"  name="sno" value="<?php echo $row['sno']; ?>" />
<span>Date : </span><input type="text" class = "form-control"  name="date" value="<?php echo $row['date']; ?>" />
<span>Monor : </span><input type="text" class = "form-control"  name="monor" value="<?php echo $row['monor']; ?>" />
<span>Binder : </span><input type="text" class = "form-control"  name="binder" value="<?php echo $row['binder']; ?>" />
<span>ELE/Plumber Tile Moron : </span><input type="text" class = "form-control"  name="plumber" value="<?php echo $row['plumber']; ?>" />
<span>Painter : </span><input type="text" class = "form-control"  name="painter" value="<?php echo $row['painter']; ?>" />
<span>Others : </span><input type="text" class = "form-control"  name="others" value="<?php echo $row['others']; ?>" />
<span>Remarks : </span><input type="text" class = "form-control"  name="remarks" value="<?php echo $row['remarks']; ?>" />



<span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" value="save" class = "form-control" />
</div>
</form>
<?php
}
?>
 </body>

   </html>
