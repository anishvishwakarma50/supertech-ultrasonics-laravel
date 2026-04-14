{{-- this is the Edit Product page --}}
<x-admin.layout.app title="Edit Product">
  {{-- main content --}}
  <x-slot:content>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Product</h4>
                        <p class="card-description">Update ultrasonic machine details</p>

                        @if(session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif

                        <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data" class="forms-sample">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                                <label for="title">Machine Name *</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" 
                                    value="{{ old('title', $product->title) }}" required>
                                @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="moq">MOQ *</label>
                                <input type="text" class="form-control @error('moq') is-invalid @enderror" id="moq" name="moq" 
                                    value="{{ old('moq', $product->moq) }}" required>
                                @error('moq')<span class="invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Description *</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description', $product->description) }}</textarea>
                                @error('description')<span class="invalid-feedback">{{ $message }}</span>@enderror
                            </div>

                            <h5 class="mt-4">Specification</h5>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="usage">Usage</label>
                                        <input type="text" class="form-control @error('usage') is-invalid @enderror" id="usage" name="usage" 
                                            value="{{ old('usage', $product->specification->usage) }}">
                                        @error('usage')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="material">Material</label>
                                        <input type="text" class="form-control @error('material') is-invalid @enderror" id="material" name="material" 
                                            value="{{ old('material', $product->specification->material) }}">
                                        @error('material')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="weight">Weight</label>
                                        <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" 
                                            value="{{ old('weight', $product->specification->weight) }}">
                                        @error('weight')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="voltage">Voltage (Watts)</label>
                                        <input type="text" class="form-control @error('voltage') is-invalid @enderror" id="voltage" name="voltage" 
                                            value="{{ old('voltage', $product->specification->voltage) }}">
                                        @error('voltage')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="color">Color</label>
                                        <input type="text" class="form-control @error('color') is-invalid @enderror" id="color" name="color" 
                                            value="{{ old('color', $product->specification->color) }}">
                                        @error('color')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="frequency">Frequency</label>
                                        <input type="text" class="form-control @error('frequency') is-invalid @enderror" id="frequency" name="frequency" 
                                            value="{{ old('frequency', $product->specification->frequency) }}">
                                        @error('frequency')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="temperature">Temperature</label>
                                <input type="number" step="0.01" class="form-control @error('temperature') is-invalid @enderror" id="temperature" name="temperature" 
                                    value="{{ old('temperature', $product->specification->temperature) }}">
                                @error('temperature')<span class="invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                            
                            <div class="form-group">
                                <label>Product Images</label>
                                
                                @if($product->images->count() > 0)
                                    <div class="mb-3">
                                        <p class="text-muted">Current Images:</p>
                                        <div class="row">
                                            @foreach($product->images as $image)
                                                <div class="col-md-3 mb-3">
                                                    <div class="card">
                                                        <img src="{{ asset('storage/' . $image->image_path) }}" class="card-img-top" alt="Product image" style="height: 150px; object-fit: cover;">
                                                        <div class="card-body">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="delete_image_{{ $image->id }}" name="delete_images[]" value="{{ $image->id }}">
                                                                <label class="form-check-label" for="delete_image_{{ $image->id }}">Delete</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                
                                <div class="form-group mt-3">
                                    <label for="images">Add New Images</label>
                                    <input type="file" class="form-control @error('images') is-invalid @enderror" id="images" name="images[]" accept="image/*" multiple>
                                    <small class="form-text text-muted">You can select multiple images. Supported formats: JPG, PNG, GIF, WEBP (max 5MB each)</small>
                                    @error('images')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary mr-2">Update Product</button>
                            <a href="{{ route('product.index') }}" class="btn btn-light">Cancel</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

  </x-slot:content>
</x-admin.layout.app>