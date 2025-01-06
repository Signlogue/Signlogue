<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Keith Entertainment">
    <title>정보 수정</title>
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
    <?php
    session_start();

    $uid = $_SESSION['userid'];
    $upw = $_POST['upw'];
    $uname = $_POST['uname'];

    $dbcon = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($dbcon, 'kt');

    $query = "update member set upw='$upw', uname='$uname' where uid='$uid'";
    $result = mysqli_query($dbcon, $query);

    if ($result) {
        echo "<script>location.href='mainpage.php';</script>";
    } else {
        echo '
        <script>
            Swal.fire({
                icon: "error",
                title: "정보 수정 실패",
                text: "관리자에게 문의하세요."
            }).then(() => {
                window.location.href = "mypage.php";
            });
        </script>';
        exit;
    }

    mysqli_close($dbcon);
    ?>
</body>

</html>