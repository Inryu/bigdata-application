<?php
include('includes/header.php');
include('includes/navbar.php');

$sql1 = "SELECT * FROM lod_platform";
$result1 = mysqli_query($conn, $sql1);
$select_form1 = '<select name="update_reservation_site">';
while($row1 = mysqli_fetch_array($result1)){
    $select_form1 .= '<option>'.$row1['name'].'</option>';
}
$select_form1 .= '</select>';

$sql2 = "SELECT * FROM lod_region";
$result2 = mysqli_query($conn, $sql2);
$select_form2 = '<select name="update_region">';
while($row2 = mysqli_fetch_array($result2)){
    $select_form2 .= '<option>'.$row2['name'].'</option>';
}
$select_form2 .= '</select>';
?>

<?php require("includes/topbar.php"); ?>


<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT Lodgment Table </h6>
        </div>
        <div class="card-body">
            <?php

            if(isset($_POST['update_btn']))
            {
                $name = $_POST['update_name'];

                $sql = "SELECT * FROM lod_lodgment WHERE name='$name' ";
                $result = mysqli_query($conn, $sql);

                foreach($result as $row)
                {
                    ?>


                    <form action="lod_mod.php" method="POST">

                        <input type="hidden" name="update_name" value="<?php echo $row['name'] ?>">

                        <div class="form-group">
                            <label> Available_Num </label>
                            <input type="text" name="update_available_num" value="<?php echo $row['available_num'] ?>" class="form-control"
                                   placeholder="Enter Available Num">
                        </div>
                        <div class="form-group">
                            <label>Price_Per_Person</label>
                            <input type="text" name="update_price_per_person" value="<?php echo $row['price_per_person'] ?>" class="form-control"
                                   placeholder="Enter Price Per Person">
                        </div>
                        <div class="form-group">
                            <label>Region</label>
                            <?=$select_form1?>
                        </div>
                        <div class="form-group">
                            <label>Region</label>
                            <?=$select_form2?>
                        </div>
                        <div class="form-group">
                            <label>Star_Score</label>
                            <input type="text" name="update_star_score" value="<?php echo $row['star_score'] ?>" class="form-control"
                                   placeholder="Enter Star Score">
                        </div>
                        <a href="lod_update.php" class="btn btn-danger"> CANCEL </a>
                        <button type="submit" name="update_btn" class="btn btn-primary"> Update </button>

                    </form>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>

</div>