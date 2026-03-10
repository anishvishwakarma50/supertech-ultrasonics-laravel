{{-- this is the Add testimonial page --}}
<x-admin.layout.app title="Add testimonial">
  {{-- main content --}}
  <x-slot:content>
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-xl-8 align-self-center">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Add Testimonial</h4>
                
                <!-- Status message container -->
                <div id="statusMessage" class="alert d-none"></div>

                <form id="testimonialForm" method="POST" action="{{ route('testimonial.store') }}">
                    @csrf
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <!-- Comment -->
                        <div class="col-md-6 mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <input type="text" class="form-control" id="comment" name="comment">
                        </div>
                    </div>
                    
                    <div class="row">
                        <!-- Designation -->
                        <div class="col-md-6 mb-3">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="designation" name="designation">
                        </div>

                        <!-- Image -->
                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="image" class="form-control" id="image" name="image">
                        </div>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary">Save Testimonial</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
  </x-slot:content>
</x-admin.layout.app>