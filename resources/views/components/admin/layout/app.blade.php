@props(['title' => $title,'content' => 'No Content Provided'])
{{-- this is the layout for header footer required pages --}}

{{-- body content of clean layout --}}
<x-admin.layout.base title="{{ $title }}">
    <x-slot:content>
        <!-- partial:partials/_navbar.html -->
        <x-admin.layout.includes.header />
        
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <x-admin.layout.includes.sidebar />
            
            <!-- partial -->
            <div class="main-panel">
                {{-- actual content of every page --}}
                {{ $content }}
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <x-admin.layout.includes.footer />
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
    </x-slot:content>
</x-admin.layout.base>