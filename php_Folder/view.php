<?php
include_once("connect.php");
$sql = "SELECT * FROM search";
$result = $conn->query($sql);

if(isset($result) && $result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "이름: ". $row['name'];
        echo "지역: ". $row['location']."<br>";
        echo "형태: ". $row['type']."<br>";
        echo "거래형태: ". $row['billtype']."<br>";
        echo "크기: ". $row['size']."<hr><br>";;
    }
} else echo "검색된 데이터가 없습니다.";

?>