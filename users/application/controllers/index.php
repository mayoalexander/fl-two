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
}
