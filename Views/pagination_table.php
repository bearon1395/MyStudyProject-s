<?php
//Build Pagination Table
list($num, $postrow) = Db::makePagination();
echo "<table id='paginationTable'>";
echo "<tr>
                <th>Full Name</th>
                <th>Theme</th>
                <th>Review</th>
                <th>Date</th>
            </tr>";
for ($i = 0; $i < $num; $i++) {
    if (isset($postrow[$i]['full_name'])) {
        echo "<tr> 
          <td>" . $postrow[$i]['full_name'] . "</td> 
          <td>" . $postrow[$i]['topic_name'] . "</td> 
          <td>" . $postrow[$i]['review'] . "</td>
          <td>" . $postrow[$i]['creation_date'] . "</td></tr>";
    }
}
echo "</table>";


?>
