<?php
$server = "localhost:3306";
$user = "root";
$password = "";
$dbname = "capstonedb";

$conn = new mysqli($server, $user, $password, $dbname);

if($conn->connect_error) echo "<h2> 접속에 실패하였습니다.</h2?";
else echo "<h2> 접속에 성공하였습니다.</h2>";

?>