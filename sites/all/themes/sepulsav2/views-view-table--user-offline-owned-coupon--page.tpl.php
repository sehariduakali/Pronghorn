<nav class="after_clear">
    <a href="<?php print url('user/voucher'); ?>">Online Store</a>
    <a href="<?php print url('user/voucher/offline'); ?>" class="active">Offline Store</a>
</nav>
<div class="list_voucher after_clear">
<?php foreach ($rows as $row_count => $row): ?>
    <div class="box_voucher">
        <div class="image"><img src="<?php print $row['field_coupon_product_image']; ?>" alt="voucher" /></div>
        <span class="date"><?php print $row['field_owned_coupon_expiry']; ?></span>
        <a href="" class="detail">lihat detail ></a>
        <div class="data_popup">
            <div class="img"><?php print $row['field_coupon_product_image']; ?></div>
            <div class="desc">
                <h3><?php print $row['title']; ?></h3>
                <h4><?php print $row['field_detail_simple_coupon']; ?></h4>
                <h5>Terms & Conditions</h5>
                <?php print $row['field_coupon_tnc']; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>
