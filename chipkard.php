<?php
$twitter = $site->twitter();
$cardtype = $page->twittercard();
$description = $page->description();
$image = $page->image('featured.jpg');

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

   } else {
      return null;
   }
