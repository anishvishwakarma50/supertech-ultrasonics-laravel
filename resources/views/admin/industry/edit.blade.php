{{-- this is the Edit Industry page --}}
<x-admin.layout.app title="Edit Industry">
  {{-- main content --}}
  <x-slot:content>
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-xl-8 align-self-center">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Edit Industry</h4>
                
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

                <form id="industryForm" method="POST" action="{{ route('industry.update', $industry->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    {{-- Industry Heading --}}
                    <div class="mb-3">
                        <label for="heading" class="form-label">Industry Heading <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('heading') is-invalid @enderror" id="heading" name="heading" value="{{ old('heading', $industry->heading) }}" required>
                        @error('heading')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Industry Image --}}
                    <div class="mb-3">
                        <label for="image" class="form-label">Industry Image</label>
                        @if($industry->image)
                            <div class="mb-2">
                                <p class="font-weight-bold">Current Image:</p>
                                <img src="{{ asset('storage/' . $industry->image) }}" alt="{{ $industry->heading }}" style="max-width: 200px; max-height: 200px;">
                            </div>
                        @endif
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                        <small class="form-text text-muted">Leave empty to keep current image. Supported formats: JPEG, PNG, JPG, GIF (Max: 2MB)</small>
                        @error('image')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('industry.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update Industry</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
  </x-slot:content>
</x-admin.layout.app>
