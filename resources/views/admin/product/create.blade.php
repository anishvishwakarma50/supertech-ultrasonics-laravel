<x-admin.layout.app title="Add Product">
    <x-slot:content>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jodit@latest/es2021/jodit.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/jodit@latest/es2021/jodit.min.js"></script>

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

                                <div class="mb-4">
                                    <label class="form-label">Machine Name *</label>
                                    <input type="text" class="form-control" name="title"
                                        placeholder="Enter machine name" required>
                                </div>

                                {{-- DESCRIPTION --}}
                                <div class="mb-4">
                                    <label class="form-label">Product Description *</label>
                                    <textarea id="description" name="description"></textarea>
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
            const editor = Jodit.make('#description', {
                height: 500,

                buttons: [
                    'source',
                    '|',
                    'bold',
                    'italic',
                    'underline',
                    'strikethrough',
                    '|',
                    'ul',
                    'ol',
                    '|',
                    'font',
                    'fontsize',
                    'brush',
                    'paragraph',
                    '|',
                    'align',
                    '|',
                    'table',
                    'link',
                    'image',
                    'video',
                    '|',
                    'hr',
                    'eraser',
                    'copyformat',
                    '|',
                    'fullsize',
                    'print',
                    'preview'
                ],

                uploader: {
                    insertImageAsBase64URI: true
                },

                toolbarAdaptive: false,
                showCharsCounter: true,
                showWordsCounter: true,
                showXPathInStatusbar: false
            });
        </script>

    </x-slot:content>
</x-admin.layout.app>