<!-- <?php

if(isset($_SESSION['userid'])){
    $uid = $_SESSION['userid'];
    echo "$uid";
}
$score = isset($_GET['score']) ? $_GET['score'] : 0;

$dbcon = mysqli_connect('localhost', 'root', '');
mysqli_select_db($dbcon, 'sign');

$query1 = "insert into ranking values(null, '$uid', '$score')";
mysqli_query($dbcon, $query1);

mysqli_close($dbcon);
?> -->

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
        <h1 class='title'>퀴즈 결과</h1>
        <div class="result_container text-center">
            
            <h3 class='myScore'>내 점수: <b><?php echo $score; ?></b>점</h3>

            <div>
                <h2>전체 랭킹</h2>
                <?php  

                    if(isset($_SESSION['userid'])){
                        $uid = $_SESSION['userid'];
                    }
                    $score = isset($_GET['score']) ? $_GET['score'] : 0;

                    $dbcon = mysqli_connect('localhost', 'root', '');
                    mysqli_select_db($dbcon, 'sign');

                    $query1 = "insert into ranking values(null, '$uid', '$score')";
                    mysqli_query($dbcon, $query1);
                
                    $query2 = "select * from ranking order by score desc limit 10";
                    $result = mysqli_query($dbcon, $query2);
                
                    $i = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        
                        echo "
                            <div>
                                <h3>{$i}위 ". $row['uid']." ".$row['score']."점</h3>
                            </div>
                        ";
                        $i++;
                    }
                
                
                    mysqli_close($dbcon);
                ?>
            </div>

            <a href="mainpage.php" class="btn btn-primary">홈으로 돌아가기</a>
        </div>
    </main>

    <footer>
        <b>Copyright &copy; 수얼 Co.Ltd. All rights reserved.</b>
    </footer>

</body>

</html>

