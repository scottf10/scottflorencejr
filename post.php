<?php
include('includes/config.php');

if(isset($_GET['title']))
{
    $slug = mysqli_real_escape_string($con, $_GET['title']);

    $meta_posts = "SELECT slug,meta_title,meta_description,meta_keyword FROM posts WHERE slug='$slug' LIMIT 1";
    $meta_posts_run = mysqli_query($con, $meta_posts);

    if(mysqli_num_rows($meta_posts_run) > 0)
    {
        $metaPostItem = mysqli_fetch_array($meta_posts_run);

        $page_title = $metaPostItem['meta_title'];
        $meta_description = $metaPostItem['meta_description'];
        $meta_keywords = $metaPostItem['meta_keyword'];
    }
    else
    {
        $page_title = "Post Page";
        $meta_description = "Post Page description bloggin website";
        $meta_keywords = "php, html, css, laravel, codeigniter, react js";
    }
}
else
{
    $page_title = "Post Page";
    $meta_description = "Post Page description bloggin website";
    $meta_keywords = "php, html, css, laravel, codeigniter, react js";
}

include('includes/header.php');
include('includes/navbar.php');
?>
    <?php
        if(isset($_GET['title']))
        {
            $slug = mysqli_real_escape_string($con, $_GET['title']);
  
            $posts = "SELECT * FROM posts WHERE slug='$slug' ";
            $posts_run = mysqli_query($con, $posts);
  
            if(mysqli_num_rows($posts_run) > 0)
            {
                foreach($posts_run as $postItems)
                {
                    ?>
  
            <?php if($postItems['image'] != null) : ?>
                <div class="container-fluid" style=
                   "position: relative; 
                    height:500px; 
                    background-size: cover;
                    background-position: center;
                    background-image: url(<?= base_url('uploads/posts/'.$postItems['image']) ?>" alt="<?=$postItems['name'];?>);">         
                  <div class="container text-center" style="position: absolute; right: 0; left: 0; bottom: 0;">      
                      <div class="row">     
                        <div class="col-md-12">
                            <div class="card pt-5 pb-2 mb-0" style=
                            "font-family: Arial Black;
                             border-bottom: 1px solid white; 
                             border-bottom-left-radius: 0px; 
                             border-bottom-right-radius: 0px; 
                             background-color: white;">
                                <h1 class="px-5 mx-5"><?=$postItems['name'];?></h1>
                            </div>
                        </div>
                      </div>
                      <div class="row">     
                      <div class="col-md-12">
                            <div class="card pt-2 pb-2 mb-0" style="border-top: 1px solid white; border-bottom: 1px solid white; border-radius: 0px; background-color:white;">
                                <h3 class="px-5 mx-5"><?=$postItems['name'];?></h3>
                            </div>
                        </div>
                      </div>
                      <div class="card" style="border: none; border-radius: 0px !important;">
                        <div class="card-header " style="background-color: white; border: none;">
                          <div class="row pt-3 pb-0 mb-0">     
                            <div class="col-md-7">
                                <strong style="background-color: white;">Scott Florence Jr.</strong>
                            </div>
                            <div class="col-md-3">
                                 <label class="text-dark me-2 fs-6" style="background-color: white;">Posted On: <?= date('d-M-Y', strtotime($postItems['created_at'])); ?></label>
                            </div>
                        </div> 
                      </div>         
                  </div>
              </div>
          </div>
  
            <?php endif; ?>
                <div class="container-fluid px-0">
                  <div class="container">
                    <div class="row">
                       <div class="col-md-12">
                          <div class="card pt-5 px-5" style="border-radius: 0px !important; border-width: 0 1px 0 1px; border-color: white;">
                            <div class="card-body post-body pt-5 px-5" style="border-top: 1px solid gray;">
                                <div>
                                    <?=$postItems['description'];?>
                                </div>
                            </div>
                          </div>  
                      </div>
                <?php
                }
            
            }
            else
            {
                ?>
                    <h4>No Such Post Found</h4>
                <?php
            }
        }
        else
        {
            ?>
                <h4>No Such URL Found</h4>
            <?php
        }
    ?>
  
              </div>               
          </div>
      </div>
<?php
include('includes/footer.php');
?>
