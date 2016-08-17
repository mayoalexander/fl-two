<?php 

  include_once($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'].'/config/index.php');


$config = new Blog();
// $files = $config->display_user_posts_new('admin' , $current_page);
$files = $config->display_user_posts_newnew('admin' , $current_page);
echo $files['posts']; ?>