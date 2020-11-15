<?php

$conn = mysqli_connect("127.0.0.1", "root", "654321", "test01");

//id넘겨받는거 어캐하노  ㅠ
$id = $_POST['hiddenValue'];
$p_id = $_POST['category_select'];
$name = $_POST['res_name'];
$address = $_POST['address_select'];


echo $id;
echo $p_id;
echo $name;
echo $address;


mysqli_begin_transaction($conn);

try {

    $stmt1 = mysqli_prepare($conn, "update restaurant set name=? where id=?");
    $stmt2 = mysqli_prepare($conn, "update restaurant set address=? where id=?");
    $stmt3 = mysqli_prepare($conn, "update restaurant set p_id=? where id=?");

    mysqli_stmt_bind_param($stmt1, 'si', $name, $id);
    mysqli_stmt_bind_param($stmt2, 'si', $address, $id);
    mysqli_stmt_bind_param($stmt3, 'ii', $p_id, $id);

    mysqli_stmt_execute($stmt1);
    mysqli_stmt_execute($stmt2);
    mysqli_stmt_execute($stmt3);

    $res = mysqli_commit($conn);


    if ($res === false) $msg = "오류발생";
    else $msg = "수정이 완료되었습니다.";
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

} catch (mysqli_sql_exception $exception) {
    mysqli_rollback($conn);
}


?>
