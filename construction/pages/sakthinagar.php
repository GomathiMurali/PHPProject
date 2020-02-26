<?php
  
include_once('auth.php');



?>
<!doctype html>
<html>
<head>
	<title></title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/newemp.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<h1 align="center">SakthiNagar</h1>
                   <button class="btn btn-success" data-toggle="modal" onclick=" myFunction() " align="right">
                      <a href="sakthinagar.php">  Print</a>
                    </button>
<div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
                    <thead>
                        <tr>
                              <th> S.number </th>
                           
                            <th width="15%"> Date </th>
                            <th width="15%"> Monor </th>
                            <th width="15%"> Binder </th>
                            <th width="15%"> ELE/Plumber Tile Moron</th>
                            <th width="15%"> Painter </th>
                            <th width="15%"> Others </th>
                            <th width="15%"> Remarks</th>
                         
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
                               
                              
                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
          </div>
         
        </div>
</body>
</html>
<script>
function myFunction() {
  window.print();
}
</script>