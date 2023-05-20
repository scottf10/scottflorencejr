<?php
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">

    <div class="row mt-4">
        <div class="col-md-12">

            <?php include('message.php'); ?>
            <?php // Check if the form has been submitted
                if (isset($_POST["submit"])) {
                // Get the uploaded file information
                $name = $_FILES["file"]["name"];
                $tmp_name = $_FILES["file"]["tmp_name"];
                $error = $_FILES["file"]["error"];
                $size = $_FILES["file"]["size"];

                // Get the category from the form field
                $category = isset($_POST["category"]) ? $_POST["category"] : "";

                // Validate the category
                if (empty($category)) {
                    echo "Error: Category is required.";
                } else {
                    // Escape the category for safe insertion into the database
                    $category = mysqli_real_escape_string($con, $category);
                    
                    // Insert the photo into the database
                    $sql = "INSERT INTO photos (name, content, category) VALUES ('$name', '$content', '$category')";
                    // ...
                }
                
                // Validate the uploaded file
                if ($error === UPLOAD_ERR_OK) {
                    // Check the file size
                    if ($size > 1000000) {
                    echo "Error: File size is too large.";
                    } else {
                    // Read the file content into a variable
                    $fp = fopen($tmp_name, "rb");
                    $content = fread($fp, $size);
                    fclose($fp);
                    
                    // Escape the content and name for safe insertion into the database
                    $content = mysqli_real_escape_string($con, $content);
                    $name = mysqli_real_escape_string($con, $name);
                    $category = mysqli_real_escape_string($con, $category);

                    // Insert the photo into the database
                    $sql = "INSERT INTO photos (name, content, category) VALUES ('$name', '$content', '$category')";
                    if (mysqli_query($con, $sql)) {
                        echo "File uploaded successfully.";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($con);
                    }
                    }
                } else {
                    echo "Error: There was an error uploading the file.";
                }
                }
            ?>
            <div class="card">
                <div class="card-header">
                    <h4>Add Photo
                        <a href="photo-view.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                <div class="form-group">
                <div class="form-group">

                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <label for="category">Category:</label>
                    <input type="text" class="form-control" id="category" name="category">
                    <input type="submit" name="submit" value="Upload">
                </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('includes/footer.php');
include('includes/scripts.php');
?>
