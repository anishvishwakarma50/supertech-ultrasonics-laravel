{{-- this is the Leads List page --}}
<x-admin.layout.app title="Leads">
  {{-- main content --}}
  <x-slot:content>
    <div class="content-wrapper">
        <div class="row mb-4">
            <div class="col-md-8">
                <h4 class="card-title">Leads</h4>
            </div>
        </div>

        {{-- Search Form --}}
        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('lead.index') }}" class="row g-3">
                    <div class="col-md-8">
                        <input type="text" name="search" class="form-control" placeholder="Search by company name, contact person, phone, or location..." value="{{ $search }}">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary w-100">Search</button>
                        @if($search)
                            <a href="{{ route('lead.index') }}" class="btn btn-secondary w-100 mt-2">Clear</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                @if($leads->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Company Name</th>
                                    <th>Contact Person</th>
                                    <th>Phone</th>
                                    <th>Location</th>
                                    <th>Inquiries</th>
                                    <th>Created Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($leads as $lead)
                                    <tr>
                                        <td>#{{ $lead->id }}</td>
                                        <td><strong>{{ $lead->company_name }}</strong></td>
                                        <td>{{ $lead->contact_person_name }}</td>
                                        <td>{{ $lead->phone_no }}</td>
                                        <td>{{ $lead->location }}</td>
                                        <td>
                                            <span class="badge badge-primary">{{ $lead->inquiries->count() }}</span>
                                        </td>
                                        <td>{{ $lead->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('lead.show', $lead->id) }}" class="btn btn-sm btn-info">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center mt-4">
                        {{ $leads->links() }}
                    </div>
                @else
                    <div class="alert alert-info" role="alert">
                        @if($search)
                            No leads found matching "{{ $search }}".
                        @else
                            No leads found.
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
  </x-slot:content>
</x-admin.layout.app>
