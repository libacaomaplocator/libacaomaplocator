    <!-- Vertically centered Modal -->
    <button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">
    Add Coordinates
    </button>
    <div class="modal fade" id="verticalycentered" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Coordinates</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <form class="row g-3" action="" method="POST">
                    <div class="col-md-12">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="dsp" placeholder="Business Name" required="">
                        <label for="floatingName"> Description</label>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="floatingUnit" name="latitude" placeholder="Latitude" required="">
                        <label for="floatingUnit">Latitude</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="floatingSRP" name="longitude" placeholder="Longitude" required="">
                        <label for="floatingSRP">Longitude</label>
                      </div>
                    </div>


        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" name="save_add_coordinates" class="btn btn-primary" value="Submit">
          </div>
        </form>

        </div>
      </div>
    </div><!-- End Vertically centered Modal-->
