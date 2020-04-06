<?php
require_once(__DIR__ . '/classes/Db.php');
$connect = new Db();
$connect->connection();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="content">
<?php
$table = $connect->getTable();
foreach ($table as $course)
{?>
    <table>
        <tbody>
        <tr>
            <td>
                <p><?=$course['course'];?></p>
                <p>Lector: <?=$course['surname'];?> <?=$course['name'];?></p>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                $studentsForCourse = $connect->getStudentsForCourse($course['id_course_table']);
                foreach ($studentsForCourse as $student) {?>
                    <p><?=$student['id']?> <?=$student['surname']?> <?=$student['name']?> <?=$student['mail']?></p>
          <?php } ?>
            </td>
        </tr>
        </tbody>
    </table>
<?php } ?>

<p>Create student:</p>
<form action="classes/CoursesData.php" method="post" id="user_create">
    <input type="text" placeholder="surname" id="surname">
    <input type="text" placeholder="name" id="name">
    <input type="email" placeholder="mail" id="mail">
    <input type="file" id="pic" multiple>
    <input type="submit">
</form>

<p>Update student data:</p>
<form action="classes/CoursesData.php" method="post" id="user_update">
    <input type="text" placeholder="id user" id="id_user_upd">
    <input type="text"  placeholder="surname" id="surname_upd">
    <input type="text" placeholder="name" id="name_upd">
    <input type="email" placeholder="mail" id="mail_upd">
    <input type="file" id="pic_update" multiple>
    <input type="submit">
</form>

<p>Delete student:</p>
<form action="classes/CoursesData.php" method="post" id="user_delete">
    <input type="text" id="id_user" placeholder="id">
    <input type="submit">
</form>

<p>Add student to the course:</p>
<form action="classes/CoursesData.php" method="post" id="add_user_to_course">
    <select name="" id="course_add_selector">
        <?php
        $allCourses = $connect->getTable();
        foreach ($allCourses as $course) { ?>
            <option value="<?=$course['id_course_table'];?>"><?=$course['course'];?>, Lector: <?=$course['surname'];?><?=$course['name'];?></option>
        <?php } ?>
    </select>
    <select name="" id="student_add_selector">
        <?php
        $allStudents = $connect->getAllStudents();
        foreach ($allStudents as $student) { ?>
        <option value="<?=$student['id'];?>"><?=$student['surname'];?> <?=$student['name'];?></option>
        <?php } ?>
    </select>
    <input type="submit">
</form>

<p>Remove student from course:</p>
<form action="classes/CoursesData.php" method="post" id="delete_user_from_course">
    <select name="" id="course_delete_selector">
        <?php
        $allCourses = $connect->getTable();
        foreach ($allCourses as $course) { ?>
            <option value="<?=$course['id'];?>"><?=$course['course'];?>, Lector: <?=$course['surname'];?><?=$course['name'];?></option>
        <?php } ?>
    </select>
    <select name="" id="student_delete_selector">
        <?php
        $allStudents = $connect->getAllStudents();
        foreach ($allStudents as $student) { ?>
            <option value="<?=$student['id'];?>"><?=$student['surname'];?> <?=$student['name'];?></option>
        <?php } ?>
    </select>
    <input type="submit">
</form>


<p>Create course:</p>
<form action="classes/CoursesData.php" method="post" id="add_course">
    <select name="" id="add_course_selector">
        <?php
        $allCourses = $connect->getCoursesList();
        foreach ($allCourses as $course) { ?>
            <option value="<?= $course['id']; ?>"><?= $course['course']; ?></option>
        <?php } ?>
    </select>
    <select name="" id="add_lecturer_selector">
        <?php
        $allLecturers = $connect->getLecturersList();
        foreach ($allLecturers as $lecturer) { ?>
            <option value="<?= $lecturer['id']; ?>"><?= $lecturer['surname'];?> <?=$lecturer['name'];?> <?=$lecturer['middlename'];?></option>
        <?php } ?>
    </select>
    <input type="submit">
</form>
</div>

<script src="js/common.js"></script>
</body>
</html>
