{{-- this is the Add Product page --}}
<x-admin.layout.app title="Add Product">
  {{-- main content --}}
  <x-slot:content>
    <div class="content-wrapper">
        <div class="row">
            @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
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
                        <th>MOQ</th>
                        <th>Weight</th>
                        <th>Frequency</th>
                        <th>Voltage</th>
                        <th>Color</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    <img src="images/product1.jpg" class="product-img" alt="{{ $product->title }}">
                                </td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->moq }}</td>
                                <td>{{ $product->specification->weight }}</td>
                                <td>{{ $product->specification->frequency }}</td>
                                <td>{{ $product->specification->voltage }}</td>
                                <td>{{ $product->specification->color }}</td>
                                <td>
                                    <span class="badge badge-success status-badge">Active</span>
                                </td>
                                <td class="action-buttons">
                                    <button class="btn btn-sm btn-primary view-btn" data-id="1">View</button>
                                    <button class="btn btn-sm btn-info edit-btn" data-id="1">Edit</button>
                                    <form action="{{ route('product.destroy', $product->id) }}" 
                                        method="POST" 
                                        style="display:inline-block;"
                                        onsubmit="return confirm('Are you sure you want to delete this product?');">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Delete
                                        </button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
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