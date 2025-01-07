<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="수얼">
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
    <main class="page-modern-ui">
        <div class="form">
            <h1>회원가입</h1>
            <form action='./join_process.php' method='POST'>
                <input type='text' name='uid' placeholder="ID" required><br>
                <input type='password' name='upw' placeholder="비밀번호" required><br>
                <input type='text' name='uname' placeholder="이름" required><br><br>
                <input type='submit' value='회원가입'>
            </form>
        </div>
    </main>
    <footer>
        <b>Copyright &copy; 수얼 Co.Ltd. All rights reserved.</b>
    </footer>
</body>

</html>