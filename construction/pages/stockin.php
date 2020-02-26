 <!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BSS</title>
    
    <link rel="shortcut icon" href="">
	<?php
include('auth.php');


?> 
  <!-- Bootstrap Core CSS -->
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


  <link rel="stylesheet" type="text/css" media="print" href="print.css" />

  <link rel="stylesheet" type="text/css" href="tcal.css" />
  <script type="text/javascript" src="tcal.js"></script>


  <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>



</head>

<body>
 <?php include('navfixed.php');
	?>

  <?php
  include('connect.php');
  $id = $_GET['iv'];
  $date = $_GET['date'];
  $qty = $_GET['qty'];
  $pname=$_GET['pname'];
  ?>
    <form action="update.php" method="post" class = "form-group" name="stockin_form">
      <div id="ac">
	  <label> Invoice NO </label>
	  <input type="text" name="invoice" value="<?php echo $id; ?>" class = "form-control" />
	   <label> Date Deliver </label>
	  <input type="text" name="date" value="<?php echo $date; ?>" class = "form-control" />
	 <!-- <label>Product Code</label>-->
        <input type="hidden" name="product_code" value="<?php
           $rrrrrrr=$pname;
            $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
            $resultss->bindParam(':asas', $rrrrrrr);
            $resultss->execute();
            for($i=0; $rowss = $resultss->fetch(); $i++){
              echo $rowss['product_code'];
            }
            ?>" class = "form-control" />
		<!--<label>Product Name</label>-->
        <input type="hidden" name="pname" value="<?php echo $pname; ?>" class = "form-control" />
        <label>Quantity : </label>
        <input type="text" name="qty" value = "<?php echo $qty; ?>"  class = "form-control"  />
        <label>Status</label>
        <select name="status"  class = "form-control">
         <option>Select</option>
         <option>Received</option>
         <option>Returned</option>
         <option>Cancelled</option>
       </select>
       
       
       <label> Remarks </label>
       <textarea style="width:265px; height:50px;" name="remark"> </textarea>
       <input class="btn btn-primary btn-block" type="submit" class = "form-control" value="save" />
     </div>
   </form>
  
 </body>
 </html>