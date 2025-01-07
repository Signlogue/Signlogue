<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="description" content="수얼" />
  <title>수얼</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css" />
  <link rel="stylesheet" href="mainpage.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
  <?php include 'header.php'; ?>
  <main>
      <div class="testbox">
        <div class="testcard-1">
          <div class="card" style="width: 18rem">
            <img src="./img/169.jpg" class="card-img-top img_sign" alt="..." />
            <div class="card-body">
              <h5 class="card-title">인간 관련 수어 맞추기</h5>
              <p class="card-text">
                한국수어 사전에 기재된 인간 관련 일상생활 수어 20문제입니다.
              </p>
              <a href="./people.php" class="btn btn-success">공부하기</a>
              <a href="./quiz_people.php" class="btn btn-primary">문제 풀러가기</a>
            </div>
          </div>
        </div>

        <div class="testcard-2">
          <div class="card" style="width: 18rem">
            <img src="./sign/21.jpg" class="card-img-top img_sign" alt="..." />
            <div class="card-body">
              <h5 class="card-title">삶 관련 수어 맞추기</h5>
              <p class="card-text">
                한국수어 사전에 기재된 삶 관련 일상생활 수어 20문제입니다.
              </p>
              <a href="./life.php" class="btn btn-success">공부하기</a>
              <a href="./quiz_life.php" class="btn btn-primary">문제 풀러가기</a>
            </div>
          </div>
        </div>
      </div>

      <div class="testbox">
        <div class="testbox-3">
          <div class="card" style="width: 18rem">
            <img src="./sign/41.jpg" class="card-img-top img_sign" alt="..." />
            <div class="card-body">
              <h5 class="card-title">식생활 관련 수어 맞추기</h5>
              <p class="card-text">
                한국수어 사전에 기재된 식생활 관련 일상생활 수어 20문제입니다.
              </p>
              <a href="./foodLife.php" class="btn btn-success">공부하기</a>
              <a href="./quiz_food.php" class="btn btn-primary">문제 풀러가기</a>
            </div>
          </div>
        </div>

        <div class="testbox-4">
          <div class="card" style="width: 18rem">
            <img src="./sign/61.jpg" class="card-img-top img_sign" alt="..." />
            <div class="card-body">
              <h5 class="card-title">의생활 관련 수어 맞추기</h5>
              <p class="card-text">
                한국수어 사전에 기재된 의생활 관련 일상생활 수어 20문제입니다.
              </p>
              <a href="./clothingLife.php" class="btn btn-success">공부하기</a>
              <a href="./quiz_clothing.php" class="btn btn-primary">문제 풀러가기</a>
            </div>
          </div>
        </div>
      </div>
    </main>
  <footer>
    <b>Copyright &copy; 수얼 Co.Ltd. All rights reserved.</b>
  </footer>
</body>

</html>