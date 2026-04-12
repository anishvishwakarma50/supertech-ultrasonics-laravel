{{-- this is the View Lead Details page --}}
<x-admin.layout.app title="Lead Details">
  {{-- main content --}}
  <x-slot:content>
    <div class="content-wrapper">
        <div class="row mb-4">
            <div class="col-md-8">
                <h4 class="card-title">{{ $lead->company_name }}</h4>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('lead.index') }}" class="btn btn-secondary">Back to Leads</a>
            </div>
        </div>

        {{-- Lead Details Card --}}
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title mb-3">Lead Information</h5>
                        <table class="table table-borderless">
                            <tr>
                                <th style="width: 40%;">ID:</th>
                                <td>#{{ $lead->id }}</td>
                            </tr>
                            <tr>
                                <th>Company:</th>
                                <td>{{ $lead->company_name }}</td>
                            </tr>
                            <tr>
                                <th>Contact Person:</th>
                                <td>{{ $lead->contact_person_name }}</td>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <td>
                                    <a href="tel:{{ $lead->phone_no }}">{{ $lead->phone_no }}</a>
                                </td>
                            </tr>
                            <tr>
                                <th>Location:</th>
                                <td>{{ $lead->location }}</td>
                            </tr>
                            <tr>
                                <th>Created At:</th>
                                <td>{{ $lead->created_at->format('d M Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Updated At:</th>
                                <td>{{ $lead->updated_at->format('d M Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h5 class="card-title mb-3">Statistics</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <h3 class="text-primary">{{ $inquiries->count() }}</h3>
                                        <p class="mb-0">Total Inquiries</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <h3 class="text-success">{{ $inquiries->pluck('product_id')->unique()->count() }}</h3>
                                        <p class="mb-0">Unique Products</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Inquiries Card --}}
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Inquiries from {{ $lead->company_name }}</h5>
                
                @if($inquiries->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product</th>
                                    <th>Description</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inquiries as $inquiry)
                                    <tr>
                                        <td>#{{ $inquiry->id }}</td>
                                        <td>
                                            @if($inquiry->product)
                                                <a href="{{ route('product.show', $inquiry->product->id) }}" class="text-decoration-none">
                                                    {{ $inquiry->product->title }}
                                                </a>
                                            @else
                                                <span class="text-muted">Product Deleted</span>
                                            @endif
                                        </td>
                                        <td>{{ Str::limit($inquiry->description, 60) }}</td>
                                        <td>{{ $inquiry->created_at->format('d M Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info" role="alert">
                        No inquiries found from this lead yet.
                    </div>
                @endif
            </div>
        </div>
    </div>
  </x-slot:content>
</x-admin.layout.app>
