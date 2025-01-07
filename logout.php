<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="수얼">
    <title>로그아웃</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <script>
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success me-3",
                cancelButton: "btn btn-danger me-3"
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: "정말 로그아웃 하시겠습니까?",
            text: "로그아웃 시 세션이 종료됩니다.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "네, 로그아웃합니다!",
            cancelButtonText: "아니요, 취소합니다!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // PHP 세션 종료 처리
                fetch('logout_process.php') // 로그아웃 처리용 PHP
                    .then(() => {
                        swalWithBootstrapButtons.fire(
                            "로그아웃 완료!",
                            "메인 페이지로 이동합니다.",
                            "success"
                        ).then(() => {
                            window.location.href = "mainpage.php";
                        });
                    });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                    "취소되었습니다!",
                    "세션이 유지됩니다 :)",
                    "error"
                ).then(() => {
                    window.location.href = "mainpage.php";
                });
            }
        });
    </script>
</body>

</html>