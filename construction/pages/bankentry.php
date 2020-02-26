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

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Transactions</h1>
                </div>
                <div id="maintable">
                    <div style="margin-top: -19px; margin-bottom: 21px;">
                    </div>
                    <div class="panel-body">
                        <!-- Button trigger modal -->
                        <button class="btn btn-primary" data-toggle="modal" data-target="#adds">
                            Add Transactions
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="adds" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Add Transactions</h4>
                                    </div>
                                    <div class="modal-body">

                                     <form action="savebankentry.php" method="post" class = "form-group">
                                        <div id="ac">
										<label>Select a School</label><br />
									    <select id="id_select" name="school"  style="width:500px;" class="chzn-select">
                                             <option value="Malar Matric Hr Sec School"> Malar Matric Hr Sec School </option>
											 <option value="Malar Nursery & Primary School"> Malar Nursery & Primary School </option>
											 <option value="Public School"> Public School </option>
											 <option value="Trust"> Trust </option>
                                            </select><br>
											 <?php
											  include('connect.php');
											      
												   $accno=$_GET['no'];
											  ?>
									
									<input type="hidden" name="no1" style="width: 400px;" class="form-control" value="<?php echo $accno;?>">
										  <label> Account</label><br />
											<input type="text" name="name" style="width: 400px;" class="form-control" value="<?php echo $accno;?>">
											
											 
											  <?php
												$today = date('d-m-Y');
												?>
												
											<label>Date : </label><input type="text"  style="width: 400px;" class = "form-control" name="date" value = "<?php echo $today; ?>" />
											<label>Description : </label><input type="text"  style="width: 400px;" class = "form-control" name="description" />
											<label>Credit Amount : </label><input type="text"  style="width: 400px;" class = "form-control" name="camount" placeholder="0" />
											<label>Debit Amount : </label><input type="text"  style="width: 400px;" class = "form-control" name="damount" placeholder="0"  />
											<label>Balance Amount : </label><input type="text"  style="width: 400px;" class = "form-control" name="bamount" placeholder="0"  />

											<!--<label>Select a School</label><br />
											<select  name="type"  style="width:500px;" class="chzn-select">
                                             <option> credit </option>
											 <option> debit </option>
                                            </select>-->

                                            <br>
                                            <span>&nbsp;</span><input class="btn btn-primary btn-block"  type="submit" value="save" class = "form-control" />
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
                <form>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <!--<th>School Name </th>-->
							<th>Account </th>
							<th>Date </th>
							<th>Description </th>
							<th>Credit </th>
							<th>Debit </th>
							<th>Balance </th>
                            <th width="10%"> Action </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include('connect.php');
					    
						$accno=$_GET['no'];
                        $result = $db->prepare("SELECT * FROM bankentry where account= :c ORDER BY id asc");
						
						$result->bindParam(':c', $accno);
                        $result->execute();
						$balance = 0;
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record">
                                <!-- <td><?php echo $row['school']; ?></td>-->
								<td><?php echo $row['account']; ?></td>
								<td><?php echo $row['date']; ?></td>
								<td><?php echo $row['description']; ?></td>
								<td><?php echo $row['amount']; ?></td>
                                <td><?php echo $row['debit_amount']; ?></td>
							    <td><?php echo $balance = ($balance + $row['amount'] - $row['debit_amount']) ;?></td>
							   
                                <td><a rel="facebox" class="btn btn-primary" href="editbankentry.php?id=<?php echo $row['id']; ?>&no=<?php echo $row['account']; ?>"> <i class="fa fa-pencil"></i> </a>             
								<a href="#"id="<?php echo $row['id']; ?>" class="btn btn-danger delbutton" title="Click To Delete"><i class = "fa fa-trash"></i></a></td>
                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
					 <thead>
                            <tr>
                                <th colspan="5" style="border-top:1px solid #999999"> Total Amount </th>
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
                                    $results = $db->prepare("SELECT sum(balance) FROM bankentry where account= :c ");
									
                                    
									$results->bindParam(':c', $accno);
                                    $results->execute();
                                    for($i=0; $rows = $results->fetch(); $i++){
                                        $dsdsd=$rows['sum(balance)'];
                                        echo formatMoney($dsdsd, true);
                                    }
                                    ?>
                                </th>
                            </tr>
                        </thead>
                </table>
				</form>
                <div class="clearfix"></div>
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
   url: "deletebankentry.php",
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


</body>

</html>