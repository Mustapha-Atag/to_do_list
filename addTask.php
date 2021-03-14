<?php 
	require('config/config.php');
	require('config/db_config.php');

	// getting data from the form
	if(isset($_POST['submit'])) {
		$taskName = mysqli_real_escape_string($connection, $_POST['taskName']);
		$description = mysqli_real_escape_string($connection, $_POST['description']);
		$deadLineDate = mysqli_real_escape_string($connection, $_POST['deadLineDate']);
		$importance = mysqli_real_escape_string($connection, $_POST['importance']);

		// query
		$query = "INSERT INTO tasks(taskName, description, deadLineDate, importance) VALUES('$taskName', '$description', '$deadLineDate', '$importance')";

		if (mysqli_query($connection, $query)) {
			header('Location: '.ROOT_URL);
		} else {
			echo 'somthing goes wrong'.mysqli_error($connection);
		}
	}

?>




<?php include('include/header.php') ?> 
	<br>
	<div class="container">
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
			<div class="form-group">
				<label>task name</label>
				<input type="text" name="taskName" class="form-control" placeholder="task name">
			</div>
			<div class="form-group">
				<label>task description</label>
				<textarea name="description" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label>deadline date</label>
				<input type="date" name="deadLineDate" class="form-control">
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
			<input type="submit" name="submit" value="add" class="btn btn-success">
		</form>
 	</div>
 <?php include('include/footer.php') ?>	