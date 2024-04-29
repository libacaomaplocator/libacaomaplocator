<?php
require_once "config/master.php";

require_once "include/header.php";
require_once "include/sidebar.php";

$msg = "";
$display = "none";
$alert = ""; //error //success


if(isset($_POST['save_add_coordinates'])) {


    $tableName = 'coordinates';

    $dsp   = $_POST['dsp'];
    $latitude     = $_POST['latitude'];
    $longtitude   = $_POST['longitude'];

    $conditions = array(
              'dsp'  => $dsp,
              'Latitude' => $latitude,
              'Longitude'  => $longtitude

    );

    if ($crud->areValuesUnique($tableName, $conditions)) {

          $dataToInsert = array(
            'dsp'  => $dsp,
            'Latitude' => $latitude,
            'Longitude'  => $longtitude

          );

              $insertedId = $crud->create($tableName, $dataToInsert);
              if($insertedId){
                  $alert = "success";
                  $msg = "Coordinates saved successfully!";
                  $display = "block";
                  echo '<meta http-equiv="refresh" content="2;url=admin_coordinates.php">';

              }
      }else{
        $alert = "error";
        $msg = "Record already exists!";
        $display = "block";
        //echo '<meta http-equiv="refresh" content="2;url=users">';

      }


  }


  if (isset($_POST['update_coordinates'])) {

      $tableName = 'coordinates';

      $id   = $_POST['mapping_id'];
      $dsp     = $_POST['dsp'];
      $latitude     = $_POST['latitude'];
      $longitude   = $_POST['longitude'];


      $dataToUpdate = array(
                'dsp'  => $dsp,
                'latitude' => $latitude,
                'longitude' => $longitude
      );

      $condition = "id = '{$id}'";

      $updateId = $crud->update($tableName, $condition, $dataToUpdate);

          if($updateId){
              $alert = "success";
              $msg = "Information updated successfuly.";
              $display = "block";
              echo '<meta http-equiv="refresh" content="2;url=admin_coordinates.php">';

          }
      }

?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Business Coordinates</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Coordinates</li>

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="message-box <?php echo $alert ?>" id="msg" style="display:<?php echo $display ?>;">
            <?php echo $msg ?>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">


              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Coordinates</h5>
                  <!-- Vertically centered Modal -->
                  <?php require_once "add_coordinates.php"; ?>
                  <div class="row g-3">
                    <div class="col-md-12">
                  <?php require_once "datatable_coordinates.php"; ?>
                  </div>
                </div>


                </div>
              </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->

<?php
require_once "include/footer.php";
?>
