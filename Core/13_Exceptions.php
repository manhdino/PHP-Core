<?php
echo "Exceptions in PHP<br>";
/**
 * Exceptions: ngoại lệ
 * tức là những lỗi xảy ra khi chạy mà lúc biên dịch vẫn OK
 * gặp exceptions  thì chương trình sẽ dừng lại không chạy tiếp nữa
 */

function divide($a, $b)
{
    if (!$b) {
        throw new Exception("Cannot divide by zero<br>");
    }
    return $a / $b;
}
//cho vào khối try-catch để bắt exceptions
try {
    echo divide(10, 5);
    echo divide(5, 0);
    echo "No Errors";
} catch (Exception $e) {
    echo "<br>Caught exceptions: " . $e->getMessage();
} finally { //Có lỗi hay ko đều chui vào, nơi để giải phóng các biến
    echo "Finally come here";
}
echo "<br>Program runs here....";
