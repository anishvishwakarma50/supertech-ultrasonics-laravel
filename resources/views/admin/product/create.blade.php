<x-admin.layout.app title="Add Product">
    <x-slot:content>

        <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/decoupled-document/ckeditor.js"></script>

        <div class="content-wrapper">
            <div class="row justify-content-center">
                <div class="col-xl-8 align-self-center">

                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title mb-4">Add Ultrasonic Machine</h4>

                            <form id="productForm" method="POST" action="{{ route('product.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                {{-- BASIC DETAILS --}}
                                <h5 class="mb-3">Basic Details</h5>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Machine Name *</label>
                                        <input type="text" class="form-control" name="title"
                                            placeholder="Enter machine name" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Minimum Order Quantity (MOQ) *</label>
                                        <input type="text" class="form-control" name="moq" placeholder="e.g. 2 units"
                                            required>
                                    </div>
                                </div>

                                {{-- DESCRIPTION --}}
                                <div class="mb-4">
                                    <label class="form-label">Product Description *</label>
                                    <div id="description_toolbar"></div>
                                    <div id="description_editor" class="form-control"
                                        style="height:300px;overflow:auto;"></div>
                                    <textarea id="description" name="description" hidden></textarea>
                                </div>

                                {{-- SPECIFICATION --}}
                                <h5 class="mb-3">Specifications</h5>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Usage</label>
                                        <input type="text" class="form-control" name="usage"
                                            placeholder="e.g. Industrial cleaning">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Material</label>
                                        <input type="text" class="form-control" name="material"
                                            placeholder="e.g. Stainless Steel">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Weight (kg)</label>
                                        <input type="number" class="form-control" name="weight" placeholder="e.g. 12">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Voltage (Watts)</label>
                                        <input type="text" class="form-control" name="voltage" placeholder="e.g. 500W">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Color</label>
                                        <input type="text" class="form-control" name="color" placeholder="e.g. Silver">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Frequency</label>
                                        <input type="text" class="form-control" name="frequency"
                                            placeholder="e.g. 40kHz">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Temperature (°C)</label>
                                    <input type="number" step="0.01" class="form-control" name="temperature"
                                        placeholder="e.g. 60">
                                </div>

                                {{-- SEO --}}
                                <h5 class="mb-3">SEO Settings</h5>

                                <div class="mb-3">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title" maxlength="60"
                                        placeholder="Max 60 characters">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Meta Description</label>
                                    <textarea class="form-control" name="meta_description" rows="3" maxlength="160"
                                        placeholder="Max 160 characters"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Open Graph Title</label>
                                    <input type="text" class="form-control" name="og_title"
                                        placeholder="Title for social sharing">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Open Graph Description</label>
                                    <textarea class="form-control" name="og_description" rows="3"
                                        placeholder="Description for social sharing"></textarea>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Open Graph Image</label>
                                    <input type="file" class="form-control" name="og_image">
                                    <small class="text-muted">Recommended: 1200×630px</small>
                                </div>

                                {{-- PRODUCT IMAGES --}}
                                <h5 class="mb-3">Product Images</h5>

                                <div class="mb-4">
                                    <label class="form-label">Upload Images</label>
                                    <input type="file" class="form-control" name="images[]" multiple>
                                    <small class="text-muted">You can upload multiple images</small>
                                </div>

                                <button class="btn btn-primary">Save Product</button>

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
                    placeholder: 'Write product description here...'
                }).then(ed => {
                    document.querySelector(toolbarId).appendChild(ed.ui.view.toolbar.element);
                    return ed;
                });
            }

            (async () => {
                editor = await initEditor('#description_editor', '#description_toolbar');
            })();

            document.getElementById('productForm').addEventListener('submit', function () {
                document.getElementById('description').value = editor.getData();
            });
        </script>

    </x-slot:content>
</x-admin.layout.app>