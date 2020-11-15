<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    'sir104401',
    'test');

$filtered = array(
    'sight_name'=>mysqli_real_escape_string($conn, $_POST['sight_name']),
    'sight_ctg'=>mysqli_real_escape_string($conn, $_POST['sight_ctg']),
    'sight_fee'=>mysqli_real_escape_string($conn, $_POST['sight_fee']),
    'address_detail'=>mysqli_real_escape_string($conn, $_POST['address_detail']),
    'jeju_section_id'=>mysqli_real_escape_string($conn, $_POST['jeju_section_id'])
);

$sql = "
  INSERT INTO sight
    (sight_name, sight_ctg, sight_fee, address_detail, jeju_section_id)
    VALUES(
      '{$filtered['sight_name']}',
      '{$filtered['sight_ctg']}',
      {$filtered['sight_fee']},
      '{$filtered['address_detail']}',
      {$filtered['jeju_section_id']}
    )
";

echo $sql;
$result = mysqli_query($conn, $sql);
if($result === false){
    echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
    error_log(mysqli_error($conn));
} else {
    header('Location: inryu-table.php');
}
?>