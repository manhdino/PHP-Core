<?php
echo "File Image upload in PHP ";
print_r($_FILES);
if (isset($_POST['submit'])) {
    $permitted_extensions = ['png', 'jpg', 'jpeg', 'gif'];
    $file_name = $_FILES['upload']['name'];
    if (!empty($file_name)) {
        echo "<br>File submited";
        $file_size = $_FILES['upload']['size'];
        $generated_file_name = time() . '-' . $file_name;
        $destination_path = "uploads/{$generated_file_name}"; //upload file lên server
        $file_extension = explode('.', $file_name);
        $file_tmp_name = $_FILES['upload']['tmp_name'];
        $file_extension = strtolower(end($file_extension)); //lấy đuôi của file
        echo "<br>";
        echo "$generated_file_name,   $file_size,   $file_extension,   $destination_path";

        //Validate file extention permitted
        if (in_array($file_extension, $permitted_extensions)) {
            if ($file_size <= 1000000) {
                echo "<br>File OK";
                move_uploaded_file($file_tmp_name, $destination_path);
                $message = '<p style = "color: green;">
            File upload successfully</p>';
            } else {
                $message = '<p style = "color: red">
                File is too big</p>';
            }
        } else {
            $message = '<p style = "color: red">
            Invalid file type</p>';
        }
    } else {
        $message = '<p style = "color: red">
         No file selected,please try again</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload file Image from Web</title>
</head>

<body>
    <h1>Upload file from web in PHP</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        Choose your image to upload
        <input type="file" name="upload">
        <input type="submit" value="submit" name="submit">
    </form>
    <?php echo $message ?? '' ?>
</body>

</html>