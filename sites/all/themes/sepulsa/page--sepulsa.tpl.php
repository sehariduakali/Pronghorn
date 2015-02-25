<?php
/**
 * @file
 * page.tpl.php
 *
 * @author ananto@sepulsa.com
 * @since January 27th 2015.
 */

global $base_url;

?>
<div id="page-wrapper">
  <?php include "header.tpl.php"; ?>
        
  <section id="content">
    <div class="container">
      <div id="main">
        <?php print $messages; ?>

        <div class="row">
          <div class="col-sm-6 col-md-8">
            <div class="tab-container full-width style1 box">
              <ul class="tabs clearfix">
                <li class="active"><a href="#tab1-1" data-toggle="tab">Isi Pulsa</a></li>
              </ul>
              <div id="tab1-1" class="tab-content in active">
                <div class="tab-pane">
                  <?php print render($page['content']); ?>
                </div>
              </div>
            </div>                        
          </div>
              
          <div class="col-sm-6 col-md-4">
            <div class="post-slider style2 owl-carousel box">
              <a href="<?php print $base_url . '/' . path_to_theme(); ?>/images/banner1.jpg" class="soap-mfp-popup">
                <img src="<?php print $base_url . '/' . path_to_theme(); ?>/images/banner1.jpg" alt="">
                <div class="slide-text">
                  <h4 class="slide-title">Isi pulsa sekarang gratis</h4>
                  <span class="meta-info">Dapatkan cashback dengan isi ulang di SEPULSA</span>
                </div>
              </a>
              <a href="<?php print $base_url . '/' . path_to_theme(); ?>/images/banner2b.jpg" class="soap-mfp-popup">
                <img src="<?php print $base_url . '/' . path_to_theme(); ?>/images/banner2b.jpg" alt="">
                <div class="slide-text">
                  <h4 class="slide-title">Temukan deal-deal menarik hanya di SEPULSA</h4>
                  <span class="meta-info"></span>
                </div>
              </a>
              <a href="<?php print $base_url . '/' . path_to_theme(); ?>/images/banner3.jpg" class="soap-mfp-popup">
                <img src="<?php print $base_url . '/' . path_to_theme(); ?>/images/banner3.jpg" alt="">
                <div class="slide-text">
                  <h4 class="slide-title">Isi pulsa paling gampang ? Ya di SEPULSA</h4>
                  <span class="meta-info">Juga cepat, aman dan menguntungkan</span>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
        
  <?php include "footer.tpl.php"; ?>
    
</div>