<?php
$conn = mysqli_connect(
'localhost',
'team18',
'team18',
'team18');

if(isset($_GET['sight-id'])) {
    $filtered_id = mysqli_real_escape_string($conn, $_GET['sight-id']);
    settype($filtered_id, 'integer');
}


$sql = "
    DELETE 
    FROM sight
    WHERE sight_id={$filtered_id}
    
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