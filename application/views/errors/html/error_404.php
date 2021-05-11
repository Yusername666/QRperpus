<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>404 Page Not Found</title>
	<style type="text/css">
		* {
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
		}

		body {
			padding: 0;
			margin: 0;
		}

		#notfound {
			position: relative;
			height: 100vh;
		}

		#notfound .notfound {
			position: absolute;
			left: 50%;
			top: 50%;
			-webkit-transform: translate(-50%, -50%);
			-ms-transform: translate(-50%, -50%);
			transform: translate(-50%, -50%);
		}

		.notfound {
			max-width: 920px;
			width: 100%;
			line-height: 1.4;
			text-align: center;
			padding-left: 15px;
			padding-right: 15px;
		}
		.notfound-404 {
			animation-name: example;
			animation-duration: 4s;
			animation-iteration-count: infinite;
		}

		.notfound .notfound-404 {
			position: absolute;
			height: 100px;
			top: 0;
			left: 50%;
			-webkit-transform: translateX(-50%);
			-ms-transform: translateX(-50%);
			transform: translateX(-50%);
			z-index: -1;
		}

		.notfound .notfound-404 h1 {
			font-family: 'Maven Pro', sans-serif;
			color: #ececec;
			font-weight: 900;
			font-size: 276px;
			margin: 0px;
			position: absolute;
			left: 50%;
			top: 50%;
			-webkit-transform: translate(-50%, -50%);
			-ms-transform: translate(-50%, -50%);
			transform: translate(-50%, -50%);
		}

		.notfound h2 {
			font-family: 'Maven Pro', sans-serif;
			font-size: 46px;
			color: #000;
			font-weight: 900;
			text-transform: uppercase;
			margin: 0px;
		}

		.notfound p {
			font-family: 'Maven Pro', sans-serif;
			font-size: 16px;
			color: #000;
			font-weight: 400;
			text-transform: uppercase;
			margin-top: 15px;
		}

		.notfound a {
			font-family: 'Maven Pro', sans-serif;
			font-size: 14px;
			text-decoration: none;
			text-transform: uppercase;
			background: #189cf0;
			display: inline-block;
			padding: 16px 38px;
			border: 2px solid transparent;
			border-radius: 40px;
			color: #fff;
			font-weight: 400;
			-webkit-transition: 0.2s all;
			transition: 0.2s all;
		}

		.notfound a:hover {
			background-color: #fff;
			border-color: #189cf0;
			color: #189cf0;
		}

/*		@keyframes example {
			0%   {left:850px; top:150px;}
			25%  {left:250px; top:0px;}
			50%  {left:450px; top:150px;}
			75%  {left:280px; top:150px;}
			100% {left:470px; top:0px;}
		}*/

		@media only screen and (max-width: 480px) {
			.notfound .notfound-404 h1 {
				font-size: 162px;
			}
			.notfound h2 {
				font-size: 26px;
			}
		}
	</style>
	<script>
		function goBack() {
			window.history.back();
		}
	</script>
	<script type="text/javascript">
		<!--
			function showTime() {
				var a_p = "";
				var today = new Date();
				var curr_hour = today.getHours();
				var curr_minute = today.getMinutes();
				var curr_second = today.getSeconds();
				if (curr_hour < 12) {
					a_p = "AM";
				} else {
					a_p = "PM";
				}
				if (curr_hour == 0) {
					curr_hour = 12;
				}
				if (curr_hour > 12) {
					curr_hour = curr_hour - 12;
				}
				curr_hour = checkTime(curr_hour);
				curr_minute = checkTime(curr_minute);
				curr_second = checkTime(curr_second);
				document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
			}

			function checkTime(i) {
				if (i < 10) {
					i = "0" + i;
				}
				return i;
			}
			setInterval(showTime, 500);
		//-->
	</script>
</head>
<body id="container" style="background-color: #fff;">
	<center>
		<div id="notfound">
			<div class="notfound">
				<div class="notfound-404">
					<h1>404</h1>
				</div>
				<h2><?php echo $heading; ?></h2>
				<p><?php echo $message; ?></p>
				<a href="#" onclick="goBack()">okay...!?</a>
				<p id="clock"></p>
			</div>
		</div>
	</center>
</body>

</html>
