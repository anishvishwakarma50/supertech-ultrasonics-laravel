<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#man-pro" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Products</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="man-pro">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('product.create') }}">Add Product</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('product.index') }}">Manage Product</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('testimonial.index') }}">
        <i class="icon-star menu-icon"></i>
        <span class="menu-title">Testimonials</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('inquiry.index') }}">
        <i class="icon-envelope menu-icon"></i>
        <span class="menu-title">Inquiries</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('contact.index') }}">
        <i class="icon-mail menu-icon"></i>
        <span class="menu-title">Contact Messages</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('lead.index') }}">
        <i class="icon-person menu-icon"></i>
        <span class="menu-title">Leads</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('manage-content') }}">
        <i class="icon-doc menu-icon"></i>
        <span class="menu-title">Manage Site Content</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#man-pages" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-layers menu-icon"></i>
        <span class="menu-title">Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="man-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('about') }}" target="_blank">View About Page</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('contact') }}" target="_blank">View Contact Page</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('products') }}" target="_blank">View Products Page</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#man-slide" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-image menu-icon"></i>
        <span class="menu-title">Sliders</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="man-slide">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('slider.create') }}">Add Slider</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('slider.index') }}">Manage Sliders</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#man-inr" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Industry</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="man-inr">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('industry.create') }}">Add Industry</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('industry.index') }}">Manage Industries</a></li>
        </ul>
      </div>
    </li>
  </ul>
</nav>