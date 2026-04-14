{{-- this is the View Contact Details page --}}
<x-admin.layout.app title="Contact Details">
  {{-- main content --}}
  <x-slot:content>
    <div class="content-wrapper">
        <div class="row mb-4">
            <div class="col-md-8">
                <h4 class="card-title">Message from {{ $contact->name }}</h4>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('contact.index') }}" class="btn btn-secondary">Back to Contacts</a>
            </div>
        </div>

        {{-- Contact Details Card --}}
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title mb-3">Sender Information</h5>
                        <table class="table table-borderless">
                            <tr>
                                <th style="width: 40%;">ID:</th>
                                <td>#{{ $contact->id }}</td>
                            </tr>
                            <tr>
                                <th>Name:</th>
                                <td><strong>{{ $contact->name }}</strong></td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>
                                    <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                </td>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <td>
                                    @if($contact->phone)
                                        <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                                    @else
                                        <span class="text-muted">Not provided</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Subject:</th>
                                <td><strong>{{ $contact->subject }}</strong></td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>
                                    @if($contact->is_read)
                                        <span class="badge bg-success">Read</span>
                                    @else
                                        <span class="badge bg-warning">Unread</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Received:</th>
                                <td>{{ $contact->created_at->format('d M Y H:i:s') }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h5 class="card-title mb-3">Actions</h5>
                        <div class="d-flex gap-2 flex-wrap">
                            @if($contact->is_read)
                                <form action="{{ route('contact.mark-as-unread', $contact->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm">Mark as Unread</button>
                                </form>
                            @else
                                <form action="{{ route('contact.mark-as-read', $contact->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Mark as Read</button>
                                </form>
                            @endif
                            
                            <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Are you sure you want to delete this contact?')">
                                    Delete Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Message Content Card --}}
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Message Content</h5>
                <div class="bg-light p-4 rounded">
                    {{ nl2br(e($contact->message)) }}
                </div>
            </div>
        </div>
    </div>
  </x-slot:content>
</x-admin.layout.app>
