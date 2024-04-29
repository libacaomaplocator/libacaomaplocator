<?php
require_once "config/master.php";
require_once "include/header.php";
require_once "include/sidebar.php";
?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">
          <p>Welcome to the Libacao Danger Map Locator!</p>

          <p>We're thrilled to have you join our community dedicated to safety and awareness. Here's a quick guide to help you navigate through our app:</p>

          <p><strong>Alert Levels:</strong></p>
          <ul>
            <li>Alert 1: Indicates areas prone to flooding.</li>
            <li>Alert 2: Highlights regions vulnerable to heavy rainfall.</li>
            <li>Alert 3: Identifies locations susceptible to earthquakes.</li>
            <li>Alert 4: Signals areas affected by any or all of the mentioned hazards.</li>
          </ul>

          <p><strong>Custom Locations:</strong></p>
          <p>Feel free to input any location of interest! Simply provide the latitude and longitude coordinates along with a brief description of the area.</p>

          <p><strong>Safety Reminder:</strong></p>
          <p>While using the app, remember to exercise caution and prioritize safety. Use the information provided to stay informed and make well-informed decisions.</p>

          <p>Libacao Danger Map Locator is here to empower you with knowledge about potential hazards in your surroundings. Stay safe, stay informed, and explore with confidence!</p>
        </div><!-- End Right side columns -->
      </div>
    </div>
  </section>
</main><!-- End #main -->

<?php
require_once "include/footer.php";
?>
