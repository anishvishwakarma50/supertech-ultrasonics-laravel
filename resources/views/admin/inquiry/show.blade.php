{{-- Inquiry Details Page --}}
<x-admin.layout.app title="Inquiry Details">
    {{-- main content --}}
    <x-slot:content>
        <div class="content-wrapper">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Inquiry Details</h4>

                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Lead Information</h5>
                                    <table class="table table-borderless">
                                        <tr>
                                            <th>Company Name:</th>
                                            <td>{{ $inquiry->lead->company_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Person:</th>
                                            <td>{{ $inquiry->lead->contact_person_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone:</th>
                                            <td>{{ $inquiry->lead->phone_no }}</td>
                                        </tr>
                                        <tr>
                                            <th>Location:</th>
                                            <td>{{ $inquiry->lead->location }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <h5>Product Information</h5>
                                    <table class="table table-borderless">
                                        <tr>
                                            <th>Product:</th>
                                            <td>{{ $inquiry->product->title }}</td>
                                        </tr>
                                        <tr>
                                            <th>Description:</th>
                                            <td>{{ $inquiry->product->description }}</td>
                                        </tr>
                                        <tr>
                                            <th>MOQ:</th>
                                            <td>{{ $inquiry->product->moq }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    <h5>Inquiry Details</h5>
                                    <div class="card">
                                        <div class="card-body">
                                            <p><strong>Description:</strong></p>
                                            <p>{{ $inquiry->description }}</p>
                                            <p><strong>Inquiry Date:</strong> {{ $inquiry->created_at->format('d M Y H:i') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    <a href="{{ route('inquiry.index') }}" class="btn btn-secondary">Back to Inquiries</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot:content>
</x-admin.layout.app>