{{-- this is the dashboard page --}}

<x-admin.layout.app title="Dashboard">
  {{-- main content --}}
  <x-slot:content>
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">Welcome to Dashboard</h3>
              <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">{{ $totalInquiries }} unread inquiries</span></h6>
            </div>
            <div class="col-12 col-xl-4">
              <div class="justify-content-end d-flex">
                {{-- Date selector can be added here if needed --}}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card tale-bg">
            <div class="card-people mt-auto">
              <img src="assets2/images/dashboard/people.svg" alt="people">
              <div class="weather-info">
                <div class="d-flex">
                  <div>
                    <h2 class="mb-0 font-weight-normal"><i class="icon-sun me-2"></i>31<sup>C</sup></h2>
                  </div>
                  <div class="ms-2">
                    <h4 class="location font-weight-normal">Chicago</h4>
                    <h6 class="font-weight-normal">Illinois</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 grid-margin transparent">
          <div class="row">
            <div class="col-md-6 mb-4 stretch-card transparent">
              <div class="card card-tale">
                <div class="card-body">
                  <p class="mb-4">Products Today</p>
                  <p class="fs-30 mb-2">{{ $productsToday }}</p>
                  <p>{{ $productsThisMonth }} this month</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-4 stretch-card transparent">
              <div class="card card-dark-blue">
                <div class="card-body">
                  <p class="mb-4">Total Products</p>
                  <p class="fs-30 mb-2">{{ $totalProducts }}</p>
                  <p>All products in system</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
              <div class="card card-light-blue">
                <div class="card-body">
                  <p class="mb-4">Total Inquiries</p>
                  <p class="fs-30 mb-2">{{ $totalInquiries }}</p>
                  <p>{{ $inquiriesThisMonth }} this month</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 stretch-card transparent">
              <div class="card card-light-danger">
                <div class="card-body">
                  <p class="mb-4">Total Leads</p>
                  <p class="fs-30 mb-2">{{ $totalLeads }}</p>
                  <p>Active leads</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- Charts and Carousel sections removed - can be added back with real data later --}}
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title mb-0">Recent Products</p>
              <div class="table-responsive">
                <table class="table table-striped table-borderless">
                  <thead>
                    <tr>
                      <th>Product Name</th>
                      <th>Description</th>
                      <th>MOQ</th>
                      <th>Created Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($recentProducts as $product)
                      <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ Str::limit($product->description, 50) }}</td>
                        <td class="font-weight-bold">{{ $product->moq }}</td>
                        <td>{{ $product->created_at->format('d M Y') }}</td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="4" class="text-center text-muted">No products found</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title mb-0">Recent Inquiries</p>
              <div class="table-responsive">
                <table class="table table-striped table-borderless">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Product</th>
                      <th>Description</th>
                      <th>Created Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($recentInquiries as $inquiry)
                      <tr>
                        <td>#{{ $inquiry->id }}</td>
                        <td>{{ $inquiry->product?->title ?? 'N/A' }}</td>
                        <td>{{ Str::limit($inquiry->description, 50) }}</td>
                        <td>{{ $inquiry->created_at->format('d M Y H:i') }}</td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="4" class="text-center text-muted">No inquiries found</td>
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