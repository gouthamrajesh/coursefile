<!DOCTYPE html>
<html lang="en">
<?php ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
    session_start();
    $conn = mysqli_connect("localhost:3306","root","root","project");
    $sql1 = " SELECT * FROM faculty_preference";
    $sql2 = "SELECT * FROM subjects";
    $sql3 = "SELECT * FROM tt1";
    $faculty= mysqli_query($conn,$sql1);
    $subjects=mysqli_query($conn,$sql2);
    $tt1=mysqli_query($conn,$sql3);
    ?>
</head>
<body>
    <form action="fixed_enter.php" method="post">
        <table>
            <tr>
                <th>DAY</th>
                <th>HR1</th>
                <th>HR2</th>
                <th>HR3</th>
                <th>HR4</th>
                <th>HR5</th>
                <th>HR6</th>
            </tr>
            <?php 
            while($rows = $tt1->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $rows['day']?></td>
                
                <td><input type="text" class="textfield" name="fixsub[]" value="-" ></td>
                <td><input type="text" class="textfield" name="fixsub[]" value="-"></td>
                <td><input type="text" class="textfield" name="fixsub[]" value="-"></td>
                <td><input type="text" class="textfield" name="fixsub[]" value="-"></td>
                <td><input type="text" class="textfield" name="fixsub[]" value="-"></td>
                <td><input type="text" class="textfield" name="fixsub[]" value="-"></td>
            </tr>
            <?php 
            }
            ?>
        </table>
        <input type="submit" value="save">
    </form>
    <table class="subs">
        <tr>
            <th>CODE</th>
            <th>NAME</th>
        </tr>
        <?php 
            while($rows = $subjects->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $rows['code']?></td>
            <td><?php echo strtoupper($rows['sub_name'])?></td>
        </tr>
        <?php 
            }
        ?>
    </table>
    
</body>
</html>
<style>
    tr,th,td{
        border: 1px solid black;
    }
    .textfield {
        border: none;
        outline: none;
        background: none;
        width:100px;
        text-align:center;
    }
    .save{
        float:left;
        margin-top:10px;
    }
    table {
        border-collapse: separate;
        border-spacing: 5px 10px;
      }
</style>