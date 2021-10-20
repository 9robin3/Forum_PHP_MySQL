<?php 

ini_set('display_errors', 1);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="A short description." />
    <meta name="keywords" content="put, keywords, here" />
    <title>Robin's Funny Forum</title>
    <link rel="stylesheet" href="style.css" type="text/css">

	
	</head>
<body>
<h1>Robin's Funny Forum</h1>
    <div id="wrapper" height = "50px">
    <div id="menu">
        <a class="item" href="index.php">Home</a> -
        <a class="item" href="create_topic.php">Create a topic</a> -
        <a class="item" href="create_cat.php">Create a category</a> -------------------------------------------------
		<a class = "item" href="signin.php">Sign In</a> - 
		<a class = "item" href="signup.php">Sign Up</a>
	
        <div id="userbar">	

<?php
		if($_SESSION['signed_in'])
    {
        echo 'Hello ' . $_SESSION['user_name'] . '. Not you? <a href="signout.php">Sign out</a>';
    }
	
?>
	</div>
      </div>
        <div id="content">
