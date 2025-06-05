<div class="bog-donation-form">
    <form method="post" action="">
        <?php wp_nonce_field('bog_donate_form', 'bog_donate_nonce'); ?>
        <label>აირჩიეთ თანხა:</label><br>
        <input type="radio" name="amount" value="5"> 5 ლარი<br>
        <input type="radio" name="amount" value="10"> 10 ლარი<br>
        <input type="radio" name="amount" value="20"> 20 ლარი<br>
        <input type="radio" name="amount" value="custom"> <input type="text" name="custom_amount" placeholder="სასურველი თანხა"><br><br>
        <input type="submit" value="გადახდა საქართველოს ბანკით">
    </form>
</div>
