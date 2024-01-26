<?php
class HomeModel extends BaseModel
{

    private $__table = 'users';
    function getList()
    {

        $query = $this->db->query("SELECT * FROM $this->__table")->fetchAll(PDO::FETCH_ASSOC);
        return $query;
    }
    function tableFill()
    {
        return 'users';
    }

    function fieldFill()
    {
        return 'fullname';
    }

    function getDetail($id)
    {
        $data = [
            'Item1',
            'Item2',
            'Item3'
        ];
        return $data[$id];
    }
}
