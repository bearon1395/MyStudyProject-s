<form action="../components/main_form.php" method="post" id="createReviewForm">
    <label class="form-item">
        <span>Full name:</span>
        <input class="form-item" type="text" id="fullName">
    </label>
    <label class="form-item">
        <span>Theme:</span>
        <?= Db::selectorBuilder(); ?>
    </label>
    <label class="form-item">
        <span>Review:</span>
        <textarea name="review" id="review" class="form-item" cols="30" rows="10"></textarea>
    </label>
    <label class="form-item">
        <span>Rate:</span>
        <p><input type="radio" name="rate" id="rate" value="1"> Terribly
            <input type="radio" name="rate" id="rate" value="2"> Bad
            <input type="radio" name="rate" id="rate" value="3" checked="checked"> Good
            <input type="radio" name="rate" id="rate" value="4"> Excellent</p>
    </label>
    <?php $datetime = date("Y-m-d H:i:s", time()); ?>
    <p>
        <time type="hidden" id="datetime" datetime="<?= $datetime ?>"></time>
    </p>
    <p><input type="submit" value="Send"></p>

</form>



