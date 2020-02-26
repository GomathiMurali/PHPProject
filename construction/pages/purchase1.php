<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>PPF</title>

  <link rel="shortcut icon" href="ppf.jpg">
  <?php
require_once('auth.php');

?>
  <!-- Bootstrap Core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
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
<?php 
$invoice = $_GET['invoice'];

?>

      </head>

      <body>

       <?php include('navfixed.php');?>

       <div id="wrapper">
	   <div class="container-fluid">
        <div class="row">
         <div class="col-lg-12">
          <h1 class="page-header">Purchase Payment</h1>
        </div>

       
        <form action="savepurchase1.php" method="post" class ="form-group">

          <input type="hidden" name="invoice" class = "form-control" value="<?php echo $_GET['invoice']; ?>" />
		  <input type="hidden" name="groupname" class = "form-control" value="<?php echo $_GET['groupname']; ?>" />
		  
		  <?php
        $today = date('d-m-Y');
        ?>
        <label>Date : </label><input type="text"  style="width: 500px;" class = "form-control" name="date" value = "<?php echo $today; ?>" />
		<label>Customer Name: </label>
		
<br>
											<select name="supplier" style="width: 500px;" class="chzn-select">
										
											 <?php
											  include('connect.php');
											  $groupname = $_GET['groupname']; 
													$result = $db->prepare("SELECT * FROM customer where groupname= :userid ");
													$result->bindParam(':userid', $groupname);
													$result->execute();
													for($i=0; $row = $result->fetch(); $i++){
											  ?>
											  <option><?php echo $row['customer_name']; ?></option>
											  <?php $add = $row['address']; $phone = $row['contact'];
											  }
											  ?>
											  </select><br> 
											
          <label>Select a Product</label><br />
          <select  name="product"  style="width:500px;" class="chzn-select">
           <option></option>
           <?php
           include('connect.php');
           $result = $db->prepare("SELECT * FROM products");
           $result->bindParam(':userid', $res);
           $result->execute();
           for($i=0; $row = $result->fetch(); $i++){
            ?>
            <option value="<?php echo $row['product_code'];?>" 
              <?php
              if($row['qty_left'] == 0)
              {
                echo'disabled';
              }
              ?>
              >
              <?php echo $row['product_code']; ?>
              - <?php echo $row['product_name']; ?>
              - <?php echo $row['qty_left']; ?>

            </option>
            <?php
          }
          ?>
        </select>
        <br />
        <label>Number of Item</label>
        <input type="number" name="qty" value="1" min = "1" class = "form-control"  autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
		 <label>CGST</label>
        <input type="text" name="cgst" value="" placeholder= "%" class = "form-control"  autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
       <label>SGST</label>
       <input type="text" name="sgst" value="" placeholder= "%" class = "form-control"  autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
   <label>IGST</label>
        <input type="text" name="igst" value="" placeholder= "%" class = "form-control"  autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
   


	   <label>Discount</label>
        <input type="text" name="discount" value="0" class = "form-control"  autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
        <br>
        <button class="btn btn-primary" type="submit">Add Product</button>
    </form>
 <?php
    $id=$_GET['invoice'];
    include('connect.php');
    $resultaz = $db->prepare("SELECT * FROM purchaseform WHERE invoice= :xzxz");
    $resultaz->bindParam(':xzxz', $id);
    $resultaz->execute();
    for($i=0; $rowaz = $resultaz->fetch(); $i++){
        $invoicenumber = $rowaz['invoice'].'<br>';
        //$dateorder = $rowaz['date_order'].'<br>';
        $supp = $rowaz['student'].'<br>';
//$datedeliver = $rowaz['date_deliver'].'<br>';
	    $duedate = $rowaz['date'].'<br>';
//echo 'Status : '.$rowaz['status'].'<br>';
    }
    ?>
 
      <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
         <tr>
          <th> Product Name </th>
          <th> Quantity </th>
          <th> Price </th>
		  <th> CGST </th>
		  <th> SGST </th>
		  <th> IGST </th>
          <th> Discount </th>
          <th> Total Amount </th>
        </tr>
      </thead>
      <tbody>

       <?php
       $id=$_GET['invoice'];
       include('connect.php');
       $result = $db->prepare("SELECT * FROM purchaseform WHERE invoice= :userid");
       $result->bindParam(':userid', $id);
       $result->execute();
       for($i=0; $row = $result->fetch(); $i++){
        ?>
        <tr class="record">
         <td><?php
          $rrrrrrr=$row['product'];
          $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
          $resultss->bindParam(':asas', $rrrrrrr);
          $resultss->execute();
          for($i=0; $rowss = $resultss->fetch(); $i++){
            echo $rowss['product_name'];
          }
          ?></td>
         <td><?php echo $row['qty']; ?></td>
         <td>
          <?php
          $ppp=$row['price'];
          echo formatMoney($ppp, true);
          ?>
        </td>
		<td><?php echo $row['cgst']; ?></td>
		<td><?php echo $row['sgst']; ?></td>
		<td><?php echo $row['igst']; ?></td>
        <td>
          <?php
          $ddd=$row['discount'];
          echo formatMoney($ddd, true);
          ?>
        </td>
        <td>
          <?php
          $dfdf=$row['total_amount'];
          echo formatMoney($dfdf, true);
          ?>
        </td>
      </tr>
      <?php
    }
    ?>
    <tr>
      <td colspan="7"><strong style="font-size: 12px; color: #222222;">Total:</strong></td>
      <td colspan="2"><strong style="font-size: 12px; color: #222222;">
       <?php
       function formatMoney($number, $fractional=false) {
        if ($fractional) {
         $number = sprintf('%.2f', $number);
       }
       while (true) {
         $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
         if ($replaced != $number) {
          $number = $replaced;
        } else {
          break;
        }
      }
      return $number;
    }
    $sdsd=$_GET['invoice'];
    $resultas = $db->prepare("SELECT sum(total_amount) FROM purchaseform WHERE invoice= :a");
    $resultas->bindParam(':a', $sdsd);
    $resultas->execute();
    for($i=0; $rowas = $resultas->fetch(); $i++){
      $fgfg=$rowas['sum(total_amount)'];
      echo formatMoney($fgfg, true);
    }
    ?>
  </strong></td>
</tr>

</tbody>
</table><br>
<a  class="btn btn-primary"  href="printpur2.php?invoice=<?php echo $_GET['invoice'];?>&total=<?php echo $fgfg; ?>&name=<?php echo $supp; ?>&date=<?php echo $duedate; ?>&phone=<?php echo $phone;?>">Check Out</a>


<div class="clearfix"></div>
</div>

</div>
</div>
<!-- /#page-wrapper -->






<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<link href="vendors/chosen.min.css" rel="stylesheet" media="screen">
<script src="vendors/chosen.jquery.min.js"></script>
<script>
 $(function() {
  $(".chzn-select").chosen();

});
</script>

</body>

</html>
