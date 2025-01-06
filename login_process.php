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
    <header>
        <a href="index.html">
            <img src="src/logo.png" alt="수얼" class="header-logo">
        </a>
        <nav>
            <a href="join.php" class="nav-link">회원가입</a>
            <a href="login.php" class="nav-link">로그인</a>
        </nav>
    </header>
    <main>
        <h1>로그인</h1>
        <?php
        session_start();
        $uid = $_POST['uid'];
        $upw = $_POST['upw'];

        $dbcon = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($dbcon, 'kt');

        $query = "select * from member where uid = '$uid'";
        $result = mysqli_query($dbcon, $query);

        $row = mysqli_fetch_array($result);

        if (isset($row['uid'])) {
            if ($upw == $row['upw']) {
                $SESSION['userid'] = $row['uid'];
                echo $SESSION['userid'] . "님 반갑습니다";
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