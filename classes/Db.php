<?php
class Db
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "courses_app";

    public function connection()
    {
        $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

    public function addStudent($surname, $name, $mail, $pic)
    {
//        $name = "Bill";
//        $surname = "Taylor";
//        $mail = "billtaylor@gmail.com";
//        $pic = "123";

        $dbh = $this->connection();
        $sql = "INSERT INTO student (surname, name, mail, pic) VALUE ('$surname','$name','$mail','$pic')";
        $stm = $dbh->prepare($sql);
        $stm->execute();
        $stm = null;
    }

    public function deleteStudent($id)
    {
        $dbh = $this->connection();
        $sql = "DELETE FROM student WHERE id='$id';";
        $stm = $dbh->prepare($sql);
        $stm->execute();
        $stm = null;

    }

    public function updateStudent($id, $surname, $name, $mail, $pic)
    {
        $dbh = $this->connection();
        $sql = "UPDATE student SET surname='$surname', name='$name', mail ='$mail', pic='$pic' WHERE id='$id'";
        $stm = $dbh->prepare($sql);
        $stm->execute();
        $stm = null;
    }

    public function getTable()
    {
        $dbh = $this->connection();
        $sql = "SELECT lecturer.surname, lecturer.name, lecturer.middlename, courses.course, courses.id, course_table.id AS course_table_id FROM course_table 
LEFT JOIN lecturer 
ON course_table.lecturer = lecturer.id
LEFT JOIN courses
ON course_table.course = courses.id;";
        $stm = $dbh->prepare($sql);
        $stm->execute();

        $result = [];
        $i = 0;
        while ($row = $stm->fetch(PDO::FETCH_LAZY)) {
            $result[$i]['id'] = $row['id'];
            $result[$i]['surname'] = $row['surname'];
            $result[$i]['name'] = $row['name'];
            $result[$i]['course'] = $row['course'];
            $result[$i]['id_course_table'] = $row['course_table_id'];
            $i++;
        }

        return $result;
    }

    public function getStudentsForCourse($id)
    {
        $dbh = $this->connection();
        $sql = "SELECT student.id, student.surname, student.name, student.mail FROM `records` 
LEFT JOIN student
ON student.id = records.student
WHERE records.courseTable = $id;";
        $stm = $dbh->prepare($sql);
        $stm->execute();

        $result = [];
        $i = 0;
        while ($row = $stm->fetch(PDO::FETCH_LAZY)) {
            $result[$i]['id'] = $row['id'];
            $result[$i]['surname'] = $row['surname'];
            $result[$i]['name'] = $row['name'];
            $result[$i]['mail'] = $row['mail'];
            $result[$i]['pic'] = $row['pic'];

            $i++;
        }
        return $result;
    }

    public function getAllStudents()
    {
        $dbh = $this->connection();
        $sql = "SELECT * FROM `student`;";
        $stm = $dbh->prepare($sql);
        $stm->execute();

        $result = [];
        $i = 0;
        while ($row = $stm->fetch(PDO::FETCH_LAZY)) {
            $result[$i]['id'] = $row['id'];
            $result[$i]['surname'] = $row['surname'];
            $result[$i]['name'] = $row['name'];
            $result[$i]['mail'] = $row['mail'];
            $result[$i]['pic'] = $row['pic'];

            $i++;
        }
        return $result;
    }

    public function addStudentForCourse($id_course_table, $id_student)
    {
        $dbh = $this->connection();
        $sql = "INSERT INTO records (courseTable, student) VALUE ('$id_course_table','$id_student')";
        $stm = $dbh->prepare($sql);
        $stm->execute();
        $stm = null;
    }

    public function deleteStudentForCourse($id_course_table, $id_student)
    {
        $dbh = $this->connection();
        $sql = "DELETE FROM records WHERE courseTable = '$id_course_table' AND student = '$id_student'";
        $stm = $dbh->prepare($sql);
        $stm->execute();
        $stm = null;
    }

    public function addCourse($id_course_table, $id_lecturer)
    {
        $dbh = $this->connection();
        $sql = "INSERT INTO course_table (course, lecturer) VALUE ('$id_course_table','$id_lecturer')";
        $stm = $dbh->prepare($sql);
        $stm->execute();
        $stm = null;
    }

    public function getLecturersList()
    {
        $dbh = $this->connection();
        $sql = "SELECT * FROM `lecturer`;";
        $stm = $dbh->prepare($sql);
        $stm->execute();

        $result = [];
        $i = 0;
        while ($row = $stm->fetch(PDO::FETCH_LAZY)) {
            $result[$i]['id'] = $row['id'];
            $result[$i]['surname'] = $row['surname'];
            $result[$i]['name'] = $row['name'];
            $result[$i]['middlename'] = $row['middlename'];

            $i++;
        }
        return $result;
    }
    public function getCoursesList()
    {
        $dbh = $this->connection();
        $sql = "SELECT * FROM `courses`;";
        $stm = $dbh->prepare($sql);
        $stm->execute();

        $result = [];
        $i = 0;
        while ($row = $stm->fetch(PDO::FETCH_LAZY)) {
            $result[$i]['id'] = $row['id'];
            $result[$i]['course'] = $row['course'];

            $i++;
        }
        return $result;
    }
}
