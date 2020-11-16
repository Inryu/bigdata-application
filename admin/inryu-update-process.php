<?php
$conn = mysqli_connect(
    'localhost',
    'team18',
    'team18',
    'team18');

settype($_POST['sight_id'], 'integer');

$filtered = array(
    'sight_id'=>mysqli_real_escape_string($conn, $_POST['sight_id']),
    'sight_name'=>mysqli_real_escape_string($conn, $_POST['sight_name']),
    'sight_ctg'=>mysqli_real_escape_string($conn, $_POST['sight_ctg']),
    'sight_fee'=>mysqli_real_escape_string($conn, $_POST['sight_fee']),
    'address_detail'=>mysqli_real_escape_string($conn, $_POST['address_detail']),
    'jeju_section_id'=>mysqli_real_escape_string($conn, $_POST['jeju_section_id']),
);


//transaction
mysqli_begin_transaction($conn);

$sql = "
  UPDATE sight
    SET
      sight_name = '{$filtered['sight_name']}',
      sight_ctg = '{$filtered['sight_ctg']}',
      sight_fee = {$filtered['sight_fee']},
      address_detail = '{$filtered['address_detail']}',
      jeju_section_id = {$filtered['jeju_section_id']}
    WHERE
      sight_id = {$filtered['sight_id']}
";





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
    header('Location: inryu-table.php');
}
?>