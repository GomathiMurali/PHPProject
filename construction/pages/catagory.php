<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PPF</title>
  <link rel="shortcut icon" href="img3.jpg">
  <?php
include_once('auth.php');

?>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin1.css" rel="stylesheet">

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


</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
 <a class="navbar-brand mr-1" href="home.php"><img src="img3.jpg" style="width: 70px;height: auto;"><span style="font-size: 20px;">  Construction</span></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">

      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

          <a class="dropdown-item" href="#myModal" data-toggle="modal">Add User</a>
          <!--<a class="dropdown-item" href="#">Activity Log</a>-->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
  <ul class="sidebar navbar-nav" style="background-image: url(img5.jpg);">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Construction</span>
        </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">

        <a class="dropdown-item" href="group.php">
          <i class="fa fa-table fa-fw"></i>
          <span>Namakkal Details</span></a>


          <div class="subdropdown-menu" aria-labelledby="pagesDropdown">

           <div class="dropdown">


        <a class="dropdown-item" href="uom.php">
          <i class="fa fa-table fa-fw"></i>
          <span>Anbu Nagar</span></a>




        <a class="dropdown-item" href="catagory.php">
          <i class="fa fa-table fa-fw"></i>
          <span>Sakthi Nagar</span></a>

        <a class="dropdown-item" href="voucher.php">
          <i class="fa fa-table fa-fw"></i>
          <span>Kollimalai</span></a>


      </div>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>User Maintanance</span>
        </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
    <a class="dropdown-item" href="user.php">
          <i class="fa fa-table fa-fw"></i>
          <span>User</span></a>
      </div></li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Sakthi Nagar</li>
        </ol>
    <h1>Sakthi Nagar</h1>
        <hr>
        <div class="panel-body">
                    <!-- Button trigger modal -->
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addc">
                        Add Details
                    </button>
                    <button class="btn btn-success" data-toggle="modal" onclick=" myFunction() " value="Print">
                      <a href="sakthinagar.php" style="color:white">  Print</a>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="addc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Add Details</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                               <div class="modal-body">
                                    <form action="sakthinagarsave.php" method="post" class = "form-group">
                                        <div id="ac">
                                           <span>S.no : </span><input type="text" name="sno" class = "form-control" />
                                            <span>Date : </span><input type="date" name="date" class = "form-control" />
                                             <span>Monor : </span><input type="text" name="monor" class = "form-control" />
                                              <span>Binder : </span><input type="text" name="binder" class = "form-control" />
                                               <span>ELE/Plumber Tile Moron: </span><input type="text" name="plumber" class = "form-control" />
                                                <span>Painter: </span><input type="text" name="painter" class = "form-control" />
                                                 <span>Others : </span><input type="text" name="others" class = "form-control" />
                                                 <span>Remarks : </span><input type="text" name="remarks" class = "form-control" />


                                            <span>&nbsp;</span><input class="btn btn-primary btn-block"  type="submit" value="save" class = "form-control" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
        <br>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Unit List</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable12" width="100%" cellspacing="0">

                    <thead>
                        <tr>
                              <th> S.number </th>

                            <th width="15%"> Date </th>
                            <th width="15%" class="sum"> Monor </th>
                            <th width="15%" class="sum"> Binder </th>
                            <th width="15%" class="sum"> ELE/Plumber Tile Moron</th>
                            <th width="15%" class="sum"> Painter </th>
                            <th width="15%" class="sum"> Others </th>
                            <th width="15%"> Remarks</th>
                            <th width="20%"> Action</th>
                            <th></th>


                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include('connect.php');
                        $result = $db->prepare("SELECT * FROM addgroup3 ORDER BY id DESC");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record">
                                 <td><?php echo $row['sno']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                 <td><?php echo $row['monor']; ?></td>
                                  <td><?php echo $row['binder']; ?></td>
                                   <td><?php echo $row['plumber']; ?></td>
                                    <td><?php echo $row['painter']; ?></td>
                                     <td><?php echo $row['others']; ?></td>
                                      <td><?php echo $row['remarks']; ?></td>


                                <td><a rel="facebox" class="btn btn-primary" href="sakthinagaredit.php?id=<?php echo $row['id']; ?>"> <i class="">Edit</i> </a>  </td>
                                <td>
                <a href="#"id="<?php echo $row['id']; ?>" class="btn btn-danger delbutton" title="Click To Delete"><i class = "fa fa-trash"></i></a></td>
                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
                     <tfoot>
            <tr>
                <th>Total</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                 <th></th>
                <th></th>

            </tr>
        </tfoot>
                </table>
            </div>
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
     url: "deletegroup3.php",
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
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->


    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 <!-- Add user Modal-->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">


                    <h4 class="modal-title" id="myModalLabel">Add User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">


                    <form action="saveuser.php" method="post" class = "form-group" >
                        <div id="ac">
                            <span>USERNAME : </span><input type="text" name="user" class = "form-control" />
                            <span>PASSWORD: </span><input type="PASSWORD" name="pass" class = "form-control" />
                            <span>FULL NAME : </span><input type="text" name="name" class = "form-control" />
                            <span>POSITION: </span>
                            <select name = "post" class = "form-control">
                                <option>User</option>
                <option>Customer</option>
                            </select>
                            <span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" class = "form-control" value="save" />
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
<script>

  jQuery('document').ready(function(){

    var table = $('#dataTable12').DataTable({
    "initComplete": function (settings, json) {
        this.api().columns('.sum').every(function () {
            var column = this;

            var sum = column
               .data()
               .reduce(function (a, b) {
                   a = parseInt(a, 10);
                   if(isNaN(a)){ a = 0; }

                   b = parseInt(b, 10);
                   if(isNaN(b)){ b = 0; }

                   return a + b;
               });

            $(column.footer()).html( sum);
        });
    }
});

   // $table=jQuery('#dataTable123');
    /*  $table.find('tbody').append('<tr><td>Total:</td></tr>');
      var length=$table.find('thead tr th').length;
      for(var i=1;i<length;i++){
        var sum=0;
        $table.find('tbody tr').each(function(){
          if(!isNaN(Number(jQuery(this).find('td').eq(i).text()))){
            sum=sum+Number(jQuery(this).find('td').eq(i).text());
          }
        });
        $table.find('tbody tr:last-child').append('<td>'+sum+'</td>');
*/
       // $table.column(2).data().sum();


    //  }
  });
</script>
