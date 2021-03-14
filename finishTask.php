<?php 
	require('config/config.php');
	require('config/db_config.php');
	
?>



<?php include('include/header.php') ?> 
	<br>
	<div class="container">
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
			<div class="form-group">
				<label>task name</label>
				<input type="text" name="taskName" class="form-control" value="" placeholder="task name">
			</div>
			<div class="form-group">
				<label>task description</label>
				<textarea name="description" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label>deadline date</label>
				<input type="date" name="deadLineDate" class="form-control" value="">
			</div>
			<div class="form-group">
				<label>task importance</label>
				<br>
				<select class="form-select" name="importance" 
				aria-label="Default select example">
				  <option selected>...</option>
				  <option value="1">not important task</option>
				  <option value="2">small task</option>
				  <option value="3">important task</option>
				  <option value="4">very important task</option>
				</select>
				<br>
				<small>if you don't choose an option, the task will be considired as a not important task</small>
			</div>
			<br>
			<input type="submit" name="submit" value="edit" class="btn btn-success">
		</form>
 	</div>
 <?php include('include/footer.php') ?>