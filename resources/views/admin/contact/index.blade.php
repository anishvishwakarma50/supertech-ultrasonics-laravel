{{-- this is the Contacts List page --}}
<x-admin.layout.app title="Contact Messages">
  {{-- main content --}}
  <x-slot:content>
    <div class="content-wrapper">
        <div class="row mb-4">
            <div class="col-md-8">
                <h4 class="card-title">Contact Messages</h4>
            </div>
            <div class="col-md-4 text-end">
                @if($contacts->total() > 0)
                    <form action="{{ route('contact.delete-all') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" 
                                onclick="return confirm('Are you sure you want to delete all contacts?')">
                            Delete All
                        </button>
                    </form>
                @endif
            </div>
        </div>

        {{-- Search and Filter Form --}}
        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('contact.index') }}" class="row g-3">
                    <div class="col-md-6">
                        <input type="text" name="search" class="form-control" placeholder="Search by name, email, subject..." value="{{ $search }}">
                    </div>
                    <div class="col-md-3">
                        <select name="status" class="form-control">
                            <option value="all" @if($status === 'all') selected @endif>All Messages</option>
                            <option value="unread" @if($status === 'unread') selected @endif>Unread</option>
                            <option value="read" @if($status === 'read') selected @endif>Read</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Contacts Table --}}
        <div class="card">
            <div class="card-body">
                @if($contacts->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">ID</th>
                                    <th style="width: 20%;">Name</th>
                                    <th style="width: 25%;">Email</th>
                                    <th style="width: 30%;">Subject</th>
                                    <th style="width: 8%;">Status</th>
                                    <th style="width: 12%;">Date</th>
                                    <th style="width: 15%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                    <tr @if(!$contact->is_read) class="table-active" @endif>
                                        <td>#{{ $contact->id }}</td>
                                        <td>
                                            <strong>{{ $contact->name }}</strong>
                                            @if(!$contact->is_read)
                                                <span class="badge bg-danger ms-2">NEW</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                        </td>
                                        <td>{{ Str::limit($contact->subject, 40) }}</td>
                                        <td>
                                            @if($contact->is_read)
                                                <span class="badge bg-success">Read</span>
                                            @else
                                                <span class="badge bg-warning">Unread</span>
                                            @endif
                                        </td>
                                        <td>{{ $contact->created_at->format('d M Y H:i') }}</td>
                                        <td>
                                            <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-sm btn-info">View</a>
                                            <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" 
                                                        onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center mt-4">
                        {{ $contacts->links() }}
                    </div>
                @else
                    <div class="alert alert-info" role="alert">
                        @if($search || $status !== 'all')
                            No contacts found matching your criteria.
                        @else
                            No contacts yet.
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
  </x-slot:content>
</x-admin.layout.app>
