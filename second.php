<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprint</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>


<?php
print('<h1>Directory contents</h1>');
      $path = "./" . $_GET["path"];
      $files = array_diff(scandir($path), array('..', '.'));
      echo ("<table>
      <thead>   
          <tr><th>Name</th><th>Type</th><th>Action</th>
      </thead>");
      foreach($files as $dir_c) {       
        print("<tr><td>" . "<a href='?path=" . $_GET['path'] . "/" . $dir_c . "'>" . $dir_c . "</a><br></td>");	
        print("<td>" . (is_dir($path . $dir_c) ? "Directory" : "File") . "</td>");     
        print("<td>" . "<a title='Delete' href='action.php?del=$dir_c'>Delete</a><br>" . "<a href='?link=$dir_c'> Download </a>" . "</td></tr>");    
        
       
      } 
      print("</tbody>");
      echo ("</table>");
   ?> 

<!-- paieska nera -->
<?php

?>

<!-- istrynimas -->


<!-- parsisiuntimas nera -->

   <!-- logout -->

<div class='logout'>
               Click here to <a href = "index.php?action=logout"> logout.
</div> 

        
        <?php 
    session_start();
    
    if(isset($_GET['action']) and $_GET['action'] == 'logout'){
        session_start();
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['logged_in']);
        print('Logged out!');
    }
?>


<!-- ikelimas  pataisyti-->

<form method="POST" action="upload.php" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Upload">
</form><br>


<?php
   
    if(isset($_FILES['file'])){
        $errors= array();
        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];
        
        $file_ext = strtolower(end(explode('.',$_FILES['file']['name'])));
        $extensions = array("jpeg","jpg","png");
        if(in_array($file_ext,$extensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        if($file_size > 2097152) {
            $errors[]='File size must be excately 2 MB';
        }
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        }else{
            print_r($errors);
        }
    }
?>

<!-- sukurimas -->
<?php
if (isset($_POST['create_new_folder'])) {
    $new_folder = $_POST['new_folder'];
        if (is_dir($new_folder)) {
            $message = ('Folder ' . $new_folder . ' already exists!');
        } else if ($new_folder == "") {
            $message = ('Enter name for new folder.');
        } else {    
            mkdir($new_folder);
            $message = ('Folder ' . $new_folder . ' was succesfuly created!');
    }
}
?>
  <div class="create_new_folder">
            <form action="button" method="POST">
                <label for="new_folder">Create New Folder</label><br>
                <input type="text" name="new_folder" value="Folder name"><br>
                <button type = "submit">Create</button>
            </form>
        </div>
<!-- back -->
<button onclick="history.go(-1);">Back </button>

</body>
</html>