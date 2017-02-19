<?php
include('database.php');
session_start();//session starts here 

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
		  <!--<li><a href=""><?php echo $_SESSION['user_email']?></a></li> -->
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
            <li class="active"><a href="dashboard.php">Dashboard</a></li>

          <li><a href="all.php">All Daily Note</a></li>
            <li><a href="add.php">Add Daily Note</a></li>
   <!--         <li><a href="#">Export</a></li>-->
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
          <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Todays Note</h3>
  </div>
  <div class="panel-body">
    <div class="row">
	   <div class="col-md-12">
	  <a class="btn btn-primary" href="add.php"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Note </a>
	   </div>
	</div>
	<hr>
    <div class="row">
        <?php

        $results = mysqli_query($dbcon, "SELECT * FROM notes");
        $i = 0;
        while($row = $results->fetch_assoc())
        {
            ?>
            <div class="col-md-6 mymodal" date="<?php echo $row['date'] ?>"  title="<?php echo $row['title'] ?>"   details="<?php echo $row['details'] ?>" >
                <div class="thumbnail" >
                    <h5 class="pointer"><?php echo $row['title'] ?></h5>
                </div>
            </div>
            <?php
        }
        ?>

	</div>
	
	<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
           <div class="row">
		       <div class="col-md-12">
			     <h3>Date: <span id="mydate"></span> </h3>
				 <p class="text-justify" id="details">

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
  <script>
      $(document).ready(function(){
            $('.mymodal').click(function(e){
                $('#myModalLabel').html($(this).attr('title'))
                $('#details').html($(this).attr('details'))
                $('#mydate').html($(this).attr('date'))
                $('#myModal').modal('toggle');
            });
      });
  </script>
  </body>
</html>
