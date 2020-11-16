<?php
include('includes/header.php');

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $available_num = $_POST['available_num'];
    $price_per_person = $_POST['price_per_person'];
    $reservation_site = $_POST['reservation_site'];
    $region = $_POST['region'];
    $star_score = $_POST['star_score'];

    $sql = "INSERT INTO lod_lodgment(name, available_num, price_per_person, reservation_site, region, star_score)
            VALUES('$name', '$available_num', '$price_per_person', '$reservation_site', '$region', '$star_score')";
    $result = mysqli_query($conn, $sql);
    if($result===false){
        echo 'error';
    }
    else{
        header('Location: lhj_tables.php');
    }
}

if(isset($_POST['delete_btn'])){
    $name = $_POST['del_name'];
    $sql = "DELETE FROM lod_lodgment WHERE name='$name'";
    $result = mysqli_query($conn, $sql);

    if($result===false){
        $_SESSION['statue']="error";
        header('Location: lhj_tables.php');
    }
    else{
        header('Location: lhj_tables.php');
    }
}

if(isset($_POST['update_btn']))
{
    $name = $_POST['update_name'];
    $available_num = $_POST['update_available_num'];
    $price_per_person = $_POST['update_price_per_person'];
    $reservation_site = $_POST['update_reservation_site'];
    $region = $_POST['update_region'];
    $star_score = $_POST['update_star_score'];

    mysqli_query("SET AUTOCOMMIT=0");
    mysqli_query("BEGIN");

    $sql = "UPDATE lod_lodgment SET 
            name='$name', 
            available_num='$available_num', 
            price_per_person='$price_per_person',
            reservation_site='$reservation_site',
            region='$region',
            star_score='$star_score'
            WHERE name='$name'";
    $result = mysqli_query($conn, $sql);


    if($result===false){
        mysqli_query("ROLLBACK");
        header('Location: lhj_tables.php');

    }
    else{
        mysqli_query("COMMIT");
        header('Location: lhj_tables.php');
    }
}
?>