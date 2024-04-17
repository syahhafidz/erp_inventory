<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<script src='https://www.google.com/recaptcha/api.js' async defer ></script>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="icon" type="image/x-icon" href="assets/img/logo.jpg">
	<style>
		body {
			font-family: Arial, Helvetica, sans-serif;
			background-color: #EFEFEF;
			/* background-image: url(< ?php echo $base_url . 'assets/img/bg.png' ?>); */
			background-repeat: no-repeat;
			background-position: center;
		}

		.form {
			/* border: 3px solid #wh; */
			/* box-shadow: black; */
			width: 30%;
			/* height: 80%; */
			margin-left: 35%;
			margin-top: 4%;
			background-color: white;
			border-radius: 10px;
		}

		input[type=text],
		input[type=password] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}

		button {
			background-color: #04AA6D;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 100%;
		}

		button:hover {
			opacity: 0.8;
		}

		.cancelbtn {
			width: auto;
			padding: 10px 18px;
			background-color: #f44336;
		}

		.imgcontainer {
			text-align: center;
			margin: 24px 0 12px 0;
		}

		img.avatar {
			width: 20%;
			border-radius: 50%;
		}

		.container {
			padding: 16px;
		}

		span.psw {
			float: right;
			padding-top: 16px;
		}

		/* Change styles for span and cancel button on extra small screens */
		@media screen and (max-width: 400px) {
			span.psw {
				display: block;
				float: none;
			}

			.cancelbtn {
				width: 100%;
			}

			.form {
				/* border: 3px solid #wh; */
				/* box-shadow: black; */
				width: 80%;
				height: 60%;
				margin-left: 10%;
				margin-top: 10%;
				background-color: white;
				border-radius: 10px;
			}
		}
	</style>
</head>

<div class="loader"></div>

<body>
    <div class="row">
        <div class="col-sm-3 form">
            <div class="imgcontainer">
                <br><br><br>
                <img src="assets/img/logo.jpg" alt="Avatar" class="avatar">
                <h4>ERP Inventory</h4>
            </div>
            <div class="container">
				<label for="uname"><b>Username</b></label>
				<input type="text" placeholder="Enter Username" id="username" autocomplete="off" required>
				<label for="psw"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" id="password" required>
				<div class="g-recaptcha" data-sitekey="6LeamHcpAAAAALiNRHQt9_d-NGRkq9iXeE2MOMnb"></div>

				<!-- 6LeamHcpAAAAAH-FUMrf2FqslzhuzB-CbNqeLchx secret key -->
				<button onclick="UserLogin.login(this, event)">Login</button>
			</div>
        </div>
    </div>
</body>


<?php foreach ($header as $arr) { ?>
	<?php echo $arr ?>
<?php } ?>