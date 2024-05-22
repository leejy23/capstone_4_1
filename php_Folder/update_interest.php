<?php
//미완성
include_once("connect.php");
$id = $_POST['fav'];
$checked = $_POST['checked'];

if ($checked) {
    // 체크박스가 체크된 경우, 'interest' 테이블에 데이터 추가
    $sql = "INSERT INTO interest (price, address, name, size, type) SELECT billtype, location, name, size, type FROM search WHERE id = $id";
} else {
    // 체크박스가 해제된 경우, 'interest' 테이블에서 데이터 삭제
    $sql = "DELETE FROM interest WHERE id = $id";
}

$conn->query($sql);
?>