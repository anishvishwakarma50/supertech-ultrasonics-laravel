{{-- this is the Add Product page --}}
<x-admin.layout.app title="Add Product">
  {{-- main content --}}
  <x-slot:content>
    <div class="content-wrapper">
        <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Manage Products</h4>
                <p class="card-description">Search, View, Edit, and Delete Ultrasonic Machines</p>

                <!-- Search Input -->
                <div class="mb-3">
                <input type="text" id="productSearch" class="form-control" placeholder="Search by any keyword...">
                </div>

                <!-- Products Table -->
                <div class="table-responsive">
                <table class="table" id="productTable">
                    <thead class="table-light">
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Model</th>
                        <th>Capacity (L)</th>
                        <th>Power (W)</th>
                        <th>Price Range (₹)</th>
                        <th>Industry</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <img src="images/product1.jpg" class="product-img" alt="Ultrasonic Cleaner 10L">
                            </td>
                            <td>Ultrasonic Cleaner 10L</td>
                            <td>UC-10</td>
                            <td>10</td>
                            <td>500</td>
                            <td>₹25,000 - ₹30,000</td>
                            <td>Automobile</td>
                            <td>
                                <span class="badge badge-success status-badge">Active</span>
                            </td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-primary view-btn" data-id="1">View</button>
                                <button class="btn btn-sm btn-info edit-btn" data-id="1">Edit</button>
                                <button class="btn btn-sm btn-danger delete-btn" data-id="1">Delete</button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <img src="images/product2.jpg" class="product-img" alt="Ultrasonic Cleaner 20L">
                            </td>
                            <td>Ultrasonic Cleaner 20L</td>
                            <td>UC-20</td>
                            <td>20</td>
                            <td>800</td>
                            <td>₹45,000 - ₹55,000</td>
                            <td>Medical</td>
                            <td>
                                <span class="badge badge-success status-badge">Active</span>
                            </td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-primary view-btn" data-id="2">View</button>
                                <button class="btn btn-sm btn-info edit-btn" data-id="2">Edit</button>
                                <button class="btn btn-sm btn-danger delete-btn" data-id="2">Delete</button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <img src="images/product3.jpg" class="product-img" alt="Ultrasonic Cleaner 30L">
                            </td>
                            <td>Ultrasonic Cleaner 30L</td>
                            <td>UC-30</td>
                            <td>30</td>
                            <td>1200</td>
                            <td>₹70,000 - ₹85,000</td>
                            <td>Electronics</td>
                            <td>
                                <span class="badge badge-warning status-badge">Inactive</span>
                            </td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-primary view-btn" data-id="3">View</button>
                                <button class="btn btn-sm btn-info edit-btn" data-id="3">Edit</button>
                                <button class="btn btn-sm btn-danger delete-btn" data-id="3">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
        </div>

        <!-- Product Details Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                <div class="col-md-4 text-center">
                    <img id="modalProductImage" src="" class="img-fluid rounded" alt="Product Image" style="max-height: 200px;">
                </div>
                <div class="col-md-8">
                    <h3 id="modalProductName" class="mb-2"></h3>
                    <h5 id="modalProductModel" class="text-muted mb-3"></h5>
                    <div class="row">
                    <div class="col-md-6">
                        <p><strong>Capacity:</strong> <span id="modalProductCapacity"></span> L</p>
                        <p><strong>Power:</strong> <span id="modalProductPower"></span> W</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Price Range:</strong> ₹<span id="modalProductPrice"></span></p>
                        <p><strong>Industry:</strong> <span id="modalProductIndustry"></span></p>
                        <p><strong>Status:</strong> <span id="modalProductStatus"></span></p>
                    </div>
                    </div>
                </div>
                </div>
                
                <div class="row">
                <div class="col-md-12">
                    <h5 class="mb-3">Description</h5>
                    <p id="modalProductDescription" class="text-muted"></p>
                    
                    <h5 class="mb-3 mt-4">Specifications</h5>
                    <div id="modalProductSpecs" class="bg-light p-3 rounded">
                    <!-- Specifications will be loaded here -->
                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="editProductBtn">Edit Product</button>
            </div>
            </div>
        </div>
        </div>

    </div>
    <!-- content-wrapper ends -->
  </x-slot:content>
</x-admin.layout.app>