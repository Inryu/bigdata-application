<?php

$conn = mysqli_connect("127.0.0.1", "root", "654321", "test01");


$p_id = $_POST['category_select'];
$name = $_POST['res_name'];
$address = $_POST['address_select'];



$sql = "insert into restaurant (p_id,name,rate,visit_num,address) values ($p_id,'$name',0,0,'$address')";

$res = mysqli_query($conn, $sql);

if($res===false) $msg="오류발생";
else $msg="등록이 완료되었습니다.";
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
