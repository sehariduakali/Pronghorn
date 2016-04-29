<?php
/**
 * @file
 * Template page.tpl.php.
 *
 * @author dwi@sepulsa.com
 *
 * @since July 23th 2015.
 */
?>


<section class="std_content">
  <div class="wrapper_2 other after_clear">
    <?php if (!empty($page['sidebar_first'])): ?>
      <div class="w3-col l6 m6 s12">
        <?php print render($page['sidebar_first']); ?>
      </div>
    <?php endif; ?>

    <div class="w3-col l6 m6 s12">
      <?php print $messages; ?>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
      <?php endif; ?>
      <?php print render($page['content']); ?>
    </div>
  </div>
</section>

<?php
$uob_campaign_uuid = 0;
if(property_exists($node, 'uuid')){
  $uob_campaign_uuid = $node->uuid;
  $destination = 'UOB-acquisition-campaign';
}
$anonym = 0;
if(!empty(user_is_anonymous())) {
  $anonym = 1;
}

?>

<script text="text/javascript">
  var webform_UOB_campaign = '';
  var webform_UOB_campaign = '<?php print $uob_campaign_uuid; ?>';
  var anonym = <?php print $anonym; ?>;
  var destination = '<?php print $destination; ?>';
  var forgot_destination ='/user/password?destination='+destination;
  var register_destination ='/user/register?destination='+destination;
</script>