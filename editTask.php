<?php 
	require('config/config.php');
	require('config/db_config.php');

	// form is submitted
	if (isset($_POST['edit'])) {
		$updated_id = mysqli_real_escape_string($connection, $_POST['updated_id']);
		$taskName = mysqli_real_escape_string($connection, $_POST['taskName']);
		$description = mysqli_real_escape_string($connection, $_POST['description']);
		$deadLineDate = mysqli_real_escape_string($connection, $_POST['deadLineDate']);
		$importance = mysqli_real_escape_string($connection, $_POST['importance']);

		echo $updated_id;
		// query
		$query2 = "UPDATE tasks SET taskName='$taskName',
									description='$description',
									deadLineDate='$deadLineDate',
									importance='$importance'
									WHERE id=".$updated_id;

		// update date
		if (mysqli_query($connection, $query2)) {
		 	header('Location: '.ROOT_URL);
		 } else {
		 	echo 'somthing goes wrong, error : '.mysqli_error($connection);
		 }
	}	 

	$id = mysqli_real_escape_string($connection, $_GET['id']);
	// query
	$query1 = 'SELECT * FROM tasks WHERE id ='.$id;

	// getting results
	$result = mysqli_query($connection, $query1);

	// fetch data
	$task = mysqli_fetch_assoc($result);

	// free the result
	mysqli_free_result($result);

	// close the connection
	mysqli_close($connection);

	
?>



<?php include('include/header.php') ?> 
	<br>
	<div class="container">
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
			<div class="form-group">
				<label>task name</label>
				<input type="text" name="taskName" class="form-control" value="<?php echo $task['taskName'] ?>" placeholder="task name">
			</div>
			<div class="form-group">
				<label>task description</label>
				<textarea name="description" class="form-control"><?php echo $task['description'] ?></textarea>
			</div>
			<div class="form-group">
				<label>deadline date</label>
				<input type="date" name="deadLineDate" class="form-control" value="<?php echo $task['deadLineDate']; ?>">
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
			<input type="hidden" name="updated_id" value="<?php echo $task['id'] ?>">
			<input type="submit" name="edit" value="edit" class="btn btn-success">
		</form>
 	</div>
 <?php include('include/footer.php') ?>