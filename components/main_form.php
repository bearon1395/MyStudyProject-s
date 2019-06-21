<?php
require_once('Db.php');

$fullName = trim(strval($_POST['fullName']));
$theme = intval($_POST['theme']);
$review = trim(strval($_POST['review']));
$date_time = date($_POST['date_time']);
$rate_value = intval($_POST['rate_value']);

if (isset($_POST)) {
//  Entering data into the database
    $db = Db::getConnection();
    $sql = "INSERT INTO records (full_name, theme, review, creation_date, evaluation) VALUES (?, ?, ?, ?, ?)";
    $insertDate = $db->prepare($sql);

    $insertDate->execute([$fullName,
        $theme,
        $review,
        $date_time,
        $rate_value]);
    $db = null;

}




