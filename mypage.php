<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Keith Entertainment">
    <title>마이페이지</title>
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
    <main class="page-modern-ui">
        <?php
        if (isset($_SESSION['userid'])) {
            echo '<h1>마이페이지</h1>';
            echo '<p>환영합니다, ' . htmlspecialchars($_SESSION['userid']) . '님!</p>';
        } else {
            echo '<script>
                    alert("로그인 후 이용 가능합니다.");
                    window.location.href = "login.php";
                  </script>';
            exit;
        }
        ?>
    </main>
    <footer>
        <b>Copyright &copy; 수얼 Co.Ltd. All rights reserved.</b>
    </footer>
</body>

</html>