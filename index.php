<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Page</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: #f2f2f2;
    }

	.login-wrapper {
	background-image: url('https://images.shiksha.com/mediadata/images/1588330397php0RWW1V.png');
	background-size: cover;
	background-position: center;
	height: 100vh;
	display: flex;
	justify-content: center;
	align-items: center;
	}

    .login-box {
      width: 300px;
      margin: 100px auto;
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .login-box h1 {
      font-size: 24px;
      color: #191970;
      text-align: center;
      margin-bottom: 20px;
    }

    .textbox {
      margin-bottom: 20px;
    }

    .textbox input {
      width: 90%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #191970;
      border-radius: 4px;
    }

    .fa {
      margin-right: 10px;
    }

    .button {
      width: 100%;
      padding: 12px;
      color: #fff;
      background-color: #191970;
      border: none;
      border-radius: 6px;
      font-size: 18px;
      cursor: pointer;
    }

    .button:hover {
      background-color: #76f537;
	  color: #0e0b4a;
    }

    .user_register {
      display: block;
      text-align: center;
      text-decoration: none;
      color: #0e0b4a;
      margin-top: 10px;
    }
  </style>
</head>

<body>

  <form action="validate.php" method="post">
	<div class="login-wrapper">
		<div class="login-box">
		<h1>Login</h1>

		<div class="textbox">
			<i class="fa fa-user" aria-hidden="true"></i>
			<input type="text" placeholder="Username" name="username" value="">
		</div>

		<div class="textbox">
			<i class="fa fa-lock" aria-hidden="true"></i>
			<input type="password" placeholder="Password" name="password" value="">
		</div>
		<a class="user_register" href="register.php">Add New Faculty</a>
		<br>
		<input class="button" type="submit" name="login" value="Sign In">
		</div>
	</div>
  </form>
</body>


</html>
