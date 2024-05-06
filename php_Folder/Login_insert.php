<?php
    $id = $_POST["id"];
    $pass = $_POST["pass"];

    $regist_day = date("Y-m-d (H:i)"); // 가입 당시의 연-월-일-시-분 저장

    $con = mysqli_connect("localhost","Leejy","dlwodud","capstonedb"); //부동산 db에 로그인

    // db에 id와 pass를 삽입하는 sql문
    $sql = "insert into logindata(id, pass)";
    $sql .= " values('$id', '$pass')";

    // sql에 저장된 명령 실행
    mysqli_query($con, $sql);
    mysqli_close($con);
    
    // 메인 페이지로 돌아가기
   // sql에 저장된 명령 실행
    if (mysqli_query($con, $sql)) {
        // 성공한 경우
        mysqli_close($con);
        echo "
        <script>
            location.href = 'Main.html';
        </script>
        ";
    } else {
        // 실패한 경우 오류 출력
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
?>