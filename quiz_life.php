<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>삶부문 퀴즈</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="quiz.css">


</head>

<body>
    <?php include 'header.php'; ?>

    <main>
        <div class='content_container'>
            <div class='inner_container'>
                <?php

                // 사용된 문제 리스트를 클라이언트에서 가져옴
                $usedQuiz = isset($_GET['usedQuiz']) ? explode(',', $_GET['usedQuiz']) : [];

                $used = [];
                for ($i = 0; $i < 81; $i++) {
                    $used[$i] = false;
                }

                // 사용된 문제 제외하고 랜덤으로 문제 선택
                do {
                    $rnd = rand(21, 40);
                } while (in_array($rnd, $usedQuiz) || $used[$rnd] == true); // 해당 숫자가 이미 사용되었는지 확인
                $used[$rnd] = true;  // 사용된 숫자 표시
                
                $_SESSION['usedQuiz'][] = $rnd; // 사용된 문제를 세션에 추가
                
                $dbcon = mysqli_connect('localhost', 'root', '');
                mysqli_select_db($dbcon, 'sign');

                $query1 = "select * from sign where num = '$rnd'";
                $result1 = mysqli_query($dbcon, $query1);

                $row = mysqli_fetch_array($result1);

                $answer = $row['answer']; // 정답
                $choices = [$answer];
                // 랜덤으로 중복없이 3개 뽑아서 $answer이랑 합쳐서 배열 만들고 
                // 그 배열에서 랜덤으로 뽑아서 선택 생성
                for ($j = 0; $j < 3; $j++) {
                    do {
                        $rnd_c = rand(1, 80);
                    } while ($used[$rnd_c] == true); // 해당 숫자가 이미 사용되었는지 확인
                    $used[$rnd_c] = true;  // 사용된 숫자 표시
                
                    $query2 = "select * from sign where num = '$rnd_c'";
                    $result2 = mysqli_query($dbcon, $query2);

                    $row = mysqli_fetch_array($result2);
                    $unanswer = $row['answer'];

                    array_push($choices, $unanswer);
                }
                shuffle($choices); // 배열 섞기
                

                $qNum = count($usedQuiz);

                if ($rnd == 29 || $rnd == 31 || $rnd == 37 || $rnd == 38) {
                    echo "
                    <h2 class='question_number'>" . ($qNum + 1) . "/10</h2>
                    <div class='img_container d-flex justify-content-between'>
                        <img src='../sign/{$rnd}1.jpg' class='img_sign w-50' alt='수어 이미지'>
                        <img src='../sign/{$rnd}2.jpg' class='img_sign w-50' alt='수어 이미지'>
                    </div>";

                } else {
                    echo "
                    <h2 class='question_number'>" . ($qNum + 1) . "</h2>
                    <div class='img_container'>
                        <img src='../sign/$rnd.jpg' class='img_sign' alt='수어 이미지'>
                    </div>";
                }





                $answerValue = htmlspecialchars($answer, ENT_QUOTES); // 안전한 HTML 출력
                
                for ($i = 0; $i < 4; $i++) {


                    $choice = htmlspecialchars($choices[$i], ENT_QUOTES); // 각 선택지를 HTML 엔티티 처리
                
                    echo "
                        <div class='choice_container {$choices[$i]}' onclick='check(this,\"$answerValue\", \"$choice\", $rnd)'>
                            <p class='choice'>{$choices[$i]}</p>
                        </div>
                    ";
                }



                ?>

            </div>


        </div>




    </main>
    
    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>

        let lifeScore = localStorage.getItem('lifeScore') ? parseInt(localStorage.getItem('lifeScore')) : 0;
        let usedQuiz = JSON.parse(localStorage.getItem('usedQuiz')) || [];

        function check(element, answer, choiceValue, num) {
            console.log("정답:", answer);
            console.log("선택지:", choiceValue);
            console.log("num:", num);

            // 문제 번호가 이미 사용된 문제인지 확인
            if (!usedQuiz.includes(num)) {
                usedQuiz.push(num);  // 중복되지 않으면 문제 번호를 추가
            }

            localStorage.setItem('usedQuiz', JSON.stringify(usedQuiz)); // 사용된 문제 번호를 로컬스토리지에 저장

            if (answer == choiceValue) {
                element.style.border = "3px solid #BDFF12";
                lifeScore++;
                // 점수 업데이트 후 로컬스토리지에 저장
                localStorage.setItem('lifeScore', lifeScore);

                Swal.fire({
                    icon: "success",
                    title: "정답!",
                    text: "대단해요!",
                    showConfirmButton: false,
                    timer: 1500

                })
                    .then(function () {
                        // 새 문제로 넘어갈 때 사용된 문제 배열을 서버로 전송
                        loadNextQuiz()
                    });
            } else {
                element.style.border = "3px solid red";

                Swal.fire({
                    icon: "error",
                    title: "오답!",
                    text: "좀 더 생각해 봐요!",
                    showConfirmButton: false,
                    timer: 1500
                })
                    .then(function () {
                        // 새 문제로 넘어갈 때 사용된 문제 배열을 서버로 전송
                        loadNextQuiz()
                    });



            }
        }

        // 새 문제를 로드하는 함수
        function loadNextQuiz() {
            if (usedQuiz.length >= 10) { // 10문제를 다 풀었으면
                showScore(); // 점수 표시 함수 호출

                // 10문제를 다 풀었을 경우 로컬스토리지 비우기
                localStorage.removeItem('usedQuiz');
            } else {
                // 현재 문제를 로드할 때 사용된 문제를 URL 파라미터로 전달
                location.href = "quiz_people.php?usedQuiz=" + usedQuiz.join(',');
            }
        }

        // 점수 표시
        function showScore() {
            Swal.fire({
                icon: "info",
                title: "퀴즈 종료",
                text: `최종 점수는 ${lifeScore}점 입니다!`,
                showConfirmButton: true
            }).then(() => {
                // 결과 페이지로 이동
                location.href = "result_page.php?score=" + lifeScore; // 점수를 result_page.php에 전달

                localStorage.removeItem('lifeScore');
            });
        }

    </script>
</body>

</html>