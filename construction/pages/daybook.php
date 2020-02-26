<?php
require_once('auth.php');
include_once('headerpage.php');
?>
<!DOCTYPE html>
<html lang="en">
<html lang="ta">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Malar</title>
    
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

				 <?php
				 $today = $_POST['fromdate'];
				 $today1 = date( 'd-m-Y', strtotime( $today) );
				 $day_before = date( 'd-m-Y', strtotime( $today1 . ' -1 day' ) );
				?>
			

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
									?>
</head>

<body>


    <?php include('navfixed.php');?>    

    <!-- Page Content -->
    <div id="page-wrapper" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Daybook</h2>
                </div>
                <div id="maintable" >
                    <div style="margin-top: -19px; margin-bottom: 21px;">
                    </div>
					<form action="savedaybook.php" method="post" class = "form-group">
					<label>Date : </label><input type="text"  style="width: 400px;" class = "form-control" name="date" value = "<?php echo $today1; ?>" />
					<?php
					include('connect.php');
											        $school=$day_before;
													$result = $db->prepare("SELECT * FROM daybook where date=:userid");
													$result->bindParam(':userid', $school);
													$result->execute();
													for($i=0; $row = $result->fetch(); $i++){
											  
					?><?php $obh = $row['thand'];$obb = $row['tbank'];$ob = $row['totalamount']; ?>
					<?php
													}?>
					<label>Opening balance : </label><input type="text"  style="width: 400px;" class = "form-control" name="ob" value = "<?php echo $ob; ?>" />
					<label>Opening balance in Hand : </label><input type="text"  style="width: 400px;" class = "form-control" name="obh" value = "<?php echo $obh; ?>" />
					<label>Opening balance in Bank : </label><input type="text"  style="width: 400px;" class = "form-control" name="obb" value = "<?php echo $obb;?>" />
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        
                       <thead>
                            <tr>
                                <th colspan="5" style="border-top:1px solid #999999">Bank Opening Balance</th>
                            </tr>
                        </thead>
					     <thead>
                            <tr>
							
                                <th>Bank</th>
								<th>Opening Balance</th>
								
								
                            </tr>
                        </thead>
						 <?php
                            include('connect.php');
							$g='31-08-2018';
							$h=$day_before;
							
                            $result = $db->prepare("SELECT account,sum(balance) FROM bankentry WHERE STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$g', '%d-%m-%Y') AND STR_TO_DATE('$h', '%d-%m-%Y')GROUP BY account");
							$result->bindParam(':c', $g);
                            $result->bindParam(':d', $h);
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
                                <tr class="record">
                                    <td ><?php echo $row['account']; ?></td>
									
									
                                   
                                    <td align="right"><?php
                                        $dsdsd=$row['sum(balance)'];
                                        echo formatMoney($dsdsd, true);
                                        ?>
                                    </td>
									<td></td>
									<td></td>
									<td></td>
                                   
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                        
                    
                               
						
						
                        <thead>
                            <tr>
                                <th colspan="5" style="border-top:1px solid #999999">Income</th>
                            </tr>
                        </thead>
					     <thead>
                            <tr>
							<th>Date</th>
                                <th>Catagory</th>
								<th>Sub Catagory</th>
								<th>Description</th>
								<th>Amount</th>
                            </tr>
                        </thead>
						 <?php
                            include('connect.php');
							$c=$today1;
							
                            $result = $db->prepare("SELECT * FROM income where date=:c ORDER BY in_id");
							$result->bindParam(':c', $c);
                            
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
                                <tr class="record">
                                    <td><?php echo $row['date']; ?></td>
									<td><?php echo $row['catagory_name']; ?></td>
									<td><?php echo $row['subcatagory']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
									<td colspan="2"><?php echo $row['amount']; ?></td>
                                   
                                    <!--<td><?php
                                        $dsdsd=$row['t_amount'];
                                        echo formatMoney($dsdsd, true);
                                        ?>
                                    </td>-->
                                   
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="4" style="border-top:1px solid #999999"> Total Amount </th>
                                <th colspan="2" style="border-top:1px solid #999999"> 
                                    <?php
                                    function formatMoneyi($number, $fractional=false) {
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
                                    $results = $db->prepare("SELECT sum(amount) FROM income where date=:c ");
									$results->bindParam(':c', $c);
                                   
                                    $results->execute();
                                    for($i=0; $rows = $results->fetch(); $i++){
                                        $in=$rows['sum(amount)'];
                                        echo formatMoneyi($in, true);
                                    }
                                    ?>
                                </th>
                            </tr>
                        </thead>
						<thead>
                            <tr>
                                <th colspan="5" style="border-top:1px solid #999999">Expense</th>
                            </tr>
                        </thead>
					     <thead>
                            <tr>
							<th>Date</th>
                                <th>Catagory</th>
								<th>Sub Catagory</th>
								<th>Description</th>
								<th>Amount</th>
                            </tr>
                        </thead>
						 <?php
                            include('connect.php');
							$c=$today1;
							
                            $result = $db->prepare("SELECT * FROM expense where date=:c ORDER BY ex_id");
							$result->bindParam(':c', $c);
                            
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
                                <tr class="record">
                                    <td><?php echo $row['date']; ?></td>
									<td><?php echo $row['catagory_name']; ?></td>
                                    <td><?php echo $row['subcatagory']; ?></td>
									 <td><?php echo $row['description']; ?></td>
									<td><?php echo $row['amount']; ?></td>
                                   
                                    <!--<td><?php
                                        $dsdsd=$row['t_amount'];
                                        echo formatMoney($dsdsd, true);
                                        ?>
                                    </td>-->
                                   
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="4" style="border-top:1px solid #999999"> Total Amount </th>
                                <th colspan="2" style="border-top:1px solid #999999"> 
                                    <?php
                                    function formatMoneye($number, $fractional=false) {
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
                                    $results = $db->prepare("SELECT sum(amount) FROM expense where date=:c ");
									$results->bindParam(':c', $c);
                                
                                    $results->execute();
                                    for($i=0; $rows = $results->fetch(); $i++){
                                        $ex=$rows['sum(amount)'];
                                        echo formatMoneye($ex, true);
                                    }
                                    ?>
                                </th>
                            </tr>
                        </thead>
						
						<thead>
                            <tr>
                                <th colspan="5" style="border-top:1px solid #999999">Bank Tansactions</th>
                            </tr>
                        </thead>
					     <thead>
                            <tr>
							<th>Date</th>
                                <th>Account</th>
								<!--<th>Description</th>-->
								<th>Credit</th>
								<th>Debit</th>
                            </tr>
                        </thead>
						 <?php
                            include('connect.php');
							$c=$today1;
							
                            $result = $db->prepare("SELECT * FROM bankentry where date=:c ORDER BY id");
							$result->bindParam(':c', $c);
                            
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
                                <tr class="record">
                                    <td><?php echo $row['date']; ?></td>
									<td><?php echo $row['account']; ?></td>
									<!--<td><?php echo $row['description']; ?></td>-->
                                    <td><?php echo $row['amount']; ?></td>
									<td colspan="2"><?php echo $row['debit_amount']; ?></td>
                                   
                                    <!--<td><?php
                                        $dsdsd=$row['t_amount'];
                                        echo formatMoney($dsdsd, true);
                                        ?>
                                    </td>-->
                                   
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="4" style="border-top:1px solid #999999"> Total Amount </th>
                                <th colspan="2" style="border-top:1px solid #999999"> 
                                    <?php
                                    function formatMoneyb($number, $fractional=false) {
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
                                    $results = $db->prepare("SELECT sum(balance) FROM bankentry where date=:c ");
									$results->bindParam(':c', $c);
                                   
                                    $results->execute();
                                    for($i=0; $rows = $results->fetch(); $i++){
                                        $bb=$rows['sum(balance)'];
                                        echo formatMoneyb($bb, true);
                                    }
                                    ?>
                                </th>
                            </tr>
                        </thead>


					</table>
					
					<label>Total Expense : </label><input type="text"  style="width: 400px;" class = "form-control" name="texpense" value = "<?php echo $ex; ?>" />
					<label>Total Income : </label><input type="text"  style="width: 400px;" class = "form-control" name="tincome" value = "<?php echo $in; ?>" />
					<?php
					$cbh=$obh+$in-$ex;
					$cbb=$obb+$bb;
					?>
					<label> Balance in Hand : </label><input type="text"  style="width: 400px;" class = "form-control" name="cbh" value = "<?php echo $cbh;?>" />
					<label> Balance in Bank : </label><input type="text"  style="width: 400px;" class = "form-control" name="cbb" value = "<?php echo $cbb;?>" />
					<label>Select a Account</label><br>
					<div style="display:flex; flex-direction: row; justify-content:left; align-items: left">
											<select name="account" style="width: 400px;" class="chzn-select">
											 <?php
											  include('connect.php');
											        $school=$_GET['school'];
													$result = $db->prepare("SELECT * FROM bank");
													$result->bindParam(':userid', $school);
													$result->execute();
													for($i=0; $row = $result->fetch(); $i++){
											  ?>
											  <option><?php echo $row['accno']; ?></option>
											  <?php
											  }
											  ?>
											  </select>&nbsp;&nbsp;
											  <input type="text"  style="width: 200px;" class = "form-control" name="amo" value = "" placeholder="0" />
					
                    </div>
					<br>
					<center><input type="submit" value="Submit" class="btn btn-primary"></center>
                    </form>
					<!--<button onclick="myFunction()" id="btnPrint" class="btn btn-primary btn-m " >
                            Print
                        </button>
						<input type="button" onclick="tableToExcel('dataTables-example')" value="Export to Excel" class="btn btn-primary">-->
                </div>
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
   url: "deletesales.php",
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
	<script>
		  var tableToExcel = (function() {
		  var uri = 'data:application/vnd.ms-excel;base64,'
			, template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
			, base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
			, format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
		  return function(table, name) {
			if (!table.nodeType) table = document.getElementById(table)
			var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
			window.location.href = uri + base64(format(template, ctx))
		  }
		})()
  </script>



</body>

</html>
