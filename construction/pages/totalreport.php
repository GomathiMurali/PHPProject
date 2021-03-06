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
				$to = $_POST['todate'];
				?>


</head>

<body>


    <?php include('navfixed.php');?>    

    <!-- Page Content -->
    <div id="page-wrapper" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Total Report <?php echo $from;?> to <?php echo $to;?></h2>
                </div>
                <div id="maintable" >
                    <div style="margin-top: -19px; margin-bottom: 21px;">
                    </div>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <!--<th > ID </th>-->
                                <th > Catagory</th>
                                <!--<th > Customer Name </th>-->
                                <!--<th > Date</th>
								<th > Description</th>-->
                 
                                <th > Amount</th>
                                
                               <!-- <th > Action </th>-->
                            </tr>
                        </thead>
                       

                           
                        
                        
                            <tr>
                                <th colspan="1" style="border-top:1px solid #999999"><b> Expense Amount</b> </th>
                                <th colspan="1" style="border-top:1px solid #999999"> 
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
									$c=$from;
							        $d=$to;
                                    $results = $db->prepare("SELECT sum(amount) FROM expense where date BETWEEN :c AND :d ");
									$results->bindParam(':c', $c);
                                    $results->bindParam(':d', $d);
                                    $results->execute();
                                    for($i=0; $rows = $results->fetch(); $i++){
                                        $dsdsd=$rows['sum(amount)'];
                                        echo formatMoney($dsdsd, true);
                                    }
                                    ?>
                                </th>
                            </tr>
                        
                            <tr>
                                <th colspan="1" style="border-top:1px solid #999999"> <b>Income Amount</b> </th>
                                <th colspan="1" style="border-top:1px solid #999999"> 
                                    <?php
                                    function formatMoney1($number, $fractional=false) {
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
									$c=$from;
							        $d=$to;
                                    $resultss = $db->prepare("SELECT sum(amount) FROM income where date BETWEEN :c AND :d ");
									$resultss->bindParam(':c', $c);
                                    $resultss->bindParam(':d', $d);
                                    $resultss->execute();
                                    for($i=0; $rows = $resultss->fetch(); $i++){
                                        $dsdsds=$rows['sum(amount)'];
                                        echo formatMoney1($dsdsds, true);
                                    }
                                    ?>
                                </th>
                            </tr>
                        
						<thead>
                            <tr>
                                <th colspan="1" style="border-top:1px solid #999999"> Purchase Amount </th>
                                <th colspan="1" style="border-top:1px solid #999999"> 
                                    <?php
                                    function formatMoney2($number, $fractional=false) {
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
									$c=$from;
							        $d=$to;
                                    $resultsss = $db->prepare("SELECT sum(total_amount) FROM purchases_item where date BETWEEN :c AND :d");
									$resultsss->bindParam(':c', $c);
									$resultsss->bindParam(':d', $d);
                                    $resultsss->execute();
                                    for($i=0; $rows = $resultsss->fetch(); $i++){
                                        $dsdsdss=$rows['sum(total_amount)'];
                                        echo formatMoney2($dsdsdss, true);
                                    }
                                    ?>
                                </th>
                            </tr>
                        </thead>
						<thead>
                            <tr>
                                <th colspan="1" style="border-top:1px solid #999999"> Sales Amount </th>
                                <th colspan="1" style="border-top:1px solid #999999"> 
                                    <?php
                                    function formatMoney3($number, $fractional=false) {
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
									$c=$from;
							        $d=$to;
                                    $resultssss = $db->prepare("SELECT sum(total_amount) FROM sales where date BETWEEN :c AND :d");
                                    $resultssss->bindParam(':c', $c);
									$resultssss->bindParam(':d', $d);
                                    $resultssss->execute();
                                    for($i=0; $rows = $resultssss->fetch(); $i++){
                                        $dsdsdsss=$rows['sum(total_amount)'];
                                        echo formatMoney3($dsdsdsss, true);
                                    }
                                    ?>
                                </th>
                            </tr>
                        </thead>
						<thead>
                            <tr>
                                <th colspan="1" style="border-top:1px solid #999999"><font style="color:green"> Credit Amount </th>
                                <th colspan="1" style="border-top:1px solid #999999"> 
                                    <?php
		
                                        $ca=$dsdsds+$dsdsdsss;
                                        echo"<font style = 'color:green;'>" .formatMoney($ca, true);
                                    
                                    ?>
                                </th>
                            </tr>
                        </thead>
						<thead>
                            <tr>
                                <th colspan="1" style="border-top:1px solid #999999"><font style="color:blue"> Debit Amount </th>
                                <th colspan="1" style="border-top:1px solid #999999"> 
                                    <?php
                                    
		
                                        $da=$dsdsd+$dsdsdss;
                                        echo"<font style = 'color:blue;'>".formatMoney($da, true);
                                    
                                    ?>
                                </th>
                            </tr>
                        </thead>
						<thead>
                            <tr>
                                <th colspan="1" style="border-top:1px solid #999999"><font style="color:red"> Balance Amount </th>
                                <th colspan="1" style="border-top:1px solid #999999"> 
                                    <?php
                                    
                                        $ba=$ca-$da;
                                        echo "<font style = 'color:red;'>" .formatMoney($ba, true);
                                    
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
