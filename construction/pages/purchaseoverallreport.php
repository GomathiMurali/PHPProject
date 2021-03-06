<?php
require_once('auth.php');
include_once('headerpage.php');
?>
<!DOCTYPE html>
<html lang="en">

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
				$from = $_POST['frm'];
				$from1 = date( 'd-m-Y', strtotime( $from) );
				$to = $_POST['too'];
				$to1 = date( 'd-m-Y', strtotime( $to) );
				
				?>


</head>

<body>


    <?php include('navfixed.php');?>    

    <!-- Page Content -->
    <div id="page-wrapper" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Purchase Pending Report <?php echo $from1;?> to <?php echo $to1;?></h2>
                </div>
                <div id="maintable" >
                    <div style="margin-top: -19px; margin-bottom: 21px;">
                    </div>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                       <thead>
                            <tr>
                                <th colspan="2" style="border-top:1px solid #999999">Payable Expense</th>
                            </tr>
                        </thead>
					     <thead>
                            <tr>
                                <th>Supplier</th>
								<th>Pending Amount</th>
                            </tr>
                        </thead>
						<tbody>	
						<!--Mess supplier-->
						 <?php
                            include('connect.php');
							$c=$from1;
							$d=$to1;
							$o='31-03-2018';
							$today1 = date( 'd-m-Y', strtotime($d));
							$day_before = date( 'd-m-Y', strtotime( $today1 . ' -1 day'));
							$dd=$day_before;
							$rk = $db->prepare("SELECT subcatagory FROM mess_supervisor where status!='advance_amount' GROUP BY subcatagory");
							$rk->execute();
							for($i=0; $rks = $rk->fetch(); $i++){
								$subcatagory=$rks['subcatagory'];
									$res = $db->prepare("SELECT subcatagory,sum(amount)-sum(debit_amount) as bal FROM mess_supervisor where STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$o', '%d-%m-%Y') AND STR_TO_DATE('$d', '%d-%m-%Y') and subcatagory='$subcatagory' and status!='advance_amount'");									
									/* $res->bindParam(':e', $e);
									$res->bindParam(':f', $f); */
									$res->execute();
									for($i=0; $ro = $res->fetch(); $i++){
										$kk=$ro['bal'];
										?>
                                <tr class="record">
									<td><?php echo $ro['subcatagory']; ?></td>
                                    <td align="right"><?php
                                        $dsdsd=$kk;
                                        echo formatMoneyp($dsdsd, true);
                                        ?>
                                    </td>
                                   
                                </tr>
                                <?php
								}
							}
                            ?>
						</tbody>	
							<!--Expense supplier-->
					<tbody>	
							<?php
                            include('connect.php');
							$c=$from1;
							$d=$to1;
							$o='31-03-2018';
							$today1 = date( 'd-m-Y', strtotime($d));
							$day_before = date( 'd-m-Y', strtotime( $today1 . ' -1 day'));
							$dd=$day_before;
							$rk = $db->prepare("SELECT subcatagory FROM expensepending GROUP BY subcatagory");
							$rk->execute();
							for($i=0; $rks = $rk->fetch(); $i++){
								$subcatagory=$rks['subcatagory'];
									$res = $db->prepare("SELECT subcatagory,sum(amount)-sum(paidamount) as bal FROM expensepending where STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$o', '%d-%m-%Y') AND STR_TO_DATE('$d', '%d-%m-%Y') and subcatagory='$subcatagory'");									
									
									$res->execute();
									for($i=0; $ro = $res->fetch(); $i++){
										$kk=$ro['bal'];
										?>
                                <tr class="record">
									<td><?php echo $ro['subcatagory']; ?></td>
                                    <td align="right"><?php
                                        $dsdsd=$kk;
                                        echo formatMoneyp($dsdsd, true);
                                        ?>
                                    </td>
                                   
                                </tr>
                                <?php
								}
							}
                            ?>
                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="1" style="border-top:1px solid #999999"> Total Amount </th>
                                <td colspan="1" style="border-top:1px solid #999999" align="right">
                                    <?php
                                    function formatMoneyp($number, $fractional=false) {
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
                                    $results = $db->prepare("SELECT sum(amount)-sum(debit_amount) AS balance FROM mess_supervisor where STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$o', '%d-%m-%Y') AND STR_TO_DATE('$d', '%d-%m-%Y') and status!='advance_amount'");
									$results->bindParam(':c', $c);
                                    $results->bindParam(':d', $d);
                                    $results->execute();
                                    for($i=0; $rows = $results->fetch(); $i++){
                                        $pe=$rows['balance'];
                                        //echo formatMoneyp($pe, true);
                                    }
                                    ?>
									
									<!-- expense supplier total-->
									
									 <?php
                                    $results = $db->prepare("SELECT sum(amount)-sum(paidamount) AS balance FROM expensepending where STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$o', '%d-%m-%Y') AND STR_TO_DATE('$d', '%d-%m-%Y')");
									$results->bindParam(':c', $c);
                                    $results->bindParam(':d', $d);
                                    $results->execute();
                                    for($i=0; $rows = $results->fetch(); $i++){
                                        $ww=$rows['balance']+$pe;
                                        echo formatMoneyp($ww, true);
                                    }
                                    ?>
                                </td>
                            </tr>
                        </thead>
						</table>

                    
					<button onclick="myFunction()" id="btnPrint" class="btn btn-primary btn-m " >
                            Print
                        </button>
						<input type="button" onclick="tableToExcel('dataTables-example')" value="Export to Excel" class="btn btn-primary">
                </div>
            </div>
            <script src="js/jquery.js"></script>

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
