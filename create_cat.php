<?php
//create_cat.php
include 'connect.php';
include 'header.php';
 
  
echo '<h2>Create a category</h2>';
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    //the form hasn't been posted yet, display it
    echo "<form method='post' action=''>
        Category name: <input type='text' name='cat_name' /><br/><br />
        Category description: <br /><textarea name='cat_description' /></textarea><br /><br />
        <input type='submit' value='Create category' />
     </form>";
}
else
{
	$catName = mysqli_real_escape_string($conn, $_POST['cat_name']);
	$catDesc = mysqli_real_escape_string($conn, $_POST['cat_description']);
	
    //the form has been posted, so save it
     $sql = "INSERT INTO 
	               categories(cat_name, cat_description) 
				   VALUES ('$catName', '$catDesc')"; 
			 
    $result = mysqli_query($conn, $sql);
    if(!$result) 
    {
        //something went wrong, display the error
        echo 'Error' . mysqli_error($conn);
    }
    else
    {
        echo 'New category successfully added.';
    }
}
?>