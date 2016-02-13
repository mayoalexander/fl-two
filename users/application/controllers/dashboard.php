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
    function audio()
    {
        $this->view->render('dashboard/audio',true);
    }
    function events()
    {
        $this->view->render('dashboard/events',true);
    }
    function dev()
    {
        $this->view->render('dashboard/dev');
    }
    function auto()
    {
        $this->view->render('dashboard/auto');
    }
    function push()
    {
        $this->view->render('dashboard/push',true);
    }
    function add_new_promo() {
        include_once('/home/content/59/13071759/html/config/index.php');
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
        include_once('/home/content/59/13071759/html/config/index.php');
        $config = new Blog();
        $_POST['promo_key'] = $config->generateRandomString();
        echo $config->add_info_files('files',$_POST);
    }


    function attach() {

        if (isset($_POST['file_id'])) {
            include_once('/home/content/59/13071759/html/config/index.php');
            $config = new Blog();
            echo 'okay updating';
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






    function delete_promo_file($id) {
        // print_r($_POST);
        include_once('/home/content/59/13071759/html/config/index.php');
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
        include_once('/home/content/59/13071759/html/config/index.php');
        $config = new Blog();
        $res = $config->update('user_profiles','photo',$_POST['photo'],$_POST['user_name']);
        // print_r($res);
        if ($res==true) {
            echo "Profile Successfully Updated!";
        } else {
            echo "Something Went Wrong!";
        }
    }

    
    
}
