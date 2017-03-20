<!DOCTPYE html>
<html>
<head>
    <?php include_once("assets/head.php"); ?>
    <title>Neuer Eintrag</title>
</head>
<body>
<?php include_once("assets/header.php"); ?>

<div class="container">
    <form class="form-inline center_div" method="post" action="person.php" id="user-form">
        <div class="form-group">
            <label for="vorname">Vorname: </label>
            <input type="text" class="form-control this-editable" id="vorname">
        </div>
        <br>
        <div class="form-group">
            <label for="nachname">Nachname: </label>
            <input type="text" class="form-control this-editable" id="nachname">
        </div>
        <br>
        <div class="form-group">
            <label for="gdate">Geburtsdatum: </label>
            <input type="date" class="form-control this-editable" id="gdate">
        </div>
        <br>
        <div class="form-group">
            <label for="adresse">Adresse: </label>
            <input type="text" class="form-control this-editable" id="adresse">
        </div>
        <br>
        <div class="form-group">
            <label for="ort">Wohnort: </label>
            <input type="text" class="form-control this-editable" id="ort" onchange="plz_change(this.value)">
            <input type="text" class="form-control" id="ortname" readonly>
        </div>
        <br>
        <br>
    </form>
    <button id="del-btn" onclick="del_click()" class="btn btn-danger">Löschen</button>
    <button id="update-btn" onclick="update_click()" class="btn btn-info">Ändern</button>
    <button id="update-save-btn" onclick="save_click()" class="btn btn-info btn-invis">Speichern</button>
    <button id="new-btn" onclick="new_click()" class="btn btn-success">Neu</button>
    <br><br><br>



    <script>
        function test(e){
            e.preventDefault();
            $("#form").submit();
        }

        function plz_change(plz) {
            var xmlhttp;
            while (plz.length == 5){
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        $("#ortname").value = this.responseText;
                    }
                };
                xmlhttp.open("GET","php/getort.php?plz="+plz,true);
                xmlhttp.send();
            }
        }
    </script>
</div>

<?php include_once("assets/foot.php"); ?>
</body>
</html>
