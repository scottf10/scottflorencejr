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
                    <h4>Edit photo
                        <a href="photo-view.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php
                        if(isset($_GET['id']))
                        {
                            $photo_id = $_GET['id'];
                            $photo_query = "SELECT * FROM photos WHERE id='$photo_id' LIMIT 1";
                            $photo_query_res = mysqli_query($con, $photo_query);

                            if(mysqli_num_rows($photo_query_res) > 0)
                            {
                                $photo_row = mysqli_fetch_array($photo_query_res);
                                ?>

                                <form action="code.php" method="POST" enctype="multipart/form-data">

                                    <input type="hidden" name="photo_id" value="<?= $photo_row['id'] ?>">

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="">Category List</label>
                                            <?php
                                                $category = "SELECT * FROM categories WHERE status='0' ";
                                                $category_run = mysqli_query($con, $category);

                                                if(mysqli_num_rows($category_run) > 0)
                                                {
                                                    ?>
                                                    <select name="category_id" required class="form-control">
                                                        <option value="">--Select Category --</option>
                                                        <?php
                                                            foreach($category_run as $categoryitem)
                                                            {
                                                            ?>
                                                            <option value="<?= $categoryitem['id'] ?>" <?= $categoryitem['id'] == $photo_row['category_id'] ? 'selected':'' ?> >
                                                                <?= $categoryitem['name'] ?>
                                                            </option>
                                                            <?php
                                                            }
                                                        ?>
                                                    </select>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <h5>No Category Available</h5>
                                                    <?php
                                                }
                                            ?>
                                            
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Name</label>
                                            <input type="text" name="name" value="<?= $photo_row['name'] ?>" required class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Slug (URL)</label>
                                            <input type="text" name="slug" value="<?= $photo_row['slug'] ?>" required class="form-control">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Description</label>
                                            <textarea name="description" id="summernote" required class="form-control"><?= htmlentities($photo_row['description']); ?></textarea>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Meta Title</label>
                                            <input type="text" name="meta_title" value="<?= $photo_row['meta_title'] ?>" max="191" required class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Meta Description</label>
                                            <textarea name="meta_description" required class="form-control"  rows="4"><?= $photo_row['meta_description'] ?></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Meta Keyword</label>
                                            <textarea name="meta_keyword" required class="form-control"  rows="4"><?= $photo_row['meta_keyword'] ?></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Image</label>
                                            <input type="hidden" name="old_image" value="<?= $photo_row['image'] ?>" />
                                            <input type="file" name="image" class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Status</label> <br/>
                                            <input type="checkbox" name="status" <?= $photo_row['status'] == '1' ? 'checked':'' ?> width="70px" height="70px" />
                                            Checked = Hidden, UnChecked = Visible
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <button type="submit" name="photo_update" class="btn btn-primary">Update photo</button>
                                        </div>

                                    </div>
                                </form>
                                
                                <?php
                            }
                            else
                            {
                                ?>
                                    <h4>No Record Found</h4>
                                <?php
                            }
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>