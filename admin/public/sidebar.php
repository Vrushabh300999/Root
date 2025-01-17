<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="dashboard.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link " href="http://localhost/projects/grocery/Root/" target="_blank">
        <i class="bi bi-grid"></i>
        <span>Go to Website</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#products" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="products" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="add_service.php">
            <i class="bi bi-circle"></i><span>Add Product</span>
          </a>
        </li>
        <li>
          <a href="products.php">
            <i class="bi bi-circle"></i><span>Manage Products</span>
          </a>
        </li>

      </ul>
    </li>
  </ul>

</aside><!-- End Sidebar-->