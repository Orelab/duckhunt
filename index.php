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
					<label for="where">Where did you see these ducks ?</label>
					<input id="where" type="hidden" name="where" value="" class="form-control" />

					<div id="map"></div>
					<input type="hidden" name="latitude" value="" />
					<input type="hidden" name="longitude" value="" />

					<?php
						if($_GET['where']){
							echo '<div class="alert alert-danger">'.$_GET['where'].'</div>';
						}
					?>
				</div>

				<div class="form-group">
					<label for="when">When did you see them ?</label>
					<input id="when" type="hidden" name="when" value="" class="form-control" />
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>

					<?php
						if($_GET['when']){
							echo '<div class="alert alert-danger">'.$_GET['when'].'</div>';
						}
					?>
				</div>

				<div class="form-group">
					<label for="howmany">How many of them are invading us ?</label>
					<input id="howmany" type="range" min="1" max="50"
						name="howmany" value="1" class="form-control" />
					<h3 id="selected-range">1</h3>

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
