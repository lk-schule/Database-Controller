<!DOCTPYE html>
<html>
<head>
	<?php include_once("assets/head.php"); ?>
	<title>Datenbank Controller</title>
</head>
<body>
	<?php include_once("assets/header.php"); ?>
	<!-- Content goes here! -->
	<div class="container">
		<h1>Datenbank Controller</h1>
		<p>
			Unter dem Reiter "Person" werden alle Personen nach ihrer ID, ihrem Namen und <br>
			ihrem Geburtstag sortiert aufgelistet, und unter "Projekt" alle Projekte. <br>
			Es kann nach Namen und Wohnort gesucht werden, <br>
			Einträge können editiert, gelöscht und neue hinzugefügt werden. <br>
			Das Teilen von Datensets ist ebenfalls per GET-Parameter möglich<br><br>
			Unter dem Reiter "Einstellungen" können diverse Einstellungen zur Datenbank vorgenommen werden.
		</p>
	</div>
	<?php include_once("assets/foot.php"); ?>
</body>
</html>
