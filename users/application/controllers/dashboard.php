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
    function push()
    {
        $this->view->render('dashboard/push',true);
    }
    function add_new_promo() {
        include_once('/home/content/59/13071759/html/config/index.php');
        $config = new Blog();
        $_POST['promo_key'] = $config->generateRandomString();
        if ($_POST['add_new_promo']==1) {
            print_r($_POST);
            echo $config->add_info_promo('images',$_POST);
        } else {
            $this->view->render('dashboard/add_new_promo',true);
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

    
    
}
