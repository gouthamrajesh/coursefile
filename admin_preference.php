<!DOCTYPE html>
<html lang="en">
<head>
<?php ?>
<?php 
    session_start();
    $current_user = $_SESSION['$current_user'];
    $conn = mysqli_connect("localhost:3306","root","root","project");
    $sql1 = " SELECT * FROM faculty_preference";
    $sql2 = "SELECT * FROM subjects";
    $faculty= mysqli_query($conn,$sql1);
    $_SESSION['$faculty_count'] = mysqli_num_rows($faculty);
    $user_count=0; 
    $has_val=0;    
    $pref_val = 0;
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="approve.php" method="post">
        <table>
            <tr>
                <th style="border:none;"></th>
                <?php 
                    $faculty= mysqli_query($conn,$sql1);
                    while($rows = $faculty->fetch_assoc()){$user_count++; ?>

                <th><?php echo $rows['name'];?></th>
                
                <?php 
                    if($rows['name']==$current_user){$current_user_count = $user_count;
                    $_SESSION['$current_user_num']=$current_user_count;
                    }
                    }
                ?>
            </tr>

            <?php 
                $subjects = mysqli_query($conn,$sql2);
                while($row = $subjects->fetch_assoc()){?>
            <tr>
                <td> <?php echo strtoupper($row['sub_name']);?> </td>
            <?php
                $faculty= mysqli_query($conn,$sql1);
                while($rows = $faculty->fetch_assoc()){$has_val =0;
            ?>
            <td><input type="text" class="textfield" name="sub[]" value="
            <?php 
                if($rows['sub1']==$row['sub_name']){echo 1;$has_val =1;}
                if($rows['sub2']==$row['sub_name']){echo 2;$has_val =2;}
                if($rows['sub3']==$row['sub_name']){echo 3;$has_val =3;}
            ?>
            " readonly>
            <?php 
                if($has_val>0){
                    if($rows['s1_app']==1 && $has_val==1){
            ?>
            <input type="checkbox" name="cbadmin[]" value=<?php echo $pref_val;?> checked>
            <?php 
                }
                else if($rows['s2_app']==1 && $has_val==2){
            ?>
            <input type="checkbox" name="cbadmin[]" value=<?php echo $pref_val;?> checked>
            <?php 
                }
                else if($rows['s3_app']==1 && $has_val==3){
            ?>
            <input type="checkbox" name="cbadmin[]" value=<?php echo $pref_val;?> checked>
            <?php 
                }
                else{
            ?>
            <input type="checkbox" name="cbadmin[]" value=<?php echo $pref_val;?>>
        </td>
            
            <?php
                } 
                }
                $pref_val++;}
                }
                
            ?>
            
        </tr>
        </table>
        <button type='submit' name='Save'>Save</button>
</form>
</body>
<style>
    tr,th,td{
        border: 1px solid black;
    }
    .textfield {
        border: none;
        outline: none;
        background: none;
        width:100px;
    }
    .save{
        float:left;
        margin-top:10px;
        margin-left:5px;
    }
    table {
        border-collapse: separate;
        border-spacing: 5px 10px;
      }
    
</style>
</html>
