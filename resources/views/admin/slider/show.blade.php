{{-- this is the View Slider page --}}
<x-admin.layout.app title="View Slider">
  {{-- main content --}}
  <x-slot:content>
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-xl-8 align-self-center">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">{{ $slider->heading }}</h4>
                
                <div class="row">
                    <div class="col-md-4">
                        @if($slider->image)
                            <img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->heading }}" class="img-fluid">
                        @else
                            <div class="alert alert-info">No image available</div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <h5>Details:</h5>
                        <table class="table table-borderless">
                            <tr>
                                <th>ID:</th>
                                <td>{{ $slider->id }}</td>
                            </tr>
                            <tr>
                                <th>Heading:</th>
                                <td>{{ $slider->heading }}</td>
                            </tr>
                            <tr>
                                <th>Sub Heading:</th>
                                <td>{{ $slider->{'sub-heading'} ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Created At:</th>
                                <td>{{ $slider->created_at->format('Y-m-d H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Updated At:</th>
                                <td>{{ $slider->updated_at->format('Y-m-d H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                </div>
                <div class="card-footer">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('slider.destroy', $slider->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
  </x-slot:content>
</x-admin.layout.app>
