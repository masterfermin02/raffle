<?php

// print_r($_FILES);
// print_r($_REQUEST);

require_once("global.php");
$raffle_id = $_POST["id"];

$sql = "UPDATE raffle set active = 0;";
$res = $db->query($sql);

$sql = "UPDATE raffle set active = 1 WHERE id = '{$raffle_id}';";
$res = $db->query($sql);
echo 1;

?>