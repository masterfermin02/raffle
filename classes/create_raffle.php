<?php

// print_r($_FILES);
// print_r($_REQUEST);

require_once("global.php");

/*BASIC INFORMATION*/
$hidden_list_container = $_POST["hidden_list_container"];

$raffle_name = mysqli_real_escape_string($db, $_POST["name"]);
$select_list_type = mysqli_real_escape_string($db, $_POST["select_list_type"]);

/*PATH UPLOAD AND ALLOW TYPES*/
$targetDir = "../uploads/";
$allowTypes = array('jpg', 'png', 'jpeg', 'gif');

if (isset($_POST["select_list_type"]) && $select_list_type > 0) {

    /*SAVE IMAGES RAFFLE*/

    /* SAVE LOGO */
    $target_logo = $_FILES["logo_image"]["name"];
    $filelogo = time() . md5_file($_FILES['logo_image']['tmp_name']) . "." . ReturnExtension($target_logo);
    UploadPhoto($_FILES['logo_image']['tmp_name'], $filelogo);

    /* SAVE HEADER IMAGE */
    // $target_header = $_FILES["header_image"]["name"];
    // $fileheader = time() . md5_file($_FILES['header_image']['tmp_name']) . "." . ReturnExtension($target_header);
    // UploadPhoto($_FILES['header_image']['tmp_name'], $fileheader);

    // /* SAVE RIGTH IMAGE */
    // $target_rigth = $_FILES["rigth_image"]["name"];
    // $filerigth = time() . md5_file($_FILES['rigth_image']['tmp_name']) . "." . ReturnExtension($target_header);
    // UploadPhoto($_FILES['rigth_image']['tmp_name'], $filerigth);

    // /* SAVE LEFT IMAGE */
    // $target_left = $_FILES["left_image"]["name"];
    // $fileleft = time() . md5_file($_FILES['left_image']['tmp_name']) . "." . ReturnExtension($target_header);
    // UploadPhoto($_FILES['left_image']['tmp_name'], $fileleft);

    // /* SAVE BUTTON IMAGE */
    // $target_footer = $_FILES["footer_image"]["name"];
    // $filefooter = time() . md5_file($_FILES['footer_image']['tmp_name']) . "." . ReturnExtension($target_header);
    // UploadPhoto($_FILES['footer_image']['tmp_name'], $filefooter);

    /*INSERT RAFFLE*/
    //$sql = "INSERT INTO raffle(`name`, `logo`, `header_image`, `right_lateral_image`, `left_lateral_image`, `footer_image`, `created_at`) VALUES ('{$raffle_name}','{$filelogo}', '{$fileheader}', '{$filerigth}', '{$fileleft}', '{$filefooter}', NOW())";
    $sql = "INSERT INTO raffle(`name`, `logo`, `created_at`) VALUES ('{$raffle_name}','{$filelogo}', NOW())";

    /* GET A ID INSERT RAFLLE TO INSERT DETAILS */
    if ($db->query($sql) === true) {
        $last_id = $db->insert_id;

        /* CHECK IF DETAIL IS A IMAGES OR LIST */
        if ($select_list_type == 1) {
            if (!empty($_FILES['files'])) {
                foreach ($_FILES['files']['name'] as $key => $name) {
                    if ($_FILES['files']['error'][$key] === 0) {
                        $temp = $_FILES['files']['tmp_name'][$key];
                        $ext = explode('.', $name);
                        $ext = strtolower(end($ext));
                        $file = md5_file($temp) . time() . '.' . $ext;

                        if (move_uploaded_file($temp, "$targetDir/{$file}") === true) {
                            $sql = "INSERT INTO raffle_details(`content_type`,`content`,`raffle_id`) VALUES('image','{$file}',{$last_id})";
                            $db->query($sql);
                        }

                    }
                }
            }
        } else if ($select_list_type == 2) {
            $data = explode(", ", $hidden_list_container);
            foreach ($data as $key => $value) {
                $sql = "INSERT INTO raffle_details(`content_type`,`content`,`raffle_id`) VALUES('list','{$value}',{$last_id})";
                $db->query($sql);
            }
        }

        $msg = "Correcto!";
    } else {
        $msg = "Error: " . $sql . "<br>" . $db->error;
    }

    $db->close();
}

echo json_encode(array("msg" => $msg, "status" => 1));
exit;
function UploadPhoto($tmp, $name)
{
    global $targetDir;
    move_uploaded_file($tmp, "$targetDir/{$name}");
}

function ReturnExtension($file)
{
    $ext = explode('.', $file);
    $ext = strtolower(end($ext));
    return $ext;
}

?>