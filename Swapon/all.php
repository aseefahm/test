<?php
include('database.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>All Daily Note</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
	
	 <link href="css/style.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Daily Note</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class=""><a href="dashboard.php">Dashboard</a></li>
            <li class="active"><a href="all.php">All Daily Note</a></li>
            <li class=""><a href="add.php">Add Daily Note</a></li>
<!--      <li><a href="#">Export</a></li>-->
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
          <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">All Daily Note</h3>
  </div>
  <div class="panel-body">
    <div class="row">
	    <div class="col-md-12">
            <?php

            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                mysqli_query($dbcon, "DELETE FROM notes where id=${id}");
				
            }
            ?>
		     <table class="table table-bordered table-hover"> 
			 <thead> 
                 <tr>
                 <th>#</th>
                 <th>Title</th>
                 <th>Place</th>
                 <th>Details</th>
				
				 <th>Date</th>
                 <th class="text-center">Action</th>
			 </tr>
			 </thead>
			 <tbody> 
             <?php

             $results = mysqli_query($dbcon, "SELECT * FROM notes");
             $i = 0;
             while($row = $results->fetch_assoc())
             {
                 $i++;
                 echo "<tr>";
                     echo "<td>${i}</td>";
                     echo "<td>${row['title']}</td>";
                     echo "<td>${row['place']}</td>";
                     echo "<td>${row['details']}</td>";
					 echo "<td>${row['date']}</td>";
                     echo "<td class='text-center'>";
                         echo "<a href='edit.php?id=${row['id']}' class='btn btn-primary'>Edit</a>";
                         echo " <a onclick='myFunction()' href='all.php?id=${row['id']}' class='btn btn-danger'>Delete</a>";
                     echo "</td>";
                 echo "</tr>";
             }
             if($i == 0)
             {
                 echo "<tr><td colspan='5'>No Data Found</td><tr>";
             }
             ?>
			 </tbody> 
			 </table>
	    </div>
		<script>
function myFunction() {
    alert("Are you sure want to Delete?");
}
</script> 
	</div>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Details</h4>
      </div>
      <div class="modal-body">
           <div class="row">
		       <div class="col-md-12">
			     <h3> </h3>
				 <p class="text-justify">
				    Daily NOte Description Here
				 </p>
			   </div>
		   </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	
  </div>
</div>
		  </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
