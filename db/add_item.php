<?php
ob_start(); // 출력 버퍼링 활성화
header('Content-Type: application/json; charset=UTF-8'); // JSON 형식의 응답 헤더 설정

session_start(); // 세션 시작

include('./connect.php');
mysqli_set_charset($conn, "utf8");

// 연결 확인
if ($conn->connect_error) {
    $response = ["message" => "데이터베이스 연결 실패: " . $conn->connect_error];
    echo json_encode($response);
    exit;
}
echo "userName 값: ".$_SESSION['username']."<br/>";
// 세션에서 username 가져오기
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $response = ["message" => "세션에서 사용자 이름을 찾을 수 없습니다. 로그인이 필요합니다."];
    echo json_encode($response);
    exit;
}

// POST 데이터에서 "item" 가져오기
if (isset($_POST['item'])) {
    $item = $_POST['item'];
} else {
    $response = ["message" => "구매할 아이템을 선택하세요."];
    echo json_encode($response);
    exit;
}

// SQL 쿼리를 사용하여 상품 추가
$sql = "INSERT INTO my_shop (username, item) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $item);

if ($stmt->execute()) {
    $response = ["message" => "상품이 성공적으로 추가되었습니다."];
    echo json_encode($response);
} else {
    $response = ["message" => "상품 추가 중 오류가 발생했습니다."];
    echo json_encode($response);
}

// 데이터베이스 연결 종료
$conn->close();
?>
