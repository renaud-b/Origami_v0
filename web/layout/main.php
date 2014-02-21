<?php 
/*
	Recupére une variable passé par le controller => $variable = $this->_getVar('var');
*/
?>

<html>
	<head>
		<link rel="stylesheet" href="./web/css/style.css"/>
	</head>
	<body>
		<header>Pas de test Framework Origami v0</header>
		<?php 
			/*
				Ligne essentiel pour le fonctionnement du layout, indique ou afficher le contenu.
			*/
			echo $this->getContent(); 
		?>
	</body>
</html>
