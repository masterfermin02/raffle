<?php

require_once("global.php");

$sql = "SELECT content, raffle_details.id FROM raffle_details where winner = 0 and raffle_id = (SELECT id FROM raffle WHERE active = 1) ORDER BY RAND() LIMIT 1;";
$res = $db->query($sql);
$row = $res->fetch_assoc();
$db->query("update raffle_details set winner = 1 where id = ".$row['id']);

echo $row["content"];
exit;