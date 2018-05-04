<?php

include './config.php';

$q = intval($_GET['q']);

if ($q != 0) {
    $sqlKind = "SELECT * FROM active_learn_kind WHERE active_type_id = '" . $q . "'";
    $resKind = $conn->query($sqlKind);
    echo "<h3>Select Kind Of Data</h3>";
    echo "<select name='ActivrLearnKind' class='form-control' onchange='showFile(this.value)' id='ack'>";
    echo "<option value='0'></option>";
    while ($rowKind = $resKind->fetch_assoc()) {
        echo "<option value='" . $rowKind['id'] . "'>" . $rowKind['kind_name'] . "</option>";
    }
    echo "</select>";
}
else{
    echo "<meta http-equiv='refresh' content='0'>";
}








