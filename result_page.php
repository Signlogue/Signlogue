<?php
$score = isset($_GET['score']) ? $_GET['score'] : 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>퀴즈 결과</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="quiz.css">


</head>

<body>
    <?php include 'header.php'; ?>

    <main>
        <div class="result_container text-center">
            <h1>퀴즈 결과</h1>
            <p>최종 점수: <b><?php echo $score; ?></b>점</p>
            <a href="index.html" class="btn btn-primary">홈으로 돌아가기</a>
        </div>
    </main>

    <footer>
        <b>Copyright &copy; 수얼 Co.Ltd. All rights reserved.</b>
    </footer>

</body>

</html>