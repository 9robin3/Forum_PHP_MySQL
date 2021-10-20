
<?php
//reply.php
include 'connect.php';
include 'header.php';

 
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    //someone is calling the file directly, which we don't want
    echo 'This file cannot be called directly.';
}
else
{
    //check for sign in status
    if(!$_SESSION['signed_in'])
    {
        echo 'You must be signed in to post a reply.';
    }
    else
    {
		$postCont = $_POST['reply-content'];
		$postTop = mysqli_real_escape_string($conn, $_GET['id']);
		$userID = $_SESSION['user_id'];
		
        //a real user posted a real reply
        $sql = "INSERT INTO 
                    posts(post_content,
                          post_date,
                          post_topic,
                          post_by) 
                VALUES (' $postCont',
                        CURRENT_TIMESTAMP(),
                        ' $postTop ',
                        ' $userID ')";
                         
        $result = mysqli_query($conn, $sql);
                         
        if(!$result)
        {
            echo 'Your reply has not been saved, please try again later.';
        }
        else
        {
            echo 'Your reply has been saved, check out <a href="topic.php?id=' . htmlentities($_GET['id']) . '">the topic</a>.';
        }
    }
}
 
include 'footer.php';
?>