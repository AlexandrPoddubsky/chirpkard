<?php
   if (isset($site->twitter()) AND isset($page->twittercard()) AND isset($page->description())) {
 ?>
<meta name="twitter:card" content="<?php $page->twittercard(); ?>" />
<meta name="twitter:site" content="<?php $site->twitter(); ?>" />
<meta name="twitter:title" content="<?php $page->title(); ?>" />
<meta name="twitter:description" content="<?php $page->description(); ?>" />
<meta name="twitter:image" content="https://farm6.staticflickr.com/5510/14338202952_93595258ff_z.jpg" />

<?php
   } else {
      return null;
   }
