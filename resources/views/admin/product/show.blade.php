{{-- this is the Product Details page --}}
<x-admin.layout.app title="View Product">
  {{-- main content --}}
  <x-slot:content>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h4 class="card-title">Product Details</h4>
                                <p class="card-description">{{ $product->title }}</p>
                            </div>
                            <div>
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('product.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <h5>Product Images</h5>
                                @if($product->images->count() > 0)
                                    <div class="row">
                                        @foreach($product->images as $image)
                                            <div class="col-md-12 mb-3">
                                                <img src="{{ asset('storage/' . $image->image_path) }}" class="img-fluid" alt="{{ $product->title }}" style="max-height: 200px;}">
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-muted">No images available</p>
                                @endif
                            </div>

                            <div class="col-md-8">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th>Product Name</th>
                                            <td><strong>{{ $product->title }}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>MOQ</th>
                                            <td>{{ $product->moq }}</td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td style="word-wrap: break-word; white-space: normal; max-width: 400px;">{{ $product->description }}</td>
                                        </tr>
                                        <tr>
                                            <th colspan="2"><h5 class="mt-3">Specifications</h5></th>
                                        </tr>
                                        <tr>
                                            <th>Usage</th>
                                            <td>{{ $product->specification->usage }}</td>
                                        </tr>
                                        <tr>
                                            <th>Material</th>
                                            <td>{{ $product->specification->material }}</td>
                                        </tr>
                                        <tr>
                                            <th>Weight</th>
                                            <td>{{ $product->specification->weight }}</td>
                                        </tr>
                                        <tr>
                                            <th>Voltage</th>
                                            <td>{{ $product->specification->voltage }}</td>
                                        </tr>
                                        <tr>
                                            <th>Color</th>
                                            <td>{{ $product->specification->color }}</td>
                                        </tr>
                                        <tr>
                                            <th>Frequency</th>
                                            <td>{{ $product->specification->frequency }}</td>
                                        </tr>
                                        <tr>
                                            <th>Temperature</th>
                                            <td>{{ $product->specification->temperature }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created At</th>
                                            <td>{{ $product->created_at->format('d M, Y') }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </x-slot:content>
</x-admin.layout.app>