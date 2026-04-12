{{-- this is the Add Slider page --}}
<x-admin.layout.app title="Add Slider">
  {{-- main content --}}
  <x-slot:content>
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-xl-8 align-self-center">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Add Slider</h4>
                
                <!-- Status message container -->
                <div id="statusMessage" class="alert d-none"></div>

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Please check the form below for errors.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="sliderForm" method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    {{-- Slider Heading --}}
                    <div class="mb-3">
                        <label for="heading" class="form-label">Heading <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('heading') is-invalid @enderror" id="heading" name="heading" value="{{ old('heading') }}" required>
                        @error('heading')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Slider Sub Heading --}}
                    <div class="mb-3">
                        <label for="sub-heading" class="form-label">Sub Heading</label>
                        <input type="text" class="form-control @error('sub-heading') is-invalid @enderror" id="sub-heading" name="sub-heading" value="{{ old('sub-heading') }}">
                        @error('sub-heading')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Slider Image --}}
                    <div class="mb-3">
                        <label for="image" class="form-label">Slider Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                        <small class="form-text text-muted">Supported formats: JPEG, PNG, JPG, GIF (Max: 2MB)</small>
                        @error('image')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('slider.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Slider</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
  </x-slot:content>
</x-admin.layout.app>
