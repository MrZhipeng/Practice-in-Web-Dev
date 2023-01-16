 <!-------w-----------

    Assignment 3
    Name: Zhipeng Ding
    Date: 2022-08-02
    Description: Assignment 3 Blog
    
-------------------->

<?php
	require 'authenticate.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css" type="text/css">
	<title>Post a New Blog</title>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<h1><a href="index.php">My Amazing Blog</a></h1>
		</div> 
		<ul id="menu">
			<li><a href="index.php">Home</a></li>
			<li><a href="create.php" class='active'>New Post</a></li>
		</ul> 
		<div id="all_blogs">
			<form action="process_post.php" method="post">
				<fieldset>
					<legend>New Blog Post</legend>
					<p>
						<label for="title">Title</label>
						<input name="title" id="title" />
					</p>
					<p>
						<label for="content">Content</label>
						<textarea name="content" id="content"></textarea>
					</p>
					<p>
						<input type="submit" name="command" value="Create" />
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