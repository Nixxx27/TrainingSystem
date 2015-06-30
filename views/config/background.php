<!DOCTYPE html>

<html>
	<head>
		<style type="text/css">
		#animaBox {
			background-color: #000;
			width:550px;
			height:200px;
		}
		#btmLayer{
			position:absolute;
			z-index: 1;
			width:550px;
			height: 200px;
			background-image: url('a.gif');
			background-repeat: no-repeat;
		}
		#topLayer{
			position: absolute;
			z-index: 2;
			padding:15px;
			color: #96E2FC;
			width: 520px;
			height: 170px;
		}
		</style>

	</head>
	<body>
		<div id="animaBox">
			<div id="btmLayer">
				<img src="a.gif">
			</div>
			<div id="topLayer">
				Nikko
				
			</div>				


		</div>
	</body>


</html>