<?php 

  include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');


$config = new Blog();
// $files = $config->display_user_posts_new('admin' , $current_page);
$files = $config->display_user_posts_newnew('admin' , $current_page);
echo $files['posts']; ?>