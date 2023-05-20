<?php
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">

    <div class="row mt-4">
        <div class="col-md-12">

            <?php include('message.php'); ?>

            <div class="card">
                <div class="card-header">
                    <h4>View photo
                        <a href="photo-add.php" class="btn btn-primary float-end">Add photo</a>
                    </h4>
                </div>
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table id="myDataTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Content</th>
                                    
                                    <?php if($_SESSION['auth_role'] == '2') : ?>
                                    <th>Delete</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // $photos = "SELECT * FROM photos WHERE status!='2' ";
                                    $photos = "SELECT p.*, c.name AS cname FROM photos p,categories c WHERE c.id = p.category_id ";
                                    $photos_run  = mysqli_query($con, $photos);

                                    if(mysqli_num_rows($photos_run) > 0)
                                    {
                                        foreach($photos_run as $photo) 
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $photo['id'] ?></td>
                                                <td><?= $photo['name'] ?></td>
                                                <td><?= $photo['content'] ?></td>
                                                <td><img src="../uploads/photos/<?= $photo['image'] ?>" alt="Image" width="60px" height="60px" /></td>
                                                <td>
                                                    <?= $photo['status'] == '1' ? 'Hidden':'Visible' ?>
                                                </td>
                                                <td>
                                                    <a href="photo-edit.php?id=<?= $photo['id'] ?>" class="btn btn-success">Edit</a>
                                                </td>
                                                <?php if($_SESSION['auth_role'] == '2') : ?>
                                                <td>
                                                    <form action="code.php" method="POST">
                                                        <button type="submit" name="photo_delete_btn" value="<?= $photo['id'] ?>" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                                <?php endif; ?>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <tr>
                                            <td colspan="6">No Record Found</td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>