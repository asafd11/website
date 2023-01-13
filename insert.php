<?php
$phone=$_GET['phone'];
$email=$_GET['Email'];
$fname=$_GET['name'];
$lname=$_GET['lastname'];
$uid=$_GET['uid'];
$bdate=$_GET['born_on'];
$title=$_GET['title'];
$gender=$_GET['gender'];

include 'connection.php';




$result=$mysql_booking->query("INSERT INTO `users`(`phone`, `id`, `firstname`, `lastname`, `email`, `title`, `gender`, `bdate`) 
VALUES ('$phone','$uid','$fname','$lname','$email','$title','$gender','$bdate')
ON DUPLICATE KEY
    UPDATE `id`='$uid', `firstname`='$fname', `lastname`='$lname', `email`='$email', `title`='$title', `gender`='$gender', `bdate`='$bdate';");


if($result)
{
echo "Success";

}
else
{
echo "Error";

}