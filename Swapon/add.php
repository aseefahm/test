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

    <title>Add Daily Note</title>

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
   <!--  <li><a href="#">Export</a></li>-->
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
              <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Add Daily Note</h3>
  </div>
  <div class="panel-body">
    <div class="row">
	    <div class="col-md-12 ">
<form method="post" action="add.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" name="title" class="form-control" placeholder="Title" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Place</label>
    <input type="text" name="place" class="form-control" placeholder="Place" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Details</label>
    <input type="text" name="details" class="form-control" placeholder="Details"required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Date</label>
    <input type="date" name="date" class="form-control" >
  </div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-6">
      <input type="submit" name="submit" class="btn btn-success" value="ADD">
        <?php
        if(isset($_POST['submit']))
        {
            $title = $_POST['title'];
            $place = $_POST['place'];
            $details = $_POST['details'];
            $date = Date('Y-m-d');
            
            $query = "INSERT INTO notes (title, place, details, date) values ('".$title."', '".$place."', '".$details."', '".$date."')";
            if(mysqli_query($dbcon, $query))
            {
                echo "<div class='row bg bg-success' style='top: 5px; position: relative; padding: 20px;'>Data has been saved successfully.</div>";
            }
            else
            {
                echo "<div class='bg bg-warning'>Data could not be saved.</div>";
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
