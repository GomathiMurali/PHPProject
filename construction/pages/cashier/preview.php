<?php
require_once('auth.php');
?>
<title>GV</title>
  
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="dist/css/sb-admin-2.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



<script language="javascript">
	function Clickheretoprint()
	{ 

		var disp_setting="toolbar=no,location=no,directories=no,menubar=no,"; 
		disp_setting="scrollbars=yes,width=800, height=400, left=100, top=25"; 
		var content_vlue = document.getElementById("content").innerHTML; 

		var docprint=window.open("","",disp_setting); 
		docprint.document.open(); 
		docprint.document.write('<body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');          
		docprint.document.write(content_vlue); 
		docprint.document.close(); 
		docprint.focus(); 
	}
	
	function myFunction() 
	{
		window.print();
	}


	
</script>

<?php
$invoice=$_GET['invoice'];
include('connect.php');
$result = $db->prepare("SELECT * FROM sales WHERE invoice_number= :userid");
$result->bindParam(':userid', $invoice);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
	$cname=$row['name'];
	$invoice=$row['invoice_number'];
	$date=$row['date'];
	$cash=$row['due_date'];
	$cashier=$row['cashier'];

	$pt=$row['type'];
	$am=$row['total_amount'];
	
}
?><br>
<br>

<div class="content" id="content">
	<div style="margin: 0 auto; padding: 20px; width: 700px; font-weight: normal;">
		<div style="width: 100%;">
			<div style="width: 459px;">
			
			<table cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 15px;text-align:left;" width="90%">
			<tr>
			<td>
			<div><div align="left">TIN No: 33473105385<br> CST No: 676070 dt. 27-05-2014</div></td>
			<td>
			<div align="right">Phone No:9626222705 </div></div></td></tr></table><br>
			<center><img src="gv.png" width="70px"/></center>
			<center><b>G.V.& Co.</b><br />
					6/315-1,Vangili complex,Trichy Road,Namakkal-1<br /></center><br>
					
							
						
						<table  cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 15px;text-align:left;" width="90%">	
						<tr>
						<td>						
						<div>
						<?php
						$resulta = $db->prepare("SELECT * FROM customer WHERE customer_name= :a");
						$resulta->bindParam(':a', $cname);
						$resulta->execute();
						for($i=0; $rowa = $resulta->fetch(); $i++){
							$address=$rowa['address'];
							$contact=$rowa['contact'];
						}
						?>
						<table cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 15px;text-align:left;width : 90%;">
							<tr>
								<td width="70%">Byer Name: </td>
								<td width="50%"><?php echo $cname ?></td>
							</tr>
							
						</table>
					</div></td>
					<td>
					<div align=right>Date: <?php echo date("m/d/Y"); ?><br>
							Invoice NO:<?php echo $_GET['invoice']; ?></div></td></tr></table><br>
				</div>
			</div>
			<div style="width: 100%">
				<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 15px;text-align:left;" width="75%">
					<thead>
						<tr>
							<!--<th> Product Code </th>-->
							<th> Particulars </th>
							<!--<th> Description Name </th>-->
							<th> Qty </th>
							<th> Price </th>
							<th> VAT </th>
							<!--<th> Discount </th>-->
							<th> Total Amount </th>
						</tr>
					</thead>
					<tbody>

						<?php
						$id=$_GET['invoice'];
						$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
						$result->bindParam(':userid', $id);
						$result->execute();
						for($i=0; $row = $result->fetch(); $i++){
							?>
							<tr class="record">
								<!--<td><?php echo $row['product']; ?></td>-->
								<td><?php echo $row['name']; ?></td>
								<!--<td><?php echo $row['dname']; ?></td>-->
								<td><?php echo $row['qty']; ?></td>
								<td>
									<?php
									$ppp=$row['price'];
									echo formatMoney($ppp, true);
									?>
								</td>
								<td><?php echo $row['vatper']; ?></td>
								<!--<td>
									<?php
									$ddd=$row['discount'];
									echo formatMoney($ddd, true);
									?>
								</td>-->
								<td>
									<?php
									$dfdf=$row['total_amount'];
									echo formatMoney($dfdf, true);
									?>
								</td>
							</tr>
							<?php
						}
						?>

						<tr>
							<td colspan="4"><strong style="font-size: 12px; color: #222222;">Amount:</strong>(Qty*price)</td>
							<td colspan="2"><strong style="font-size: 12px; color: #222222;">
								<?php
								$sdsd=$_GET['invoice'];
								$resultas = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice= :a");
								$resultas->bindParam(':a', $sdsd);
								$resultas->execute();
								for($i=0; $rowas = $resultas->fetch(); $i++){
									$fgfg=$rowas['sum(amount)'];
									echo formatMoney($fgfg, true);
								}
								?>
							</strong></td>
						</tr>
						<tr>
							<td colspan="4"><strong style="font-size: 12px; color: #222222;">VAT:</strong>(Rs)</td>
							<td colspan="2"><strong style="font-size: 12px; color: #222222;">
								<?php
								$sdsd=$_GET['invoice'];
								$resultas = $db->prepare("SELECT sum(vat) FROM sales_order WHERE invoice= :a");
								$resultas->bindParam(':a', $sdsd);
								$resultas->execute();
								for($i=0; $rowas = $resultas->fetch(); $i++){
									$fgfg=$rowas['sum(vat)'];
									echo formatMoney($fgfg, true);
								}
								?>
							</strong></td>
						</tr>
						<?php if($pt=='credit'){
							?>
							<tr>
								<td colspan="4"><strong style="font-size: 12px; color: #222222;">Product Total Amount:</strong></td>
								<td colspan="2"><strong style="font-size: 12px; color: #222222;">
									<?php
									$sdsd=$_GET['invoice'];
									$resultas = $db->prepare("SELECT sum(total_amount) FROM sales_order WHERE invoice= :a");
									$resultas->bindParam(':a', $sdsd);
									$resultas->execute();
									for($i=0; $rowas = $resultas->fetch(); $i++){
										$fgfg=$rowas['sum(total_amount)'];
										echo formatMoney($fgfg, true);
									}
									?>
								</strong></td>
							</tr>
							<tr>
								<td colspan="4"><strong style="font-size: 12px; color: #222222;">Discount:</strong></td>
								<td colspan="2"><strong style="font-size: 12px; color: #222222;">
									<?php
									$sdsd=$_GET['invoice'];
									$resultas = $db->prepare("SELECT sum(discount) FROM sales_order WHERE invoice= :a");
									$resultas->bindParam(':a', $sdsd);
									$resultas->execute();
									for($i=0; $rowas = $resultas->fetch(); $i++){
										$fgfgh=$rowas['sum(discount)'];
										echo formatMoney($fgfgh, true);
									}
									?>
								</strong></td>
							</tr>
							<tr>
								<td colspan="4"><strong style="font-size: 12px; color: #222222;">Transport & other charges:</strong></td>
								<td colspan="2"><strong style="font-size: 12px; color: #222222;">
									<?php
									$sdsd=$_GET['invoice'];
									$resultas = $db->prepare("SELECT sum(tcharge) FROM sales_order WHERE invoice= :a");
									$resultas->bindParam(':a', $sdsd);
									$resultas->execute();
									for($i=0; $rowas = $resultas->fetch(); $i++){
										$fgfgf=$rowas['sum(tcharge)'];
										echo formatMoney($fgfgf, true);
									}
									?>
								</strong></td>
							</tr>
							<tr>
								<td colspan="4"><strong style="font-size: 16px; color: #222222;">Total Amount:</strong></td>
								<td colspan="2"><strong style="font-size: 16px; color: #222222;">
									<?php
									$ghgh=$fgfg+$fgfgf-$fgfgh;
									echo formatMoney($ghgh, true);
									?>
								</strong></td>
							</tr>
							<?php
						}
						?>
						<?php if($pt=='cash'){
							?>
							<tr>
								<td colspan="4"><strong style="font-size: 12px; color: #222222;">Product Total Amount:</strong></td>
								<td colspan="2"><strong style="font-size: 12px; color: #222222;">
									<?php
									$sdsd=$_GET['invoice'];
									$resultas = $db->prepare("SELECT sum(total_amount) FROM sales_order WHERE invoice= :a");
									$resultas->bindParam(':a', $sdsd);
									$resultas->execute();
									for($i=0; $rowas = $resultas->fetch(); $i++){
										$fgfg=$rowas['sum(total_amount)'];
										echo formatMoney($fgfg, true);
									}
									?>
								</strong></td>
							</tr>
							<tr>
								<td colspan="4"><strong style="font-size: 12px; color: #222222;">Discount:</strong></td>
								<td colspan="2"><strong style="font-size: 12px; color: #222222;">
									<?php
									$sdsd=$_GET['invoice'];
									$resultas = $db->prepare("SELECT sum(discount) FROM sales_order WHERE invoice= :a");
									$resultas->bindParam(':a', $sdsd);
									$resultas->execute();
									for($i=0; $rowas = $resultas->fetch(); $i++){
										$fgfgh=$rowas['sum(discount)'];
										echo formatMoney($fgfgh, true);
									}
									?>
								</strong></td>
							</tr>
							<tr>
								<td colspan="4"><strong style="font-size: 12px; color: #222222;">Transport & other charges:</strong></td>
								<td colspan="2"><strong style="font-size: 12px; color: #222222;">
									<?php
									$sdsd=$_GET['invoice'];
									$resultas = $db->prepare("SELECT sum(tcharge) FROM sales_order WHERE invoice= :a");
									$resultas->bindParam(':a', $sdsd);
									$resultas->execute();
									for($i=0; $rowas = $resultas->fetch(); $i++){
										$fgfgf=$rowas['sum(tcharge)'];
										echo formatMoney($fgfgf, true);
									}
									?>
								</strong></td>
							</tr>
							<tr>
								<td colspan="4"><strong style="font-size: 16px; color: #222222;">Total Amount:</strong></td>
								<td colspan="2"><strong style="font-size: 16px; color: #222222;">
									<?php
									$ghgh=$fgfg+$fgfgf-$fgfgh;
									echo formatMoney($ghgh, true);
									?>
								</strong></td>
							</tr>
							
							<!--<tr>
								<td colspan="4"><strong style="font-size: 12px; color: #222222;">Cash Tendered:</strong></td>
								<td colspan="2"><strong style="font-size: 12px; color: #222222;">
									<?php
									echo formatMoney($cash, true);
									?>
								</strong></td>
							</tr-->
						<?php
						}
						?>
						
							
								
						<tr>
							<td colspan="4"><strong style="font-size: 12px; color: #222222;">
								<?php
								//if($pt=='cash'){
									//echo 'Change:';
								//}
								if($pt=='credit'){
									echo 'Due Date:';
								}
								?>
							</strong></td>

							<td colspan="2"><strong style="font-size: 12px; color: #222222;">
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
								if($pt=='credit'){
									echo $cash;
								}
								//if($pt=='cash'){
									//echo formatMoney($amount1, true);
								//}
								?>
							</strong></td>
						</tr>

					</tbody>
				</table>
			</div>

			<div style="text-align: center; margin-top: 13px;">FOR G.V. & Co.</div>
		</div>
		</div>
		<center><a class = "btn btn-primary" onclick="javascript:Clickheretoprint()" style="font-size:20px";>Print</a>     
		<a class = "btn btn-primary"href="home.php" style="font-size:20px";>Back</a>
		</center>
	


