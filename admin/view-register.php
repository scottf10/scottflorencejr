<?php
include('authentication.php');
include('middleware/superadminAuth.php');

include('includes/header.php');
?>

<div class="container-fluid px-4">

    <div class="row mt-4">

        <div class="col-md-12">

            <?php include('message.php'); ?>

            <div class="card">
                <div class="card-header">
                    <h4>Registered User
                        <a href="register-add.php" class="btn btn-primary float-end">Add Admin</a>
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM users";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $row['fname']; ?></td>
                                        <td><?= $row['lname']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td>
                                            <?php
                                            if($row['role_as'] == '1'){
                                                echo 'Admin';
                                            }if($row['role_as'] == '2'){
                                                echo 'Super Admin';
                                            }elseif($row['role_as'] == '0'){
                                                echo 'User';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="register-edit.php?id=<?=$row['id'];?>" class="btn btn-success">Edit</a>
                                        </td>
                                        <td>
                                            <?php if($row['role_as'] == '2'): ?>
                                                <button type="button" class="btn btn-danger">No</button>
                                            <?php else: ?>
                                            <form action="code-superadmin.php" method="POST">
                                                <button type="submit" name="user_delete" value="<?=$row['id'];?>" class="btn btn-danger">Delete</button>
                                            </form>
                                            <?php endif; ?>
                                        </td>
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

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>