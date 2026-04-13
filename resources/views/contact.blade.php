<x-layout.app title="Contact Us - Super Tech Ultrasonic">
    <x-slot:content>
        <main>
            <!-- Page Title Start -->
            <div class="page-title-area" style="background-image: url({{ asset('assets/img/bg/page-title.jpg') }});">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="page-title text-center">
                                <h1>Get In Touch</h1>
                                <p>We'd love to hear from you. Send us a message!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Title End -->

            <!-- Contact Content Start -->
            <div class="container mt-5 mb-5">
                <div class="row">
                    <!-- Contact Form -->
                    <div class="col-xl-6 col-lg-6 mb-4">
                        <div class="contact-form-wrapper">
                            <h3 class="mb-4">Send Us a Message</h3>

                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Oops!</strong> Please fix the errors below.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    <ul class="mb-0 mt-2">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <form action="{{ route('contact.send') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Name *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" name="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="subject" class="form-label">Subject *</label>
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror" 
                                           id="subject" name="subject" value="{{ old('subject') }}" required>
                                    @error('subject')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="message" class="form-label">Message *</label>
                                    <textarea class="form-control @error('message') is-invalid @enderror" 
                                              id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="b-btn">Send Message</button>
                            </form>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="col-xl-6 col-lg-6">
                        <div class="contact-info-wrapper">
                            <h3 class="mb-4">Contact Information</h3>

                            <!-- Address -->
                            <div class="contact-info-item mb-4">
                                <h5 class="mb-2"><i class="far fa-map-marker-alt mr-2"></i> Address</h5>
                                @if($siteData && $siteData->address)
                                    <p>{{ $siteData->address }}</p>
                                @else
                                    <p class="text-muted">Address not available</p>
                                @endif
                            </div>

                            <!-- Phone Numbers -->
                            <div class="contact-info-item mb-4">
                                <h5 class="mb-2"><i class="far fa-phone mr-2"></i> Phone</h5>
                                @if($siteData && $siteData->contact_details)
                                    <p><a href="tel:{{ $siteData->contact_details }}">{{ $siteData->contact_details }}</a></p>
                                @endif
                                @if($siteData && $siteData->contact_number_2)
                                    <p><a href="tel:{{ $siteData->contact_number_2 }}">{{ $siteData->contact_number_2 }}</a></p>
                                @endif
                            </div>

                            <!-- Email -->
                            <div class="contact-info-item mb-4">
                                <h5 class="mb-2"><i class="far fa-envelope mr-2"></i> Email</h5>
                                @if($siteData && $siteData->email)
                                    <p><a href="mailto:{{ $siteData->email }}">{{ $siteData->email }}</a></p>
                                @else
                                    <p class="text-muted">Email not available</p>
                                @endif
                            </div>

                            <!-- Social Links -->
                            @if($siteData && ($siteData->linkedin_url || $siteData->youtube_url || $siteData->instagram_url))
                                <div class="contact-info-item mb-4">
                                    <h5 class="mb-2">Follow Us</h5>
                                    <div class="social-links">
                                        @if($siteData->linkedin_url)
                                            <a href="{{ $siteData->linkedin_url }}" target="_blank" class="social-link me-3">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        @endif
                                        @if($siteData->youtube_url)
                                            <a href="{{ $siteData->youtube_url }}" target="_blank" class="social-link me-3">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        @endif
                                        @if($siteData->instagram_url)
                                            <a href="{{ $siteData->instagram_url }}" target="_blank" class="social-link">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <!-- Business Hours -->
                            <div class="contact-info-item">
                                <h5 class="mb-2"><i class="far fa-clock mr-2"></i> Business Hours</h5>
                                <p>Monday - Saturday: 9:00 AM - 7:00 PM<br>
                                   Sunday: Closed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Content End -->

            <!-- Map Section (Optional) -->
            <div class="map-section mt-5">
                <div class="container-fluid p-0">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3582.8860234624903!2d72.0!3d25.0!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDAwJzAwLjAiTiA3MsKwMDAnMDAuMCJF!5e0!3m2!1sen!2sin!4v1234567890" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Map Section End -->
        </main>
    </x-slot:content>
</x-layout.app>
