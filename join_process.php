<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Keith Entertainment">
    <title>회원가입</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <meta name="theme-color" content="#ffffff">
    <script defer src="script.js"></script>
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <h1>회원가입</h1>
        <?php
        $uid = $_POST['uid'];
        $upw = $_POST['upw'];
        $uname = $_POST['uname'];

        $dbcon = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($dbcon, 'kt');

        $query = "insert into member values(null, '$uid', '$upw', '$uname')";
        $result = mysqli_query($dbcon, $query);

        if ($result) {
            echo "<script>location.href='mainpage.html';</script>";
        } else {
            echo "회원 가입 실패. 관리자에게 문의하세요";
        }

        mysqli_close($dbcon);
        ?>
    </main>
    <footer>
        <b>Copyright &copy; 수얼 Co.Ltd. All rights reserved.</b>
    </footer>
</body>

</html>