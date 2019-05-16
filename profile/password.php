
<h1> Password Change </h1>
<hr>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    .password{
    padding-top: 2%;
    padding-left: 2%;
    height: 100%;
    width: 100%;
	}
	.password-body{
    margin: 0;
    padding: 0;
    /*background: url(12665_ABESEC_New.jpg)  no-repeat;*/
    background-size: cover;
    font-family: Arial, Helvetica, sans-serif;}
	#password-form{
		border: 1px solid powderblue;
	}
	input[type=password]{
    width: 100%;
    padding: 10px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	}

	.button-field{
    background-color: #215173;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
	}

	.button-field:hover{
	opacity: 0.8;
	}
</style>

</head>
<body class="password-body">
	<div class="password">
		<form id="password-form" action="changePassword.php" method="post">
		<div class="container">
			<br>
			<label for="oldPassword"><b>Old Password</b></label>
			<input class="passsword-value" type="password" placeholder="Enter Your Old Password" name="oldPassword" required>
			<br>
			<label for="newPassword"><b>New Password</b></label>
			<input class="passsword-value" type="password" placeholder="Enter Your New Password" name="newPassword" required>
			<br>
			<label for="confirmNewPassword"><b>Confirm New Password</b></label>
			<input class="passsword-value" type="password" placeholder="Re-Enter Your New Password" name="confirmNewPassword" required>
			<br>
			<button class="button-field btn btn-dark" type="button" onclick="onPasswordChange();" >Save Changes</button>

		</div>
	</form>
    </body>
</html>