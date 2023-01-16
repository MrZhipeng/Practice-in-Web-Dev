 <!-------w-----------

    Assignment 3
    Name: Zhipeng Ding
    Date: 2022-08-02
    Description: Assignment 3 Blog
    
-------------------->

<?php
   require('connect.php');

   // Build the parameterized SQL query
   $query = "SELECT * FROM blogs ORDER BY id DESC LIMIT 5";
   $statement = $db->prepare($query);
   
   // Execute SELECT
   $statement->execute();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Blog - Home Page</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<h1><a href="index.php">My Amazing Blog</a></h1>
		</div> 
		<ul id="menu">
			<li><a href="index.php" class='active'>Home</a></li>
			<li><a href="create.php">New Post</a></li>
		</ul> 

		<div id="all_blogs">
			<!-- Display when the number of blogs is larger than zero. -->
			<?php if ($statement->rowCount() > 0): ?>
		    	
		    	<!-- Fetch each table row in turn. -->
		    	<?php while($row = $statement->fetch()): ?>
					<div class="blog_post">
						<h2><a href="show.php?id=<?= $row['id'] ?>"><?= $row['title'] ?></a></h2>
						<p>
							<small>
								
								<!-- Format the timestamp. -->
								<?= date("F j, Y, g:i a", strtotime($row['time'])) ?> -
								<a href="edit.php?id=<?= $row['id'] ?>">edit</a>
							</small>
						</p>
						
						<!-- If blog content is larger than 200 characters the displayed content is truncated to 200 characters. -->
						<?php if(strlen($row['content']) > 200): ?>
							<div class='blog_content'>
								<?= substr($row['content'], 0, 200) ?>
								<a href="show.php?id=<?= $row['id'] ?>">Read more</a>
							</div>
						<?php else: ?>
							<div class='blog_content'>
								<?= $row['content'] ?>
							</div>
						<?php endif ?>
					</div>
				<?php endwhile ?>
		   <?php else: ?>
		    	<p>There is no blog. Try to write something.</p>
		   <?php endif ?>
		</div>

		<div id="footer">
			Copywrong 2022 - No Rights Reserved
		</div>

	</div> 
</body>
</html>
