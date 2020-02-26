<?php
require_once('auth.php');
?>
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
$finalcode1='PR-'.createRandomPassword();
?>
<?php
  $name = $_GET['name'];
?>

<!------ Include the above in your HEAD tag ---------->
<style>
@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
@media(min-width:768px) {
    body {
        margin-top: 50px;
    }
    /*html, body, #wrapper, #page-wrapper {height: 100%; overflow: hidden;}*/
}

#wrapper {
    padding-left: 0;    
}

#page-wrapper {
    width: 100%;        
    padding: 0;
    background-color: #fff;
}

@media(min-width:768px) {
    #wrapper {
        padding-left: 225px;
    }

    #page-wrapper {
        padding: 22px 10px;
    }
}

/* Top Navigation */

.top-nav {
    padding: 0 15px;
}

.top-nav>li {
    display: inline-block;
    float: left;
}

.top-nav>li>a {
    padding-top: 20px;
    padding-bottom: 20px;
    line-height: 20px;
    color: #fff;
}

.top-nav>li>a:hover,
.top-nav>li>a:focus,
.top-nav>.open>a,
.top-nav>.open>a:hover,
.top-nav>.open>a:focus {
    color: #fff;
    background-color: #1a242f;
}

.top-nav>.open>.dropdown-menu {
    float: left;
    position: absolute;
    margin-top: 0;
    /*border: 1px solid rgba(0,0,0,.15);*/
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    background-color: #fff;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
}

.top-nav>.open>.dropdown-menu>li>a {
    white-space: normal;
}

/* Side Navigation */

@media(min-width:768px) {
    .side-nav {
        position: fixed;
        top: 60px;
        left: 225px;
        width: 210px;
        margin-left: -225px;
        border: none;
        border-radius: 0;
        border-top: 1px rgba(0,0,0,.5) solid;
        overflow-y: auto;
        background-color: #222;
        /*background-color: #5A6B7D;*/
        bottom: 0;
        overflow-x: hidden;
        padding-bottom: 40px;
    }

    .side-nav>li>a {
        width: 225px;
        border-bottom: 1px rgba(0,0,0,.3) solid;
    }

    .side-nav li a:hover,
    .side-nav li a:focus {
        outline: none;
        background-color: #1a242f !important;
    }
}

.side-nav>li>ul {
    padding: 0;
    border-bottom: 1px rgba(0,0,0,.3) solid;
}

.side-nav>li>ul>li>a {
    display: block;
    padding: 10px 15px 10px 38px;
    text-decoration: none;
    /*color: #999;*/
    color: #fff;    
}

.side-nav>li>ul>li>a:hover {
    color: #fff;
}

.navbar .nav > li > a > .label {
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  position: absolute;
  top: 14px;
  right: 6px;
  font-size: 10px;
  font-weight: normal;
  min-width: 15px;
  min-height: 15px;
  line-height: 1.0em;
  text-align: center;
  padding: 2px;
}

.navbar .nav > li > a:hover > .label {
  top: 10px;
}

.navbar-brand {
    padding: 5px 15px;

}
.avatar{
    width: 50px;
    height: 50px;
    border-radius: 50%;
    position: absolute;
    top: 5px;
    left: calc(3% - 3px);
}
.avatar1{
    width: 500px;
    height: 50px;
    border-radius: 50%;
    position: absolute;
    top: -10px;
    left: calc(8% - 8px);
	color: red;
}
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: green;
  color: white;
  text-align: center;
}
</style>
<script>
$(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $(".side-nav .collapse").on("hide.bs.collapse", function() {                   
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
    });
    $('.side-nav .collapse').on("show.bs.collapse", function() {                        
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");        
    });
})    
</script>
<!--<div class="container">
	<div class="row">
		<h2>Create your snippet's HTML, CSS and Javascript in the editor tabs</h2>
	</div>
</div>-->
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">
                <img src="mff.ico" class="avatar">
            </a>
			<h2 class="avatar1"><b>Mahendra Feeds & Foods</b></h2>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
                </a>
            </li>            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin User <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a  href="#myModal" data-toggle="modal"><i class="fa fa-user fa-fw"></i> Add User</a>
                    
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-collapse" style="background-color:green ;">
            <ul class="nav navbar-nav side-nav" id="side-menu" style="background-color:black ;">
                <li><a href="userhome.php?name=<?php echo $name;?>"><i class="fa fa-home fa-fw"></i> Home</a></li>
				<!--<li><a href="#"><i class="fa fa-table fa-fw"></i> Ledger Master</a>
				<ul>
                    <li>
						<a href="products.php"><i class="fa fa-table fa-fw"></i>Add Product</a>
					</li>
					<li>
						<a href="catagory.php"><i class="fa fa-table fa-fw"></i>Add Category</a>
					</li>
					<li>
						<a href="group.php"><i class="fa fa-table fa-fw"></i> Add Group</a>
					</li>
					<li>
						<a href="supplier.php"><i class="fa fa-truck fa-fw"></i>Add Supplier</a>
					</li>
					<li>
						<a href="customer.php"><i class="fa fa-user fa-fw"></i>Add Customer</a>
					</li>
			      </ul>
				  </li>-->
				  <li><a href="#"><i class="fa fa-table fa-fw"></i> Payment Master</a>
				  <ul>
					<li>
						<a href="purchaseorderlist.php?name=<?php echo $name;?>"><i class="fa fa-list-alt fa-fw"></i> Purchase List</a>
					</li>
					<!--<li>
						<a href="purchasegroup.php?invoice=<?php echo $finalcode1;?>"><i class="fa fa-list-alt fa-fw"></i> Purchase</a>
					</li>
					<li>
						<a href="salesgroup.php?invoice=<?php echo $finalcode;?>"><i class="fa fa-list-alt fa-fw"></i> Sales</a>
					</li>-->
					<li>
						<a href="salesorderlist.php?name=<?php echo $name;?>"><i class="fa fa-list-alt fa-fw"></i> Sales List</a>
					</li>
					<!--<li>
						<a href="voucher.php"><i class="fa fa-list-alt fa-fw"></i> Voucher</a>
					</li>
					<li>
						<a href="receipt.php"><i class="fa fa-list-alt fa-fw"></i> Receipt</a>
					</li>-->
					</ul>
					</li>
					<li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-star"></i>  Reports <i class="fa fa-fw fa-angle-left pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="usersalesdate.php?name=<?php echo $name;?>"><i class="fa fa-angle-double-right"></i> Sales Report</a></li>
                        <li><a href="userpurchasedate.php?name=<?php echo $name;?>"><i class="fa fa-angle-double-right"></i> Purchase Report</a></li>
                        <!--<li><a href="inventory.php"><i class="fa fa-angle-double-right"></i> Inventory Report</a></li>-->
                    </ul>
                </li>
					<!--<li>
						<a href="#"><i class="fa fa-files-o fa-fw"></i> Reports<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<!--<li>
								<a href="annexure1.php">Annexure-I Report</a>
							</li>
							<li>
								<a href="annexure2.php">Annexure-II Report</a>
							</li>-->
							<!--<li>
								<a href="salesdate.php">Sales Report</a>
							</li>
							
							<li>
								<a href="purchasedate.php">Purchase Report</a>
							</li>
							<!--<li>
								<a href="collection.php">Collection Report</a>
							</li>-->
							<!--<li>
								<a href="salesreport.php">Sales Report</a>
							</li>-->
							<!--<li>
								<a href="inventory.php">Inventory Report</a>
							</li>
							<!--<li>
								<a href="incomecatagorydate.php">Income Catagory Report</a>
							</li>
							<li>
								<a href="expensecatagorydate.php">Expense Catagory Report</a>
							</li>
							<li>
								<a href="incomedate.php">Income Report</a>
							</li>
							<li>
								<a href="expensedate.php">Expense Report</a>
							</li>
							<li>
								<a href="bankentrydate.php">Bank Transaction Report</a>
							</li>
							<li>
								<a href="loanentrydate.php">Loan Transaction Report</a>
							</li>
							<li>
								<a href="purchaseoveralldate.php">Purchase Pending Report</a>
							</li>
							<li>
								<a href="assetsdate.php">Assets Report</a>
							</li>
							<li>
								<a href="overalldate3.php">Total Report</a>
							</li>
							
							<!--<li>
								<a href="allreportdate1.php">Total Report</a>
							<li>-->
							<!--<li>
								<a href="allreportdate.php"> Total Report</a>
							</li>-->
							<!--<li>
								<a href="overalldate.php"> All Report</a>
							</li>
							<li>
								<a href="expensependingdate.php">Expense Pending Report</a>
							</li>
							<li>
								<a href="feedate.php">Fee Report</a>
							</li>
							<!--<li>
								<a href="overalldate1.php">Total Report</a>
							</li>-->
							<!--<li>
								<a href="overalldate2.php">Income & Expense Report</a>
							</li>-->
							
							<!--<li>
								<a  href="product_lose.php"> List of Product Expired</a>
							</li>-->
							<!--<li>
								<a  href="returned.php"> Report of Returned Products</a>
							</li>
							<li>
								<a  href="search_customer.php"> Customer Transaction Record</a>
							</li>-->
						<!--</ul>
					</li>-->

            </ul>
        </div>
		
        <!-- /.navbar-collapse -->
    </nav>
	
    <!--<div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <!--<div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>Welcome Admin!</h1>
                </div>
            </div>
            <!-- /.row -->
        <!--</div>
        <!-- /.container-fluid -->
    <!--</div>
    
    <!-- /#page-wrapper -->
	
</div><!-- /#wrapper -->
<?php include('adduser.php'); ?>