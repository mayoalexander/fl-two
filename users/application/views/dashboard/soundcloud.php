<?php 

  include_once('/home/content/59/13071759/html/config/index.php');


$config = new Blog();
// $files = $config->display_user_posts_new('admin' , $current_page);
$files = $config->display_user_posts_newnew('admin' , $current_page);
echo $files['posts']; ?>