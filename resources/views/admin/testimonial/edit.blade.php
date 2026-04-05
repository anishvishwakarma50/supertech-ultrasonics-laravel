{{-- Edit Testimonial Page --}}
<x-admin.layout.app title="Edit Testimonial">
  {{-- main content --}}
  <x-slot:content>
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-xl-8 align-self-center">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Edit Testimonial</h4>
                
                <!-- Status message container -->
                <div id="statusMessage" class="alert d-none"></div>

                <form id="testimonialForm" method="POST" enctype="multipart/form-data" action="{{ route('testimonial.update', $testimonial->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $testimonial->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Designation -->
                        <div class="col-md-6 mb-3">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" class="form-control @error('designation') is-invalid @enderror" id="designation" name="designation" value="{{ old('designation', $testimonial->designation) }}" required>
                            @error('designation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <!-- Comment -->
                        <div class="col-md-12 mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment" rows="4" required>{{ old('comment', $testimonial->comment) }}</textarea>
                            @error('comment')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Current Image -->
                        <div class="col-md-12 mb-3">
                            <label for="current_image" class="form-label">Current Image</label>
                            <div>
                                <img src="{{ asset('storage/'.$testimonial->image_path) }}" alt="{{ $testimonial->name }}" style="max-width: 200px; max-height: 200px;">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Image -->
                        <div class="col-md-12 mb-3">
                            <label for="image" class="form-label">Image (Optional - Leave empty to keep current)</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary">Update Testimonial</button>
                    <a href="{{ route('testimonial.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
  </x-slot:content>
</x-admin.layout.app>
