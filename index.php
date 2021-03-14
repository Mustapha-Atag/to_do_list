<?php 
	require('config/config.php');
	require('config/db_config.php');

	// query
	$query = 'SELECT * FROM tasks';

	// get results
	$result = mysqli_query($connection, $query);

	// fetch data
	$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// close connection
	mysqli_close($connection);
?>


<?php include('include/header.php') ?>
	<div class="container">
		<h3>Task to do</h3>
		<?php foreach($tasks as $task): ?>
			<div class="card <?php echo $task['id']%2 == 0 ? '' : 'text-white bg-secondary' ?>" style="margin : 10px">
			  <div class="card-body">
			    <h4 class="card-title"><?php echo $task['taskName'] ?></h4>
			    <h6 class="card-subtitle mb-2">Created at : <?php echo $task['createdAt'] ?></h6>
			    <p class="card-text"><?php echo $task['description'] ?></p>
			    <p class="">should be done at : <?php echo $task['deadLineDate'] ?></p>
			    <a href="<?php echo ROOT_URL ?>finishTask.php?id=<?php echo $task['id']; ?>" class="card-link">edit the task</a>
			    <a href="#" class="card-link">finish the task</a>
			  </div>
			</div>
		<?php endforeach; ?>
 	</div>
<?php include('include/footer.php') ?>
