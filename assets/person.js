var update_btn = document.querySelector("#update-btn");
var update_s_btn = document.querySelector("#update-save-btn");
var del_btn = document.querySelector("#del-btn");
var new_btn = document.querySelector("#new-btn");
var all_inputs = document.querySelectorAll(".this-editable");


function update_click() {
    all_inputs.forEach(function (e) {
        e.readOnly = false;
    });
    update_btn.style.display = "none";
    update_s_btn.style.display = "inline";
}

function save_click() {
    all_inputs.forEach(function (e) {
        e.readOnly = true;
    });
    // die form darüber ist ja schon perfekt eingerichtet, muss also nur noch abgeschickt werden
    document.querySelector("#user-form").submit();
}

function new_click() {
    // ein neues fenster mit JS öffnen in dem man den Eintrag hinzufügen kann
    var new_window = window.open("new.php", "NeuerEintrag");
}

function del_click() {
    // modal mit warnung erstellen und bei Bestätigung das Element löschen
}

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

function delete_item() {
    $("#delModal").modal("hide");
}