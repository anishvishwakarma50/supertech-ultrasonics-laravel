{{-- this is the Manage Site Content page --}}
<x-admin.layout.app title="Manage Site Content">
  {{-- main content --}}
  <x-slot:content>
    <div class="content-wrapper">
        <div class="row justify-content-center">
            @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col-xl-8 align-self-center">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Manage Site Content</h4>
                
                <!-- Status message container -->
                <div id="statusMessage" class="alert d-none"></div>

                <form id="siteContentForm" method="POST" action="{{ route('store-content') }}">
                    @csrf
                    {{-- Company History --}}
                    <div class="mb-3">
                        <label for="company_history" class="form-label">Company History</label>
                        <textarea id="company_history" name="company_history">{{ $siteData->company_history }}</textarea>
                    </div>
                    
                    {{-- Decription --}}
                    <div class="mb-3">
                        <label for="what_we_do" class="form-label">What We Do</label>
                        <textarea id="what_we_do" name="what_we_do">{{ $siteData->what_we_do }}</textarea>
                    </div>
                    
                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary">Save Content</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
  </x-slot:content>
</x-admin.layout.app>