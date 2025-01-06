<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Keith Entertainment">
    <title>로그인</title>
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
        <h1>로그인</h1>
        <?php
        session_start();
        $uid = $_POST['uid'];
        $upw = $_POST['upw'];

        $dbcon = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($dbcon, 'kt');

        $query = "SELECT * FROM member WHERE uid = '$uid'";
        $result = mysqli_query($dbcon, $query);

        $row = mysqli_fetch_array($result);

        if (isset($row['uid'])) {
            if ($upw == $row['upw']) {
                $_SESSION['userid'] = $row['uid'];
                echo "<script>location.href='mainpage.php';</script>";
            } else {
                echo "패스워드 오류";
            }
        } else {
            echo "해당 ID 존재하지 않음";
        }

        mysqli_close($dbcon);
        ?>
    </main>
    <footer>
        <b>Copyright &copy; 수얼 Co.Ltd. All rights reserved.</b>
    </footer>
</body>

</html>