<?php include('auth.php');
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


    <?php include('navfixed.php');?>    
	<?php  
		$frmm = $_GET["frm"];
		$o='31-03-2018';
		$today1 = date( 'd-m-Y', strtotime( $frmm) );
	    $day_before = date( 'd-m-Y', strtotime( $today1 . ' -1 day' ) );
		///$tom = $_GET["too"];			
		$from 	= date('d-m-Y', strtotime($frmm));
		//$to 	= date('d-m-Y', strtotime($tom));
				
	?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Mess Supervisor Report</h2>
                </div>
			    <h4>&nbsp;&nbsp;&nbsp;<b>Opening Balance:
					<?php
						 $rk = $db->prepare("SELECT sum(amount) as balance FROM mess_supervisor where STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$o', '%d-%m-%Y') AND STR_TO_DATE('$day_before', '%d-%m-%Y') and status='advance_amount'");
                                    $rk->execute();
                                    for($i=0; $rr = $rk->fetch(); $i++){
                                        $opening_amt=$rr['balance'];
                                        //echo formatMoney($opening_amt, true);
                                    }
						 $results = $db->prepare("SELECT sum(debit_amount) as balance FROM mess_supervisor where STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$o', '%d-%m-%Y') AND STR_TO_DATE('$day_before', '%d-%m-%Y') and status!='advance_amount'");
                                    $results->execute();
                                    for($i=0; $rows = $results->fetch(); $i++){
                                        $op=$opening_amt-$rows['balance'];
                                        echo formatMoney($op, true);
                                    }
					?></b>
				</h4>
                <table width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                             <th>Catagory Name</th>
							<th>Date</th>
							<th>Sub Catagory</th>
							<th>Description</th>
							<th>Status </th>
							<th>Credit</th>
							<th>Debit</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include('connect.php');
                        $result = $db->prepare("SELECT * FROM mess_supervisor where date='$today1' and status!='advance_amount' ORDER BY id asc");
                        $result->execute();
						 $balance = 0;
                        for($i=0; $row = $result->fetch(); $i++){
							$mess_id=$row['mess_id'];
                            ?>
                            <tr class="record">
                                <td><?php echo $row['catagory']; ?></td>
								<td><?php echo $row['date']; ?></td>
								<td><?php echo $row['subcatagory']; ?></td>
								<td><?php echo $row['description']; ?></td>
								<td><?php echo $row['status']; ?></td>
								<!--<td><?php echo $row['trans']; ?></td>
								<td><?php echo $row['bank']; ?></td>-->
								<td><?php echo $row['amount']; ?></td>
								<td><?php echo $row['debit_amount']; ?></td>
                                
                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
					<thead>
                            <tr>
                                <th colspan="5" style="border-top:1px solid #999999"> Total Amount </th>
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
                                    $results = $db->prepare("SELECT sum(amount) as balance FROM mess_supervisor where date='$today1' and status!='advance_amount'");
                                    $results->execute();
                                    for($i=0; $rows = $results->fetch(); $i++){
                                        $dsdsd=$rows['balance'];
                                        echo formatMoney($dsdsd, true);
                                    }
                                    ?>
                                </th>
								 <th colspan="1" style="border-top:1px solid #999999"> 
                                    <?php
                                    $results = $db->prepare("SELECT sum(debit_amount) as balance FROM mess_supervisor where date='$today1' and status!='advance_amount'");
                                    $results->execute();
                                    for($i=0; $rows = $results->fetch(); $i++){
                                        $dsdsd=$rows['balance'];
                                        echo formatMoney($dsdsd, true);
                                    }
                                    ?>
                                </th>
								
                            </tr>
							<tr>
                                <th colspan="5" style="border-top:1px solid #999999"> Closing Balance </th>
                                <th colspan="2" style="border-top:1px solid #999999"> 
									<?php $tt = $db->prepare("SELECT sum(amount) as balance FROM mess_supervisor where date='$today1' and status='advance_amount'");
                                    $tt->execute();
                                    for($i=0; $kk = $tt->fetch(); $i++){
                                        $ff=$kk['balance'];
                                    }
                                    ?>
									<?php
                                    $results = $db->prepare("SELECT sum(debit_amount) as balance FROM mess_supervisor where date='$today1' and status!='advance_amount'");
                                    $results->execute();
                                    for($i=0; $rows = $results->fetch(); $i++){
                                        $dsdsd=$ff-$rows['balance'];
										$cls=$dsdsd+$op;
                                        echo formatMoney($cls, true);
                                    }
                                    ?>
                                </th>
                            </tr>
                        </thead>
                </table>
                <div class="clearfix"></div>
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
<script>
		var r_array = [];
		var count_row = 0;
		/*$.validator.setDefaults({
		submitHandler: function() { alert("submitted!"); }
		});*/
		
		function acc_delete(row_c)
		{
		//alert(row_c);
		$('#partsdetail tr#row_' + row_c + '').remove();
		//$('#partsaddrow').val(row_c - 1);
		var partrow = document.getElementById("partsaddrow").value;
		partrow = parseInt(partrow);
		partrow = partrow - 1;
		$('#partsaddrow').val(partrow);

		r_array[row_c] ='d';
		//alert(r_array.join());
		$('#row_count').val(r_array.join());
		//alert(row_c);
		tot_bill_amt_calc(row_c);
		}
</script>	
<script type="text/javascript">
		
	document.getElementById("lab_add").addEventListener("click", function()
		{
			//		alert ("OK Success");
			var rowCount = count_row;

			r_array.push(rowCount);


			$('#row_count').val(r_array.join());

			var ad = "add";

			document.getElementById('partsaddrow').value = rowCount;
			$('#partsdetail tr').last().before("<tr class='warning' id='row_"+rowCount+"'><td style='width: 95%;' ><input type='hidden' name='h_acsid_[]' id='h_acsid_"+rowCount+"'> <input type='file' name='bill_file"+rowCount+"' id='bill_file"+rowCount+"'  placeholder='Choose File Here' class='form-control input-md' autocomplete='off' style='border: none;border: 1px solid #33ccff;width:100%;'  />  </td> <td> <input type='button' class='btn btn-danger btn-small active'  id='delete_" + rowCount+"'  name='delete_[]'  value='x' onClick='acc_delete(\""+rowCount+"\");' style=' margin-right: -48px;'/></td> </tr>");
			$('#partsaddrow').val(rowCount);
			//alert(rowCount);
			count_row = count_row+1;
			
		});
</script>

</body>

</html>
