<?php
include('authentication.php');
include('middleware/superadminAuth.php');


if(isset($_POST['post_delete_btn']))
{
    $post_id = $_POST['post_delete_btn'];

    $check_img_query = "SELECT * FROM posts WHERE id='$post_id' LIMIT 1";
    $img_res = mysqli_query($con, $check_img_query);
    
    $res_data = mysqli_fetch_array($img_res);
    $image = $res_data['image'];

    $query = "DELETE FROM posts WHERE id='$post_id' LIMIT 1";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        if(file_exists('../uploads/posts/'.$image)){
            unlink("../uploads/posts/".$image);
        }

        $_SESSION['message'] = "Post Deleted Successfully";
        header('Location: post-view.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong.!";
        header('Location: post-view.php');
        exit(0);
    }
}

if(isset($_POST['category_delete']))
{
    $category_id = $_POST['category_delete'];

    // 2= delete
    $query = "UPDATE categories SET status='2' WHERE id='$category_id' LIMIT 1";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Category Deleted Successfully";
        header('Location: category-view.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong.!";
        header('Location: category-view.php');
        exit(0);
    }
}


if(isset($_POST['user_delete']))
{
    $user_id = $_POST['user_delete'];

    if($_SESSION['auth_role'] != $user_id)
    {
        $query = "DELETE FROM users WHERE id='$user_id' ";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            $_SESSION['message'] = "User/Admin Deleted Successfully";
            header('Location: view-register.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Something Went Wrong.!";
            header('Location: view-register.php');
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "You cannot delete yourself.!";
        header('Location: view-register.php');
        exit(0);
    }

}

if(isset($_POST['add_user']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1':'0';

    $query = "INSERT INTO users (fname,lname,email,password,role_as,status) VALUES ('$fname','$lname','$email','$password','$role_as','$status')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Admin/User Added Successfully";
        header('Location: view-register.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong.!";
        header('Location: view-register.php');
        exit(0);
    }
}


if(isset($_POST['update_user']))
{
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);

    $check_user = "SELECT password,role_as FROM users WHERE id='$user_id' LIMIT 1";
    $check_user_run = mysqli_query($con, $check_user);
    if(mysqli_num_rows($check_user_run) > 0)
    {
        $result = mysqli_fetch_array($check_user_run);

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'] != null ? $_POST['password'] : $result['password'];
        $role_as = $_POST['role_as'] != null ?  $_POST['role_as'] :  $result['role_as'];
        $status = $_POST['status'] == true ? '1':'0';
    
        $query = "UPDATE users SET fname='$fname', lname='$lname', email='$email', password='$password', role_as='$role_as', status='$status'
                    WHERE id='$user_id' ";
        $query_run = mysqli_query($con, $query);
    
        if($query_run)
        {
            $_SESSION['message'] = "Updated Successfully";
            header('Location: view-register.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Something Went Wrong!";
            header('Location: view-register.php');
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "No Such user Found";
        header('Location: view-register.php');
        exit(0);
    }
}

?>