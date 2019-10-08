<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="interface.css">

</head>

<script type="text/javascript">

	function CreateDemineur(X , Y, Bomb){
		var tab = document.createElement("table");
		var tr = document.createElement("tr");
		var td = document.createElement("td");
		var btn = document.createElement("input");
		btn.type='button';
		btn.name='check';
		btn.id='azert';
		btn.className="btn";
		tab.className = "test";
		tab.id = "testid";
		var arrayBomb = [[0,0]];
		var BombY
		var BombX;
		var min= 0;
		var max = Bomb;



		td.appendChild(btn.cloneNode(true));
	
			for (var i = 0; i < X; i++) {
			td.id=i;
			tr.appendChild(td.cloneNode(true));
			}
		
		for (var i = 0; i < Y; i++) {

			tr.id=i;
			tab.appendChild(tr.cloneNode(true));
		}
				for (var i = 0; i < Bomb; i++) {
			BombY= Math.floor(Math.random()* (max - min)) + min;
			BombX= Math.floor(Math.random()* (max - min)) + min;
			tab.rows[BombX].cells[BombY].setAttribute("class", "mines");
		}
		return tab;
	}


	function ValidDemineur(){
		var TabX = document.getElementById('tabX').value;
		var TabY = document.getElementById('tabY').value;
		var NbBomb = document.getElementById('nbbomb').value;


		document.body.appendChild(CreateDemineur(TabX, TabY, NbBomb));
		return false;
	}
</script>

<body>
<form name="Formulaire" method="POST" action="valid.php" onsubmit="return ValidDemineur()" class="formDemineur">
<center>size : <input type="text" id="tabX" size="2">x<input type="text" id="tabY" size="2"> - nb Bombe <input type="text" id="nbbomb"><input type="submit" id="Valid"></center>	
</form>

</body>
</html>
