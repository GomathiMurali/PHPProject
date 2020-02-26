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
                    <h2 class="page-header">Total Report <?php echo $from1;?> to <?php echo $to1;?></h2>
                </div>
                <div id="maintable" >
                    <div style="margin-top: -19px; margin-bottom: 21px;">
                    </div>
					<table id="dataTables-example" border="1"><thead>
				    <!--<tr bgcolor=" #85C1E9 ">-->
					<th colspan="4"><h4><center>From&nbsp;&nbsp;<?php echo $from1;?>&nbsp;To&nbsp;&nbsp;<?php echo $to1;?> &nbsp;&nbsp;Receipts And Payments Detail</center></h4></th></tr></thead>
					
					<?php
                            include('connect.php');
							$i=$day_before;
							$n='31-03-2018';
                            $result = $db->prepare("SELECT sum(amount) FROM income WHERE STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$n', '%d-%m-%Y') AND STR_TO_DATE('$i', '%d-%m-%Y') and trans='Cash' ");
						
                            
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
								<?php $obi = $row['sum(amount)']; ?>
                                
                                <?php
                            }
                            ?>
					<?php
                            include('connect.php');
							$e=$day_before;
							$x='31-03-2018';
                            $result = $db->prepare("SELECT sum(amount) FROM expense WHERE STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$x','%d-%m-%Y') AND STR_TO_DATE('$e', '%d-%m-%Y') and trans='Cash'");
						
                            
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
								<?php $obe = $row['sum(amount)']; ?>
                                
                                <?php
                            }
                            ?>
							<?php $obh=$obi-$obe; ?>
					<?php
					include('connect.php');
													$z='31-03-2018';
											        $y=$day_before;
													$result = $db->prepare("SELECT sum(balance) FROM bankentry WHERE STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$z', '%d-%m-%Y') AND STR_TO_DATE('$y', '%d-%m-%Y')");
													
													$result->execute();
													for($i=0; $row = $result->fetch(); $i++){
											  
					?><?php $obb = $row['sum(balance)']; ?>
					<?php
													}?>
							<?php $ob=$obh+$obb; ?>
					<!--<thead>	
                    <tr bgcolor=" #AF756k">					
					<th colspan="4"><h4>Opening balance:&nbsp;&nbsp;<?php echo formatMoney($ob,true);?></h4></th></tr>
					</thead>-->
					<!--<thead>
					<tr bgcolor=" #82E0AA ">
					<th colspan="4"><h4>Opening balance in hand:&nbsp;&nbsp;<?php echo formatMoney($obh,true);?></h4></th></tr>
					</thead>-->
					<!--<thead>
					<tr bgcolor=" #AF7AC5">
					<th colspan="4"><h4>Opening balance in bank:&nbsp;&nbsp;<?php echo formatMoney($obb,true);?></h4></th></tr></thead>-->
				
						<td valign="top">
						<div align="left">
						<table width="100%" class="table table-striped"  id="dataTables-example" border="">
						<thead>
                            <tr>
                                <th>Opening Balance</th>
								<th><?php echo formatMoney($ob,true);?></th>
                            </tr>
                        </thead>
						<thead>
                            <tr>
                                <th>Cash Balance</th>
								<th></th>
								<th><?php echo formatMoney($obh,true);?></th>
                            </tr>
                        </thead>
						<thead>
                            <tr>
                                <th>Bank Balance</th>
								<th><?php echo formatMoney($obb,true);?></th>
								<th></th>
                            </tr>
                        </thead>
					     <thead>
                            
                        </thead>
						 <?php
                            include('connect.php');
							$g='31-03-2018';
							$h=$day_before;
							
                            $result = $db->prepare("SELECT account,sum(balance) FROM bankentry WHERE STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$g', '%d-%m-%Y') AND STR_TO_DATE('$h', '%d-%m-%Y')GROUP BY account");
							$result->bindParam(':c', $g);
                            $result->bindParam(':d', $h);
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
                                <tr class="record">
                                    <td ><?php echo $row['account']; ?></td>
									
									<td> </td>
                                   
                                    <td align="right"><?php
                                        $dsdsd=$row['sum(balance)'];
                                        echo formatMoney($dsdsd, true);
                                        ?>
                                    </td>
									
                                   
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="2" style="border-top:1px solid #999999">Income</th>
                            </tr>
                        </thead>
					     <thead>
                            <tr>
							
                                <th>Catagory</th>
								<th>Sub Catagory</th>
								<th>Amount</th>
                            </tr>
                        </thead>
						 <?php
                            include('connect.php');
							$c=$from1;
							$d=$to1;
							$res = $db->prepare("SELECT catagory_name,sum(amount) FROM income WHERE STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$c', '%d-%m-%Y') AND STR_TO_DATE('$d', '%d-%m-%Y') and trans='Cash' or subcatagory='Cash Withdrawal'  GROUP BY catagory_name");
							$res->bindParam(':c', $c);
                            $res->bindParam(':d', $d);
							$res->execute();
							for($i=0; $row = $res->fetch(); $i++){
                                ?>
                                <tr class="record">
                                    
									<td><?php echo $row['catagory_name']; ?></td>
									
                                    <td align="right"><b><?php
                                        $dsdsd=$row['sum(amount)'];
                                        echo formatMoney($dsdsd, true);
                                        ?></b>
                                    </td>
                                   
                                </tr>
								
						   <?php
						    $s=$row['catagory_name'];
                            $result = $db->prepare("SELECT subcatagory,sum(amount) FROM income WHERE catagory_name=:s AND STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$c', '%d-%m-%Y') AND STR_TO_DATE('$d', '%d-%m-%Y') and trans='Cash' or subcatagory='Cash Withdrawal' GROUP BY subcatagory");
							$result->bindParam(':s', $s);
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
                                <tr class="record">
                                    
									<td></td>
									<td><?php echo $row['subcatagory']; ?></td>
                                    <!--<td><?php echo $row['description']; ?></td>-->
									<!--<td><?php echo $row['sum(amount)']; ?></td>-->
                                   
                                    <td align="right"><?php
                                        $dsdsd=$row['sum(amount)'];
                                        echo formatMoney($dsdsd, true);
                                        ?>
                                    </td>
                                   
                                </tr>
                                <?php
                            }
                            ?>
							 <?php
                            }
                            ?>

                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="2" style="border-top:1px solid #999999"> Total Amount </th>
                                <td  align="right" colspan="1" style="font-weight:bold"> 
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
									$c=$from1;
							        $d=$to1;
                                    $results = $db->prepare("SELECT sum(amount) FROM income WHERE STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$c', '%d-%m-%Y') AND STR_TO_DATE('$d', '%d-%m-%Y') and trans='Cash' ");
									$results->bindParam(':c', $c);
                                    $results->bindParam(':d', $d);
                                    $results->execute();
                                    for($i=0; $rows = $results->fetch(); $i++){
                                        $in=$rows['sum(amount)']+$obh;
										//$in=$rows['sum(amount)'];
                                        echo formatMoneyi($in, true);
                                    }
                                    ?>
                                </td>
                            </tr>
                        </thead>
						</table>
					<td valign="top">
					<div align="right">
					<table width="100%"  class="table table-striped"  id="dataTables-example" border="1">
                        <thead>
                            <tr>
                                <th colspan="3" style="border-top:1px solid #999999">Expense</th>
                            </tr>
                        </thead>
					     <thead>
                            <tr>
							<!--<th>Date</th>-->
                                <th>Catagory</th>
								<th>Sub Catagory</th>
								<th>Amount</th>
                            </tr>
                        </thead>
						 <?php
                            include('connect.php');
							$c=$from1;
							$d=$to1;
							$res = $db->prepare("SELECT catagory_name,sum(amount) FROM expense WHERE STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$c', '%d-%m-%Y') AND STR_TO_DATE('$d', '%d-%m-%Y') and trans='Cash' GROUP BY catagory_name");
							$res->bindParam(':c', $c);
                            $res->bindParam(':d', $d);
							$res->execute();
							for($i=0; $row = $res->fetch(); $i++){
                                ?>
                                <tr class="record">
                                    
									<td><?php echo $row['catagory_name']; ?></td>
									
                                    <td align="right"><b><?php
                                        $dsdsd=$row['sum(amount)'];
                                        echo formatMoney($dsdsd, true);
                                        ?></b>
                                    </td>
                                   
                                </tr>
						  <?php
						    $s=$row['catagory_name'];
                            $result = $db->prepare("SELECT subcatagory,sum(amount) FROM expense WHERE catagory_name=:s AND STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$c', '%d-%m-%Y') AND STR_TO_DATE('$d', '%d-%m-%Y') and trans='Cash' GROUP BY subcatagory");
							$result->bindParam(':s', $s);
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
                                <tr class="record">
								
                                    <!--<td><?php echo $row['date']; ?></td>-->
									<td></td>
                                    <td><?php echo $row['subcatagory']; ?></td>
									<!--<td><?php echo $row['sum(amount)']; ?></td>-->
                                   
                                    <td align="right"><?php
                                        $dsdsd=$row['sum(amount)'];
                                        echo formatMoney($dsdsd, true);
                                        ?>
                                    </td>
                                   
                                </tr>
                                <?php
                            }
                            ?>
							<?php
                            }
                            ?>

                        </tbody>
                        <!--<thead>
                            <tr>
                                <th colspan="2" style="border-top:1px solid #999999"> Total Amount </th>
                                <td colspan="1"  align="right" style="font-weight:bold"> 
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
                                    $results = $db->prepare("SELECT sum(amount) FROM expense WHERE STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$c', '%d-%m-%Y') AND STR_TO_DATE('$d', '%d-%m-%Y') and catagory_name!='Remittance' and credit_type!='Credited'");
									$results->bindParam(':c', $c);
                                    $results->bindParam(':d', $d);
                                    $results->execute();
                                    for($i=0; $rows = $results->fetch(); $i++){
                                        $ex=$rows['sum(amount)'];
                                        echo formatMoneye($ex, true);
                                    }
                                    ?>
                                </td>
                            </tr>
                        </thead>-->
						
					<!--<?php
                            include('connect.php');
							$e=$to1;;
							$x='31-03-2018';
							$rs = $db->prepare("SELECT sum(amount) FROM expense WHERE STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$x','%d-%m-%Y') AND STR_TO_DATE('$e', '%d-%m-%Y') and trans='Bank' and credit_type='Credited'");
                            $rs->execute();
                            for($i=0; $rsk = $rs->fetch(); $i++){
								$rskt = $rsk['sum(amount)']; ?>
                                <?php
                            }
                            ?>-->
							<?php
                            include('connect.php');
							$i=$to1;
							$n='31-03-2018';
                            $result = $db->prepare("SELECT sum(amount) FROM income WHERE STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$n', '%d-%m-%Y') AND STR_TO_DATE('$i', '%d-%m-%Y') and trans='Cash' or subcatagory='Cash Withdrawal'");
						
                            
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
								<?php $cbi = $row['sum(amount)']; ?>
                                
                                <?php
                            }
                            ?>
					<?php
                            include('connect.php');
							$e=$to1;;
							$x='31-03-2018';
                            $result = $db->prepare("SELECT sum(amount) FROM expense WHERE STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$x','%d-%m-%Y') AND STR_TO_DATE('$e', '%d-%m-%Y') and trans='Cash'");
						
                            
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
								<?php $cbe = $row['sum(amount)']; ?>
                                
                                <?php
                            }
                            ?>
							<?php $cbh=$cbi-$cbe; ?>
                          
					<?php
					include('connect.php');
					$z='31-03-2018';
					$y=$to1;
					$result = $db->prepare("SELECT sum(balance) FROM bankentry WHERE STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$z', '%d-%m-%Y') AND STR_TO_DATE('$y', '%d-%m-%Y')");
					
					$result->execute();
					for($i=0; $row = $result->fetch(); $i++){
											  
					?><?php $cbb = $row['sum(balance)']; ?>
					<?php
													}?>
							<?php $cb=$cbh+$cbb; ?>
							 <thead>
                            <tr>
                                <th>Total Expense</th>
								<th> </th>
								<th><?php echo formatMoney($cbe,true);?></th>
                            </tr>
                        </thead>
						<thead>
                            <tr>
                                <th>Closing Balance</th>
								<th><?php echo formatMoney($cb,true);?></th>
                            </tr>
                        </thead>
					     <thead>
                            <tr>
                                <th>Cash Balance</th>
								<th> </th>
								<th><?php echo formatMoney($cbh,true);?></th>
                            </tr>
                        </thead>
						<thead>
                            <tr>
                                <th>Bank Balance</th>
								<th><?php echo formatMoney($cbb,true);?></th>
                            </tr>
                        </thead>
						 <?php
                            include('connect.php');
							$g='31-03-2018';
							$h=$day_before;
							$i=$to1;
                            $result = $db->prepare("SELECT account,sum(balance) FROM bankentry WHERE STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$g', '%d-%m-%Y') AND STR_TO_DATE('$i', '%d-%m-%Y')GROUP BY account");
							$result->bindParam(':c', $g);
                            $result->bindParam(':d', $i);
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
                                <tr class="record">
                                    <td ><?php echo $row['account']; ?></td>
									<td></td>
                                    <td align="right"><?php
                                        $dsdsd=$row['sum(balance)'];
                                        echo formatMoney($dsdsd, true);
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
							<thead>
                            <tr>
                                <th colspan="2" style="border-top:1px solid #999999"> Total Amount </th>
                                <td colspan="1"  align="right" style="font-weight:bold"> 
                                    <?php
                                    $results = $db->prepare("SELECT sum(amount) FROM expense WHERE STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$c', '%d-%m-%Y') AND STR_TO_DATE('$d', '%d-%m-%Y') and trans='Cash'");
									$results->bindParam(':c', $c);
                                    $results->bindParam(':d', $d);
                                    $results->execute();
                                    for($i=0; $rows = $results->fetch(); $i++){
                                        $ex=$rows['sum(amount)']+$cbh+$cbb;
                                        echo formatMoneye($ex, true);
                                    }
                                    ?>
                                </td>
                            </tr>
                        </thead>
                        </tbody>
						</div></td>
						</div></td>
                        <!--<td valign="top">
						<div align="right">
						<table width="100%"  id="dataTables-example" border="1">
						<thead>
                            <tr>
                                <th colspan="4" style="border-top:1px solid #999999">Bank Tansactions</th>
                            </tr>
                        </thead>
					     <thead>
                            <tr>
							<th>Date</th>
                                <th>Account</th>
								<th>Credit</th>
								<th>Debit</th>
                            </tr>
                        </thead>
						<tbody>
						
                        </tbody>
                        <!--<thead>
                            <tr>
                                <th colspan="3" style="border-top:1px solid #999999"> Total Amount </th>
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
                                    $results = $db->prepare("SELECT sum(balance) FROM bankentry where date BETWEEN :c AND :d ");
									$results->bindParam(':c', $c);
                                    $results->bindParam(':d', $d);
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
						</div></td>--></tr>
						
						<?php
                            include('connect.php');
							$i=$to1;
							$n='31-03-2018';
                            $result = $db->prepare("SELECT sum(amount) FROM income WHERE STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$n', '%d-%m-%Y') AND STR_TO_DATE('$i', '%d-%m-%Y') and trans='Cash'");
						
                            
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
								<?php $cbi = $row['sum(amount)']; ?>
                                
                                <?php
                            }
                            ?>
					<?php
                            include('connect.php');
							$e=$to1;;
							$x='31-03-2018';
                            $rs = $db->prepare("SELECT sum(amount) FROM expense WHERE STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$x','%d-%m-%Y') AND STR_TO_DATE('$e', '%d-%m-%Y') and trans='Bank' and credit_type='Credited'");
                            $rs->execute();
                            for($i=0; $rsk = $rs->fetch(); $i++){
								$rskt = $rsk['sum(amount)']; ?>
                                <?php
                            }
                            ?>
                           <?php $result = $db->prepare("SELECT sum(amount) FROM expense WHERE STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$x','%d-%m-%Y') AND STR_TO_DATE('$e', '%d-%m-%Y') and trans='Cash' and trans='Credit' and credit_type!='Credited'");
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
								<?php $cbe = $row['sum(amount)']-$rskt; ?>
                                <?php
                            }
                            ?>
							<?php $cbh=$cbi-$cbe; ?>
					<?php
					include('connect.php');
					$z='31-03-2018';
					$y=$to1;
					$result = $db->prepare("SELECT sum(balance) FROM bankentry WHERE STR_TO_DATE(date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$z', '%d-%m-%Y') AND STR_TO_DATE('$y', '%d-%m-%Y')");
					
					$result->execute();
					for($i=0; $row = $result->fetch(); $i++){
											  
					?><?php $cbb = $row['sum(balance)']; ?>
					<?php
													}?>
							<?php $cb=$cbh+$cbb; ?>
							<?php //$cb=$cbb; ?>
					<!--<thead>
					<tr><th colspan="5" bgcolor="#A9DFBF  ">Closing balance in hand:&nbsp;&nbsp;<?php echo formatMoney($cbh,true);?></th></tr></thead>
					<thead>
					<tr><th colspan="5" bgcolor=" #D7BDE2 ">Closing balance in Bank:&nbsp;&nbsp;<?php echo formatMoney($cbb,true);?></th></tr></thead>
					<thead>
					<tr><th colspan="5" bgcolor=" #D7BDE2 ">Closing balance:&nbsp;&nbsp;<?php echo formatMoney($cb,true);?></th></tr></thead>-->
					
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
