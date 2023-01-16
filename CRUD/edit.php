 <!-------w-----------

    Assignment 3
    Name: Zhipeng Ding
    Date: 2022-08-02
    Description: Assignment 3 Blog
    
-------------------->

<?php
	require('connect.php');
	require('authenticate.php');

	// Build the parameterized SQL query
	$query = "SELECT * FROM blogs WHERE id = :id LIMIT 1";
	$statement = $db->prepare($query);

	// Sanitize user input
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

	// Bind values and execute the SELECT
	$statement->bindValue(':id', $id, PDO::PARAM_INT);
	$statement->execute();

	$row = $statement->fetch();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editing <?= $row['title'] ?></title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<h1><a href="index.php">My Amazing Blog</a></h1>
		</div> 
		<ul id="menu">
			<li><a href="index.php">Home</a></li>
			<li><a href="create.php">New Post</a></li>
		</ul> 
		<div id="all_blogs">
			<form action="process_post.php" method="post">
				<fieldset>
					<legend>Edit Blog Post</legend>
					<p>
						<label for="title">Title</label>
						<input name="title" id="title" value="<?= $row['title'] ?>" />
					</p>
					<p>
						<label for="content">Content</label>
						<textarea name="content" id="content"><?= $row['content'] ?></textarea>
					</p>
					<p>
						<input type="hidden" name="id" value="<?= $row['id'] ?>" />
						<input type="submit" name="command_update" value="Update" />
						<input type="submit" name="command_delete" value="Delete" onclick="return confirm('Are you sure you wish to delete this post?')" />
					</p>
				</fieldset>
			</form>
		</div>
		<div id="footer">
			Copywrong 2022 - No Rights Reserved
		</div> 
	</div> 
</body>
</html>