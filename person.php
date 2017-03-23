<?php require_once("config.php"); ?>
<!DOCTPYE html>
<html>
<head>
	<?php include_once("assets/head.php"); ?>
	<title>Person</title>
	<style>.center_div{
			margin: 0 auto;
			width:80% /* value of your choice which suits your alignment */
		}
	.btn-invis{
		display: none;
	}</style>
</head>
<body>
	<?php include_once("assets/header.php"); ?>
	<div class="container">
		<?php
        //  Verbindung herstellen
		$verbindung = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATENBANK);

		// POST/GET-Variablen überprüfen
		if (!empty($_POST["show"])){
			$user_id = (int) filter_input(INPUT_POST, "show", FILTER_VALIDATE_INT);
		}
		else if (!empty($_GET["show"])){
            $user_id = (int) filter_input(INPUT_GET, "show", FILTER_VALIDATE_INT);
        }
		else {
			$user_id = 1;
		}

		//  Verbindung überprüfen
		if (!$verbindung) {
			die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
		}
		if (isset($user_id)){
			$sql = "SELECT Nachname, Vorname, adresse, ort, tab_person.plz FROM tab_person JOIN tab_ort ON tab_person.plz = tab_ort.plz WHERE tab_person.PersonNr = " . $user_id;
			$ergebnis = mysqli_query($verbindung, $sql);

			if (mysqli_num_rows($ergebnis) > 0) {
				// output data of each row
				while($row = mysqli_fetch_assoc($ergebnis)) {
				    var_dump($_POST);
                    var_dump($_GET);
                    var_dump($row);
				?>
				<form class="form-inline center_div" method="post" action="person.php<?php if (isset($_GET["show"])){ echo "?show=".$_GET["show"]; }?>" id="user-form">
					<div class="form-group">
						<label for="vorname">Vorname: </label>
						<input type="text" class="form-control this-editable" name="vorname" id="vorname" value="<?php echo $row["Vorname"];?>" readonly>
					</div>
					<br>
					<div class="form-group">
						<label for="nachname">Nachname: </label>
						<input type="text" class="form-control this-editable" name="nachname" id="nachname" value="<?php echo $row["Nachname"];?>" readonly>
					</div>
					<br>
					<div class="form-group">
						<label for="adresse">Adresse: </label>
						<input type="text" class="form-control this-editable" name="adresse" id="adresse" value="<?php echo $row["adresse"];?>" readonly>
					</div>
					<br>
					<div class="form-group">
						<label for="ort">Wohnort: </label>
						<input type="text" class="form-control this-editable" name="ort" id="ort" value="<?php echo $row["plz"];?>" onchange="plz_change(this.value)" readonly>
						<input type="text" class="form-control" name="ortname" id="ortname" value="<?php echo $row["ort"]?>" readonly>
					</div>
                    <?php
                        if (isset($_POST["show"])){
                        ?>
                            <input type="hidden" name="show" value="<?php echo $user_id; ?>">
                        <?php
                        }
                    ?>
					<br>
					<br>
				</form>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delModal">Löschen</button>
					<button id="update-btn" onclick="update_click()" class="btn btn-info">Ändern</button>
					<button id="update-save-btn" onclick="save_click()" class="btn btn-info btn-invis">Speichern</button>
					<button id="new-btn" onclick="new_click()" class="btn btn-success">Neu</button>

                    <div id="delModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content" >
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Element Löschen</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Bist du dir sicher, dass du die Person <?php echo $row["Vorname"]." ".$row["Nachname"]; ?> löschen möchtest?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" onclick="delete_item()">Ja, <?php echo $row["Vorname"]." ".$row["Nachname"]; ?> löschen</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Nein</button>
                                </div>
                            </div>

                        </div>
                    </div>

					<br><br><br>
					<div class="row container">
						<div class="col-sm-1">
							<form action="person.php" method="post"><input type="hidden" name="show" value="1"><input type="submit" id="submit_first" class="btn btn-default" value="&laquo;"></form>
						</div>
						<div class="col-sm-1">
							<form action="person.php" method="post"><input type="hidden" name="show" value="<?php echo $user_id-1?>"><input type="submit" id="submit_prev" class="btn btn-default" value="Letzter"></form>
						</div>
						<div class="col-sm-1">
							<form action="person.php" method="post"><input type="hidden" name="show" value="<?php echo $user_id+1?>"><input type="submit" id="submit_next" class="btn btn-default" value="Nächster"></form>
						</div>
						<div class="col-sm-1">
							<form action="person.php" method="post"><input type="hidden" name="show" value="<?php echo getMaxID("tab_person", "PersonNr")?>"><input type="submit" id="submit_last" class="btn btn-default" value="&raquo;"></form>
						</div>
					</div>
				<?php
				}
			} else {
				?>
                <div class="alert alert-warning">
                    <strong>Fehler:</strong> Kein Nutzer mit dieser ID gefunden: <?php mysql_error();?>
                </div>

                <?php
			}

			mysqli_close($verbindung);
		}
		 ?>
	</div>
	<?php include_once("assets/foot.php"); ?>
	<script src="assets/person.js"></script>
</body>
</html>

<?php

function getMaxID($table, $id){
	$verbindung = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATENBANK);

	if (!$verbindung) {
		die(mysqli_connect_error());
	}
	// SELECT max(PersonNr) FROM tab_person
	$sql = "SELECT max(".$id.") FROM `". $table ."`";
	$ergebnis = mysqli_query($verbindung, $sql);
	if (mysqli_num_rows($ergebnis) > 0) {
		// output data of each row
		$row = mysqli_fetch_assoc($ergebnis);
		return $row["max(".$id.")"];
	}
	else{
		return false;
	}
}


