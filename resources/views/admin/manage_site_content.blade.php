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

                <form id="siteContentForm" method="POST" action="{{ route('store-content') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- Company History --}}
                    <div class="mb-3">
                        <label for="company_history" class="form-label">Company History</label>
                        <textarea id="company_history" name="company_history" class="form-control" rows="4">{{ $siteData->company_history }}</textarea>
                    </div>
                    
                    {{-- What We Do --}}
                    <div class="mb-3">
                        <label for="what_we_do" class="form-label">What We Do</label>
                        <textarea id="what_we_do" name="what_we_do" class="form-control" rows="4">{{ $siteData->what_we_do }}</textarea>
                    </div>

                    {{-- About Company --}}
                    <div class="mb-3">
                        <label for="about_company" class="form-label">About Company</label>
                        <textarea id="about_company" name="about_company" class="form-control" rows="4">{{ $siteData->about_company }}</textarea>
                    </div>

                    <hr>

                    {{-- Contact Details Section --}}
                    <h5 class="mb-3">Contact Details</h5>

                    {{-- Contact Number 1 --}}
                    <div class="mb-3">
                        <label for="contact_details" class="form-label">Contact Number 1</label>
                        <input type="text" class="form-control" id="contact_details" name="contact_details" value="{{ $siteData->contact_details }}" placeholder="+92 XXX XXXXXXX">
                        @error('contact_details')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Contact Number 2 --}}
                    <div class="mb-3">
                        <label for="contact_number_2" class="form-label">Contact Number 2</label>
                        <input type="text" class="form-control" id="contact_number_2" name="contact_number_2" placeholder="+92 XXX XXXXXXX" value="{{ $siteData->contact_number_2 }}">
                        @error('contact_number_2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $siteData->email }}" placeholder="info@company.com">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Address --}}
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea id="address" name="address" class="form-control" rows="3">{{ $siteData->address }}</textarea>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <hr>

                    {{-- Social Media Section --}}
                    <h5 class="mb-3">Social Media Links</h5>

                    {{-- LinkedIn --}}
                    <div class="mb-3">
                        <label for="linkedin_url" class="form-label">LinkedIn URL</label>
                        <input type="url" class="form-control" id="linkedin_url" name="linkedin_url" value="{{ $siteData->linkedin_url }}" placeholder="https://linkedin.com/company/...">
                        @error('linkedin_url')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- YouTube --}}
                    <div class="mb-3">
                        <label for="youtube_url" class="form-label">YouTube URL</label>
                        <input type="url" class="form-control" id="youtube_url" name="youtube_url" value="{{ $siteData->youtube_url }}" placeholder="https://youtube.com/channel/...">
                        @error('youtube_url')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Instagram --}}
                    <div class="mb-3">
                        <label for="instagram_url" class="form-label">Instagram URL</label>
                        <input type="url" class="form-control" id="instagram_url" name="instagram_url" value="{{ $siteData->instagram_url }}" placeholder="https://instagram.com/...">
                        @error('instagram_url')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <hr>

                    {{-- Logo Upload --}}
                    <h5 class="mb-3">Logo</h5>
                    <div class="mb-3">
                        <label for="logo" class="form-label">Header Logo</label>
                        @if($siteData->logo)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $siteData->logo) }}" alt="Logo" style="max-height: 100px;">
                            </div>
                        @endif
                        <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                        <small class="form-text text-muted">PNG, JPG or GIF (Max: 2MB)</small>
                        @error('logo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
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