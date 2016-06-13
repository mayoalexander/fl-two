<?php

/**
 * Class Index
 * The index controller
 */
class Index extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    function __construct()
    {
            parent::__construct();
    }

    /**
     * Handles what happens when user moves to URL/index/index, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function index()
    {
            $this->view->render('index/index');
    }
    function search()
    {
            $this->view->render('index/search');
    }
    function image($slug=null)
    {
            $this->view->render('index/image');
    }
    function promo($slug)
    {
            $this->view->render('index/image');
    }
    function view($slug)
    {
            $this->view->render('index/view',true);
    }
    function promos()
    {
            $this->view->render('index/promos');
    }
    function listen() {
            $this->view->render('index/listen');
    }
    function page($page=0)
    {
            $this->view->render('index/page',true);
    }
    function profile() {
            $this->view->render('index/profile',true);
    }
    function radio() {
            $this->view->render('index/radio');
    }
    function stream($slug) {
            $this->view->render('index/stream',true);
    }
    function menu() {
            $this->view->render('index/menu');
    }
    function off() {
            $this->view->render('index/off',true);
    }
    function licensing() {
            $this->view->render('index/licensing');
    }
    function marketing() {
            $this->view->render('index/marketing',true);
    }
    function marketing_pricing() {
            $this->view->render('index/marketing_pricing', true);
    }
    // function marketing() {
    //         $this->view->render('marketing', true);
    // }
}
