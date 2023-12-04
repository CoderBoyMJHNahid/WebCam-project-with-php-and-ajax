<?php
 include "includes/header.php";
?>

    <section id="slider">
      <div id="formslider" class="carousel slide">
        <div class="carousel-inner">

          <?php include "includes/slide_info.php" ?>

          <?php include "includes/slider_first.php" ?>

          <?php include "includes/slider_second.php" ?>

          <?php include "includes/slider_third.php" ?>

        </div>
        <button
          class="carousel-control-prev d-none"
          type="button"
          data-bs-target="#formslider"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>

        <button
          class="carousel-control-next d-none"
          type="button"
          data-bs-target="#formslider"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>

      </div>
    </section>

<?php include "includes/footer.php"?>

