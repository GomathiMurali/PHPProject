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
				$from = $_POST['fromdate'];
				$from1 = date( 'd-m-Y', strtotime( $from) );
				$to = $_POST['todate'];
				$to1 = date( 'd-m-Y', strtotime( $to) );
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
                    <h2 class="page-header">Hostel Fee Book</h2>
                </div>
                <div id="maintable" >
                    <div style="margin-top: -19px; margin-bottom: 21px;">
                    </div>
					<form action="savehostelfeebook.php" method="post" class = "form-group">
					<label>Year: </label><input type="text"  style="width: 400px;" class = "form-control" name="year"/>
					<?php
					include('connect.php');
											        
													$result = $db->prepare("SELECT * FROM hostelfee ORDER BY id DESC LIMIT 1");
													
													$result->execute();
													for($i=0; $row = $result->fetch(); $i++){
											  
					?><?php $omt1 = $row['malarterm1'];$omt2 = $row['malarterm2'];$oct1 = $row['cbseterm1'];$oct2 = $row['cbseterm2'];$okt1 = $row['kidzterm1'];$okt2 = $row['kidzterm2']; ?>
					<?php
													}?>
					<label>Opening Pending balance for Malar Term-I : </label><input type="text"  style="width: 400px;" class = "form-control" name="omt1" value = "<?php echo $omt1; ?>" />
					<label>Opening Pending balance for Malar Term-II : </label><input type="text"  style="width: 400px;" class = "form-control" name="omt2" value = "<?php echo $omt2; ?>" />
					<label>Opening Pending balance for CBSE Term-I : </label><input type="text"  style="width: 400px;" class = "form-control" name="oct1" value = "<?php echo $oct1; ?>" />
					<label>Opening Pending balance for CBSE Term-II : </label><input type="text"  style="width: 400px;" class = "form-control" name="oct2" value = "<?php echo $oct2; ?>" />
					<label>Opening Pending balance for Kidz Term-I : </label><input type="text"  style="width: 400px;" class = "form-control" name="okt1" value = "<?php echo $okt1; ?>" />
					<label>Opening Pending balance for Kidz Term-II : </label><input type="text"  style="width: 400px;" class = "form-control" name="okt2" value = "<?php echo $okt2; ?>" />
					<?php
					include('connect.php');
											        
												    $c=$from1;
													$d=$to1;
													$result = $db->prepare("SELECT sum(amount) FROM income where catagory_name='Hostel Fee Receipt' AND date BETWEEN :c AND :d AND subcatagory='Malar Term-I' ");
													$result->bindParam(':c', $c);
													$result->bindParam(':d', $d);
													$result->execute();
													for($i=0; $row = $result->fetch(); $i++){
													 $comt1=$row['sum(amount)'];
											  
					
													}?>
					
					
					<label>Collection of Malar Term-I : </label><input type="text"  style="width: 400px;" class = "form-control" name="comt1" value = "<?php echo $comt1; ?>" />
					
					<?php
					include('connect.php');
											        $c=$from1;
													$d=$to1;
													$result = $db->prepare("SELECT sum(amount) FROM income where catagory_name='Hostel Fee Receipt' AND date BETWEEN :c AND :d AND subcatagory='Malar Term-II' ");
													$result->bindParam(':c', $c);
													$result->bindParam(':d', $d);
													$result->execute();
													for($i=0; $row = $result->fetch(); $i++){
														$comt2 = $row['sum(amount)'];
					
													}?>
					
					
					<label>Collection of Malar Term-II : </label><input type="text"  style="width: 400px;" class = "form-control" name="comt2" value = "<?php echo $comt2; ?>" />
					
					<?php
					include('connect.php');
											        $c=$from1;
													$d=$to1;
													$result = $db->prepare("SELECT sum(amount) FROM income where catagory_name='Hostel Fee Receipt' AND date BETWEEN :c AND :d AND subcatagory='CBSE Term-I' ");
													$result->bindParam(':c', $c);
													$result->bindParam(':d', $d);
													$result->execute();
													for($i=0; $row = $result->fetch(); $i++){
															$coct1 = $row['sum(amount)'];
					
													}?>
					
					
					<label>Collection of CBSE Term-I : </label><input type="text"  style="width: 400px;" class = "form-control" name="coct1" value = "<?php echo $coct1; ?>" />
					
					<?php
					include('connect.php');
											        $c=$from1;
													$d=$to1;
													$result = $db->prepare("SELECT sum(amount) FROM income where catagory_name='Hostel Fee Receipt' AND date BETWEEN :c AND :d AND subcatagory='CBSE Term-II' ");
													$result->bindParam(':c', $c);
													$result->bindParam(':d', $d);
													$result->execute();
													for($i=0; $row = $result->fetch(); $i++){
														$coct2 = $row['sum(amount)'];
					
													}?>
					
					
					<label>Collection of CBSE Term-II : </label><input type="text"  style="width: 400px;" class = "form-control" name="coct2" value = "<?php echo $coct2; ?>" />
					
					<?php
					include('connect.php');
											        $c=$from1;
													$d=$to1;
													$result = $db->prepare("SELECT sum(amount) FROM income where catagory_name='Hostel Fee Receipt' AND date BETWEEN :c AND :d AND subcatagory='Kidz Term-I' ");
													$result->bindParam(':c', $c);
													$result->bindParam(':d', $d);
													$result->execute();
													for($i=0; $row = $result->fetch(); $i++){
														$cokt1 = $row['sum(amount)'];
					
													}?>
					
					
					<label>Collection of Kidz Term-I : </label><input type="text"  style="width: 400px;" class = "form-control" name="cokt1" value = "<?php echo $cokt1; ?>" />
					
					<?php
					include('connect.php');
											        $c=$from1;
													$d=$to1;
													$result = $db->prepare("SELECT sum(amount) FROM income where catagory_name='Hostel Fee Receipt' AND date BETWEEN :c AND :d AND subcatagory='Kidz Term-II' ");
													$result->bindParam(':c', $c);
													$result->bindParam(':d', $d);
													$result->execute();
													for($i=0; $row = $result->fetch(); $i++){
														$cokt2 = $row['sum(amount)'];
					
													}?>
					
					
					<label>Collection of Kidz Term-II : </label><input type="text"  style="width: 400px;" class = "form-control" name="cokt2" value = "<?php echo $cokt2; ?>" />
					
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
