<?php

@session_start();

$conn = mysqli_connect(
    'localhost',
    'team18',
    'team18',
    'team18');

//입력 받은 id와 password
$ID=$_POST['ID'];
$PASSWORD=$_POST['PASSWORD'];


//아이디가 있는지 검사
$query = "select * from Users where ID='$ID'";
$result = mysqli_query($conn,$query);


//아이디가 있다면 비밀번호 검사
if(mysqli_num_rows($result)==1) {

    $row=mysqli_fetch_assoc($result);
    $NICKNAME=$row['NICKNAME'];
    $_SESSION['NICKNAME']=$NICKNAME;

    //비밀번호가 맞다면 세션 생성
    if($row['PASSWORD']==$PASSWORD){
        $_SESSION['ID']=$ID;
        if(isset($_SESSION['ID'])){
            ?>      <script>
                alert("로그인 되었습니다.");
                location.replace("./inryu-table.php");
            </script>
            <?php
        }
        else{
            echo "session fail";
        }
    }

    else {
        ?>              <script>
            alert("아이디 혹은 비밀번호가 잘못되었습니다.");
            location.replace("./login.php");
        </script>
        <?php
    }

}

else{
    ?>              <script>
        alert("아이디 혹은 비밀번호가 잘못되었습니다.");
        location.replace("./login.php");
    </script>
    <?php
}


?>

