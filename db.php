<?php
$dsn='mysql:host=localhost;dbname=company'; //Data Source name
$username='root';
$pass='mukeshaeric';
$options=[];

try{
    $conn=new PDO($dsn ,$username ,$pass ,$options);
    //echo"Database connected";
}
catch(PDOException $e){}
?>