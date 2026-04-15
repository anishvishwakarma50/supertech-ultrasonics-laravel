<x-admin.layout.app title="Edit Product">
    <x-slot:content>

        <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/decoupled-document/ckeditor.js"></script>

        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">

                    <div class="card">
                        <div class="card-body">

                            <h4 class="mb-4">Edit Product</h4>

                            <form method="POST" action="{{ route('product.update', $product->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- BASIC DETAILS --}}
                                <h5 class="mb-3">Basic Details</h5>

                                <div class="mb-3">
                                    <label class="form-label">Machine Name *</label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ old('title', $product->title) }}" required>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Minimum Order Quantity (MOQ) *</label>
                                    <input type="text" class="form-control" name="moq"
                                        value="{{ old('moq', $product->moq) }}" required>
                                </div>

                                {{-- DESCRIPTION --}}
                                <div class="mb-4">
                                    <label class="form-label">Product Description *</label>
                                    <div id="description_toolbar"></div>
                                    <div id="description_editor" class="form-control"
                                        style="height:300px;overflow:auto;">
                                        {!! old('description', $product->description) !!}
                                    </div>
                                    <textarea id="description" name="description" hidden></textarea>
                                </div>

                                {{-- SPECIFICATION --}}
                                <h5 class="mb-3">Specifications</h5>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Usage</label>
                                        <input type="text" class="form-control" name="usage"
                                            value="{{ old('usage', $product->specification->usage ?? '') }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Material</label>
                                        <input type="text" class="form-control" name="material"
                                            value="{{ old('material', $product->specification->material ?? '') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Weight (kg)</label>
                                        <input type="number" class="form-control" name="weight"
                                            value="{{ old('weight', $product->specification->weight ?? '') }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Voltage (Watts)</label>
                                        <input type="text" class="form-control" name="voltage"
                                            value="{{ old('voltage', $product->specification->voltage ?? '') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Color</label>
                                        <input type="text" class="form-control" name="color"
                                            value="{{ old('color', $product->specification->color ?? '') }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Frequency</label>
                                        <input type="text" class="form-control" name="frequency"
                                            value="{{ old('frequency', $product->specification->frequency ?? '') }}">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Temperature (°C)</label>
                                    <input type="number" step="0.01" class="form-control" name="temperature"
                                        value="{{ old('temperature', $product->specification->temperature ?? '') }}">
                                </div>

                                {{-- SEO --}}
                                <h5 class="mb-3">SEO Settings</h5>

                                <div class="mb-3">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title"
                                        value="{{ old('meta_title', $product->seo->meta_title ?? '') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Meta Description</label>
                                    <textarea class="form-control"
                                        name="meta_description">{{ old('meta_description', $product->seo->meta_description ?? '') }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Open Graph Title</label>
                                    <input type="text" class="form-control" name="og_title"
                                        value="{{ old('og_title', $product->seo->og_title ?? '') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Open Graph Description</label>
                                    <textarea class="form-control"
                                        name="og_description">{{ old('og_description', $product->seo->og_description ?? '') }}</textarea>
                                </div>

                                @if($product->seo && $product->seo->og_image)
                                <div class="mb-3">
                                    <label class="form-label">Current OG Image</label>

                                    <div class="card" style="width:200px;">
                                        <img src="{{ asset('storage/' . $product->seo->og_image) }}" 
                                            class="card-img-top" 
                                            style="height:150px;object-fit:cover;">

                                        <div class="card-body text-center p-2">
                                            <div class="form-check">
                                                <input type="checkbox" name="delete_og_image" value="1" class="form-check-input" id="deleteOg">
                                                <label for="deleteOg" class="form-check-label">Delete</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <small class="text-danger">Tick checkbox to delete image</small><br>
                                @endif

                                <label class="form-label">Upload New OG Image</label>
                                <input type="file" class="form-control mb-3" name="og_image">

                                {{-- IMAGES --}}
                                <h5 class="mb-3">Product Images</h5>

                                {{-- CURRENT PRODUCT IMAGES --}}
                                @if($product->images->count() > 0)
                                <h6 class="mt-3">Current Images</h6>

                                <div class="row mb-3">
                                    @foreach($product->images as $image)
                                        <div class="col-md-3 mb-3">
                                            <div class="card shadow-sm">
                                                <img src="{{ asset('storage/' . $image->image_path) }}" 
                                                    class="card-img-top" 
                                                    style="height:150px;object-fit:cover;">

                                                <div class="card-body p-2 text-center">
                                                    <div class="form-check">
                                                        <input type="checkbox" 
                                                            class="form-check-input" 
                                                            name="delete_images[]" 
                                                            value="{{ $image->id }}"
                                                            id="img{{ $image->id }}">
                                                        <label class="form-check-label" for="img{{ $image->id }}">
                                                            Delete
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <small class="text-danger">Tick checkbox to delete image</small>
                                @endif

                                {{-- UPLOAD NEW IMAGES --}}
                                <div class="mb-4">
                                    <label class="form-label">Upload New Images</label>
                                    <input type="file" class="form-control" name="images[]" multiple>
                                    <small class="text-muted">You can upload multiple images</small>
                                </div>

                                <button class="btn btn-primary">Update Product</button>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script>
            let editor;

            function initEditor(editorId, toolbarId) {
                return DecoupledEditor.create(document.querySelector(editorId), {
                    toolbar: [
                        'heading', '|',
                        'bold', 'italic', 'underline',
                        '|',
                        'bulletedList', 'numberedList', 'blockquote',
                        '|',
                        'link',
                        '|',
                        'undo', 'redo'
                    ],
                    heading: {
                        options: [
                            { model: 'paragraph', title: 'Paragraph' },
                            { model: 'heading2', view: 'h2', title: 'Heading 2' },
                            { model: 'heading3', view: 'h3', title: 'Heading 3' }
                        ]
                    },
                    placeholder: 'Update product description...'
                }).then(ed => {
                    document.querySelector(toolbarId).appendChild(ed.ui.view.toolbar.element);
                    return ed;
                });
            }

            (async () => {
                editor = await initEditor('#description_editor', '#description_toolbar');
            })();

            document.querySelector('form').addEventListener('submit', function () {
                document.getElementById('description').value = editor.getData();
            });
        </script>

    </x-slot:content>
</x-admin.layout.app>