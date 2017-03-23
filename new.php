<!DOCTPYE html>
<html>
<head>
    <?php include_once("assets/head.php"); ?>
    <title>Neuer Eintrag</title>
</head>
<body>
<?php include_once("assets/header.php"); 

if (!empty($_POST["schliessen"]) and $_POST["schliessen"] == true){
	echo "<script>setTimeout(function (){self.close();}, 3000);</script>";
	?>
	<div class="alert alert-success">
		<strong>Erfolg:</strong> Nutzer in die Datenbank eingefügt!
	</div>
	<?php
}

?>

<div class="container">
    <form class="form-inline center_div" method="post" action="new.php" id="user-form">
        <div class="form-group">
            <label for="vorname">Vorname: </label>
            <input type="text" class="form-control this-editable" name="vorname" id="vorname">
        </div>
        <br>
        <div class="form-group">
            <label for="nachname">Nachname: </label>
            <input type="text" class="form-control this-editable" name="nachname" id="nachname">
        </div>
        <br>
        <div class="form-group">
            <label for="adresse">Adresse: </label>
            <input type="text" class="form-control this-editable" name="adresse" id="adresse">
        </div>
        <br>
        <div class="form-group">
            <label for="ort">Wohnort: </label>
            <input type="text" class="form-control this-editable" name="ort" id="ort" onkeyup="plz_change(this.value)">
            <input type="text" class="form-control" id="ortname" name="ortname" readonly>
        </div>
        <br>
        <br>
		<input type="hidden" name="schliessen" value="true">
		<button id="reset-btn" type="reset" class="btn btn-danger">Zurücksetzen</button> 
		    <button id="update-save-btn" type="submit" onclick="save_click()" class="btn btn-info btn-invis">Speichern</button>

    </form>
    <br><br><br>



    <script>

        function plz_change(plz) {
			console.log("PLZ_Change aufgerufen!");
			var xmlhttp;
			if (window.XMLHttpRequest) {
				// für IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// für IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					console.log(this);
					document.querySelector("#ortname").value = this.responseText;
				}
			};
			xmlhttp.open("GET","php/getort.php?plz="+plz,true);
			xmlhttp.send();
		}
		
		function save_click(){
			// posten an new.php mit feld POST[close=true]
			
		}
    </script>
</div>

<?php include_once("assets/foot.php"); ?>
</body>
</html>
