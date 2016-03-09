<?php
include('db.php');
if($_POST)
{
    $q = mysqli_real_escape_string($connection,$_POST['search']);
    $strSQL_Result = mysqli_query($connection,"select * from feed where `blogtitle` LIKE '%$q%' OR  `twitter` LIKE '%$q%' ORDER BY `id` DESC LIMIT 5");
    while($row=mysqli_fetch_array($strSQL_Result))
    {
        $username   = $row['blogtitle'];
        $email      = $row['twitter'];
        $final_photo      = $row['photo'];
        $b_username = '<strong>'.$q.'</strong>';
        $b_email    = '<strong>'.$q.'</strong>';
        $final_username = str_ireplace($q, $b_username, $username);
        $final_email = str_ireplace($q, $b_email, $email);
        ?>
            <div class="show" align="left">
                <a href="<?php echo $row['blog_story_url']; ?>">
                    <img src="<?php echo $final_photo; ?>" style="width:40px; height:40px; float:left; margin-right:4px;" />
                    <span class="name"><?php echo $final_email; ?></span> 
                    <?php echo $final_username; ?>
                </a>
            </div>
        <?php
    }
}
?>