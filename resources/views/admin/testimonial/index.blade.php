{{-- this is the Add Testimonials page --}}
<x-admin.layout.app title="Testimonials">
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
                <h4 class="card-title">Manage Testimonials</h4>
                <p class="card-description">Search, View, Edit, and Delete Testimonials</p>

                <!-- Search Input -->
                <div class="mb-3">
                <input type="text" id="testimonialSearch" class="form-control" placeholder="Search by any keyword...">
                </div>

                <!-- Testimonials Table -->
                <div class="table-responsive">
                <table class="table" id="testimonialTable">
                    <thead class="table-light">
                    <tr>
                        <th>Image</th>
                        <th>Designation</th>
                        <th>Name</th>
                        <th>Comment</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimonials as $testimonial)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/'.$testimonial->image_path) }}" class="product-img" alt="{{ $testimonial->name }}">
                                </td>
                                <td>{{ $testimonial->designation }}</td>
                                <td>{{ $testimonial->name }}</td>
                                <td>{{ $testimonial->comment }}</td>
                                <td>
                                    <span class="badge badge-success status-badge">Active</span>
                                </td>
                                <td class="action-buttons">

                                    <!-- View Button -->
                                    <a href="{{ route('testimonial.show', $testimonial->id) }}" 
                                    class="btn btn-sm btn-primary">
                                        View
                                    </a>

                                    <!-- Edit -->
                                    <a href="{{ route('testimonial.edit', $testimonial->id) }}" 
                                    class="btn btn-sm btn-info">
                                        Edit
                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('testimonial.destroy', $testimonial->id) }}" 
                                        method="POST" 
                                        style="display:inline-block;"
                                        onsubmit="return confirm('Are you sure you want to delete this testimonial?');">

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

    </div>
    <!-- content-wrapper ends -->
  </x-slot:content>
</x-admin.layout.app>