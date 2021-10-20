<?php
//topic.php
include 'connect.php';
include 'header.php';
 
//first select the category based on $_GET['cat_id']

$topID = mysqli_real_escape_string($conn, $_GET['id']);


$sql = "SELECT
    topic_id,
    topic_subject
FROM
    topics
WHERE
    topics.topic_id = '" . $topID . "'";
 
$result = mysqli_query($conn, $sql);
 
if(!$result)
{
    echo 'The category could not be displayed, please try again later.' . mysqli_error($conn);
}
else
{
    if(mysqli_num_rows($result) == 0)
    {
        echo 'This topic does not exist.' . mysqli_error($conn);
    }
    else
    {
        //display category data
        while($row = mysqli_fetch_assoc($result))
        {
          echo '<h2>' . $row['topic_subject'] . '</h2>';
        }
     
        //do a query for the topics
        $sql = "SELECT
                 posts.post_topic,
                 posts.post_content,
                 posts.post_date,
                 posts.post_by,
                 users.user_id,
                 users.user_name
            FROM
                 posts
            LEFT JOIN
                 users
            ON
                 posts.post_by = users.user_id
            WHERE
                 posts.post_topic = '" . $topID . "'";
         
        $result = mysqli_query($conn, $sql);
         
        if(!$result)
        {
            echo 'The topics could not be displayed, please try again later.';
        }
        else
        {
            if(mysqli_num_rows($result) == 0)
            {
                echo 'There are no posts in this topic yet.';
            }
            else
				
            {
                //prepare the table
                echo '<table border="1">
                      <tr>
					    <th>Username</th>
                        <th>Message</th>
                        <th>Created at</th>
                      </tr>'; 
				
				while($row = mysqli_fetch_assoc($result))
                {               
					 $id = $row['post_topic'];
					 $user = $row['user_name'];
					 $subject = $row['post_content'] ;
					 $date = $row['post_date'];
					
					echo '<tr>';
					echo '<td class = "rightpart">';
					    echo ''.$user.'';
						echo '</td>';
                        echo '<td class="leftpart">';
						echo ''.$subject.'';
                        echo '</td>';
                        echo '<td class="rightpart">';
                            echo $date;
							//echo date('yyyy-mm-dd-hh:mm', strtotime($date));
                        echo '</td>';
                    echo '</tr>';
					
					
                }
				 
            }
				echo '<form method="post" action="reply.php?id='.$id.'">
                <textarea name="reply-content"></textarea><br/><br/>
                <input type="submit" value="Post" />
                </form><br/><br/>';
        }
    }
}
 
include 'footer.php';
?>