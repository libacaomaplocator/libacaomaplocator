<style>
    .action-icons {
        display: flex;
    }
    .action-icons .bi {
        margin-right: 20px; /* Adjust the spacing between icons */
    }
</style>
<br/>
<div class="col-lg-12">
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Coordinates Lists</h5>
              <!-- Table with hoverable rows -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <!-- <th scope="col">#</th> -->
                    <th scope="col">Description</th>
                    <th scope="col">Latitude</th>
                    <th scope="col">Longitude</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                     $sql = "SELECT * FROM coordinates";
                     $records = $crud->read($sql);
                     if ($records !== false) {
                     foreach($records as $record) {
                        $mapping_id = $record['id'];
                       ?>
                         <tr>

                             <td style="text-align:left;"><?php echo $record['dsp']; ?></td>
                             <td style="text-align:left;"><?php echo $record['latitude']; ?></td>
                             <td style="text-align:left;"><?php echo $record['longitude']; ?></td>
                             <td>
                             <a href="#" onclick="event.preventDefault();" data-id="<?php echo $mapping_id; ?>" data-bs-toggle="modal" data-bs-target="#editModal1" class="edit-btn">
                             <i  class="bi bi-pencil" data-bs-toggle="modal" data-bs-target="#editModal1"></i></a> <!-- Icon 1 -->
                              <a href="#" onclick="event.preventDefault();" data-id="<?php echo $mapping_id; ?>" data-bs-toggle="modal" data-bs-target="#deleteModal1" class="delete-btn">
                               <i  class="bi bi-trash" data-bs-toggle="modal" data-bs-target="#deleteModal1" style="color: #d10000;"></i></a> <!-- Icon 2 -->
                             </td>
                             </tr>
                     <?php
                       }
                     }
                  ?>

                </tbody>
              </table>
              <!-- End Table with hoverable rows -->

            </div>
          </div>
 </div>
</div>

<div class="modal fade" id="editModal1" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Update Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3" action="" method="POST">
                    <div class="col-md-12">
                      <input type="hidden" id="mapping_id" name="mapping_id" value="">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="business_name" name="dsp" placeholder="Description" required="">
                        <label for="floatingName">Business Name</label>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Latitude" required="">
                        <label for="floatingUnit">Latitude</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Longitude" required="">
                        <label for="floatingSRP">Longitude</label>
                      </div>
                    </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" name="update_coordinates" class="btn btn-primary" value="Save Changes">
          </div>
        </form>
      </div>
      </div>
    </div><!-- End Vertically centered Modal-->


<!-- Delete Modals -->
<div class="modal fade" id="deleteModal1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModal1Label">Delete User</h5>
      </div>
      <form action="delete_coordinates.php" method="POST">
        <div class="modal-body">
          <input type="hidden" id="deleteRecordId" name="id" value="">
          Are you sure you want to delete this data?
        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" name="delete_price_monitoring" class="btn btn-primary" value="Delete">
        </div>
      </form>
    </div>
  </div>
</div>

<script>

document.addEventListener('DOMContentLoaded', function() {
  // Handle click event for edit button
  document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener('click', function() {
          var id = this.getAttribute('data-id');

          // Fetch the record data from the server using an AJAX request
          fetch(`record_coordinates.php?id=${id}`)
            .then(response => response.json())
            .then(record => {

                  // Fill the form inputs with the record data
                  document.getElementById('mapping_id').value = id;
                  document.getElementById('business_name').value = record.dsp;
                  document.getElementById('latitude').value = record.latitude;
                  document.getElementById('longitude').value = record.longitude;

              })
              .catch(error => {
                  console.error('Error fetching record data:', error);
              });
      });
  });

  // Handle click event for delete button
  document.querySelectorAll('.delete-btn').forEach(button => {

      button.addEventListener('click', function() {
          var id = this.getAttribute('data-id');

          // Set the record ID in the hidden input of the delete modal
          document.getElementById('deleteRecordId').value = id;
      });
  });
});

</script>
