<?php
// 데이터베이스 연결 설정
session_start(); // 세션 시작

include('./connect.php');
mysqli_set_charset($conn, "utf8");

// 연결 확인
if ($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
}

// POST 데이터 가져오기 및 검사
if (isset($_POST['nickname']) && isset($_POST['username']) && isset($_POST['password'])) {
    $nickname = $_POST['nickname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 데이터베이스에 데이터 삽입
    $sql = "INSERT INTO users (nickname, username, password) VALUES ('$nickname', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "success"; // 회원가입이 성공한 경우
    } else {
        echo "error"; // 오류가 발생한 경우
    }
} else {
    echo "error"; // POST 데이터에 필수 키가 누락된 경우
}

// 데이터베이스 연결 종료
$conn->close();
?>
