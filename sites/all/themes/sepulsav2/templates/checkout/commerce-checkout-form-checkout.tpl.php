<section class="transaction">
    <div class="wrapper_2 after_clear">
		<div class="col-md-7 c_left">
		  <h4><strong>Detail Transaksi</strong></h4>
		  <?php print render($form['cart_contents']); ?>

		  <?php print render($form['commerce_coupon']); ?>
		  <div class="coupon-description">
            <?php print t('Enter your coupon code here.'); ?>
            <?php
              $order_id = arg(1);
              $order_id = intval($order_id);
              if (user_is_anonymous()) :
                print t('You can use coupon code only if you !login.', array(
                  '!login' => l(t('login'), 'user/login', array(
                    'query' => array(
                      'destination' => !empty($order_id) ? 'checkout/' . $order_id : 'checkout',
                    ),
                  )),
                ));
              endif;
            ?>
		  	<br />
		  	<?php print t('Let it empty if you do not have promo code.'); ?>
		  </div>

<?php
if (isset($_COOKIE[REFERRAL_COOKIE])) :
  $cookie = unserialize($_COOKIE[REFERRAL_COOKIE]);
  $user_ref = user_load($cookie['uid']);
?>
<div class="alert alert-block alert-warning" style="font-size: 14px; height: auto; margin-top: 15px; padding: 3% 5%;">
<p style="margin-bottom: 10px;">Anda mendapatkan promosi referral dari :
<span style="font-weight: bold;"><?php print $user_ref->mail; ?></span></p>
<p style="margin: 0;">Jika kamu belum menjadi customer Sepulsa, lakukan pembayaran sekarang dan dapatkan sepulsa kredit sebesar Rp 17.000,-</p>
</div>
<?php endif; ?>

		</div>

		<div class="col-md-5 c_right">

		  <?php print drupal_render_children($form); ?>
		</div>
	</div>
</section>
