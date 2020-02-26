<?php
require_once('auth.php');
require_once('headerpage.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GV</title>
  
  <link rel="shortcut icon" href="logo1.jpg">
  <!-- Bootstrap Core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


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
		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
		<script type="text/javascript">
				$(document).ready(function(){
				$("select.country").change(function(){
				var selectedCountry = $(".country option:selected").val();
				alert("You have selected the country - " + selectedCountry);
			});
		});
		</script>


      </head>

      <body>

        <?php include('navfixed.php');?>

        <div id="page-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Payment | <?php echo $_GET['id']; ?> </h1>
            </div>

            <div id="maintable"><div style="margin-top: -19px; margin-bottom: 21px;">
            </div>
            <form action="incoming.php" method="post" class = "form-group" >
              <input type="hidden" name="pt" class = "form-control" value="<?php echo $_GET['id']; ?>" />
              <input type="hidden" name="invoice" class = "form-control" value="<?php echo $_GET['invoice']; ?>" />
              <label>Select a Product</label><br />
              <select  name="product"  style="width:500px;" class="chzn-select">
                <option></option>
                <?php
                include('connect.php');
                $result = $db->prepare("SELECT * FROM products");
                $result->bindParam(':userid', $res);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
                  ?>
                  <option value="<?php echo $row['product_code'];?>" 
                    <?php
                    if($row['qty_left'] == 0)
                    {
                      echo'disabled';
                    }
                    ?>
                    >
                    <!--<?php echo $row['product_code']; ?>-->
                     <?php echo $row['product_name']; ?>
                    - <?php echo $row['btype']; ?>
                    - <?php echo $row['qty_left']; ?>

                  </option>
                  <?php
                }
                ?>
              </select>
              <br />
			   <label>Select a Product Type</label>
			   <select name="btype" class = "form-control" >
                            <option value="0">Select product type</option>
                            <option value="1">Accountable</option>
                            <option value="2">Unaccountable</option>
                            </select>
              
              <label>Number of Item</label>
              <input type="number" name="qty" value="1" min = "1" class = "form-control"  autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
              <label>Discount</label>
              <input type="text" name="discount" value="0" class = "form-control"  autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
              <label>Value Add Tax:</label>
              <input type="text" name="vatper" value="" class = "form-control" placeholder = "%" autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
              <br>
			  <label>Transport & Other Charges</label>
              <input type="text" name="tcharge" value="0" class = "form-control"  autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
              <br>
			  <input type="submit" class="btn btn-primary" value="add product" class = "form-control" style="width: 123px;" />
            </form>
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <!--<th> Product Code </th>-->
                  <th> Brand Name </th>
                  <!--<th> Description Name </th>-->
                  <th> Category </th>
                  <th> Quantity </th>
		
                  <th> Price </th>
                  <th> Discount </th>
                  <th> VAT </th>
                  <th> Amount </th>
                  <th> Total Amount </th>
                  <th> Delete </th>
                </tr>
              </thead>
              <tbody>

                <?php
                $id=$_GET['invoice'];
                include('connect.php');
                $result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
                $result->bindParam(':userid', $id);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
                  ?>
                  <tr class="record">
                    <!--<td><?php echo $row['product']; ?></td>-->
                    <td><?php echo $row['name']; ?></td>
                    <!--<td><?php echo $row['dname']; ?></td>-->
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
					
                    <td>
                      <?php
                      $ppp=$row['price'];
                      echo formatMoney($ppp, true);
                      ?>
                    </td>
                    <td>
                      <?php
                      $ddd=$row['discount'];
                      echo formatMoney($ddd, true);
                      ?>
                    </td>
                    <td>
                      <?php
                      $fff=$row['vat'];
                      echo formatMoney($fff, true);
                      ?>
                    </td>
                    <td>
                      <?php
                      $ccc=$row['amount'];
                      echo formatMoney($ccc, true);
                      ?>
                    </td>

                    <td>
                      <?php
                      $dfdf=$row['total_amount'];
                      echo formatMoney($dfdf, true);
                      ?>
                    </td>
                    
                    <td><a href="delete.php?id=<?php echo $row['transaction_id']; ?>&invoice=<?php echo $_GET['invoice']; ?>&dle=<?php echo $_GET['id']; ?>&qty=<?php echo $row['qty'];?>&code=<?php echo $row['product'];?>"> Delete</a></td>
                  </tr>
                  <?php
                }
                ?>
				<tr>
                  <td colspan="7"><strong style="font-size: 12px; color: #222222;">Total VAT(Rs):</strong></td>
                  <td colspan="3"><strong style="font-size: 12px; color: #222222;">
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
                    $sdsd=$_GET['invoice'];
                    $resultas = $db->prepare("SELECT sum(vat) FROM sales_order WHERE invoice= :a");
                    $resultas->bindParam(':a', $sdsd);
                    $resultas->execute();
                    for($i=0; $rowas = $resultas->fetch(); $i++){
                      $fgf=$rowas['sum(vat)'];
                      echo formatMoney($fgf, true);
                    }
                    ?>
                  </strong></td>
                </tr>
				<tr style="display:none">
                  <td colspan="7"><strong style="font-size: 12px; color: #222222;">Total VAT%:</strong></td>
                  <td colspan="3"><strong style="font-size: 12px; color: #222222;">
                    <?php
                    
                    $sdsd=$_GET['invoice'];
                    $resultas = $db->prepare("SELECT sum(vatper) FROM sales_order WHERE invoice= :a");
                    $resultas->bindParam(':a', $sdsd);
                    $resultas->execute();
                    for($i=0; $rowas = $resultas->fetch(); $i++){
                      $fgfgh=$rowas['sum(vatper)'];
                      echo formatMoney($fgfgh, true);
                    }
                    ?>
                  </strong></td>
                </tr>

                <tr>
                  <td colspan="7"><strong style="font-size: 12px; color: #222222;">Total:</strong></td>
                  <td colspan="3"><strong style="font-size: 12px; color: #222222;">
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
				 <tr style="display:none">
                  <td colspan="9"><strong style="font-size: 12px; color: #222222;">Type:</strong></td>
                  <td colspan="3"><strong style="font-size: 12px; color: #222222;">
                    <?php
                    
                    $sdsd=$_GET['invoice'];
                    $resultas = $db->prepare("SELECT btype FROM sales_order WHERE invoice= :a");
                    $resultas->bindParam(':a', $sdsd);
                    $resultas->execute();
                    for($i=0; $rowas = $resultas->fetch(); $i++){
                      $fgfgfg=$rowas['btype'];
                      echo $fgfgfg;
                    }
                    ?>
                  </strong></td>
                </tr>
				 <tr>
                  <td colspan="7"><strong style="font-size: 12px; color: #222222;">Transport Charge:</strong></td>
                  <td colspan="3"><strong style="font-size: 12px; color: #222222;">
                    <?php
                    
                    $sdsd=$_GET['invoice'];
                    $resultas = $db->prepare("SELECT sum(tcharge) FROM sales_order WHERE invoice= :a");
                    $resultas->bindParam(':a', $sdsd);
                    $resultas->execute();
                    for($i=0; $rowas = $resultas->fetch(); $i++){
                      $fgfgfgfg=$rowas['sum(tcharge)'];
                      echo $fgfgfgfg;
                    }
                    ?>
                  </strong></td>
                </tr>
				<tr>
                  <td colspan="7"><strong style="font-size: 12px; color: #222222;">Discount:</strong></td>
                  <td colspan="3"><strong style="font-size: 12px; color: #222222;">
                    <?php
                    
                    $sdsd=$_GET['invoice'];
                    $resultas = $db->prepare("SELECT sum(discount) FROM sales_order WHERE invoice= :a");
                    $resultas->bindParam(':a', $sdsd);
                    $resultas->execute();
                    for($i=0; $rowas = $resultas->fetch(); $i++){
                      $fgfgfgfh=$rowas['sum(discount)'];
                      echo $fgfgfgfh;
                    }
                    ?>
                  </strong></td>
                </tr>


              </tbody>
            </table><br>
			
            <a rel="facebox" class = "btn btn-primary" href="checkout.php?pt=<?php echo $_GET['id']?>&invoice=<?php echo $_GET['invoice']?>&tcharge=<?php echo $fgfgfgfg?>&tdiscount=<?php echo $fgfgfgfh?>&btype=<?php echo $fgfgfg?>&totalvat=<?php echo $fgf?>&totalvatper=<?php echo $fgfgh?>&total=<?php echo $fgfg ?>&p_amount=<?php echo $ccc?>">Check Out</a>


            <div class="clearfix"></div>
          </div>

        </div>
      </div>
      <!-- /#page-wrapper -->



      <!-- jQuery -->
      <script src="vendor/jquery/jquery.min.js"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

      <!-- Metis Menu Plugin JavaScript -->
      <script src="vendor/metisMenu/metisMenu.min.js"></script>

      <!-- Custom Theme JavaScript -->
      <script src="dist/js/sb-admin-2.js"></script>

      <link href="vendor/chosen.min.css" rel="stylesheet" media="screen">
      <script src="vendor/chosen.jquery.min.js"></script>
      <script type="text/javascript">
        $(function() {
          $(".chzn-select").chosen();

        });
      </script>

    </body>

    </html>
