<?php
class ProductModel
{
    public function getProductLists()
    {
        return [
            'Sản phẩm 1',
            'Sản phẩm 2',
            'Sản phẩm 3'
        ];
    }

    public function getDetailItem($id = 0)
    {
        $data = [
            'Sản phẩm 1',
            'Sản phẩm 2',
            'Sản phẩm 3',
            'Sản phẩm 4'
        ];
        return $data[$id];
    }
}
