<?php

require_once("global.php");

$sql = "SELECT content FROM raffle_details where raffle_id = (SELECT id FROM raffle WHERE active = 1) ORDER BY RAND() LIMIT 1;";
$res = $db->query($sql);
$row = $res->fetch_assoc();

echo $row["content"];
exit;