<?php

$conn = mysqli_connect(
    'localhost',
    'team18',
    'team18',
    'team18');


$id=$_GET['id'];
$new_address=$_POST['new_address_select'];
$new_resname=$_POST['new_res_name'];
$new_p_id=$_POST['new_category_select'];

echo $id;
echo $new_resname;
echo $new_address;
echo $new_p_id;


//transaction
mysqli_begin_transaction($conn);


$sql = "update restaurant 
              set name='$new_resname',address='$new_address', p_id=$new_p_id 
              where id=$id";

echo $sql;

try {

    mysqli_query($conn, $sql);

    /* If code reaches this point without errors then commit the data in the database */
    mysqli_commit($conn);
} catch (mysqli_sql_exception $exception) {
    mysqli_rollback($conn);

    throw $exception;
}




$result = mysqli_query($conn, $sql);
if($result === false){
    echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
    error_log(mysqli_error($conn));
} else {
    header('Location: ./table_control_lyj.php');
}






?>
