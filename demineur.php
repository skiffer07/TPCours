<!DOCTYPE html> 
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="interface.css">

</head>

<body>
<form name="Formulaire" method="POST" onsubmit="return ValidDemineur()" class="formDemineur">
<center>size : <input type="text" id="tabX" size="2">x<input type="text" id="tabY" size="2"> - nb Bombe <input type="text" id="nbbomb"><input type="submit" id="Valid"></center>	
</form>
<table id="TableMine" class="Tableau">
	
</table>



<script type="text/javascript">
var tab = document.getElementById('TableMine');
	function CreateDemineur(X , Y, Bomb){
		
		var min= 0;
		var max = Bomb;
	
			for (var i = 0; i < X; i++) {
				var rows = tab.insertRow(i); //insert row sert a placer les tr
				for (var j = 0; j < Y; j++) {
				var cells = rows.insertCell(j); //insert cell sert a placer les td
				cells.setAttribute('mines','false'); //on place un attribu mines qu'on definie sur false
				cells.onclick =function(){clickCase(this,X,Y);}
				}

			}
			for (var i = 0; i < Bomb; i++) {
				PoseMines(min, max);
			}
		return tab;
	}

	function PoseMines(min, max)
	{
		var BombY;
		var BombX;
			BombY= Math.floor(Math.random()* (max - min)) + min;
			BombX= Math.floor(Math.random()* (max - min)) + min;
			if(tab.rows[BombX].cells[BombY].getAttribute("mines") == "true")
			{
				PoseMines(min, max);			
			}
			else
			{
			tab.rows[BombX].cells[BombY].setAttribute("mines", "true");
			}

		
	}

	function clickCase(cell, nbligne, nbcolonne) {

			testMine = cell.getAttribute("mines");


			if(testMine == "true")
			{
				alert('BOUMMM , perdu..');
				AfficheMine();
			}
			if(testMine == "false")
			{
				var MinesAdja = 0;
	            var Ligne = cell.parentNode.rowIndex;    //parentNode permet d'accéder a la balise parent
	            var Colonne = cell.cellIndex;        //on récupère le num de la colonne
	            for (var i = Math.max(Ligne - 1, 0); i <= Math.min(Ligne + 1, nbligne-1); i++) {
	            for(var j = Math.max(Colonne - 1, 0); j <= Math.min(Colonne + 1, nbcolonne-1); j++) {         // s'il y a une bombe sur la ligne précedente (ou la suivante) car elle n'existe pas
	             if (tab.rows[i].cells[j].getAttribute("mines")=="true") { MinesAdja++}
	            }
	           	}
	           	cell.innerHTML = MinesAdja;
	           	Nbcase -=1;
	           	if(Nbcase == 0)
	           	{
	           		alert('BOUMMMM');
	           		alert('it\'s a prank tu as gagn\é');
	           	}
			}
		
			console.log('click');
		
	}

	function AfficheMine(){    //affiche l'emplacement des mines lorsque le joueur perd la partie.
        for (var i=0; i< TabX; i++) {  //on parcours la table 
            for(var j=0; j < TabY; j++) {
                var cell = tab.rows[i].cells[j];
                if (cell.getAttribute("mines")=="true") cell.className="mine";
            }
        }
        }

	function ValidDemineur(){
		tab.innerHTML= "";

		TabX = document.getElementById('tabX').value;
		TabY = document.getElementById('tabY').value;
		var NbBomb = document.getElementById('nbbomb').value;
		Nbcase = (TabX * TabY)-NbBomb;
		if( NbBomb > TabX*TabY/2)
		{
		alert('Trop de mines');
		}
		else document.body.appendChild(CreateDemineur(TabX, TabY, NbBomb));

		return false;
	}
</script>

</body>
</html>
