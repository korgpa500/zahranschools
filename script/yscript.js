$(document).ready(function () {
    $('#imgIn').toggle(5000);
    $('#eng').hide();
    $('#ar').hide();
    $('#eng').fadeIn(5000);
    $('#ar').fadeIn(5000);
});

function showKind(str) {
    if (str === "") {
        document.getElementById("selectKind").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("selectKind").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "temp/kindActiveLearn.php?q=" + str, true);
        xmlhttp.send();
    }
}


function showFile(str) {
    if (str === "") {
        document.getElementById("inputFile").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("inputFile").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "temp/fileActiveLearn.php?f=" + str, true);
        xmlhttp.send();
    }
}



