
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
    width: 50%;
    padding: 22px;
    height: 40px; /* Should be removed. Only for demonstration */
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
    width: 33.33%;
    padding: 22px;
    height: 100px; /* Should be removed. Only for demonstration */
}
/* Create three equal columns that floats next to each other */
.column6 {
    float: left;
    width: 33.33%;
    padding: 22px;
    height: 40px; /* Should be removed. Only for demonstration */
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
    width: 30%;
    padding: 22px;
    height: 170px; /* Should be removed. Only for demonstration */
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

</style>


</head>

<body>

<div class="content" id="content">
	<div style="margin: 0 auto; padding: 20px; width: 800px; font-weight: normal;">
		<div style="width: 100%;">
			<div class="a" style="width: 750px;">
  <?php
  
  $date = $_GET['date'];
  $vno = $_GET['voucherno'];
  $acc = $_GET['acchead'];
  
  $towards = $_GET['towards'];
  $amount = $_GET['amount'];
 
 
  ?>
 <div class="row">
  <div class="column1">
			<img src=""/>
			<br><br>&nbsp;&nbsp;&nbsp;Tin No: <b>2334561798</b></div>
			<div class="column1">
			<center><b>BSS Poultry Farm </b><br />
			
					Namakkal<br /></center></div>
					<div class="column1">
			<br>
			<br><br>Phone No: <b>04286 123456</b>
  
  </div>
 </div>
 <center><h6> <b><u>Statement</u></b></h6></center>
  <div class="row">
  <div class="column6">
			Statement No: <b><?php echo $vno;?></b></div>
			<div class="column6">&nbsp;
		  </div>
			<div class="column6">
			Date: <b><?php echo $date;?></b>
					
 
  </div>
 </div>
 <div class="row">
  <div class="column2">
			Account head: <b><?php echo $acc;?></b></div>
</div>
<div class="row">
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
  <div class="column2">
			Amount Rupees: <b><?php echo ucwords(convertNum($amount));?></b></div>
</div>
<div class="row">
  <div class="column2">
			Towards: <b><?php echo $towards;?></b></div>
</div>
<div class="row">
  <div class="column5">
			<h4><b>Rs:<?php echo $amount;?></b></h4></div>
</div>
<div style="text-align:right; margin-top: 10px;">Cashier &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Authorized By &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; Receiver Signature</div>
</div>
</div>
<br>
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