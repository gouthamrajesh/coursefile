<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/new-register.css">
    <title>Register New Faculty</title>
</head>
<body>
    <form action="faculty_add.php" method="post">
        <div class="login-wrapper">
            <div class="register-box">
            <h1>Add New Faculty</h1>

            <div class="name">
                <input type="text" name="name" id="name" placeholder="Name" required>
            </div>

            <div class="ktu_id" style="margin-top: 20px;">
                <input type="text" name="ktu_id" id="ktu_id" placeholder="KTU ID" required>
            </div>

            <div class="pswrd" style="margin-top: 20px;">
                <input type="password" name="pswrd" id="pswrd" placeholder="Password" required minlength="1">

            </div>

            <div class="desig" style="margin-top: 20px;">
                <input type="text" name="desig" id="desig" placeholder="Desgination" required>

            </div>

            <div class="desig" style="margin-top: 20px;">
                <input type="text" name="spcl_desig" id="spcl_desig" placeholder="Special Desgination" >
            </div>

            <input type="submit" class="button" value="Add" style="margin-top: 20px;">

            </div>
        </div>

    </form>
</body>
</html>