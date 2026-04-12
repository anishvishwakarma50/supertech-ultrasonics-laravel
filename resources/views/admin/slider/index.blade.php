{{-- this is the Sliders List page --}}
<x-admin.layout.app title="Sliders">
  {{-- main content --}}
  <x-slot:content>
    <div class="content-wrapper">
        <div class="row mb-4">
            <div class="col-md-8">
                <h4 class="card-title">Sliders</h4>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('slider.create') }}" class="btn btn-primary">Add Slider</a>
            </div>
        </div>

        @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                @if($sliders->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Heading</th>
                                    <th>Sub Heading</th>
                                    <th>Image</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $slider)
                                    <tr>
                                        <td>{{ $slider->id }}</td>
                                        <td>{{ $slider->heading }}</td>
                                        <td>{{ Str::limit($slider->{'sub-heading'}, 50) }}</td>
                                        <td>
                                            @if($slider->image)
                                                <img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->heading }}" style="max-width: 80px; max-height: 80px;">
                                            @else
                                                <span class="text-muted">No image</span>
                                            @endif
                                        </td>
                                        <td>{{ $slider->created_at->format('Y-m-d H:i') }}</td>
                                        <td>
                                            <a href="{{ route('slider.show', $slider->id) }}" class="btn btn-sm btn-info">View</a>
                                            <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('slider.destroy', $slider->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info" role="alert">
                        No sliders found. <a href="{{ route('slider.create') }}">Create one now</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
  </x-slot:content>
</x-admin.layout.app>
