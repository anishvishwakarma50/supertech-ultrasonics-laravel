{{-- Testimonial Details Page --}}
<x-admin.layout.app title="View Testimonial">
  {{-- main content --}}
  <x-slot:content>
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Testimonial Details</h4>
                        
                        <div class="row mb-4">
                            <div class="col-md-12 text-center mb-3">
                                <img src="{{ asset('storage/'.$testimonial->image_path) }}" alt="{{ $testimonial->name }}" style="max-width: 300px; max-height: 300px; border-radius: 8px;">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><strong>Name:</strong></label>
                                <p>{{ $testimonial->name }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><strong>Designation:</strong></label>
                                <p>{{ $testimonial->designation }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label"><strong>Comment:</strong></label>
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <p>{{ $testimonial->comment }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label"><strong>Created at:</strong></label>
                                <p>{{ $testimonial->created_at->format('d M Y H:i') }}</p>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <a href="{{ route('testimonial.edit', $testimonial->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('testimonial.index') }}" class="btn btn-secondary">Back to List</a>
                                
                                <form action="{{ route('testimonial.destroy', $testimonial->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </x-slot:content>
</x-admin.layout.app>
