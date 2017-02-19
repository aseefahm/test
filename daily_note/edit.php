<?php
session_start();//session starts here 
if(!isset($_SESSION['user_email']))
{
    header('location: login.php');
}
include('database.php');

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $results = mysqli_query($dbcon, "SELECT * FROM notes where id=${id}");
        while($row = $results->fetch_assoc())
        {
            $id = $row['id'];
            $title = $row['title'];
            $place = $row['place'];
            $details = $row['details'];
        }
    }

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

    <title>Dashboard</title>

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
            <li class=""><a href="all.php">All Daily Note</a></li>
            <li class="active"><a href="add.php">Add Daily Note</a></li>
       <!--     <li><a href="#">Export</a></li>-->
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
          <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Edit Daily Note</h3>
  </div>
  <div class="panel-body">
    <div class="row">
	    <div class="col-md-12 ">
		    <form method="get" action="edit.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
      <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="text" name='title' value="<?php echo $title; ?>" class="form-control" placeholder="Title">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Place</label>
    <input type="text" name='place' value="<?php echo $place; ?>"  class="form-control" placeholder="Place">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Details</label>
    <input type="text" name='details' value="<?php echo $details; ?>"  class="form-control" placeholder="Details">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Date</label>
    <input type="date" name='date' value="<?php echo $date; ?>"  class="form-control" >
  </div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-6">
      <input type="submit" name="edit" value="EDIT" class="btn btn-success">
        <?php

            if(isset($_GET['edit']))
            {
                $id = $_GET['id'];
                $title = $_GET['title'];
                $place = $_GET['place'];
                $details = $_GET['details'];
				$date = $_GET['date'];
                echo $query = "UPDATE notes set title='".$title."', place='".$place."', details ='".$details."' WHERE id=${id}";
                if(mysqli_query($dbcon, $query))
                {
                    header('location: all.php');
                }
                else
                {
                    echo "<div class='bg bg-warning'>Data could not be updated.</div>";
                }

            }
        ?>
    </div>
  </div>
</form>
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
