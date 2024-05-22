<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>부동산 검색 결과</title>
    <style>
        .center {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <h1>검색결과</h1> 
    <script>
        //다시 지역 탭으로 이동하는 기능
        function redirectToView() {
        window.location.href = "/CapStone/capstone_4_1/Html_Folder/Location.html?search=";
    }
    </script>
    <div class="search-container" style="padding: 5%;">
        <form>
            <input type="button" id="search_button" value="돌아가기" onclick="redirectToView()">
        </form>
    </div>
    <?php
    include_once("connect.php");
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    // 검색어가 포함된 데이터를 검색하는 SQL 쿼리
    $sql = "SELECT * FROM search WHERE name LIKE '%$search%' OR location LIKE '%$search%' OR type LIKE '%$search%' OR billtype LIKE '%$search%'";
    $result = $conn->query($sql);
    $total_results = $result->num_rows;
    $results_per_page = 10;
    $number_of_pages = ceil($total_results/$results_per_page);

    if(!isset($_GET['page'])){
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    $this_page_first_result = ($page-1)*$results_per_page;
    // 이 페이지의 결과를 가져오는 SQL 쿼리
    $sql="SELECT * FROM search WHERE name LIKE '%$search%' OR location LIKE '%$search%' OR type LIKE '%$search%' OR billtype LIKE '%$search%' LIMIT $this_page_first_result, $results_per_page";
    $result = $conn->query($sql);

    if($total_results > 0){
        while($row = $result->fetch_assoc()){
            echo "<strong>이름:</strong> ". $row['name']."<br>";
            echo "<strong>지역:</strong> ". $row['location']."<br>";
            echo "<strong>주거 형태:</strong> ". $row['type']."<br>";
            echo "<strong>거래 형태:</strong> ". $row['billtype']."<br>";
            echo "<strong>크기:</strong> ". $row['size']."㎡<hr><br>";
            
        }
    } else echo "검색된 데이터가 없습니다.";

    echo '<div class="center">';

    for ($page=1;$page<=$number_of_pages;$page++) {
        echo '<a href="view.php?page=' . $page . '">' . $page . '</a> ';
    }
    echo '</div>';
    ?>
    <script>
        //미완
        //echo "<input type='checkbox' id='fav' name='fav' value='".$row['id']."'>"; // 즐겨찾기 체크박스 생성을 위에 while문 안에 넣어서 손봐야함
        // 체크박스 클릭 이벤트
        document.querySelectorAll('input[type=checkbox]').forEach(function(checkbox) {
            checkbox.addEventListener('fav', function(e) {
                var id = e.target.value;
                var checked = e.target.checked;
                // AJAX 요청으로 서버에 체크박스 상태 전달
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'update_interest.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send('id=' + id + '&checked=' + checked);
            });
        });
    </script>
</body>
</html>
