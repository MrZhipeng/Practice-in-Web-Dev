 <!-------w-----------

    Assignment 3
    Name: Zhipeng Ding
    Date: 2022-08-02
    Description: Assignment 3 Blog
    
-------------------->

<?php
	require('connect.php');

	// Delete blog
	if($_POST['command_delete'])
	{
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

		$query = "DELETE FROM blogs WHERE id = :id LIMIT 1";
		$statement = $db->prepare($query);

		$statement->bindValue(':id', $id);

		$statement->execute();

		header("Location: index.php");
        exit;
	}

	// UPDATE blog
    else if ($_POST && !empty($_POST['title']) && !empty($_POST['content']) && isset($_POST['id']))
    {
        // Sanitize user input to escape HTML entities and filter out dangerous characters.
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        
        // Build the parameterized SQL query and bind to the above sanitized values.
        $query = "UPDATE blogs SET title = :title, content = :content WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':title', $title);        
        $statement->bindValue(':content', $content);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        
        // Execute the INSERT.
        $statement->execute();
        
        // Redirect after update.
        header("Location: index.php");
        exit;
    }

    // Post new blog
	else if($_POST && !empty($_POST['title']) && !empty($_POST['content']))
	{
		// Sanitize user input to escape HTML entities and filter out dangerous characters.
		$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

		// Build the parameterized SQL query and bind to the above sanitized values.
		$query = "INSERT INTO blogs (title, content) VALUES (:title, :content)";
		$statement = $db->prepare($query);

		// Bind values to the parameters
		$statement->bindValue(':title', $title);
		$statement->bindValue(':content', $content);

		// Execute the INSERT
		$statement->execute();

		// Redirect to index.php
		header("Location: index.php");
        exit;
	}
?>

<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Process Post</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<?php if(empty($_POST['title']) || empty($_POST['content'])): ?>
		<div id="wrapper">
			<div id="header">
				<h1><a href="index.php">My Amazing Blog</a></h1>
			</div> 
			<h1>An error occured while processing your post.</h1>
			<p>Both the title and content must be at least one character.</p>
			<a href="index.php">Return Home</a>
			<div id="footer">
				Copywrong 2022 - No Rights Reserved
			</div> 
		</div>
	<?php endif ?>
</body>
</html>