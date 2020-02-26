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


  <!-- DataTables CSS -->
  <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

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


      </head>

      <body>


       <?php include('usernavfixed1.php');?>    
          <?php
  $name = $_GET['name'];
?>
       <!-- Page Content -->
       <div id="wrapper">
	   <div id="page-wrapper">
        <div class="container-fluid">
         <div class="row">
          <div class="col-lg-12">
           <h1 class="page-header">Purchase List: <?php echo $name;?></h1>
         </div>
         <div id="maintable">
          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
             <tr>

              
              <th> Invoice No. </th>
              <th> Date</th>
              
              <!--<th> Date Deliver </th>-->
              <!--<th> Product Code </th>-->
              <th> Product Name </th>
              <!--<th> Description Name </th>-->
              <th> Qty </th>
              <th> Price </th>
              <!--<th> Bill Type </th>-->
			  <!--<th> Status </th>-->
              <th> Total Amount </th>
            </tr>
          </thead>
          <tbody>

         
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
          
          include('connect.php');
          $result = $db->prepare("SELECT * FROM salesform where student= :userid ORDER BY id desc");
		  $result->bindParam(':userid', $name);
          $result->execute();
          for($i=0; $row = $result->fetch(); $i++){
            ?>
            <tr class="record">
             <!--<td style="display:none"><?php echo $row['transaction_id']; ?></td>-->
             <td><?php echo $row['invoice']; ?></td>
             <td><?php echo $row['date']; ?></td>
             <!--<td style="display:none"><?php echo $row['name']; ?></td>-->
             <!--<td><?php echo $row['date_deliver']; ?></td>-->

             <!--<td style="display:none"><?php echo $row['p_name']; ?></td>-->

             <td><?php
               $rrrrrrr=$row['product'];
               $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
               $resultss->bindParam(':asas', $rrrrrrr);
               $resultss->execute();
               for($i=0; $rowss = $resultss->fetch(); $i++){
                echo $rowss['product_name'];
              }
              ?></td>

             <!--<td style="display:none"><?php
               $rrrrrrr=$row['product'];
               $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
               $resultss->bindParam(':asas', $rrrrrrr);
               $resultss->execute();
               for($i=0; $rowss = $resultss->fetch(); $i++){
                echo $rowss['description_name'];
              }
              ?></td>-->
              
              <td><?php echo $row['qty']; ?></td>
			  <td><?php
                $dsdsds=$row['price'];
                echo formatMoney($dsdsds, true);
                ?></td>
              <td><?php
                $dsdsd=$row['total_amount'];
                echo formatMoney($dsdsd, true);
                ?></td>
                <!--<td style="display:none"><?php echo $row['status']; ?></td>
				<td style="display:none"><?php echo $row['d_status']; ?></td>-->
                <!--<td><a href="#" id="<?php echo $row['transaction_id']; ?>" class="btn btn-danger delbutton" title="Click To Delete">
                <span><i class="fa fa-trash"></i></span>
                </a> 
                <a rel="facebox" class = "btn btn-primary" href="stockout.php?date=<?php echo $row['date']; ?>&qty=<?php echo $row['qty']; ?>&iv=<?php echo $row['invoice']; ?>&pname=<?php echo $row['product'];?>">
                <span><i class="fa fa-pencil"></i></span></a>
                <a class = "btn btn-primary"  href="printpo2.php?id=<?php echo $row['invoice']; ?>&date=<?php echo $row['date']; ?>&pname=<?php echo $row['product'];?>"><span><i class="fa fa-print"></i></span></a> 
                </td>-->
              </tr>
              <?php
            }
            ?>

          </tbody>
        </table>
        <div class="clearfix"></div>
      </div>
      <script src="js/jquery.js"></script>
      <script type="text/javascript">
       $(function() {


        $(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
if(confirm("Sure you want to delete this update? There is NO undo!"))
{

	$.ajax({
		type: "GET",
		url: "deletepppp.php",
		data: info,
		success: function(){

		}
	});
	$(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
	.animate({ opacity: "hide" }, "slow");

}

return false;

});

      });
    </script>

  </div>
  <!-- /.row -->
</div>
<!-- /.container-fluid -->
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


<!-- DataTables JavaScript -->
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
  $(document).ready(function() {
   $('#dataTables-example').DataTable({
    responsive: true
  });
 });
</script>




</body>

</html>
