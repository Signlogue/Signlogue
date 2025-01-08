<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>인간</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="learn.css">

</head>

<body>
    <?php include 'header.php'; ?>

    <main>

        <div id="carouselExample" class="carousel slide content_container">
            <div class="carousel-inner">
                <?php
                $used = [];
                for ($i = 0; $i < 21; $i++) {
                    $used[$i] = false;
                }


                for ($i = 0; $i < 20; $i++) {

                    do {
                        $rnd = rand(1, 20); // 1이상 20이하 랜덤 수 
                    } while ($used[$rnd] == true); // 해당 숫자가 이미 사용되었는지 확인
                    $used[$rnd] = true;  // 사용된 숫자 표시
                
                    $dbcon = mysqli_connect('localhost', 'root', '');
                    mysqli_select_db($dbcon, 'sign');

                    $query1 = "select * from sign where num = '$rnd'";
                    $result1 = mysqli_query($dbcon, $query1);

                    $row = mysqli_fetch_array($result1);

                    $isActive = $i === 0 ? 'active' : '';

                    echo "
                        <div class='carousel-item $isActive'>
                            <h2>" . ($i + 1) . "/20</h2>
                            <div class='img_container'><img src='../sign/$rnd.jpg' class='d-block img_sign' alt='{$row['answer']}'></div>
                            <div class='carousel-caption d-md-block'>
                                <h5 class='text-black'>{$row['answer']}</h5>
                                <p class='sign_explain'>{$row['explanation']}</p>
                            </div>
                        </div>";
                }


                ?>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <img src="../img/arrow-pre.png" class="arrow_img">

                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <img src="../img/arrow-next.png" class="arrow_img">

                <span class="visually-hidden">Next</span>
            </button>
        </div>


    </main>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>