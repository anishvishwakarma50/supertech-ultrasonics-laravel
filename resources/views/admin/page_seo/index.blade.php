{{-- Page SEO Management --}}
<x-admin.layout.app title="Manage SEO">
  {{-- main content --}}
  <x-slot:content>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Manage Page SEO Settings</h4>
                        <p class="card-description">Configure SEO meta tags and social media settings for your pages</p>

                        @if(session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            @foreach($availablePages as $pageName => $pageLabel)
                                <li class="nav-item">
                                    <a class="nav-link @if($loop->first) active @endif" id="{{ $pageName }}-tab" data-bs-toggle="tab" href="#{{ $pageName }}" role="tab">
                                        {{ $pageLabel }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Tab content -->
                        <div class="tab-content mt-4">
                            @foreach($availablePages as $pageName => $pageLabel)
                                <div class="tab-pane fade @if($loop->first) show active @endif" id="{{ $pageName }}" role="tabpanel">
                                    <form method="POST" action="{{ route('store-seo') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="page_name" value="{{ $pageName }}">

                                        <div class="form-group mb-3">
                                            <label for="meta_title_{{ $pageName }}">Meta Title (Max 60 characters)</label>
                                            <input type="text" 
                                                class="form-control @error('meta_title') is-invalid @enderror" 
                                                id="meta_title_{{ $pageName }}" 
                                                name="meta_title"
                                                value="{{ old('meta_title', $pageSeos->get($pageName)->meta_title ?? '') }}"
                                                maxlength="60"
                                                placeholder="Enter meta title for search engines">
                                            <small class="form-text text-muted">Recommended: 50-60 characters. This appears in search engine results.</small>
                                            @error('meta_title')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="meta_description_{{ $pageName }}">Meta Description (Max 160 characters)</label>
                                            <textarea 
                                                class="form-control @error('meta_description') is-invalid @enderror" 
                                                id="meta_description_{{ $pageName }}" 
                                                name="meta_description"
                                                rows="3"
                                                maxlength="160"
                                                placeholder="Enter meta description for search engines">{{ old('meta_description', $pageSeos->get($pageName)->meta_description ?? '') }}</textarea>
                                            <small class="form-text text-muted">Recommended: 150-160 characters. This appears below the title in search results.</small>
                                            @error('meta_description')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                        </div>

                                        <hr class="my-4">

                                        <h5 class="mt-4 mb-3">Open Graph Settings (Social Media)</h5>

                                        <div class="form-group mb-3">
                                            <label for="og_title_{{ $pageName }}">Open Graph Title (Max 100 characters)</label>
                                            <input type="text" 
                                                class="form-control @error('og_title') is-invalid @enderror" 
                                                id="og_title_{{ $pageName }}" 
                                                name="og_title"
                                                value="{{ old('og_title', $pageSeos->get($pageName)->og_title ?? '') }}"
                                                maxlength="100"
                                                placeholder="Title when shared on social media">
                                            <small class="form-text text-muted">Used when page is shared on Facebook, LinkedIn, Twitter, etc.</small>
                                            @error('og_title')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="og_description_{{ $pageName }}">Open Graph Description (Max 160 characters)</label>
                                            <textarea 
                                                class="form-control @error('og_description') is-invalid @enderror" 
                                                id="og_description_{{ $pageName }}" 
                                                name="og_description"
                                                rows="3"
                                                maxlength="160"
                                                placeholder="Description when shared on social media">{{ old('og_description', $pageSeos->get($pageName)->og_description ?? '') }}</textarea>
                                            <small class="form-text text-muted">Description displayed in social media previews.</small>
                                            @error('og_description')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="og_image_{{ $pageName }}">Open Graph Image</label>
                                            
                                            @if($pageSeos->get($pageName) && $pageSeos->get($pageName)->og_image)
                                                <div class="mb-3">
                                                    <p class="text-muted mb-2">Current Image:</p>
                                                    <div class="card" style="width: 250px;">
                                                        <img src="{{ asset('storage/' . $pageSeos->get($pageName)->og_image) }}" 
                                                            class="card-img-top" 
                                                            alt="OG image" 
                                                            style="height: 150px; object-fit: cover;">
                                                        <div class="card-body">
                                                            <div class="form-check">
                                                                <input type="checkbox" 
                                                                    class="form-check-input" 
                                                                    id="delete_og_image_{{ $pageName }}" 
                                                                    name="delete_og_image" 
                                                                    value="1">
                                                                <label class="form-check-label" for="delete_og_image_{{ $pageName }}">
                                                                    Delete this image
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            <input type="file" 
                                                class="form-control @error('og_image') is-invalid @enderror" 
                                                id="og_image_{{ $pageName }}" 
                                                name="og_image" 
                                                accept="image/*">
                                            <small class="form-text text-muted">
                                                Recommended size: 1200x630px. Supported formats: JPG, PNG, GIF, WEBP (Max 5MB). 
                                                This image is displayed in social media previews.
                                            </small>
                                            @error('og_image')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary">Save SEO Settings</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </x-slot:content>
</x-admin.layout.app>
