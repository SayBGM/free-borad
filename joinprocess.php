<?php
    $conn = mysqli_connect('localhost', 'root', '111111');
    mysqli_select_db($conn, "worktest");

    $id = $_POST["id"];

    $sql = "SELECT * FROM user_id WHERE id = '".$id."';";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0)
    {
        echo"<script>
        window.alert('중복된 아이디가 존재합니다!');
        history.back();
        </script>";
        $sql = "DELETE FROM user_id WHERE created = 'now()';";
        $result = mysqli_query($conn, $sql);
    }
    else{
        $sql = "INSERT INTO user_id (id,pw,name, email, created) VALUES('".$_POST['id']."', '".$_POST['pw']."','".$_POST['name']."', '".$_POST['email']."', now())";
        $result = mysqli_query($conn, $sql);
        echo "<script> window.alert('회원가입이 성공적으로 완료되었습니다.'); </script>";
        header('Location: http://localhost/homework/index.php');
    }
?>