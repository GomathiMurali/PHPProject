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
				$from = $_POST['fromdate'];
				$from1 = date( 'd-m-Y', strtotime( $from) );
				$to = $_POST['todate'];
				$to1 = date( 'd-m-Y', strtotime( $to) );
				$name = $_POST['name'];
				$subname = $_POST['subname'];
				
				?>


</head>

<body>


    <?php include('navfixed.php');?>    

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header"><?php echo $name;?> Report <?php echo $from1;?> to <?php echo $to1;?></h2>
                </div>
                <div id="maintable" >
                    <div style="margin-top: -19px; margin-bottom: 21px;">
                    </div>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" >
                        <thead>
                            <tr>
                                <th > Catagory</th>
                                <th > Supplier </th>
                                <th> Date</th>
								<th > Description</th>
								<th > Transaction Type</th>
								<th > Bank Name</th>
								 <th > Credit</th>
                                <th > Debit</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            include('connect.php');
                            $c=$from1;
							$d=$to1;
							$e=$name;
							$f=$subname;
                            $result = $db->prepare("SELECT * FROM expensepending where catagory_name = :e AND subcatagory= :f AND STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$c', '%d-%m-%Y') AND STR_TO_DATE('$d', '%d-%m-%Y') ORDER BY pending_id");
							
							$result->bindParam(':e', $e);
							$result->bindParam(':f', $f);
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
                                <tr class="record">
									<td><?php echo $row['catagory']; ?></td>
									<td><?php echo $row['subcatagory']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
									 <td><?php echo $row['trans']; ?></td>
									 <td><?php echo $row['bank']; ?></td>
									  <td><?php echo $row['amount']; ?></td>
									 <td><?php echo $row['paidamount']; ?></td>
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="7" style="border-top:1px solid #999999"> Remaining Amount to Pay</th>
                                <th colspan="4" style="border-top:1px solid #999999"> 
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
									$o='31-03-2018';
									$today1 = date( 'd-m-Y', strtotime($c));
									$day_before = date( 'd-m-Y', strtotime( $today1 . ' -1 day'));
									$dd=$day_before;
                                    $results = $db->prepare("SELECT sum(amount)-sum(paidamount) as bal FROM expensepending where catagory_name = :e AND subcatagory= :f AND STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$o', '%d-%m-%Y') AND STR_TO_DATE('$d', '%d-%m-%Y')");									
									$results->bindParam(':e', $e);
									$results->bindParam(':f', $f);
                                    $results->execute();
                                    for($i=0; $rows = $results->fetch(); $i++){
                                        $dsdsd=$rows['bal'];
                                        echo formatMoney($dsdsd, true);
                                    }
                                    ?>
                                </th>
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
