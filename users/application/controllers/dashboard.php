<?php

/**
 * Class Dashboard
 * This is a demo controller that simply shows an area that is only visible for the logged in user
 * because of Auth::handleLogin(); in line 19.
 */
class Dashboard extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    function __construct()
    {
        parent::__construct();

        // this controller should only be visible/usable by logged in users, so we put login-check here
        Auth::handleLogin();
    }

    /**
     * This method controls what happens when you move to /dashboard/index in your app.
     */
    function index()
    {
        $this->view->render('dashboard/index');
    }

    /**
     * This method controls what happens when you move to /dashboard/index in your app.
     */
    function control()
    {
        $this->view->render('dashboard/index');
    }
    function admin()
    {
        $this->view->render('dashboard/admin');
    }
    function photos()
    {
        $this->view->render('dashboard/photos',true);
    }
    function feed()
    {
        $this->view->render('dashboard/feed',true);
    }
    function box()
    {
        $this->view->render('dashboard/box',true);
    }
    function stream()
    {
        $this->view->render('dashboard/stream',true);
    }
    function account()
    {
        $this->view->render('dashboard/account',true);
    }
    function analytics()
    {
        $this->view->render('dashboard/analytics',true);
    }
    function stats()
    {
        $this->view->render('dashboard/stats',true);
    }
    function mail() {
        $this->view->render('dashboard/mail', true);
    }
    function promos()
    {
        $this->view->render('dashboard/promos',true);
    }
    function fldrive()
    {
        if ($_POST['trackmp3']) {
            include('/kunden/homepages/0/d643120834/htdocs/config/index.php');
            include(ROOT.'config/upload_post.php');
        } else {
            $this->view->render('dashboard/fldrive',true);
        }
        
    }
    function tv()
    {
        $this->view->render('dashboard/tv',true);
    }
    function unpaid()
    {
        $this->view->render('dashboard/unpaid');
    }
    function radio()
    {
        $this->view->render('dashboard/radio',true);
    }





    // FEED 
    function sport()
    {
        $this->view->render('dashboard/sport',true);
    }
    function fashion()
    {
        $this->view->render('dashboard/fashion',true);
    }
    function lifestyle()
    {
        $this->view->render('dashboard/lifestyle',true);
    }
    function music()
    {
        $this->view->render('dashboard/music',true);
    }
    function featured()
    {
        $this->view->render('dashboard/featured',true);
    }


    /* FEED */


    
    function search_instant()
    {
        $this->view->render('dashboard/search_instant',true);
    }

    function discover()
    {
        $this->view->render('dashboard/discover',true);
    }
    function magazine()
    {
        $this->view->render('dashboard/magazine',true);
    }
    function likes()
    {
        $this->view->render('dashboard/likes',true);
    }
    function recommended()
    {
        $this->view->render('dashboard/recommended',true);
    }
    function promotions()
    {
        $this->view->render('dashboard/promo',true);
    }    
    function audio()
    {
        // $this->view->render('dashboard/audio',true);
        $this->view->render('dashboard/audio1',true);
    }
    function slider()
    {
        $this->view->render('dashboard/slider',true);
    }
    function compose()
    {
        $this->view->render('dashboard/compose',true);
    }
    function messages()
    {
        $this->view->render('dashboard/messages',true);
    }
    function follow()
    {
        $this->view->render('dashboard/follow',true);
    }
    function following()
    {
        $this->view->render('dashboard/following',true);
    }
    function events()
    {
        $this->view->render('dashboard/events',true);
    }
    function social()
    {
        $this->view->render('dashboard/social');
    }

    /* ACCOUNT SET UP ASSISTANT PAGES */
    function complete() {
        $this->view->render('dashboard/complete');
    }

    /* ADMIN PAGES */
    function dev()
    {
        $this->view->render('dashboard/dev');
    }
    function leads() 
    {
        $this->view->render('dashboard/leads',true);
    }
    function leads_stream() 
    {
        $this->view->render('dashboard/leads_stream',true);
    }
    function twitter() 
    {
        $this->view->render('dashboard/twitter',true);
    }
    function rss() 
    {
        $this->view->render('dashboard/rss',true);
    }
    function script() 
    {
        $this->view->render('dashboard/script',true);
    }
    function submissions() 
    {
        $this->view->render('dashboard/submissions',true);
    }
    function clients() 
    {
        $this->view->render('dashboard/clients',true);
    }
    function video() 
    {
        $this->view->render('dashboard/video',true);
    }
    function soundcloud() 
    {
        $this->view->render('dashboard/soundcloud',true);
    }
    function player() 
    {
        $this->view->render('dashboard/player',true);
    }
    function form()
    {
        $this->view->render('dashboard/form',true);
    }
    function paypal()
    {
        $this->view->render('dashboard/paypal',true);
    }




    function sendContact() 
    {
        $numb = $_POST['number'];
        $user = $_POST['user_name'];
        var_dump($numb);
        if (mail('admin@freelabel.net','Client Booking - ' . $user, 'Here is the number: '.$numb)) {
            echo 'it sent out!';
        } else {
            echo 'not sent!';
        }

    }
    function push()
    {
        $this->view->render('dashboard/push',true);
    }
    function auto()
    {
        $this->view->render('dashboard/auto');
    }
    function get_promos() {
        $this->view->render('dashboard/get_promos',true);
    }
    function edit_promo() {
        if (isset($_POST['processing'])) {
            // echo 'okay saving promo data';
            include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
            $config = new Blog();
            $config->edit_promo($_POST,$_POST['id']);
        } else {
            $this->view->render('login/edit_promo',true);
        }
    }
    function add_photos_from_instagram() {
        $this->view->render('dashboard/add_photos_from_instagram',true);
    }
    function add_new_promo() {
        include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
        $config = new Blog();
        $_POST['promo_key'] = $config->generateRandomString();
        if ($_POST['add_new_promo']==1) {
            //print_r($_POST);
            echo $config->add_info_promo('images',$_POST);
        } else {
            $this->view->render('dashboard/add_new_promo',true);
        }
    }



    function add_to_files() {
        include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
        $config = new Blog();
        $_POST['promo_key'] = $config->generateRandomString();
        echo $config->add_info_files('files',$_POST);
    }


    function attach() {
        if (isset($_POST['file_id'])) {
            include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
            $config = new Blog();
            // echo 'okay updating';
            echo $config->attach_files($_POST['file_id'],$_POST['promo_id']);

        } else {
            $this->view->render('dashboard/attach',true);
        }

    }



    function send() {
        $msg = $_POST['message'];
        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);
        // send email
        $result = mail($_POST['email'],"[FREELABEL] Important Information Regarding Your Account",$msg);
        if ($result==true) {
            echo 'Email Successfully Sent!';
        } else {
            echo 'Oh NOOOOOOOOOOO!!!!!! The email did not send!';
        }
    }





    function unfollow() {
        include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
        $config = new Blog();
        $res = $config->unfollow($_POST);
        if ($res) {
            echo 'Unfollowed!';
        } else {
            echo 'Error!!';
        }
    }




    function updateLeadCount() {
        include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
        $config = new Blog();
        $res = $config->updateLeadCount($_POST['lead_id'], $_POST['count']);
        if ($res) {
            echo 'Unfollowed!';
        } else {
            echo 'Error!!';
        }
    }






    function delete_promo_file($id) {
        print_r($_POST);
        include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
        $config = new Blog();
        $promo_data = $config->get_info('images', $_POST['promo_id']);
        $attached_files = $promo_data['files_attached'];
        $new = str_replace($id.',', '', $attached_files);
        if ($config->update_promo('images','files_attached', $new , $_POST['promo_id'])) {
            echo 'it worked!';
        } else {
            echo 'it didnt worked!';
        }
        // echo '---- so now delete the '.$id;
        // echo '--- and put out the new '. $new;

    }

    function update_photo() {
        include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
        $config = new Blog();
        $res = $config->update('user_profiles','photo',$_POST['photo'],$_POST['user_name']);
        // print_r($res);
        if ($res==true) {
            echo "Profile Successfully Updated!";
        } else {
            echo "Something Went Wrong!";
        }
    }

    function attach_files_to_promo() {

        if (isset($_POST['file_id'])) {
            // echo '<pre>';
            // var_dump($_POST);
            // echo '</pre>';
            if (is_array($_POST['file_id'])) {
                foreach ($_POST['file_id'] as $key => $value) {
                    $files[] = $value['value'];
                }
                $files = implode(', ', $files);
            }
            include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
            $config = new Blog();
            // echo 'okay updating';
            echo $config->attach_files_to_promo($files,$_POST['promo_id']);
        } else {
            $this->view->render('dashboard/attach_files_to_promo',true);
        }
    }
    
    
}
