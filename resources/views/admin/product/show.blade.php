{{-- this is the Add Product page --}}
<x-admin.layout.app title="Add Product">
  {{-- main content --}}
  <x-slot:content>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Product</h4>
                        <p class="card-description">Update ultrasonic machine details</p>

                        <!-- Dummy Success Message -->
                        <div class="alert alert-success">Product updated successfully!</div>

                        <form method="POST" enctype="multipart/form-data" class="forms-sample">
                            
                            <div class="form-group">
                                <label for="name">Machine Name *</label>
                                <input type="text" class="form-control" id="name" name="name" 
                                    value="Ultrasonic Cleaner 20L" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="model">Model Number *</label>
                                <input type="text" class="form-control" id="model" name="model" 
                                    value="UC-20-PRO" required>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="capacity">Capacity (Liters)</label>
                                        <input type="number" step="0.01" class="form-control" id="capacity" name="capacity" 
                                            value="20">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="power">Power (Watts)</label>
                                        <input type="number" class="form-control" id="power" name="power" 
                                            value="800">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price_min">Minimum Price (₹)</label>
                                        <input type="number" step="0.01" class="form-control" id="price_min" name="price_min" 
                                            value="45000">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price_max">Maximum Price (₹)</label>
                                        <input type="number" step="0.01" class="form-control" id="price_max" name="price_max" 
                                            value="55000">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="industry_id">Industry</label>
                                <select class="form-control" id="industry_id" name="industry_id">
                                    <option value="">Select Industry</option>
                                    <option value="1">Automobile</option>
                                    <option value="2" selected>Medical</option>
                                    <option value="3">Electronics</option>
                                    <option value="4">Jewellery</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3">
                                    High performance 20L ultrasonic cleaning machine suitable for medical and industrial use.
                                </textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="specification">Specifications</label>
                                <textarea class="form-control" id="specification" name="specification" rows="6">
                                    - Tank Capacity: 20 Liters
                                    - Power: 800 Watts
                                    - Frequency: 40 kHz
                                    - Material: Stainless Steel
                                    - Timer: Digital
                                    - Heating Function: Yes
                                </textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>Product Image</label>
                                <div class="mb-3">
                                    <img src="images/product2.jpg" class="current-image" alt="Current Product Image">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="remove_image" name="remove_image" value="1">
                                        <label class="form-check-label" for="remove_image">Remove current image</label>
                                    </div>
                                </div>
                                
                                <input type="file" class="form-control-file" id="image_url" name="image_url" accept="image/*">
                                <small class="form-text text-muted">Allowed formats: JPG, PNG, GIF, WebP</small>
                                <div id="imagePreview" class="mt-2"></div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary mr-2">Update Product</button>
                            <a href="products.html" class="btn btn-light">Cancel</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

  </x-slot:content>
</x-admin.layout.app>