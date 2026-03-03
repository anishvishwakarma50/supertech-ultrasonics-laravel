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

                <form id="productForm" method="POST" action="{{ route('product.store') }}">
                    @csrf
                    <div class="row">
                        <!-- Product Name -->
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Machine Name</label>
                            <input type="text" class="form-control" id="name" name="title" required>
                        </div>

                        <!-- Moq -->
                        <div class="col-md-6 mb-3">
                            <label for="moq" class="form-label">MOQ</label>
                            <input type="text" class="form-control" id="moq" name="moq" placeholder="2" required>
                        </div>
                    </div>

                    {{-- Decription --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description"></textarea>
                    </div>
                    
                    <h5 class="">Specification</h5>
                    {{-- Specification Details --}}
                    <div class="row">
                        <!-- Usage -->
                        <div class="col-md-6 mb-3">
                            <label for="usage" class="form-label">Usage</label>
                            <input type="text" class="form-control" id="usage" name="usage">
                        </div>

                        <!-- Material -->
                        <div class="col-md-6 mb-3">
                            <label for="material" class="form-label">Material</label>
                            <input type="text" class="form-control" id="material" name="material">
                        </div>
                    </div>
                    
                    <div class="row">
                        <!-- Weight -->
                        <div class="col-md-6 mb-3">
                            <label for="weight" class="form-label">Weight</label>
                            <input type="number" class="form-control" id="weight" name="weight">
                        </div>

                        <!-- Voltage -->
                        <div class="col-md-6 mb-3">
                            <label for="voltage" class="form-label">Voltage (Watts)</label>
                            <input type="text" class="form-control" id="voltage" name="voltage">
                        </div>
                    </div>
                    
                    <div class="row">
                        <!-- Color -->
                        <div class="col-md-6 mb-3">
                            <label for="color" class="form-label">Color</label>
                            <input type="text" class="form-control" id="color" name="color">
                        </div>

                        <!-- Frequency -->
                        <div class="col-md-6 mb-3">
                            <label for="frequency" class="form-label">Frequency</label>
                            <input type="text" class="form-control" id="frequency" name="frequency">
                        </div>
                    </div>

                    <div class="row">
                        <!-- Temperature -->
                        <div class="col-md-6 mb-3">
                            <label for="temperature" class="form-label">Tempreature</label>
                            <input type="number" step="0.01" class="form-control" id="temperature" name="temperature">
                        </div>
                    </div>

                    <!-- Product Image -->
                    {{-- <div class="mb-3">
                    <label for="image_url" class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*">
                    </div> --}}


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