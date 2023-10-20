<?php
ob_start(); // 출력 버퍼링 활성화
session_start(); // 세션 시작

include('./connect.php');

// 폼에서 제출된 사용자 이름과 비밀번호 가져오기
$username = $_POST['username'];
$password = $_POST['password'];

// SQL 쿼리를 사용하여 사용자 인증
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    echo "로그인 성공.";
    $_SESSION['username'] = $username; // 사용자 이름을 세션에 저장
    header('Location: ../shop.html'); // 로그인 성공 시 리다이렉션할 페이지로 이동
} else {
    // 로그인 실패
    echo "로그인 실패. 다시 시도하세요.";
}

echo "userName 값: ".$_SESSION['username']."<br/>";


// 데이터베이스 연결 종료
$stmt->close();
$conn->close();
?>
