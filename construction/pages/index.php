
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>PPF</title>


	<link rel="shortcut icon" href="">
	<!-- Bootstrap Core CSS -->
	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="stylelog.css">

		<link href="../dist/css/editgroup.css" rel="stylesheet">
	    <link rel="stylesheet" type="text/css" href="stylelog.css">

	<!-- Custom Fonts -->
	<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<body>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->



    </head>

    <body background="img5.jpg">
    	<?php
    	function createRandomPassword() {
    		$chars = "003232303232023232023456789";
    		srand((double)microtime()*1000000);
    		$i = 0;
    		$pass = '' ;
    		while ($i <= 7) {

    			$num = rand() % 33;

    			$tmp = substr($chars, $num, 1);

    			$pass = $pass . $tmp;

    			$i++;

    		}
    		return $pass;
    	}
    	$finalcode='RS-'.createRandomPassword();
    	?>


    	<div class="login-box">
		     <img src="img3.jpg" class="avatar">
             <h1 style='text-transform:uppercase'><b>Construction Work</b></h1>
            <h1>Login Here</h1>
			<!--<ul class="nav nav-pills">
    	   <li class="active"><a data-toggle="pill" href="#home">Admin</a></li>
			</ul>
			<div id="home" class="tab-pane fade in active">-->
            <form name="admin_form" method="post">
            <p>Username</p>
            <input type="text" name="username" id="username" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="pass" placeholder="Enter Password">
			<p>Select user type</p>
			<select name="usertype" id="usertype" class="custom-select">
			<option value="admin">admin</option>
			<option value="user">user</option>
			</select>
			<br>
			<br>
			<br>
            <div class="form-group">
    		<button class="btn btn-block btn-success" id = "btn-login" name = "btn-login">Log in</button>
    	    </div>
           <div class="form-group" id="alert-msg">
    		</div>
            </form>


        </div>

    	<!-- jQuery -->
    	<script src="../vendor/jquery/jquery.min.js"></script>

    	<!-- Bootstrap Core JavaScript -->
    	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    	<!-- Metis Menu Plugin JavaScript -->
    	<script src="../vendor/metisMenu/metisMenu.min.js"></script>

    	<!-- Custom Theme JavaScript -->
    	<script src="../dist/js/sb-admin-2.js"></script>

    	<script type="text/javascript">
    		jQuery(function(){
    			$('form[name="admin_form"]').on('submit', function(donard){
    				donard.preventDefault();

    				var a = $(this).find('input[name="username"]').val();
    				var b = $(this).find('input[name="pass"]').val();
                    var c = $( "#usertype" ).val();

    				if (a === '' && b ===''){
    					$('#alert-msg').html('<div class="alert alert-danger">All fields are required!</div>');
    				}

					else if(c === 'admin'){
    					$.ajax({
    						type: 'POST',
    						url: 'new_login.php',
    						data: {
    							username: a,
    							password: b
    						},
    						beforeSend:  function(){
    							$('#alert-msg').html('');
    						}
    					})
    					.done(function(donard){
    						if (donard == 0){
    							$('#alert-msg').html('<div class="alert alert-danger">Incorrect username or password!</div>');
    						}else{
    							$("#btn-login").html('<img src="loading.gif" /> &nbsp; Signing In ...');
    							setTimeout(' window.location.href = "home.php"; ',2000);
    						}
    					});
    				}

					else {
    					$.ajax({
    						type: 'POST',
    						url: 'new_login2.php',
    						data: {
    							username: a,
    							password: b
    						},
    						beforeSend:  function(){
    							$('#alert-msg').html('');
    						}
    					})
    					.done(function(donard){
    						if (donard == 0){
    							$('#alert-msg').html('<div class="alert alert-danger">Incorrect username or password!</div>');
    						}else{
    							$("#btn-login").html('<img src="loading.gif" /> &nbsp; Signing In ...');
    							setTimeout(' window.location.href = "userhome.php"; ',2000);
    						}
    					});
    				}
    			});


    		});
    	</script>

    </body>

    </html>
