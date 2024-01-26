<?php /* Tổng hợp lý thuyết PHP:
0.Tổng quan:
+ PHP là ngôn ngữ chạy bên phía Server nên kết quả trả về là HTML sẽ được gửi lại cho browser
+ Biến:
  + $tên_biến = giá_trị;
  + nên đặt tên biến theo quy tắc camelCase: $userId
  + biến sẽ được khởi tạo khi gán giá trị lần đầu và sẽ tự động liên 
  kết kiểu dữ liệu nào tùy thuộc vào dữ liệu đó
+ Phạm vi của biến:
  + Global: chỉ có thể truy cập bên ngoài function
  + Local: chỉ có thể truy cập bên trong function, và có thể trùng tên nếu nằm trong các function khác nhau
  + Trong 1 function muốn truy cập tới biến có phạm vi Global thì phải khai báo
      global $ten_bien;
  + PHP có 1 biến mà lưu trữ toàn bộ biến Global là $GLOBALS['name_global_variable'],
  có thể truy cập bên trong 1 function, dùng để thay đổi trực tiếp giá trị 
  của biến có phạm vi global
  + Static: 
     + Khi 1 function được thực hiện xong thì mọi biến cục bộ bên trong function
  đó đều sẽ bị xóa đi,nhưng nếu muốn biến local đó mà ko bị xóa đi sau khi function
  chạy xong thì dùng từ khóa "static" khi khai báo biến local trong function đó
     + Sau khi mỗi khi hàm thực hiện xong giá trị biến đó sẽ được giữ lại cho lần 
     gọi hàm tiếp theo
  + Constants: hằng số, auto là biến global 
    define('GREETING','Wellcome to my home.');
  + Toán tử:
       + '5' + '6' = 11
       + '5' + 6 = 11
       + '5'.'6' = 56
       + '5' + '5 days' = 10 because 5 days were converted to Interger
  + Null coalescing: $variable = value1 ?? value2: if value1 is NULL or not exits, $variable = value2
  + echo <function_name/variable_name/String/Number>;
  + Debug:
    + var_dump($variable_name); --> return type and value of variable
    + echo '<pre>';
      print_r($array_name);
      echo '</pre>';  --> print array 
  + PHP Concatenate:
   --> Ex1: $res = 'result '.$variable_name;
   --> Ex2: $res = "result $variable_name";
   --> Ex3: $res = "result {$variable_name}";
   --> Ex4: $res = "result  of \"variable\" is: $variable_name";
   --> Ex5: $res = 'result  of \'variable\' is:'.$variable_name;
    + Trùng dấu thì phải đặt dấu \ ở phía trước, nếu ko phải đổi dấu
    + Chuỗi đặt trong dấu nháy kép mà có biến thì ko cần nối chuỗi
1.die và exit: tất cả những dòng code bên dưới die or exit đều 
sẽ không được chạy.Có thể truyền thông báo vào die or exit
dùng để debug khi gặp lỗi

2.Include - INclude Once - Require - Require Once
+ Dùng để input các file PHP khác vào file PHP đang chạy
+ path: 
+ file php đang chạy sẽ được lưu vào trong biến __FILE__
+ vị trí folder(chứa file đang chạy) nằm trong Server Xampp lưu trong biến __DIR__
+ url: 
+ khi nhìn vào url: https://baomoi.com/tin-moi.epi ta không thể biết được
file đang chạy là file gì ở trên Server và đường dẫn đến file đó
là gì
VD: https://baomoi.com/tin-moi.epi
+ Giao thức https:
+ Hostname(domain): baomoi.com
+ Path: còn lại phía sau của url(nhưng là Path ảo) do Rewrite URL
+ Cú pháp chung:
include 'path_to_file.php';
include ('path_to_file.php);
+ Phân biệt:
+ include: import file khác, nếu import lỗi, các câu lệnh bên dưới vẫn chạy
+ include_once: giống như include nhưng chỉ import 1 lần(dùng khi khai báo 
include_once cùng 1 file nhiều lần thì nó sẽ chỉ import 1 lần duy nhất)
+ require: nếu import lỗi câu lệnh bên dưới sẽ dừng
+ require_once: giống như require nhưng chỉ import 1 lần
+ Đường dẫn tuyệt đối: đi từ ổ đĩa 
+ Đường dẫn tương đối: đi từ project

3.Cú pháp thay thế if-else,foreach,for,while
4-5.Xử lý chuỗi:
+ Chuỗi là danh sách các kí tự nằm trong dấu nháy đơn hoặc nháy kép
+ Nên sử dụng chuỗi cho nháy đơn, vì nháy kép thường dùng
để khai báo thuộc tính trong các thẻ HTML
+ Sử dụng nháy kép khi chuỗi đơn giản vì nếu sử dụng nháy kép thì 
sẽ ko phải nối chuỗi với các biến
+ Các hàm xử lý chuỗi:
  4.1. addcslashes($str, $char_list): Hàm này sẽ thêm dấu escape (\) phía trước
những ký tự trong chuỗi $str mà ta liệt kê ở $char_list
    VD: echo addcslashes('Trung tâm đào tạo lập trình Unicode', 'U’);
               ->Trung tâm đào tạo lập trình \Unicode
  + addslashes($str): Hàm này sẽ thêm escape (\) phía trước các ký tự “, ‘,\
    VD: echo addslashes('Trung tâm đào tạo lập trình "Unicode”');
  + Sử dụng addslashes() trong PHP là một cách để bảo vệ dữ liệu từ các tấn công SQL injection. 
   + SQL injection là một phương thức tấn công mà hacker sử dụng để 
   thay đổi các câu truy vấn SQL bằng cách chèn các chuỗi đặc biệt vào các giá trị đầu vào.
   + SQL injection:
    //Giả sử đoạn code xử lý Server:
     if(isset($_POST['username']) && isset($_POST['password'])){
      $sql = "SELECT * FROM tb_user WHERE username='". $_POST['username'] . "' AND password = '" .$_POST['password'] ."'";
     }
      + Khi người dùng nhập vào có thêm 1 dấu nháy ' hoặc " thì dòng code xử lý trên sẽ bị lỗi ngay, VD: nhập OR 1 = 1
         SELECT * FROM users WHERE username='admin' OR '1'='1' AND password='[password]': và sẽ trả về tất cả các bản ghi trong bảng người dùng,
         bởi vì câu lệnh “OR '1'='1'” luôn luôn đúng.
      + Giải pháp sử dụng hàm addslashes():
         $username = addslashes($username);
         $password = addslashes($password);
         $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
  4.2. Để giải slashes, hãy sử dụng hàm stripslashes() để xóa kí tự \ trong chuỗi.
    $str = "My name's Dinomanh";
    $str_addslashes =  addslashes($str);
    echo $str_addslashes;//My name\'s Dinomanh
    $str_stripslashes = stripslashes($str);
    echo $str_stripslashes;//My name's Dinomanh
  4.3.explode( $delimiter , $string): Hàm này sẽ chuyển một chuỗi $string thành một
mảng các phần tử với ký tự tách mảng là $delimiter
    + Dùng khi muốn tách họ và tên của người dùng
    + Khi chưa có JSON, thì để lưu trữ giá trị của người dùng trong trong 1
    cột người ta sử dụng chuỗi !# để phân cách các thông tin
  4.4.implode($delimiter, $piecesarray): Hàm này sẽ nối các phần tử của mảng và
các phần tử nối với nhau bởi chuỗi $delimiter.Dùng khi implode để chuyển một mảng các giá trị
của một biến thành một chuỗi cho truy vấn SQL
  4.5. json_decode($json, $is_array): Chuyển chuỗi dạng JSON thành mảng hoặc
Object. Nếu $is_array=true sẽ trả về dạng mảng, nếu không thành Object
  4.6. str_word_count($str,$format,$characters): 
Dùng để: đếm số từ (word) có trong chuỗi (string) hoặc trả về một mảng (array) chứa các từ trong chuỗi (string).
$string là chuỗi muốn biết số từ hoặc muốn lấy một mảng các từ.
$format: tùy vào giá trị $format mà hàm $str_word_count() sẽ trả về cái gì. Mặc định $format=0.
$format = 0 thì hàm str_word_count() trả về số từ (word) có trong $string.
$format = 1 thì hàm str_word_count() trả về một mảng chứa các từ (word) trong $string.
$format = 2 thì hàm str_word_count() trả về một mảng kết hợp (associative array). 
Trong đó, khóa (key) là vị trí bắt đầu của từ (word) trong $string và giá trị (value) là chính từ (word) đó.
$characters là danh sách bổ sung những ký tự mà bạn quy định chúng cũng thuộc một từ (word).
Lưu ý: $str không hỗ trợ Tiếng việt
  4.7.str_replace(search, replace, subject):Tìm kiếm và thay thế
search: chuỗi hoặc ký tự mà bạn muốn tìm kiếm
replace: chuỗi hoặc ký tự mà bạn muốn thay thế
subject: chuỗi mà bạn muốn thực hiện thay thế trong đó


*/

?>

<?php /* Example:

1.echo 'die and exit';
die('done');
exit;
echo 'after die and exit';

2.path: VD code trong thư mục imports
$path_file = __FILE__;
echo $path_file.'<br/>';
$path_dir = __DIR__;
echo $path_dir;

3.Cú pháp thay thế
if-else
<?php
$number = 10;
if ($number == 10) :
?>
  <h3>Title 1</h3>
  <h4>Title 1</h4>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam numquam incidunt alias optio omnis unde dolore sed
    dicta, veritatis ullam ex, nam asperiores consequuntur distinctio a impedit inventore maxime nihil?</p>
<?php
else :
?>
  <p>Không hợp lệ</p>
<?php
endif;
?>

for
<?php
for($i = 0; $i < 10;$i++):
  echo $i.' ';
endfor;
echo '<br/>';
?>

while
<?php
$i = 1;
while($i < 10):
  echo $i.' ';
  $i++;
endwhile; 
echo '<br/>';
?>

foreach(array)
<?php
$dataArr = ['1','2','3','4','5','6','7','8','9'];
foreach($dataArr as $item):
  echo $item.' ';
endforeach;
?>

4.Nối chuỗi:
echo "My name's Dinomanh";
echo '<br/>';
echo 'My name"s dinomanh';
echo '<br/>';
echo 'My name\'s dinomanh';
echo '<br/>';
echo "My name\"s dinomanh";

$url = 'https://www.facebook.com';
$urlImg = 'data:image/jpeg;base64,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';
$htmlOuput = '<a href="'.$url.'">
<img src="'.$urlImg.'" />
</a>';
echo $htmlOuput;

$selectHTML = '<select>';
for($i = 2000; $i <=2006; $i++):
    $selectHTML .= "<option>$i</option>";
 endfor;
$selectHTML .= '</select>';
echo $selectHTML;

4.3.explode() 
$strUserInformation = "Nguyễn Văn A!#19810101!#Hà Nội!#anv@allaravel.com";
$arrUserInformation = explode("!#", $strUserInformation);
print_r($arrUserInformation);

$fullName = "Nguyễn Văn Manh";
$arrName = explode(" ", $fullName);
$firstName = array_shift($arrName); //Họ chính là phần tử đầu tiên của mảng
$lastName = array_pop($arrName); //Tên chính là phần tử cuối cùng của mảng
$middleName = implode(" ", $arrName); //Tên đệm chính là kết nối các phần tử còn lại
echo $firstName.' '.$middleName.' '.$lastName;

4.4.implode($delimiter, $piecesarray) và json_decode($json,$is_array):
$arr = array('apple', 'banana', 'orange');
$str = implode(",", $arr);
$sql = "SELECT * FROM fruits WHERE name IN ('$str')";
echo $sql;
$json = '{"a":1,"b":2,"c":3,"d":4}';
$array = json_decode($json, true);
$values = implode(",", $array);
echo $values; // "1,2,3,4"

4.6.$str = "Con ông cháu cha";
echo str_word_count($str, 0);//5
echo '<br/>';
echo str_word_count($str);//5
echo '<br/>';
//Kết quả là 5 vì hàm str_word_count() không hỗ trợ Tiếng Việt
//nên nó sẽ coi chữ ô và á giống như dấu cách để phân biệt các từ
//nên sẽ có 5 từ
//Giải pháp là thêm "àáãâạêéíîóõôúÀÁÃÂÇÊÉÍÎÓÕÔÚ" làm tham số
//thứ 3 $characters của hàm str_word_count()

print_r(str_word_count($str, 1));
echo '<br/>';
print_r(str_word_count($str, 1, 'ôá'));
echo '<br/>';
print_r(str_word_count($str, 1, 'àáãâạêéíîóõôúÀÁÃÂÇÊÉÍÎÓÕÔÚ'));
echo '<br/>';
print_r(str_word_count($str,2,'àáãâạêéíîóõôúÀÁÃÂÇÊÉÍÎÓÕÔÚ'));

4.7.str_replace();
//$str = 'Trung tâm đào tạo lập trình "Unicode"';
$str = 'C:\xampp\htdocs\hocphp';
//$str = str_replace('"Unicode"', '', $str);
$str = str_replace('\\', '/', $str);
echo $str;
echo '<br/>';

4.8.Hàm mã hoá 1 chiều (32 ký tự)
$str = '123456';
$str = md5($str);
echo $str.'<br/>';

4.9.Hàm mã hoá 1 chiều (40 ký tự)
$str = '123456';
$str = sha1($str);
echo $str.'<br/>';

4.10.Chuyển chuỗi html thành dạng thực thể
Thực thể trong HTML: Trong HTML có một số kí tự cần được giữ nguyên. 
Nếu dùng dấu nhỏ hơn (<) hay lớn hơn (>) trong văn bản, trình duyệt 
có thể nhầm nó với thẻ HTML. 
Thực thể kí tự sinh ra dùng để hiển thị những kí tự này.
$str = '<p>Đào tạo PHP</p>';
$str = htmlentities($str);
echo $str;
 ->Lưu ý: Có 1 hàm có chức năng tương tự là htmlspecialchars($str).
   Nhưng hàm này chỉ có thể chuyển một số loại kí tự sang dạng Thực thể HTML
   mà ko thể chuyển hết tất cả như htmlentities
   + Một số loại kí tự trong htmlspecialchars là:
     + & (ampersand) becomes &amp;
     + " (double quote) becomes &quot;
     + ' (single quote) becomes &#039;
     + < (less than) becomes &lt;
     + > (greater than) becomes &gt;
 --> Lưu ý: Sử dụng htmlspecialchars() trong PHP là rất quan trọng để ngăn chặn tấn công
  Cross-site scripting (XSS). 
    + Tấn công XSS là một loại tấn công mà kẻ tấn công sẽ chèn mã độc hoặc mã HTML
      vào trang web của bạn, khi người dùng truy cập trang web đó, mã đó sẽ được thực thi
      bởi trình duyệt của người dùng và có thể gây hại cho người dùng hoặc làm cho trang web 
      của bạn bị tấn công.
    + Nếu hacker nhập đoạn code sau: VD: <script>destroyWebsite();</script>
      Sau đó, hàm destroyWebsite() sẽ được gọi và nó sẽ thực hiện các hành động có hại
      của nó. Như hầu hết chúng ta biết, cuộc tấn công này chủ yếu được sử dụng để thu thập cookie
       của người khác, có thể được sử dụng để đăng nhập bằng các danh tính khác.
$unsafe_string = "<script>alert('XSS attack')</script>";
$safe_string = htmlspecialchars($unsafe_string, ENT_QUOTES, 'UTF-8');
echo $safe_string;

$unsafe_string = $_POST['user_input'];
$safe_string = htmlspecialchars($unsafe_string);
$query = "INSERT INTO users (name) VALUES ('$safe_string')";

$unsafe_array = array("<script>alert('XSS attack')</script>", "<h1>Hello World</h1>", "I'm a hacker");
$safe_array = array_map("htmlspecialchars", $unsafe_array);

4.11. html_entity_decode():Chuyển từ dạng thực thể sang chuỗi html
$original = "I'll \"walk\" the <b>dog</b> now";
$a = htmlentities($original); 
$b = html_entity_decode($a);
echo $a; // I'll &quot;walk&quot; the &lt;b&gt;dog&lt;/b&gt; now
echo $b; // I'll "walk" the <b>dog</b> now

4.12.strip_tags( $string, $allow_tags):
Hàm này bỏ các thẻ html trong chuỗi $string mà được khai báo
ở $allow_tags (Nếu không khai báo sẽ loại bỏ tất cả thẻ)
Kiểm tra nội dung đầu vào từ người dùng, tránh việc tấn công XSS.
Xử lý chuỗi đầu vào từ người dùng trước khi lưu vào cơ sở dữ liệu.
$str = "<h1>Hello World!</h1><p>This is a paragraph.</p>";
$allowed_tags = "<h1><p>";
$plain_text = strip_tags($str, $allowed_tags);
echo $plain_text;
$str = "<h1>Hello World!</h1><p>This is a paragraph.</p>";
$plain_text = htmlspecialchars(strip_tags($str));
echo $plain_text;

4.13.substr:
substr ($string , $start , $length)
substr cho phép bạn lấy một phần của một chuỗi đầu vào 
và xử lý nó như một chuỗi riêng biệt.
$string: là chuỗi đầu vào cần xử lý.
$start: là vị trí ký tự bắt đầu cắt.
$length (tùy chọn): là số lượng ký tự cần lấy, 
nếu không được chỉ định, thì nó sẽ lấy đến cuối của chuỗi.
Giá trị start phải lớn hơn hoặc bằng 0: Nếu start có giá trị nhỏ hơn 0, 
thì nó sẽ được coi là tính từ cuối chuỗi.
Nếu là kí tự đặc biệt: àáãâạêéíîóõôúÀÁÃÂÇÊÉÍÎÓÕÔÚ thì nó
sẽ tính độ dài bằng 2 kí tự
VD:
$input = "Hello World";
$output = substr($input, 0, 5);
echo $output;//Hello
echo '<br/>';
$input = "Hello Wôrld";
$output = substr($input, -5);
echo $output;//ôrld do ô là kí tự đặc biệt

4.14.strstr( $string, $start_str): 
Tách một chuỗi từ ký tự cho trước $start_str cho đến hết chuỗi
$str = 'hoangan.web@gmail.com';
$subStr = strstr($str, '.');
echo $subStr;

4.15.strpos($str, $substr): 
Tìm chuỗi $substr trong chuỗi $str. Nếu tìm thấy sẽ trả về
số thứ tự. Ngược lại sẽ trả về false;
$str = 'Trung tâm đào tạo Unicode';
$postion = strpos($str, 'Unicode');
var_dump($postion);//23 do â,đ,à,ạ là các kí tự đặc biệt nên có độ dài là 2
echo '<br/>';

4.16.substr_replace(string,replacement,start,length)
Hàm sẽ cắt bỏ một đoạn hoặc toàn bộ chuỗi và thay thế đoạn bị 
cắt bỏ bằng một chuỗi con khác.
Nếu start < 0 thì nó sẽ tự tính từ cuối chuỗi
Nếu start = 0 thì sẽ chèn vào trước chuỗi
Nếu ko có length thì mặc định là từ vị trí start đến hết chuỗi
echo substr_replace("Hello world","earth",6);//Hello earth
echo substr_replace("Hello world","earth",-5);//Hello earth
echo substr_replace("ello world","H",0,0);//Hello world-chèn
echo substr_replace("ello world","H",0,1);//Hllo world-chèn
$var = 'This is something';
echo $var . "<br />";
echo substr_replace($var, 'this is replace', 0) . "<br />";
echo substr_replace($var, 'this is replace', 0, strlen($var)) . "<br />";
$var = 'This is something';
echo $var . "<br />";
echo substr_replace($var, 'replaces', 8) . "<br />";
echo substr_replace($var, 'replaces', 8, 9) . "<br />";
4.17.
  + strtolower($str): Chuyển tất cả ký tự sang viết thường
    -> VD:echo strtolower(‘Unicode’);
  + strtoupper($str): Chuyển tất cả ký tượng thành chữ hoa
    --> VD: echo strtolower(‘Unicode’);
  + ucfirst($str): Chuyển chữ cái đầu tiên sang viết hoa
    --> VD: echo ucfirst(‘unicode’);
  + lcfirst($str): Chuyển chữ cái đầu tiên sang viết thường
    --> VD: echo lcfirst(‘Unicode’);
  + ucwords($str): Chuyển từ đầu tiên trong chuỗi sang viết hoa
    --> VD: echo ucwords($str);

4.18.
  + trim($str, $char): Xoá ký tự ở đầu và cuối. Nếu không nhập $char sẽ hiểu là ký
tự trắng   VD: echo trim(’Unicode’);
  + ltrim($str, $char): Xoá ký tự ở đầu. Nếu không nhập $char sẽ hiểu là ký tự trắng
  + rtrim($str, $char): Xoá ký tự cuối. Nếu không nhập $char sẽ hiểu là ký tự trắng

4.19. Tách chuỗi lớn thành từng chuỗi nhỏ
$str = '121212';
$str = chunk_split($str, 2, ':');
$str = rtrim($str, ':');
echo $str;
echo '<br/>';

4.20. Chuyển ký tự xuống dòng (\n) thành thẻ <br/>
$str = 'Trung tam dao tao '."\n".' Unicode';
$str = nl2br($str);
echo $str;
echo '<br/>';

4.21. Chuyển json thành mảng hoặc object
$strJson = '{"item1":"Value1", "item2":"Value2"}';
echo $strJson;
echo '<br/>';
$jsonArr = json_decode($strJson, true);
print_r($jsonArr);
echo '<br/>';

4.22. Chuyển từ mảng, object thành json
$strJson = json_encode($jsonArr);
echo $strJson;

Lưu ý: muốn cho hàm hỗ trợ Tiếng Việt thì thêm mb_ trước tên hàm
và thêm 1 tham số cuối($encoding: mã hóa) là 'UTF-8'
--> VD: mb_strlen($str,'UTF-8');
Lý do: vì chữ cái đặc biệt như àáãâạêéíîóõôúÀÁÃÂÇÊÉÍÎÓÕÔÚ có độ dài là 2
nên muốn nó độ dài đúng là 1 thì phải sử dụng cách như trên


*/

?>


<!-- Nhúng code PHP vào mã HTML -->
<!-- <select>
  <?php
  for($i = 2000; $i <=2006; $i++):
  ?>
   <option value="">
    <?php
      echo $i.'<br/>';
    ?>
   </option>
   <?php
   endfor;
   ?>
</select> -->

<?php

$strInput = 'Học lập trình PHP tại Unicode';
$positionSpace = mb_strpos($strInput, ' ',0,'UTF-8');
echo $positionSpace;


$firstWord = mb_substr($strInput, 0, $positionSpace, 'UTF-8');
// var_dump($firstWord);

$strInput = str_replace($firstWord, '', $strInput);

$leftLength = mb_strlen($strInput, 'UTF-8')-($positionSpace+1);

$endWord = mb_substr($strInput, $positionSpace+1, $leftLength);

$strInput = $endWord;

?>