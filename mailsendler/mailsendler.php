<?php

//Clean string
function clean($value = "")
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    return $value;
}


function check_length($value = "", $min, $max)
{
    $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
    return !$result;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tmp1 = $_POST['name'];
    $tmp2 = $_POST['phone'];
    $tmp3 = $_POST['mail'];

    $name = clean($tmp1);
    $phone = clean($tmp2);
    $email = clean($tmp3);


    //Validate
    if (!empty($name) && !empty($phone) && !empty($email)) {
        $name_validate = true;
        $phone_validate = true;

        //name validate
        if (!preg_match("/^\D+$/", $name)) {
            $name = "Wrong name";
            $name_validate = false;
        }
        //phone validate
        if (!preg_match("/^[0-9]{7,}$/", $phone)) {
            $phone = "Wrong number";
            $phone_validate = false;
        }
        //mail validate
        $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL);


        if (check_length($name, 2, 25) && check_length($phone, 7, 15) && $name_validate && $phone_validate && $email_validate) {


            $subject = "New request from Art Clay";
            $message = "\n\nName: " . $name . "\n\nPhone: " . $phone . "\n\nE-mail: " . $email . "\n\n";
            $header = "Content-Type: text/plain; charset=utf-8\n";
            $header .= "From: <artclay@gmail.com>\n\n";

            //variant 2
//            $mail = mail('maksym.chvorda@gotoinc.co', $subject, iconv('utf-8', 'windows-1251', $message), iconv('utf-8', 'windows-1251', $header));
            $mail = mail('maksym.chvorda@gotoinc.co', $subject, $message, $header);

            echo "Thank. Your contacts have been sent.";
        } else {
            echo "Incorrect data.";
        }
    } else {
        echo "Fill in the blank fields.";
    }
}