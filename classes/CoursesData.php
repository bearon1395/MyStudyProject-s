<?php
require_once('Db.php');

function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    return $value;
}

$connect = new Db();

if (isset($_POST['request']) && $_POST['request'] == 'user_create') {
    $tmp1 = $_POST['surname'];
    $tmp2 = $_POST['name'];
    $tmp3 = $_POST['mail'];
    $tmp4 = $_POST['pic'];

    $surname = clean($tmp1);
    $name = clean($tmp2);
    $mail = clean($tmp3);
    $pic = clean($tmp4);


    $connect->addStudent($surname, $name, $mail, $pic);
}
if (isset($_POST['id_user']) && $_POST['request'] == 'user_update') {
    $tmp1 = $_POST['surname'];
    $tmp2 = $_POST['name'];
    $tmp3 = $_POST['mail'];
    $tmp4 = $_POST['pic'];
    $tmp5 = $_POST['id_user'];

    $surname = clean($tmp1);
    $name = clean($tmp2);
    $mail = clean($tmp3);
    $pic = clean($tmp4);
    $id_user = intval(clean($tmp5));

    $connect->updateStudent($id_user, $surname, $name, $mail, $pic);
}
if (isset($_POST['id_user']) && $_POST['request'] == 'user_delete') {
    $id_user = intval(clean($_POST['id_user']));
    $connect->deleteStudent($id_user);
}
if (isset($_POST['request']) && $_POST['request'] == 'add_user_to_course') {
    $tmp1 = $_POST['course'];
    $tmp2 = $_POST['student'];
    $course = clean($tmp1);
    $student = clean($tmp2);
    $connect->addStudentForCourse($course,$student);
}

if (isset($_POST['request']) && $_POST['request'] == 'delete_user_from_course') {
    $tmp1 = $_POST['course'];
    $tmp2 = $_POST['student'];
    $course = clean($tmp1);
    $student = clean($tmp2);
    $connect->deleteStudentForCourse($course,$student);
}

if (isset($_POST['request']) && $_POST['request'] == 'add_course') {
    $tmp1 = $_POST['course'];
    $tmp2 = $_POST['lecturer'];
    $course = clean($tmp1);
    $lecturer = clean($tmp2);
    $connect->addCourse($course,$lecturer);
}


