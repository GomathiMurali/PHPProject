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

	<title>MALAR CBSE</title>

  <link rel="shortcut icon" href="logo.jpg">
  <!-- Bootstrap Core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


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

       <div id="page-wrapper">
        <div class="row">
         <div class="col-lg-12">
          <h1 class="page-header">Bank Transaction Report</h1>
        </div>

       
        <form action="bankentryreport.php" method="post" class = "form-group" >
<div align="center">
Select a Account:
		<br>
											<select name="name" style="width: 400px;" class="chzn-select">
											 <?php
											  include('connect.php');
													$result = $db->prepare("SELECT * FROM bank");
													$result->bindParam(':userid', $res);
													$result->execute();
													for($i=0; $row = $result->fetch(); $i++){
											  ?>
											  <option><?php echo $row['accno']; ?></option>
											  <?php
											  }
											  ?>
											  </select><br> 
			 <br>
         
        From Date :<br> <input type="date"  style="width: 400px;" class = "form-control" name="fromdate" value = "" placeholder="d-m-y"/><br>
		To Date :<br><input type="date"  style="width: 400px;" class = "form-control" name="todate" value = "" placeholder="d-m-y"/><br>
		<center><input type="submit" value="Submit" class="btn btn-primary"></center>
</div>
</form>
<div class="clearfix"></div>
</div>

</div>
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

<link href="vendors/chosen.min.css" rel="stylesheet" media="screen">
<script src="vendors/chosen.jquery.min.js"></script>
<script>
 $(function() {
  $(".chzn-select").chosen();

});
</script>

</body>

</html>
