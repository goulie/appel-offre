<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<p>Bonjour 
		<strong>{{$details['nom']}}
		</strong>,
	</p>

	<p>l'Entreprise
		<strong>{{$details['entreprise']}}
		</strong> au Statut 
		<strong>{{$details['statut']}}
		</strong>
	 			a bien été enregistré pour l'offre 
	 	<strong>"{{$details['titre']}} ".
	 	</strong>
	 </p>
		<p>
			<strong>
				{{$details['corps']}}
			</strong>
		</p>
<br>
		<center>
			<p>
				<h4 style="color:#ff0000">
					Veuillez ne pas nous écrire ou repondre via cet Email SVP !
				</h4>
			</p>
		</center>
	</body>
</html>