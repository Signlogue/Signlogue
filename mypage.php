<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="수얼">
    <title>마이페이지</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <meta name="theme-color" content="#ffffff">
    <script defer src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body>
    <?php include 'header.php'; ?>
    <main class="page-modern-ui">
        <?php
        if (isset($_SESSION['userid'])) {
            echo '
            <div class="form">
                <h1>정보 수정</h1>
                <form action="./mypage_process.php" method="POST">
                    <input type="password" name="upw" placeholder="비밀번호" required><br>
                    <input type="text" name="uname" placeholder="이름" required><br><br>
                    <input type="submit" value="수정">
                </form>
            </div>';
        } else {
            echo '
            <script>
                Swal.fire({
                    icon: "error",
                    title: "로그인 후 이용 가능합니다.",
                }).then( (result) => {   
                    if (result.isConfirmed) {
                        window.location.href = "login.php";
                    }
                })
            </script>';
            exit;
        }
        ?>
    </main>
    <?php include 'footer.php'; ?>

</body>

</html>