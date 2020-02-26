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
				 $from1 = date("d-m-Y", strtotime($from) );
				 $to = $_POST['todate'];
				 $to1 = date("d-m-Y", strtotime($to) );
				 $day_before = date( 'd-m-Y', strtotime( $from1 . ' -1 day' ) );
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
                    <h2 class="page-header">Fee Report <?php echo $from1;?> to <?php echo $to1;?></h2>
                </div>
                <div id="maintable" >
                    <div style="margin-top: -19px; margin-bottom: 21px;">
                    </div>
					<table width="100%" id="dataTables-example" class="table table-striped table-bordered table-hover"border="1"><thead>
					<tr bgcolor=" #85C1E9 ">
					<th colspan="8"><h4>Date:&nbsp;&nbsp;<?php echo $from1;?>&nbsp;&nbsp;to&nbsp;&nbsp;<?php echo $to1;?></h4></th></tr></thead>
					
						
						
                        <thead>
                            <tr>
                                <th colspan="8" style="border-top:1px solid #999999">Opening Pending Balance for School Fee</th>
                            </tr>
                        </thead>
					     <thead>
                        <tr>
                            <th>Year </th>
							
							<th>Malar Term-I </th>
							<th>Malar Term-II </th>
							<th>CBSE Term-I </th>
							<th>CBSE Term-II </th>
							<th>Kidz Term-I </th>
							<th>Kidz Term-II </th>
							
                           
                            
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include('connect.php');
                        $result = $db->prepare("SELECT * FROM schoolfee ORDER BY id DESC LIMIT 1,1");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record">
                                <td><?php echo $row['year']; ?></td>
								
								<td><?php echo $row['malarterm1']; ?></td>
								<td><?php echo $row['malarterm2']; ?></td>
								<td><?php echo $row['cbseterm1']; ?></td>
								<td><?php echo $row['cbseterm2']; ?></td>
								<td><?php echo $row['kidzterm1']; ?></td>
								<td><?php echo $row['kidzterm2']; ?></td>
                               
                               
                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
					
					<thead>
                            <tr>
                                <th colspan="8" style="border-top:1px solid #999999">Opening Pending Balance for Hostel Fee</th>
                            </tr>
                        </thead>
					     <thead>
                        <tr>
                            <th>Year </th>
							
							<th>Malar Term-I </th>
							<th>Malar Term-II </th>
							<th>CBSE Term-I </th>
							<th>CBSE Term-II </th>
							<th>Kidz Term-I </th>
							<th>Kidz Term-II </th>
							
                           
                            
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include('connect.php');
                        $result = $db->prepare("SELECT * FROM hostelfee ORDER BY id DESC LIMIT 1,1");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record">
                                <td><?php echo $row['year']; ?></td>
								
								<td><?php echo $row['malarterm1']; ?></td>
								<td><?php echo $row['malarterm2']; ?></td>
								<td><?php echo $row['cbseterm1']; ?></td>
								<td><?php echo $row['cbseterm2']; ?></td>
								<td><?php echo $row['kidzterm1']; ?></td>
								<td><?php echo $row['kidzterm2']; ?></td>
                               
                                
                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
					<thead>
                            <tr>
                                <th colspan="8" style="border-top:1px solid #999999">Opening Pending Balance for Van Fee</th>
                            </tr>
                        </thead>
					     <thead>
                        <tr>
                            <th>Year </th>
							
							<th>Malar Term-I </th>
							<th>Malar Term-II </th>
							<th>CBSE Term-I </th>
							<th>CBSE Term-II </th>
							<th>Kidz Term-I </th>
							<th>Kidz Term-II </th>
							
                           
                           
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include('connect.php');
                        $result = $db->prepare("SELECT * FROM vanfee ORDER BY id DESC LIMIT 1,1");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record">
                                <td><?php echo $row['year']; ?></td>
								
								<td><?php echo $row['malarterm1']; ?></td>
								<td><?php echo $row['malarterm2']; ?></td>
								<td><?php echo $row['cbseterm1']; ?></td>
								<td><?php echo $row['cbseterm2']; ?></td>
								<td><?php echo $row['kidzterm1']; ?></td>
								<td><?php echo $row['kidzterm2']; ?></td>
                               
                               
                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
					<thead>
					<tr bgcolor=" #85C1E9 ">
					<th colspan="8"><h4><b>Closing Balance</b></h4></th></tr></thead>
					
					 <thead>
                            <tr>
                                <th colspan="8" style="border-top:1px solid #999999">Total Pending Balance for School Fee</th>
                            </tr>
                        </thead>
					     <thead>
                        <tr>
                            <th>Year </th>
							
							<th>Malar Term-I </th>
							<th>Malar Term-II </th>
							<th>CBSE Term-I </th>
							<th>CBSE Term-II </th>
							<th>Kidz Term-I </th>
							<th>Kidz Term-II </th>
							
                           
                            
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include('connect.php');
                        $result = $db->prepare("SELECT * FROM schoolfee ORDER BY id DESC LIMIT 1,1");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record">
                                <td><?php echo $row['year']; ?></td>
								
								<td><?php echo $row['malarterm1']; ?></td>
								<td><?php echo $row['malarterm2']; ?></td>
								<td><?php echo $row['cbseterm1']; ?></td>
								<td><?php echo $row['cbseterm2']; ?></td>
								<td><?php echo $row['kidzterm1']; ?></td>
								<td><?php echo $row['kidzterm2']; ?></td>
                               
                               
                            </tr>
                            <?php
                        }
                        ?>
						
						 <?php
                        include('connect.php');
						$a='Collection';
                        $result = $db->prepare("SELECT * FROM schoolfee ORDER BY id DESC LIMIT 1");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record">
                                <td><b><?php echo $a; ?><b></td>
								
								<td><?php echo $row['comt1']; ?></td>
								<td><?php echo $row['comt2']; ?></td>
								<td><?php echo $row['coct1']; ?></td>
								<td><?php echo $row['coct2']; ?></td>
								<td><?php echo $row['cokt1']; ?></td>
								<td><?php echo $row['cokt2']; ?></td>
                               
                               
                            </tr>
                            <?php
                        }
                        ?>
						<?php
                        include('connect.php');
						$a='Balance';
                        $result = $db->prepare("SELECT * FROM schoolfee ORDER BY id DESC LIMIT 1");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record">
                                <td><b><?php echo $a; ?><b></td>
								
								<td><?php echo $row['malarterm1']; ?></td>
								<td><?php echo $row['malarterm2']; ?></td>
								<td><?php echo $row['cbseterm1']; ?></td>
								<td><?php echo $row['cbseterm2']; ?></td>
								<td><?php echo $row['kidzterm1']; ?></td>
								<td><?php echo $row['kidzterm2']; ?></td>
                               
                               
                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
					
					<thead>
                            <tr>
                                <th colspan="8" style="border-top:1px solid #999999">Total Pending Balance for Hostel Fee</th>
                            </tr>
                        </thead>
					     <thead>
                        <tr>
                            <th>Year </th>
							
							<th>Malar Term-I </th>
							<th>Malar Term-II </th>
							<th>CBSE Term-I </th>
							<th>CBSE Term-II </th>
							<th>Kidz Term-I </th>
							<th>Kidz Term-II </th>
							
                           
                            
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include('connect.php');
                        $result = $db->prepare("SELECT * FROM hostelfee ORDER BY id DESC LIMIT 1,1");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record">
                                <td><?php echo $row['year']; ?></td>
								
								<td><?php echo $row['malarterm1']; ?></td>
								<td><?php echo $row['malarterm2']; ?></td>
								<td><?php echo $row['cbseterm1']; ?></td>
								<td><?php echo $row['cbseterm2']; ?></td>
								<td><?php echo $row['kidzterm1']; ?></td>
								<td><?php echo $row['kidzterm2']; ?></td>
                               
                                
                            </tr>
                            <?php
                        }
                        ?>
						 <?php
                        include('connect.php');
						$a='Collection';
                        $result = $db->prepare("SELECT * FROM hostelfee ORDER BY id DESC LIMIT 1");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record">
                                <td><b><?php echo $a; ?><b></td>
								
								<td><?php echo $row['comt1']; ?></td>
								<td><?php echo $row['comt2']; ?></td>
								<td><?php echo $row['coct1']; ?></td>
								<td><?php echo $row['coct2']; ?></td>
								<td><?php echo $row['cokt1']; ?></td>
								<td><?php echo $row['cokt2']; ?></td>
                               
                               
                            </tr>
                            <?php
                        }
                        ?>
						<?php
                        include('connect.php');
						$a='Balance';
                        $result = $db->prepare("SELECT * FROM hostelfee ORDER BY id DESC LIMIT 1");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record">
                                <td><b><?php echo $a; ?><b></td>
								
								<td><?php echo $row['malarterm1']; ?></td>
								<td><?php echo $row['malarterm2']; ?></td>
								<td><?php echo $row['cbseterm1']; ?></td>
								<td><?php echo $row['cbseterm2']; ?></td>
								<td><?php echo $row['kidzterm1']; ?></td>
								<td><?php echo $row['kidzterm2']; ?></td>
                               
                               
                            </tr>
                            <?php
                        }
                        ?>


                    </tbody>
					<thead>
                            <tr>
                                <th colspan="8" style="border-top:1px solid #999999">Total Pending Balance for Van Fee</th>
                            </tr>
                        </thead>
					     <thead>
                        <tr>
                            <th>Year </th>
							
							<th>Malar Term-I </th>
							<th>Malar Term-II </th>
							<th>CBSE Term-I </th>
							<th>CBSE Term-II </th>
							<th>Kidz Term-I </th>
							<th>Kidz Term-II </th>
							
                           
                           
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include('connect.php');
                        $result = $db->prepare("SELECT * FROM vanfee ORDER BY id DESC LIMIT 1,1");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record">
                                <td><?php echo $row['year']; ?></td>
								
								<td><?php echo $row['malarterm1']; ?></td>
								<td><?php echo $row['malarterm2']; ?></td>
								<td><?php echo $row['cbseterm1']; ?></td>
								<td><?php echo $row['cbseterm2']; ?></td>
								<td><?php echo $row['kidzterm1']; ?></td>
								<td><?php echo $row['kidzterm2']; ?></td>
                               
                               
                            </tr>
                            <?php
                        }
                        ?>
						 <?php
                        include('connect.php');
						$a='Collection';
                        $result = $db->prepare("SELECT * FROM vanfee ORDER BY id DESC LIMIT 1");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record">
                                <td><b><?php echo $a; ?><b></td>
								
								<td><?php echo $row['comt1']; ?></td>
								<td><?php echo $row['comt2']; ?></td>
								<td><?php echo $row['coct1']; ?></td>
								<td><?php echo $row['coct2']; ?></td>
								<td><?php echo $row['cokt1']; ?></td>
								<td><?php echo $row['cokt2']; ?></td>
                               
                               
                            </tr>
                            <?php
                        }
                        ?>
						<?php
                        include('connect.php');
						$a='Balance';
                        $result = $db->prepare("SELECT * FROM vanfee ORDER BY id DESC LIMIT 1");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record">
                                <td><b><?php echo $a; ?><b></td>
								
								<td><?php echo $row['malarterm1']; ?></td>
								<td><?php echo $row['malarterm2']; ?></td>
								<td><?php echo $row['cbseterm1']; ?></td>
								<td><?php echo $row['cbseterm2']; ?></td>
								<td><?php echo $row['kidzterm1']; ?></td>
								<td><?php echo $row['kidzterm2']; ?></td>
                               
                               
                            </tr>
                            <?php
                        }
                        ?>


                    </tbody>
                        
						
					
					
					
					
					</table>
					
					
<br>
<br>
<br>
<!--<h5 align="right">Authorized Signature</h5>-->
                    
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

<!--<script>
                function myFunction() {
               #dataTables-example.print();
           }
            </script>-->
			<script>
    function myFunction()
{
   var divToPrint=document.getElementById("dataTables-example");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})
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
