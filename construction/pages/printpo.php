<?php
require_once('auth.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GV</title>

  <link rel="shortcut icon" href="logo.jpg">
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

<div class="content" id="content">
	<div style="margin: 0 auto; padding: 20px; width: 700px; font-weight: normal;">
		<div style="width: 100%;">
			<div style="width: 459px;">
  <?php
  $supplier=$_GET['supplier'];
  $dstatus=$_GET['dstatus'];
  $pname=$_GET['pname'];
  ?>
  <table cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 15px;text-align:left;" width="90%">
			<tr>
			<td>
			<div><div align="left">TIN No: 33473105385<br> CST No: 676070 dt. 27-05-2014</div></td>
			<td>
			<div align="right">Phone No:9626222705 </div></div></td></tr></table><br>
			<center><img src="gv.png" width="70px"/></center>
			<center><b>G.V.& Co.</b><br />
					6/315-1,Vangili complex,Trichy Road,Namakkal-1<br /></center>
  <center><h5> PURCHASE <?php echo $dstatus ?> BILL </h5></center>
  <div>
    <?php
    $id=$_GET['id'];
    include('connect.php');
    $resultaz = $db->prepare("SELECT * FROM purchases WHERE invoice_number= :xzxz");
    $resultaz->bindParam(':xzxz', $id);
    $resultaz->execute();
    for($i=0; $rowaz = $resultaz->fetch(); $i++){
      //echo 'Transaction ID : TR-'.$rowaz['transaction_id'].'<br>';
       $invoicenumber = $rowaz['invoice_number'].'<br>';
       $dateorder = $rowaz['date_order'].'<br>';
       $supp = $rowaz['suplier'].'<br>';
       $datedeliver = $rowaz['date_deliver'].'<br>';
	   $duedate = $rowaz['pay_date'].'<br>';
    }
    ?>
  </div>
  <div>
  <table align="left">
  <tr>
  <td>
  Supplier</td><td>:</td><td><?php echo $supp ?></td></tr>
  <tr>
  <td>Date Deliver</td><td>:</td><td><?php echo $datedeliver ?></td></tr>
  <tr>
  <td>Due Date</td><td>:</td><td><?php echo $duedate ?></td></tr>
  </table>
  <table align="right">
  <tr>
  <td>Invoice No</td><td>:</td><td><?php echo $invoicenumber ?></td></tr>
  <tr>
  <td>Date Order</td><td>:</td><td><?php echo $dateorder ?></td></tr>
  </table>
  </div>
  </div>
  </div>
  
  <div style="width: 100%">
				<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 15px;text-align:left;" width="75%">
  
    <thead>
     <tr>
      <th> Product Name </th>
      <th> Quantity </th>
      <th> Price </th>
	  <th> VAT </th>
	  <th> Total Amount </th>
    </tr>
  </thead>
  <tbody>

   <?php
   $id=$_GET['id'];
   $pname=$_GET['pname'];
   include('connect.php');
   $result = $db->prepare("SELECT * FROM purchases_item WHERE invoice= :userid AND name='$pname'");
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
		
        <td><?php echo $row['qty']; ?></td>
		<td><?php echo $row['cost']; ?></td>
		<td><?php echo $row['vatper']; ?></td>
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
      <td colspan="4"><strong style="font-size: 12px; color: #222222;">Total:</strong></td>
      <td colspan="3"><strong style="font-size: 12px; color: #222222;">
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
    $sdsd=$_GET['id'];
	$pname=$_GET['pname'];
    $resultas = $db->prepare("SELECT sum(total_amount) FROM purchases_item WHERE invoice= :a AND name='$pname'");
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
<div style="text-align: center; margin-top: 13px;">FOR G.V. & Co.</div>
</div>
</div>

<center>
  <button onclick="myFunction()" id="btnPrint" class="btn btn-primary btn-m " >
    Print PO Form
  </button>   
<a href = "purchaseslist.php" class="btn btn-primary btn-m " >
  Back    
</a></center>
</div>
<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
<script>
  $(document).ready(function() {
    $('#dataTables-example').DataTable({
      responsive: true
    });
  });
</script>

<script>
 function myFunction() {
   window.print();
 }
</script>



</body>

</html>