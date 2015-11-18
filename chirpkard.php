<?php
$twitter = $site->twitter();
$cardtype = $page->tcardtype();
$description = $page->description();
$image = $page->tcardimage();

   if (isset($twitter) AND isset($cardtype) AND isset($description)) {
      if (!($cardtype == "summary" OR $cardtype == "summary_large_image" OR $cardtype == "photo" OR $cardtype == "gallery")) {
         echo "<script>console.log(\"Invalid Twitter Card Type.\")</script>";
         return null;
      }
      if ($cardtype == "summary_large_image" AND !isset($image)) {
         echo "<script>console.log(\"Twitter Card Type is 'summary_large_image' but no featured image is available.\")</script>";
         return null;
      }
 ?>
<meta name="twitter:card" content="<?php echo $page->twittercard(); ?>" />
  <meta name="twitter:site" content="<?php echo $site->twitter(); ?>" />
  <meta name="twitter:title" content="<?php echo $page->title(); ?>" />
  <meta name="twitter:description" content="<?php echo $page->description(); ?>" />
<?php
   if ($image): ?>
  <meta name="twitter:image" content="<?php echo $image->url() ?>" />
<?php endif;

   switch ($cardtype) {
      case "app": ?>
         <meta name="twitter:app:country" content="<?php echo $page->country(); ?>">
         <meta name="twitter:app:name:iphone" content="<?php echo $page->iphoneappname(); ?>">
         <meta name="twitter:app:id:iphone" content="<?php echo $page->iphoneappid(); ?>">
         <meta name="twitter:app:url:iphone" content="<?php echo $page->iphoneappurl(); ?>">
         <meta name="twitter:app:name:ipad" content="<?php echo $page->ipadappname(); ?>">
         <meta name="twitter:app:id:ipad" content="<?php echo $page->ipadappid(); ?>">
         <meta name="twitter:app:url:ipad" content="ipadappurl">
         <meta name="twitter:app:name:googleplay" content="<?php echo $page->googleappname(); ?>">
         <meta name="twitter:app:id:googleplay" content="googleappid">
         <meta name="twitter:app:url:googleplay" content="googleplayurl">
<?php
         break;
      case "gallery": ?>
         <meta name="twitter:url" content="<?php echo $page->url(); ?>" />

<?php
      $gallery_count = 0;
      foreach($page->$images as $gallery_image):
            ?>
         <meta name="twitter:image<?php echo $gallery_count; ?>" content="<?php echo $gallery_image->url(); ?>">
<?php
      $gallery_count++;
      endforeach
?>

<?php
   }

   } else {
      return null;
   }
