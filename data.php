<?php
    $dbcon = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($dbcon, 'sign');

    $query = "select * from sign where category = '인간'";
    $result = mysqli_query($dbcon, $query);
    
    
    $data = [];
    while($row = mysqli_fetch_array($result)){
        $data[] = $row;
        // echo $row['num']." ";
        // echo $row['answer']." ";
        // echo $row['explanation']." ";
        // echo $row['category']."<br><br>";
    }
    echo json_encode($data);

    mysqli_close($dbcon);

    ?>