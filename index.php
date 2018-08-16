<?php


$title = "Duck Hunt";
$link = "admin";

require "inc/header.php";





if($_GET['success']): ?>

	<div class="modal show">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Message from the webmaster</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="false">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p><?php echo $_GET['success'] ?></p>
				</div>
			</div>
		</div>
	</div>

<?php endif ?>








<div class="container">
	<div class="row">
		<div class="col-sm-12">

			<form action="save.php" method="post">
				<div class="form-group">
					<label for="where">Where</label>
					<input  id="where"type="text" name="where" value="" class="form-control" />
					<small id="whereHelp" class="form-text text-muted">
						Where did you see these targets ?</small>

						<?php
							if($_GET['where']){
								echo '<div class="alert alert-danger">'.$_GET['where'].'</div>';
							}
						?>
				</div>

				<div class="form-group">
					<label for="when">When</label>
					<input id="when" type="datetime" name="when" value="" class="form-control" />
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
					<small id="whenHelp" class="form-text text-muted">
						When did you saw them ?</small>

						<?php
							if($_GET['when']){
								echo '<div class="alert alert-danger">'.$_GET['when'].'</div>';
							}
						?>
				</div>

				<div class="form-group">
					<label for="howmany">How many</label>
					<input id="howmany" type="range" min="1" max="50"
						name="howmany" value="1" class="form-control" />
					<h3 id="selected-range">1</h3>
					<small id="howmanyHelp" class="form-text text-muted">
						How many of these are still alive ?</small>


						<?php
							if($_GET['howmany']){
								echo '<div class="alert alert-danger">'.$_GET['howmany'].'</div>';
							}
						?>
				</div>

				<input type="submit" name="report" value="report !" class="btn btn-primary float-right" />
			</form>

		</div>
	</div>
</div>




<?php require "inc/footer.php"; ?>
