{{-- this is the Add Product page --}}
<x-admin.layout.app title="Add Product">
  {{-- main content --}}
  <x-slot:content>
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-xl-8 align-self-center">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Add Ultrasonic Machine</h4>
                
                <!-- Status message container -->
                <div id="statusMessage" class="alert d-none"></div>

                <form id="productForm" method="POST" enctype="multipart/form-data">
                    <div class="row">
                    <!-- Product Name -->
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Machine Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <!-- Model -->
                    <div class="col-md-6 mb-3">
                        <label for="model" class="form-label">Model Number</label>
                        <input type="text" class="form-control" id="model" name="model" placeholder="e.g. STU-25" required>
                    </div>
                    </div>

                    <div class="row">
                    <!-- Capacity -->
                    <div class="col-md-6 mb-3">
                        <label for="capacity" class="form-label">Capacity (Litres)</label>
                        <input type="number" step="0.01" class="form-control" id="capacity" name="capacity">
                    </div>

                    <!-- Power -->
                    <div class="col-md-6 mb-3">
                        <label for="power" class="form-label">Power (Watts)</label>
                        <input type="number" class="form-control" id="power" name="power">
                    </div>
                    </div>

                    <!-- Industry Dropdown -->
                    <div class="mb-3">
                    <label for="industry_id" class="form-label">Industry</label>
                    <select class="form-select" id="industry_id" name="industry_id">
                        <option value="">-- Select Industry --</option>
                    </select>
                    </div>

                    <!-- Short Description -->
                    <div class="mb-3">
                    <label for="description" class="form-label">Short Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>

                    <!-- Specification (Summernote) -->
                    <div class="mb-3">
                    <label for="specification" class="form-label">Detailed Specification</label>
                    <textarea id="specification" name="specification"></textarea>
                    </div>

                    <div class="row">
                    <!-- Price Min -->
                    <div class="col-md-6 mb-3">
                        <label for="price_min" class="form-label">Minimum Price</label>
                        <input type="number" step="0.01" class="form-control" id="price_min" name="price_min">
                    </div>

                    <!-- Price Max -->
                    <div class="col-md-6 mb-3">
                        <label for="price_max" class="form-label">Maximum Price</label>
                        <input type="number" step="0.01" class="form-control" id="price_max" name="price_max">
                    </div>
                    </div>

                    <!-- Product Image -->
                    <div class="mb-3">
                    <label for="image_url" class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*">
                    </div>


                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary">Save Product</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
  </x-slot:content>
</x-admin.layout.app>