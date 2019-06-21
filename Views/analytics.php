<h1>Analytics:</h1>
<!-- getCountTheme() parameters:
1 - Gratitude
2 - Suggestions for improving
3 - Complaint
-->

<p>Gratitude: <?= $theme1 = Db::getCountTheme(1) ?></p>
<p>Suggestions for improving: <?= $theme2 = Db::getCountTheme(2) ?></p>
<p>Complaint: <?= $theme3 = Db::getCountTheme(3) ?></p>


<h1>Ratings by category:</h1>
<table id="analyticsTable" border="1">
    <tr>
        <th><strong>Gratitude:</strong></th>
        <th><strong>Suggestions for improving:</strong></th>
        <th><strong>Complaint:</strong></th>
    </tr>
    <tr>
        <td><p>Excellent: <?= $rate = Db::getRate(1, 4) ?></p>
            <p>Good: <?= $rate = Db::getRate(1, 3) ?></p>
            <p>Bad: <?= $rate = Db::getRate(1, 2) ?></p>
            <p>Terribly: <?= $rate = Db::getRate(1, 1) ?></p></td>

        <td><p>Excellent: <?= $rate = Db::getRate(2, 4) ?></p>
            <p>Good: <?= $rate = Db::getRate(2, 3) ?></p>
            <p>Bad: <?= $rate = Db::getRate(2, 2) ?></p>
            <p>Terribly: <?= $rate = Db::getRate(2, 1) ?></p></td>

        <td><p>Excellent: <?= $rate = Db::getRate(3, 4) ?></p>
            <p>Good: <?= $rate = Db::getRate(3, 3) ?></p>
            <p>Bad: <?= $rate = Db::getRate(3, 2) ?></p>
            <p>Terribly: <?= $rate = Db::getRate(3, 1) ?></p></td>
    </tr>
</table>
