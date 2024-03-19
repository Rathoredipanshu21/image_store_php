<?php
include('dbconnection.php');
if(isset($_POST['submit'])){
    $file_name = mysqli_real_escape_string($con, $_FILES['image']['name']);
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'Images/'.$file_name;

    // Move the uploaded file to the destination folder
    if(move_uploaded_file($tempname, $folder)){
        // Insert the file name into the database
        $query = mysqli_query($con , "INSERT INTO `image` (`images`) VALUES ( '$file_name');");
        if($query){
            echo "<h2>File uploaded successfully</h2>";
        }
        else{
            // If there's an issue with the query, delete the uploaded file
            unlink($folder); // Delete the file
            echo "<h2>File upload failed</h2>";
        }
    }
    else{
        echo "<h2>File upload failed</h2>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            width: 100%;
            height: auto; 
        }
    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>

    <div>
        <?php
        $res = mysqli_query($con, "SELECT * FROM images");
        while($row = mysqli_fetch_assoc($res)){
        ?>
        <img src="Images/<?php echo $row['file']; ?>" >
        <?php } ?>
    </div>
</body>
</html>
