<nav class="navbar navbar-expand-lg navbar-dark sub-navbar-bg shadow sticky-top" style="font-size: 12pt;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="<?= base_url('index.php') ?>"><i class="bi bi-house-fill"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?= base_url('about.php') ?>"><i class="bi bi-person-fill"></i> Career Highlights</a>
        </li>
        <!--
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-archive-fill"></i> Repository
          </a>
          <ul class="dropdown-menu bg-light rounded-0" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Projects</a></li>
            <li><a class="dropdown-item" href="#">Design</a></li>
            <li><a class="dropdown-item" href="#">Writing</a></li>
            <dropdown-blog.txt here
            <li><a class="dropdown-item" href="#">Courses</a></li>
            <li><a class="dropdown-item" href="<?= base_url('gallery.php') ?>">Photography</a></li>
          </ul>
        </li>
        -->
        <!-- <?php if(isset($_SESSION['auth_user'])) : ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['auth_user']['user_name']; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">My Profile</a></li>
            <li>
              <form action="<?= base_url('allcode.php') ?>" method="POST">
                <button type="submit" name="logout_btn" class="dropdown-item"><i class="bi bi-lock-fill"></i> Logout</button>
              </form>
            </li>
          </ul>
        </li>
        <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('login.php') ?>"><i class="bi bi-lock-fill"></i> Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="end" href="<?= base_url('register.php') ?>"><i class="bi bi-pen-fill"></i> Sign Up</a>
        </li>
        <?php endif; ?> -->

      </ul>
     
    </div>
  </div>
</nav>