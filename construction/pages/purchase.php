
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MALAR CBSE</title>
  <link rel="shortcut icon" href="mff.jpg">
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

  <!-- DataTables CSS -->
  <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">


  <link rel="stylesheet" type="text/css" media="print" href="prints.css" />
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

 <?php include('navfixed.php');?>

 <!-- Page Content -->
 <div id="wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"><?php $_GET['name'];  ?> Purchase Order Form  </h1>
      </div>

      <form action="savepurchase.php" method="post" class = "form-group">
        <input type="hidden" name="invoice" class = "form-control" value="<?php echo $_GET['invoice']; ?>" />
        <?php
        $today = date('d-m-Y');
        ?>
        <label>Date : </label><input type="text"  style="width: 600px;" class = "form-control" name="date" value = "<?php echo $today; ?>" />
		
	
        <label>Supplier : </label><input type = "text" style="width: 600px;" class = "form-control" name = "supplier" value = "<?php echo $_GET['name']; ?>">
		
		<!--<label>Supplier TIN NO : </label>--><input type = "hidden" style="width: 600px;" class = "form-control" name = "stinno" value = "<?php echo $_GET['tinno']; ?>">

        <label>Date Deliver : </label><input type="date" style="width: 600px;" class = "form-control" name="date_delivered" />

        <input type="hidden" class = "form-control"  value="<?php echo $_GET['name']; ?>" />

        <label>Select a Product</label><br />
        <select name="product" style="width: 600px;" class="chzn-select">
         <?php
         include('connect.php');
         $id =$_GET['name'];
         $result = $db->prepare("SELECT * FROM products WHERE supplier = :supp");
         $result->bindParam(':supp', $id);
         $result->execute();
         for($i=0; $row = $result->fetch(); $i++){
          ?>
          <option value="<?php echo $row['product_code']; ?>"><?php echo $row['product_name']; ?> - <?php echo $row['description_name']; ?></option>
          <?php
        }
        ?>
      </select><br />
      <label>Number of items </label>
      <input type="text" name="qty" class ="form-control" value="" placeholder="Qty" autocomplete="off" style="width: 68px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
      <!--<label> Product type </label>
      <select name="status"  class = "form-control">
         <option>Select</option>
         <option>Accountable</option>
         <option>Unaccountable</option>
        
       </select>-->
	   <label> GST:</label>
              <input type="text" name="vatper" value="" class = "form-control" placeholder = "%" autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
              <br>
		<!--<label>Pay Due Date:</label>-->
              <input type="hidden" style="width: 600px;" class = "form-control" name="paydate" />
              <br>
			  <!--<label>Status:</label>-->
              <input type="hidden" name="dstatus" value="Pending" class = "form-control" autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
              
      <br />
      <!-- <button onclick="myFunction()" class="btn btn-primary" type="submit">Print PO</button> -->
      <button class="btn btn-primary" type="submit">Add Product</button>
    </form>
<div>
 <?php
    $id=$_GET['invoice'];
    include('connect.php');
    $resultaz = $db->prepare("SELECT * FROM purchases WHERE invoice_number= :xzxz");
    $resultaz->bindParam(':xzxz', $id);
    $resultaz->execute();
    for($i=0; $rowaz = $resultaz->fetch(); $i++){
        $invoicenumber = $rowaz['invoice_number'].'<br>';
        $dateorder = $rowaz['date_order'].'<br>';
        $supp = $rowaz['suplier'].'<br>';
        $datedeliver = $rowaz['date_deliver'].'<br>';
	    $duedate = $rowaz['pay_date'].'<br>';
//echo 'Status : '.$rowaz['status'].'<br>';
    }
    ?>
	
    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
      <thead>
       <tr>
        <th> Product Name </th>
        <th> Quantity </th>
        <th> Price </th>
		
        <th> Amount </th>
		<th> GST </th>
        <th> Total Amount </th>
		
      </tr>
    </thead>
    <tbody>

     <?php
     $id=$_GET['invoice'];
     include('connect.php');
     $result = $db->prepare("SELECT * FROM purchases_item WHERE invoice= :userid");
     $result->bindParam(':userid', $id);
     $result->execute();
     for($i=0; $row = $result->fetch(); $i++){
      ?>
      <tr class="record">
        <td><?php
          $rrrrrrr=$row['name'];
          $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
          $resultss->bindParam(':asas', $rrrrrrr);
          $resultss->execute();
          for($i=0; $rowss = $resultss->fetch(); $i++){
            echo $rowss['product_name'];
          }
          ?></td>
          <td align="right"><?php echo $row['qty']; ?></td>
          <td align="right">
            <?php
            $dfdf=$row['cost'];
            echo formatMoney($dfdf, true);
            ?>
          </td>
		  
					<td>
                      <?php
                      $ccc=$row['amount'];
                      echo formatMoney($ccc, true);
                      ?>
                    </td>
					<td>
                      <?php
                      $fff=$row['vatper'];
                     echo $fff;
                      ?>
                    </td>

                    <td>
                      <?php
                      $dfdf=$row['total_amount'];
                      echo formatMoney($dfdf, true);
                      ?>
					  
        </tr>
        <?php
      }
      ?>
      <tr>
        <td colspan="5"><strong style="font-size: 12px; color: #222222;">Total:</strong></td>
        <td align="left" colspan="4"><strong style="font-size: 12px; color: #222222;">
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
      $resultas = $db->prepare("SELECT sum(total_amount) FROM purchases_item WHERE invoice= :a");
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
</table>
</div>
</div>

<div class = "pull-right">

<!--<button onclick="myFunction()" id="btnPrint" class="btn btn-primary btn-m ">
        Print
    </button>-->
	<a class = "btn btn-primary"  href="printpur.php?id=<?php echo $_GET['invoice']; ?>&supplier=<?php echo $supp; ?>&datedeliver=<?php echo $datedeliver; ?>&dorder=<?php echo $dateorder; ?>&duedate=<?php echo $duedate; ?>">Checkout</a>
</div>


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
<script>
     function myFunction() {
         window.print();
     }
  </script>



</body>


</html>