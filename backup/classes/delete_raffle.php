<?php

// print_r($_FILES);
// print_r($_REQUEST);

require_once("global.php");

$targetDir = "../uploads/";
/*BASIC INFORMATION*/
$raffle_id = $_POST["id"];

/*SELECT RAFFLE*/
$sql = "SELECT `id`, `logo`, `header_image`, `right_lateral_image`, `left_lateral_image`, `footer_image` FROM raffle WHERE id = '{$raffle_id}' LIMIT 1;";
$res = $db->query($sql);
$row = $res->fetch_assoc();
$id = $row['id'];
$logo = $row['logo'];
$header_image = $row['header_image'];
$right_lateral_image = $row['right_lateral_image'];
$left_lateral_image = $row['left_lateral_image'];
$footer_image = $row['footer_image'];

$sql = "DELETE FROM raffle WHERE id = '{$raffle_id}'";
$res = $db->query($sql);

@unlink("$targetDir/$logo");
@unlink("$targetDir/$header_image");
@unlink("$targetDir/$right_lateral_image");
@unlink("$targetDir/$left_lateral_image");
@unlink("$targetDir/$footer_image");

$sql = "SELECT id, content_type, content, raffle_id  FROM raffle_details WHERE raffle_id = '{$raffle_id}'";
$res = $db->query($sql);

while ($row = $res->fetch_assoc()) {
    @unlink("$targetDir/{$row['content']}");
}

$s = "DELETE FROM raffle_details WHERE raffle_id = '{$row['id']}'";
$r = $db->query($s);

echo 1;