<?php
include('includes/config.php');

$page_title = "Photo Gallery";
$meta_description = "Category Page description bloggin website";
$meta_keywords = "php, html, css, laravel, codeigniter, react js";

include('includes/header.php');
include('includes/navbar.php');

echo "<row class='text-center'><h2 class='pt-5 pb-0' style='color:green;'><strong>Photography</strong></h2></row>";
// Initialize variables for the photo gallery
$photos_per_page = 30;
$page = 1;

// Check if the "page" URL parameter is set
if (isset($_GET["page"])) {
  $page = (int) $_GET["page"];
}

// Calculate the offset based on the current page number
$offset = ($page - 1) * $photos_per_page;

// Fetch the categories from the database that have at least one photo
$sql_category = "SELECT DISTINCT category FROM photos WHERE category IS NOT NULL ORDER BY category";
$result_category = mysqli_query($con, $sql_category);

// Display the photos in a grid
echo "<div class='container justify-content-center text-center my-5'>";

// Loop through the categories
while ($row_category = mysqli_fetch_assoc($result_category)) {
  $category_name = $row_category["category"];
  
  // Display the category header
  echo "<h2 class='pt-3 pb-1'><strong>$category_name</strong></h2>";

  // Fetch the photos for this category
  $sql_category_photos = "SELECT * FROM photos WHERE category='$category_name' ORDER BY id LIMIT $photos_per_page OFFSET $offset";
  $result_category_photos = mysqli_query($con, $sql_category_photos);
  
  $count = 0;
  echo "<div class='row justify-content-center'>";
  while ($row = mysqli_fetch_assoc($result_category_photos)) {
    $count++;
    $photo_id = $row["id"];
    $photo_name = $row["name"];
    $photo_content = $row["content"];
    $row_count = 2;

    // Decode the binary data into an image
    $photo_data = base64_encode($photo_content);
    $photo_src = "data:image/jpeg;base64,$photo_data";

    echo "<div class='col-3 photo-container py-1 px-1'>";
    echo "<a href='#' onclick='displayLargeImage(\"$photo_src\")'> <img src='$photo_src' alt='$photo_name'></a>";
    echo "</div>";

    if ($count % 3 == 0) {
      echo "</div><div class='row justify-content-center'>";
    }
  }
  echo "</div>";
}

echo "</div>";
?>

<script>
// ModalCode
function displayLargeImage(src) {
  var modal = document.getElementById("imageModal");
  var modalImg = document.getElementById("modalImg");
  modal.style.display = "block";
  modalImg.src = src;
}
// Get the close button
var closeButton = document.getElementsByClassName("close")[0];

// Add an event listener to the close button
closeButton.addEventListener("click", function(event) {
  // Prevent the default action of the click event (scrolling to the top of the page)
  event.preventDefault();

  // Hide the modal
  var modal = document.getElementById("imageModal");
  modal.style.display = "none";
});
</script>

<!-- The image modal -->
<div id="imageModal" class="modal">
  <span class="close" onclick="document.getElementById('imageModal').style.display='none'">&times;</span>
  <img class="modal-content" id="modalImg">
</div>

<?php
include('includes/footer.php');
?>