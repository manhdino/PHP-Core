<?php
echo "OOP in PHP<br>";

/**
 * nếu thay public = private or protected thì không thể 
 * truy cập được, tức là $user1 -> name = 'Hoang' sẽ sai
 * nếu khai báo private $name chỉ sử dụng được khi
 * ở trong class User
 */
class User
{
    //properties that belong to a class
    protected $name;
    public $email;
    public $age;
    public $password;

    //hàm khởi tạo giá trị cho object
    //constructor: hàm được gọi ngay trước khi đối tượng được tạo ra qua lệnh new
    public function __construct(
        $name,
        $email,
        $age,
        $password
    ) {
        echo "constructor run in User<br>";
        $this->name = $name;
        $this->email = $email;
        $this->age = $age;
        $this->password = $password;
    }



    //methods:function belong to a class
    //setter:
    function set_name($name)
    {
        $this->name = $name;
    }

    //getter:
    function get_name()
    {
        return $this->name;
    }
}
//init an object: 
//Cách cũ
// $user1 = new User();
// $user2 = new User();
// $user1->name = 'Manh';
// $user1->email = 'manhnguyen1238@gmail.com';
// $user1->age = 23;
// $user1->password = 'dinomanh';
// $user1->set_name('Dinomanh');
// $user2->set_name('Bob');
// print_r($user1);
// echo "<br>";
// print_r($user2);
// echo "<br>";
// echo $user1->get_name() . "<br>";
// echo $user2->get_name() . "<br>";

//Cách mới:
$user1 = new User('john', 'john@gmail.com', 19, '1123');
$user2 = new User('tony', 'tony@gmail.com', 23, '1234');
echo $user1->email;
echo "<br>";
//echo $user1->name;//error vì props name là protected
//giải pháp là phải sử dụng get_name
echo $user1->get_name();

//tính kế thừa
class Employee extends User
{
    private $title;
    public function __construct(
        $name,
        $email,
        $age,
        $password,
        $title //only employee has
    ) {
        //kế thừa constructor của lớp cha
        parent::__construct($name, $email, $age, $password);
        echo "constructor run in Employee<br>";
        $this->title = $title;
    }

    public function get_title()
    {
        return $this->title;
    }
}

$employee1 = new Employee(
    'Taylor',
    'taylor@gmail.com',
    30,
    '123',
    'Sale manager'
);
echo $employee1->get_title();
