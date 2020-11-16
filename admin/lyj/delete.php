<?php

$conn = mysqli_connect(
    'localhost',
    'team18',
    'team18',
    'team18');


$id = $_GET['id'];


$sql = "delete from restaurant where id=$id";

$res = mysqli_query($conn, $sql);

if($res===false) $msg="오류발생";
else $msg="삭제가 완료되었습니다.";
//메시지를 출력하고 목록 페이지로 이동합니다.

echo " <html><head>

<script name=javascript>

 

if('$msg' != '') {

self.window.alert('$msg');

}

 
location.href='./table_control_lyj.php';

 
</script>

</head>

</html> ";


?>



