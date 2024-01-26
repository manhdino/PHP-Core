<?php
class Home extends Controller
{
    public $home_model;
    public function __construct()
    {
        echo 'Trang chủ';
        $this->home_model = $this->model('HomeModel');
    }

    public function index()
    {
        //$data = $this->home_model->getList();
        $data = $this->home_model->get();
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        $data = $this->home_model->first();
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        echo $this->home_model->getDetail(0);
    }
}
