<?php
//category.php
ini_set('display_errors', 1);
include 'connect.php';
include 'header.php';
 
//first select the category based on $_GET['cat_id']

$topID = mysqli_real_escape_string($conn, $_GET['id']);


$sql = "SELECT cat_id, cat_name, cat_description 
        FROM categories WHERE cat_id = '" . $topID . "'";

$result = mysqli_query($conn, $sql);
 
if(!$result)
{
    echo 'The category could not be displayed, please try again later.' . mysqli_error($conn);
}
else
{
    if(mysqli_num_rows($result) == 0)
    {
        echo 'This category does not exist.'; 
		echo $sql;
		print_r($result);
    }
    else
    {
        //display category data
        while($row = mysqli_fetch_assoc($result))
        {
            echo '<h2>Topics in ′' . $row['cat_name'] . '′ category</h2>';
        }
     
        //do a query for the topics
        $sql = "SELECT  
                    topic_id,
                    topic_subject,
                    topic_date,
                    topic_cat
                FROM
                    topics
                WHERE
                    topic_cat = '" . $topID . "'";
         
        $result = mysqli_query($conn, $sql);
         
        if(!$result)
        {
            echo 'The topics could not be displayed, please try again later.';
        }
        else
        {
            if(mysqli_num_rows($result) == 0)
            {
                echo 'There are no topics in this category yet.';
            }
            else
            {
                //prepare the table
                echo '<table border="1">
                      <tr>
                        <th>Topic</th>
                        <th>Created at</th>
                      </tr>'; 
                     
                while($row = mysqli_fetch_assoc($result))
                {               
                    $id = $row['topic_id'];
					$subject = $row['topic_subject'] ;
					$date = $row['topic_date'];
					
					echo '<tr>';
                        echo '<td class="leftpart">';
                            echo '<h3><a href="topic.php?id='.$id.'">' . $subject . '</a><h3>';
                        echo '</td>';
                        echo '<td class="rightpart">';
                            echo $date;
							//echo date('yyyy-mm-dd-hh:mm', strtotime($row['topic_date']));
                        echo '</td>';
                    echo '</tr>';
                }
            }
        }
    }
}
 
include 'footer.php';
?>