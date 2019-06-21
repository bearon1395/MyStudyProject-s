<?php

class Db
{
    public static function getConnection()
    {
        $paramsPath = dirname(__FILE__) . '/../config/db_params.php';

        $params = include($paramsPath);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);

        return $db;
    }

    public static function selectorBuilder()
    {
        $db = self::getConnection();
        $result = $db->query('SELECT id, topic_name  FROM  themes');

// Formation of the selector
        ?>
        <select id="theme" class="form-item">
            <?php
            while ($row = $result->fetch(PDO::FETCH_LAZY)) {
                ?>
                <option value="<?= $row['id'] ?>" name="theme"><?= $row['topic_name'] ?></option>
                <?php
            }
            ?>
        </select>
        <?php
        $db = null;
    }

    public static function makePagination()
    {
        $db = self::getConnection();
// Variable stores the number of messages displayed on the page.
        $num = 7;
// Retrieve current page from URL
        $page = $_GET['page'];
// Determine the total number of messages in the database
        $posts = $nRows = $db->query('SELECT count(*) FROM records')->fetchColumn();
// Find the total number of pages
        $total = intval(($posts - 1) / $num) + 1;
// Determine the beginning of messages for the current page
        $page = intval($page);
// If the value of $ page is less than one or negative
// go to the first page
// And if it is too large, then go to the last.
        if (empty($page) or $page < 0) $page = 1;
        if ($page > $total) $page = $total;
// Calculate from what number
// should display messages
        $start = $page * $num - $num;
// Choose $num messages starting from the $start number
        $result = $db->prepare('SELECT 
            r.id,
            r.full_name,
            r.theme,
            th.topic_name,
            r.review,
            r.creation_date,
            r.evaluation,
            r.file
        FROM records r
        LEFT JOIN themes th
        ON r.theme = th.id
        LIMIT  ?, ?');
        $result->bindValue(1, $start, PDO::PARAM_INT);
        $result->bindValue(2, $num, PDO::PARAM_INT);
        $result->execute();
        $data = $result->fetchAll();
        $db = null;
// In a loop, we transfer the results of the query to the $postrow array
        foreach ($data as $key) {
            $postrow[] = $key;
        }

// Check if backward arrows are needed.
        if ($page != 1) $pervpage = '<a href= ./index.php?page=1><<</a> 
                               <a href= ./index.php?page=' . ($page - 1) . '><</a> ';
// Check whether the forward arrow need
        if ($page != $total) $nextpage = ' <a href= ./index.php?page=' . ($page + 1) . '>></a> 
                                   <a href= ./index.php?page=' . $total . '>>></a>';
// We find the two nearest pages from both edges, if they are exist
        if ($page - 2 > 0) $page2left = ' <a href= ./index.php?page=' . ($page - 2) . '>' . ($page - 2) . '</a> | ';
        if ($page - 1 > 0) $page1left = '<a href= ./index.php?page=' . ($page - 1) . '>' . ($page - 1) . '</a> | ';
        if ($page + 2 <= $total) $page2right = ' | <a href= ./index.php?page=' . ($page + 2) . '>' . ($page + 2) . '</a>';
        if ($page + 1 <= $total) $page1right = ' | <a href= ./index.php?page=' . ($page + 1) . '>' . ($page + 1) . '</a>';
// Menu output
        echo $pervpage . $page2left . $page1left . '<b>' . $page . '</b>' . $page1right . $page2right . $nextpage;

        return array($num, $postrow);
    }

    public static function getCountTheme($theme)
    {
        $db = self::getConnection();
        $nRows = $db->query("SELECT count(*) FROM records WHERE theme = '$theme'")->fetchColumn();
        $db = null;
        return $nRows;
    }

    public static function getRate($theme, $rate)
    {
        $db = self::getConnection();
        $nRows = $db->query("SELECT count(*) FROM records WHERE theme = '$theme' AND  evaluation = '$rate'")->fetchColumn();
        $db = null;
        return $nRows;
    }

}