<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Keith Entertainment">
    <title>로그인 페이지</title>
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
    <main class="page-modern-ui">
        <div class="signup-form">
            <h1>로그인</h1>
            <form action='./login_process.php' method='POST'>
                <input type='text' name='uid' placeholder="ID" required><br>
                <input type='password' name='upw' placeholder="비밀번호" required><br><br>
                <input type='submit' value='로그인'>
            </form>
        </div>
    </main>
    <footer>
        <b>Copyright &copy; 수얼 Co.Ltd. All rights reserved.</b>
    </footer>
</body>

</html>