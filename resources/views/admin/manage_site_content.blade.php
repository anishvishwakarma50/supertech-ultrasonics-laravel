<x-admin.layout.app title="Manage Site Content">
  <x-slot:content>
    <!-- CKEditor 5 CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/decoupled-document/ckeditor.js"></script>
    
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

                <form id="siteContentForm" method="POST" action="{{ route('store-content') }}" enctype="multipart/form-data">
                    @csrf

                    {{-- Company History Section --}}
                    <div class="mb-3">
                        <label class="form-label">Company History</label>
                        <div id="company_history_toolbar"></div>
                        <div id="company_history_editor" class="form-control" style="height:300px;overflow:auto;">
                            {!! $siteData->company_history !!}
                        </div> 
                        <textarea id="company_history" name="company_history" hidden></textarea>
                    </div>

                    {{-- What We Do Section --}}
                    <div class="mb-3">
                        <label class="form-label">What We Do</label>
                        <div id="what_we_do_toolbar"></div>
                        <div id="what_we_do_editor" class="form-control" style="height:300px;overflow:auto;">
                            {!! $siteData->what_we_do !!}
                        </div>
                        <textarea id="what_we_do" name="what_we_do" hidden></textarea>
                    </div>

                    {{-- About Company --}}
                    <div class="mb-3">
                        <label class="form-label">About Company</label>
                        <div id="about_company_toolbar"></div>
                        <div id="about_company_editor" class="form-control" style="height:300px;overflow:auto;">
                            {!! $siteData->about_company !!}
                        </div>
                        <textarea id="about_company" name="about_company" hidden></textarea>
                    </div>

                    <hr>

                    {{-- Contact Details --}}
                    <h5>Contact Details</h5>

                    <input type="text" class="form-control mb-3" name="contact_details" value="{{ $siteData->contact_details }}" placeholder="Contact Number 1">
                    <input type="text" class="form-control mb-3" name="contact_number_2" value="{{ $siteData->contact_number_2 }}" placeholder="Contact Number 2">
                    <input type="email" class="form-control mb-3" name="email" value="{{ $siteData->email }}" placeholder="Email">
                    <textarea class="form-control mb-3" name="address">{{ $siteData->address }}</textarea>

                    <hr>

                    {{-- Social --}}
                    <h5>Social Media</h5>

                    <input type="url" class="form-control mb-3" name="linkedin_url" value="{{ $siteData->linkedin_url }}" placeholder="LinkedIn">
                    <input type="url" class="form-control mb-3" name="youtube_url" value="{{ $siteData->youtube_url }}" placeholder="YouTube">
                    <input type="url" class="form-control mb-3" name="instagram_url" value="{{ $siteData->instagram_url }}" placeholder="Instagram">

                    <hr>

                    {{-- Logo --}}
                    <h5>Logo</h5>
                    @if($siteData->logo)
                        <img src="{{ asset('storage/'.$siteData->logo) }}" style="max-height:100px" class="mb-2">
                    @endif
                    <input type="file" class="form-control mb-3" name="logo">

                    <button class="btn btn-primary">Save Content</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>

<script>
let editors = {};

// ✅ Reusable Editor Function (Lightweight)
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
        placeholder: 'Write content here...'
    }).then(editor => {
        document.querySelector(toolbarId).appendChild(editor.ui.view.toolbar.element);
        return editor;
    });
}

// ✅ Initialize Editors
(async () => {
    editors.company_history = await initEditor('#company_history_editor', '#company_history_toolbar');
    editors.what_we_do = await initEditor('#what_we_do_editor', '#what_we_do_toolbar');
    editors.about_company = await initEditor('#about_company_editor', '#about_company_toolbar');
})();

// ✅ Sync data before submit
document.getElementById('siteContentForm').addEventListener('submit', function () {
    document.getElementById('company_history').value = editors.company_history.getData();
    document.getElementById('what_we_do').value = editors.what_we_do.getData();
    document.getElementById('about_company').value = editors.about_company.getData();
});
</script>

  </x-slot:content>
</x-admin.layout.app>