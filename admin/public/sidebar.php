<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="dashboard.php">
        <i class="bi bi-speedometer2"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link " href="<?php echo ROOT; ?>" target="_blank">
        <i class="bi bi-arrow-up-right-square"></i>
        <span>Go to Website</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#banners" data-bs-toggle="collapse" href="#">
        <i class="bi bi-images"></i><span>Banner</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="banners" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="add_banner.php">
            <i class="bi bi-circle"></i><span>Add Banner</span>
          </a>
        </li>
        <li>
          <a href="banners.php">
            <i class="bi bi-circle"></i><span>Manage Banners</span>
          </a>
        </li>

      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#products" data-bs-toggle="collapse" href="#">
        <i class="bi bi-archive"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="products" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="add_product.php">
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
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#categories" data-bs-toggle="collapse" href="#">
        <i class="bi bi-archive"></i><span>Product Category</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="categories" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="add_category.php">
            <i class="bi bi-circle"></i><span>Add Category</span>
          </a>
        </li>
        <li>
          <a href="product_categories.php">
            <i class="bi bi-circle"></i><span>Manage Categories</span>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">
        <i class="bi bi-box-arrow-right"></i>
        <span>Sign Out</span>
      </a>
    </li>
  </ul>

</aside><!-- End Sidebar-->