<?php
session_start();
?>
<header>
    <a href="mainpage.php">
        <img src="../sign/logo.png" alt="수얼" class="header-logo">
        <img src="../sign/logo2.png" alt="수얼" class="header-logo">
    </a>
    <nav>
        <?php if (isset($_SESSION['userid'])): ?>
            <a href="mypage.php" class="nav-link">마이페이지</a>
            <a href="logout.php" class="nav-link">로그아웃</a>
        <?php else: ?>
            <a href="join.php" class="nav-link">회원가입</a>
            <a href="login.php" class="nav-link">로그인</a>
        <?php endif; ?>
    </nav>
</header>