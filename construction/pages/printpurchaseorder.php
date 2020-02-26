
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
<style>
* {
    box-sizing: border-box;
	
}

/* Create three equal columns that floats next to each other */
.column {
    float: left;
    width: 30%;
    padding: 22px;
    height: 100px; /* Should be removed. Only for demonstration */
}



/* Create three equal columns that floats next to each other */
.column4 {
    float: left;
    width: 50%;
    padding: 22px;
    height: 100px; /* Should be removed. Only for demonstration */
}
/* Create three equal columns that floats next to each other */
.column1 {
    float: left;
    width: 10%;
    padding: 22px;
    height: 100px; /* Should be removed. Only for demonstration */
}
/* Create three equal columns that floats next to each other */
.column6 {
    float: left;
    width: 33.33%;
    padding: 22px;
    height: 140px; /* Should be removed. Only for demonstration */
}

/* Create three equal columns that floats next to each other */
.column2 {
    float: left;
    width: 70%;
    padding: 22px;
    height: 40px; /* Should be removed. Only for demonstration */
}
/* Create three equal columns that floats next to each other */
.column5 {
    float: left;
    width: 20%;
    padding: 22px;
    height: 40px; /* Should be removed. Only for demonstration */
}

/* Create three equal columns that floats next to each other */
.column3 {
    float: left;
    width: 50%;
    padding: 22px;
    height: 450px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row{
	
   
    
	
}
/* Clear floats after the columns */
.row1{
	
   
    border: 1px solid black;
	
}
.bill {
    bgcolor="blue";
}
@media print {
    th.clr {
        background-color: #0000FF !important;
		color: white !important;
        -webkit-print-color-adjust: exact; 
    }
}
h4{
  border: 1px solid black;
  
}
div.a {
  border: 1px solid black;
  
}
hr.new1 {
  border-bottom: 0.1px solid black;
}
.vl {
  border-left: 1px solid black;
  height: 160px;
  position:absolute; 
  left: 35%; 
}
.vl1 {
  border-left: 1px solid black;
  height: 160px;
  position:absolute; 
  left: 60%; 
}
.vl2 {
  border-left: 1px solid black;
  height: 450px;
  position:absolute; 
  left: 50%; 
}
</style>
</head>

<body>

<div class="content" id="content">
	<div style="margin: 0 auto; padding: 20px; width: 900px; font-weight: normal;">
		<div style="width: 100%;">
			<div class="a" style="width: 850px;">
  <?php
  
  $supplier = $_GET['name'];
 
  $invoicenumber = $_GET['invoice'];
  //$datedeliver = $_GET['datedeliver'];
  //$dateorder = $_GET['dorder'];
 $duedate = $_GET['date'];
 $phone = $_GET['phone'];
 $bank = $_GET['bank'];
  ?>
  <div class="row">
  <div class="column1">
			<img src=""/>
			</div>
			<div class="column">
			<center><b>Poongodi Poultry Farm </b><br />
			
					Namakkal<br /></center></div>
					<div class="column">&nbsp;</div>
					<div class="column">
					<b>State Code</b> : TN <br>
					<b>GST &nbsp; </b> : 33AASFM9380R1Z5
					</div>
 </div>
 <center><h6> <b><u>Purchase Order</u></b></h6></center>
 <div><hr class="new1"></div>
  <div class="row"><div class="vl"></div><div class="vl1"></div>
  <div class="column6">
			To: <b><?php echo $supplier ?></b>
			<br>State Code: TN <br> GST No: <br>
			Phone No1: <?php echo $phone ?> <br> Phone No2: </div>
			<div class="column6">
			Other Ref: <br><br><br>
			GST No: <br>
			State Code: &nbsp; &nbsp; Phone no: 
		  </div>
			<div class="column6">
			Inovice No: <b><?php echo $invoicenumber ?></b><br>
			Date Of Issue: <b><?php echo $duedate ?></b><br>
			Vechicle No: <b><?php  ?></b><br>
			Destination: <b><?php  ?></b><br>
			Payment Mode: <b><?php  ?></b><br>
			Payment Terms: <b><?php  ?></b><br>
					
 
  </div>
 </div>
  <hr class="new1">
  
  
  <div style="width: 100%">
				<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 15px;text-align:left;" width="100%">
      <thead>
       <tr>
        <th> Product Name </th>
		<th> HSN Code </th>
        <th> Quantity </th>
        <th> Price </th>
		<th> Amount </th>
		<th colspan="2"> CGST </th>
		<th colspan="2"> SGST </th>
		<th colspan="2"> IGST </th>
        <th> Total Amount </th>
      </tr>
    </thead>
  <tbody>

     <?php
     $id=$_GET['invoice'];
     include('connect.php');
	 $resultpp = $db->prepare("SELECT * FROM purchaseorder WHERE invoice= :userid");
     $resultpp->bindParam(':userid', $id);
     $resultpp->execute();
	 
     for($i=0; $row = $resultpp->fetch(); $i++){
      ?>
      <tr class="record">
        <td><?php
          $rrrrrrr=$row['product'];
          $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
          $resultss->bindParam(':asas', $rrrrrrr);
          $resultss->execute();
          for($i=0; $rowss = $resultss->fetch(); $i++){
            echo $rowss['product_name'];
			$hsn=$rowss['hsncode'];
          }
          ?></td>
		   <td><?php echo $hsn; ?></td>
          <td><?php echo $row['qty']; ?></td>
          <td>
            <?php
            $dfdf=$row['price'];
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
                      $fff1=$row['cgst'];
                      echo $fff1;
                      ?>
					  <td>
                      <?php
                      $cgst=$row['cgstamt'];
                      echo formatMoney($cgst, true);
                      ?>
                    </td>
                    </td>
					<td>
                      <?php
                      $fff2=$row['sgst'];
                      echo $fff2;
                      ?>
                    </td>
					 <td>
                      <?php
                      $sgst=$row['sgstamt'];
                      echo formatMoney($sgst, true);
                      ?>
                    </td>
					<td>
                      <?php
                      $fff3=$row['igst'];
                      echo $fff3;
                      ?>
                    </td>
					 <td>
                      <?php
                      $igst=$row['igstamt'];
                      echo formatMoney($igst, true);
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
        <td colspan="11"><strong style="font-size: 12px; color: #222222;">Total:</strong></td>
        <td align="left" colspan="10"><strong style="font-size: 12px; color: #222222;">
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
      $resultas = $db->prepare("SELECT sum(total_amount),sum(amount),sum(cgstamt),sum(sgstamt),sum(igstamt) FROM purchaseorder WHERE invoice= :a");
      $resultas->bindParam(':a', $sdsd);
      $resultas->execute();
      for($i=0; $rowas = $resultas->fetch(); $i++){
        $fgfg=$rowas['sum(total_amount)'];
		$amt=$rowas['sum(amount)'];
		$cgstamt=$rowas['sum(cgstamt)'];
		$sgstamt=$rowas['sum(sgstamt)'];
		$igstamt=$rowas['sum(igstamt)'];
        echo formatMoney($fgfg, true);
      }
      ?>
    </strong></td>
  </tr>
<?php $fff4=$cgstamt+$sgstamt+$igstamt;
      
      ?>
</tbody>
</table>
</div>
<?php
$ones = array(
 "",
 " one",
 " two",
 " three",
 " four",
 " five",
 " six",
 " seven",
 " eight",
 " nine",
 " ten",
 " eleven",
 " twelve",
 " thirteen",
 " fourteen",
 " fifteen",
 " sixteen",
 " seventeen",
 " eighteen",
 " nineteen"
);
 
$tens = array(
 "",
 "",
 " twenty",
 " thirty",
 " forty",
 " fifty",
 " sixty",
 " seventy",
 " eighty",
 " ninety"
);
 
$triplets = array(
 "",
 " thousand",
 " million",
 " billion",
 " trillion",
 " quadrillion",
 " quintillion",
 " sextillion",
 " septillion",
 " octillion",
 " nonillion"
);
 
 // recursive fn, converts three digits per pass
function convertTri($num, $tri) {
  global $ones, $tens, $triplets;
 
  // chunk the number, ...rxyy
  $r = (int) ($num / 1000);
  $x = ($num / 100) % 10;
  $y = $num % 100;
 
  // init the output string
  $str = "";
 
  // do hundreds
  if ($x > 0)
   $str = $ones[$x] . " hundred";
 
  // do ones and tens
  if ($y < 20)
   $str .= $ones[$y];
  else
   $str .= $tens[(int) ($y / 10)] . $ones[$y % 10];
 
  // add triplet modifier only if there
  // is some output to be modified...
  if ($str != "")
   $str .= $triplets[$tri];
 
  // continue recursing?
  if ($r > 0)
   return convertTri($r, $tri+1).$str;
  else
   return $str;
 }
 
// returns the number as an anglicized string
function convertNum($num) {
 $num = (int) $num;    // make sure it's an integer
 
 if ($num < 0)
  return "negative".convertTri(-$num, 0);
 
 if ($num == 0)
  return "zero";
 
 return convertTri($num, 0);
}
 
 // Returns an integer in -10^9 .. 10^9
 // with log distribution
 function makeLogRand() {
  $sign = mt_rand(0,1)*2 - 1;
  $val = randThousand() * 1000000
   + randThousand() * 1000
   + randThousand();
  $scale = mt_rand(-9,0);
 
  return $sign * (int) ($val * pow(10.0, $scale));
 }
 
// example of usage
//echo "564 : ".convertNum($fgfg)."<br>";
//echo "892 : ".convertNum(892);
?>
<div class="row"><div class="vl2"></div>
  <div class="column3">
			Total Invoice Amount in Words:<br> <b><?php echo ucwords(convertNum($fgfg)); ?></b><hr class="new1">
			<?php
			$sdsds=$bank;
			  $resultass = $db->prepare("SELECT * FROM addbank WHERE accno= :a");
			  $resultass->bindParam(':a', $sdsds);
			  $resultass->execute();
			  for($i=0; $rowass = $resultass->fetch(); $i++){
				$bankname=$rowass['bankname'];
				$accno=$rowass['accno'];
				$branch=$rowass['branch'];
				$codeifsc=$rowass['ifsc'];
				
			  }
      ?>
			<b><u>Bank Details:</u></b> <br> 
			Bank Name: <b> <?php echo $bankname; ?></b><br>
			A/c No: <b> <?php echo $accno; ?></b><br>
			Branch & IFSC: <b><?php echo $branch; ?> & <?php echo $codeifsc; ?></b><hr class="new1">
			<b><u>Terms and Conditions:</u></b> <br>
			<p>1. All Payments shall be made through RTGS or NEFT Only.<br>
			2.Interest @24% will be charged if payment made after 15 days.<br>
			3.Subject to the Namakkal Jurisdiction only.
			</p><hr class="new1">
			<br><br><br>
			<center> <b>Party Signature</b></center></div>
			<div class="column3">
			
			<b>Total Amount Before Tax</b> &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; <b><?php echo formatMoney($amt, true) ?></b><br><br>
			Add : CGST   &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; 
			<?php echo formatMoney($cgstamt, true) ?><br><br>
			Add : SGST   &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;
			<?php echo formatMoney($sgstamt, true) ?><br><br>
			Add : IGST   &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			<?php echo formatMoney($igstamt, true) ?><br><br>
			<b>Tax Amount : GST</b> &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; 
			<b><?php echo formatMoney($fff4, true) ?></b><br><br>
            <b>Total Amount After Tax</b> &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <b><?php echo formatMoney($fgfg, true) ?></b><br><br>
            <b>GST Payable On Reverse Charge</b>&nbsp; &nbsp; &nbsp; &nbsp;  NA<hr class="new1">	
             
			 <center> Certified at the particulars given above are true and correct</center>
			 <br>
			 <br>
			 <center> BSS Poultry Farm</center><br>
			 <center> Authorized Signatory</center>
          </div>
         </div>
</div>
 </div>



<center>
  <button onclick="myFunction()" id="btnPrint" class="btn btn-primary btn-m " >
    Print PO Form
  </button>   
<a href = "home.php" class="btn btn-primary btn-m " >
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