<?php
	require('config/config.php');
	require('config/db_config.php');

	if (isset($_POST['yes'])) {
		// id of finished Task
		$finishedTaskId =  mysqli_real_escape_string($connection, $_POST['finishedTask']);

		// query
		$query = "DELETE FROM tasks WHERE id = {$finishedTaskId}";

		// finish the task
		if (mysqli_query($connection, $query)) {
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
	<div class="container">
		<div class="card" style="max-width: 40em; margin: 10px">
			<div class="card-body">
				<p class="card-text">Are you sure you finished the task?</p>
				<div style="display : flex">
					<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" style="margin : 0.5em">
						<input type="hidden" name="finishedTask" value="<?php echo $task['id']; ?>">
						<input type="submit" name="yes" value="yes" class="btn btn-danger">
					</form>
					<a href="<?php echo ROOT_URL?>" class="btn btn-primary" style="margin: 0.5em">no</a>
				</div>
			</div>
		</div>
	</div>
<?php include('include/footer.php') ?> 

