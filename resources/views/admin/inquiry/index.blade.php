{{-- Inquiries Index Page --}}
<x-admin.layout.app title="Manage Inquiries">
    {{-- main content --}}
    <x-slot:content>
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">All Inquiries</h4>

                            @if(session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Company</th>
                                            <th>Contact Person</th>
                                            <th>Phone</th>
                                            <th>Product</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($inquiries as $inquiry)
                                            <tr>
                                                <td>{{ $inquiry->id }}</td>
                                                <td>{{ $inquiry->lead->company_name }}</td>
                                                <td>{{ $inquiry->lead->contact_person_name }}</td>
                                                <td>{{ $inquiry->lead->phone_no }}</td>
                                                <td>{{ $inquiry->product->title }}</td>
                                                <td>{{ Str::limit($inquiry->description, 50) }}</td>
                                                <td>{{ $inquiry->created_at->format('d M Y') }}</td>
                                                <td>
                                                    <a href="{{ route('inquiry.show', $inquiry->id) }}" class="btn btn-sm btn-info">View</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">No inquiries found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot:content>
</x-admin.layout.app>