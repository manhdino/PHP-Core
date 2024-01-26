<?php
class Dashboard extends Controller{
    public function index(){
        echo 'Trang Dashboard';
    }

    public function detail($id){
        echo 'Trang chi tiết Dashboard' . $id;
    }
}
