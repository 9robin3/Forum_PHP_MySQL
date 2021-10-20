<?php
//index.php
ini_set('display_errors', 1);
include 'connect.php';
include 'header.php';
 
$sql = "SELECT
            cat_id,
            cat_name,
            cat_description
        FROM
            categories";
 
$result = mysqli_query($conn, $sql);
 
if(!$result)
{
    echo 'The categories could not be displayed, please try again later.';
}
else
{
    if(mysqli_num_rows($result) == 0)
    {
        echo 'No categories defined yet.';
    }
    else
    {
        //prepare the table		
        echo '<table border="1">
              <tr>
                <th>Category</th>
                
              </tr>'; 
             
        while($row = mysqli_fetch_assoc($result))
        {               
            $id = $row['cat_id'];
			$name = $row['cat_name'];
			$desc = $row['cat_description'];
			
			echo '<tr>';
                echo '<td class="leftpart">';
                            echo '<h3><a href="category.php?id='.$id.'">' . $name . '</a></h3>' . $desc.'';
                echo '</td>';
                //echo '<td class="rightpart">';
                            //echo '<a href="topic.php?id='.$id.'">' . $name . '</a> at 10-10';
                //echo '</td>';
            echo '</tr>';
        }
    }
}
 
include 'footer.php';
?>