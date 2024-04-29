<?php
require_once "config/master.php";

require_once "include/header.php";
require_once "include/sidebar.php";


?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Mapping</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Mapping</li>

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">


              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Mapping</h5>

                  <div id="map" style="width: 100%; height: 400px;"></div>

                </div>
              </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->

<?php
require_once "include/footer.php";
?>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
          // Initialize the map centered on the Philippines
          var map = L.map('map').setView([12.8797, 121.774], 6);

          // Add OpenStreetMap tiles
          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          maxZoom: 19,
          }).addTo(map);

          // Fetch marker data from the PHP script using AJAX
          fetch('get_coordinates.php')
          .then(response => response.json())
          .then(markerCoordinates => {
              // Loop through the marker data and add markers to the map
              markerCoordinates.forEach(function(marker) {
                  var popupContent = '<h3>' + marker.dsp + '</h3>';
                  L.marker(marker.coords).addTo(map).bindPopup(popupContent);
              });
          })
          .catch(error => {
              console.error('Error fetching marker data:', error);
          });
  </script>
