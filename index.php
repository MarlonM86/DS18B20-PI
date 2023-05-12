<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<title>Startseite - Temperaturanzeige</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
		<link rel="icon" type="image/x-icon" href="icon3.ico">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Temperaturanzeige</h1>
			</div>
		</nav>
		<div class="content">
			<h2>Startseite</h2>
			<div>
				<h2>Aktuelle Temperatur</h2>
				<div id="current-temperature"></div>
			</div>
			<div>
				<h2>Letzte 15 Werte</h2>
				<table id="temperature-table">
					<thead>
						<tr>
							<th>Zeitstempel</th>
							<th>Temperatur</th>
						</tr>
					</thead>
					<tbody id="temperature-data"></tbody>
				</table>
			</div>
			<div>
				<canvas id="temperature-chart"></canvas>
			</div>
		</div>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="script.js"></script>
	<footer>
		<div class="rightfooter">
			
		</div>
	</footer>
	</body>
</html>