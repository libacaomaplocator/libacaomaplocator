<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <?php   if($user_id == -1) { ?>
    <li class="nav-item">
      <a class="nav-link collapsed" href="dashboard.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->


    <li class="nav-item">
      <a class="nav-link collapsed" href="admin_coordinates.php">
      <i class="bi bi-geo-alt"></i>
        <span>Coordinates</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="admin_mapping.php">
      <i class="bi bi-pin-map"></i>
        <span>Mapping</span>
      </a>
    </li>

    <?php } ?>
  </ul>
</aside><!-- End Sidebar-->
