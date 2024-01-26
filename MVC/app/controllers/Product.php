<?php
class Product extends Controller
{
    public $product_model;
    public $data = [];
    public function __construct()
    {
        $this->product_model = $this->model('ProductModel');
    }
    public function index()
    {
        echo 'Trang danh sách sản phẩm';
    }

    public function product_lists()
    {
        $dataProductList = $this->product_model->getProductLists();
        $title = 'Danh sách sản phẩm<br/>';
        $this->data['product_lists'] = $dataProductList;
        $this->data['page_title'] = $title;
        $this->render('product/lists', $this->data);
    }
    public function detail_item($id = 0)
    {
        $title= 'Chi tiết sản phẩm<br/>';
        $this->data['info'] = $this->product_model->getDetailItem($id);
        $this->data['page_title']=$title;
        $this->render('product/detail', $this->data);
    }
}