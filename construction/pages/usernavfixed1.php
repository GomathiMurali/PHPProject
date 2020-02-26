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

<style>
.avatar{
    width: 40px;
    height: 40px;
    border-radius: 50%;
    position: absolute;
    top: 5px;
    left: calc(3% - 3px);
}
.avatar1{
    width: 500px;
    height: 40px;
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


<!-- Navigation -->
<nav style="background-color:green ;" class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
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
	<!-- /.navbar-header -->

	
				
      <ul class="nav navbar-top-links navbar-right"> 
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				<i class="fa fa-user fa-fw"></i>
			</a>
			<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="black"> User </font> <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a  href="#myModal" data-toggle="modal"><i class="fa fa-user fa-fw"></i> Add User</a>
                    
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
				<!-- /.dropdown-user -->
			</li>
			<!-- /.dropdown -->
		</ul>
		<!-- /.navbar-top-links -->



		<div style="background-color:black ;" class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse">
				<ul class="nav" id="side-menu" style=" font:bold 14px 'Aleo'; color:black;">
					<li>
						<a href="userhome.php"><i class="fa fa-home fa-fw"></i> Home</a>
					</li>
					
					
					<li>
						<a href="#"><i class="fa fa-list-alt fa-fw"></i>User Master<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
					<li>
						<a href="userproducts.php"><i class="fa fa-table fa-fw"></i>Add Product</a>
					</li>
					<!--<li>
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
					</li>-->
							
						</ul>
					</li>
					
					<li><a href="#"><i class="fa fa-table fa-fw"></i> Payment Master</a>
				    <ul class="nav nav-second-level">
					<!--<li>
						<a href="purchaseorderlist.php"><i class="fa fa-list-alt fa-fw"></i> Purchase List</a>
					</li>
					<li>
						<a href="salesorderlist.php"><i class="fa fa-list-alt fa-fw"></i> Sales List</a>
					</li>-->
					
					<li>
						<a href="userpurchasesales.php?invoice=<?php echo $finalcode;?>"><i class="fa fa-list-alt fa-fw"></i> Sales</a>
					</li>
					<li>
						<a href="usersales.php?invoice=<?php echo $finalcode1;?>"><i class="fa fa-list-alt fa-fw"></i> Purchase</a>
					</li>
					<!--<li>
						<a href="purchaseslist.php"><i class="fa fa-list-alt fa-fw"></i> Purchase Order List</a>
					</li>-->
					<!--<li>
						<a href="saleslist.php"><i class="fa fa-list-alt fa-fw"></i> Sales Order List</a>
					</li>-->
					<!--<li>
						<a href="voucher.php"><i class="fa fa-list-alt fa-fw"></i> Voucher</a>
					</li>
					<li>
						<a href="receipt.php"><i class="fa fa-list-alt fa-fw"></i> Receipt</a>
					</li>-->
					</ul>
					</li>
					<!--<li>
						<a rel="facebox" href="select_customer.php"><i class="fa fa-book fa-fw"></i> Customer Ledger</a>
					</li>-->
					<li>
						<a href="#"><i class="fa fa-files-o fa-fw"></i> Reports<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
                        <li><a href="usersalesdate.php"><i class="fa fa-angle-double-right"></i> Sales Report</a>
						
						</li>
                        <li><a href="userpurchasedate.php?"><i class="fa fa-angle-double-right"></i> Purchase Report</a>
						
						</li>
                        <!--<li><a href="inventory.php"><i class="fa fa-angle-double-right"></i> Inventory Report</a></li>-->
                    </ul>
                </li>

					<!--<li>
						<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li>
								<a href="chart.php"> Graph By Category</a>
							</li>
							<li>
								<a href="charts.php"> Graph For Cash and Credit</a>
							</li>
							<!--<li>
								<a href="lose.php"> Graph For Losses </a>
							</li>-->
							<!--<li>
								<a href="month_chart.php"> Monthly Sales Chart</a>
							</li>
							<li>
								<a href="yearly_chart.php"> Yearly Sales Chart</a>
							</li>
						</ul>
					</li>-->

				</div>
			</div>
			<!-- /.navbar-static-side -->
		</nav>

		<?php include('adduser.php'); ?>