<?php

$f = intval($_GET['f']);
if ($f != 0) {
    echo "<div class='form-group'>";
    echo "<h3>Enter Title Of File</h3>";
    echo "<input type='text' name='ativeTitle' class='form-control'>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<h3>Select a File To Upload</h3>";
    echo "<input type='file' name='ativeFile' class='form-control'>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<input type='submit' class='btn' name='uploadactive' value='Upload' id='youssry'>";
    echo "</div>";
}

