
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $titre; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">


  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Suivi des taches</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
           
		   <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Ajouter une tache</button>


         
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>



    <div class="container-fluid" style="padding-top:100px;">
      <!-- Example row of columns -->
		<?php echo $contenu; ?>
      <hr>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <footer  class='text-center'>
        <p>&copy; 2017 Lexik, Inc.</p>
      </footer>
    </div> <!-- /container -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ajouter</h4>
      </div>
      <div class="modal-body">

		<form method="POST" action="index.php?controleur=task&action=add">
			<div class="form-group">
				<label for="task_description">Description de la tâche</label>
				<textarea class="form-control" rows="3" id='task_description' name='task_description'>Saisissez ici les informations que vous souhaitez</textarea>
			</div>

		<button type="submit" class="btn btn-success">Ajouter la tâche</button>
		</form>
	   
	   
      </div>
   
    </div>
  </div>
</div>
	
  </body>
</html>
