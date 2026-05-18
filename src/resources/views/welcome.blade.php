<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Split-Screen Portfolio - Free HTML Template</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@300;400;600;700&family=Archivo:wght@300;400;600;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('front/tooplate-split-portfolio.css') }}">
    <style>
        /* Gaya tambahan agar tombol terlihat mati/disabled saat mencapai batas slide */
        .nav-arrow.disabled {
            opacity: 0.3;
            cursor: not-allowed;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <header>
        <a href="#work" class="logo">
            <svg class="logo-icon" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <circle cx="50" cy="50" r="45" fill="none" stroke="#ff3366" stroke-width="3"/>
                <path d="M 30 40 L 50 60 L 70 40" fill="none" stroke="#ff3366" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                <circle cx="50" cy="70" r="3" fill="#ff3366"/>
            </svg>
            <span>Portofolio</span>
        </a>
        <nav>
            <ul class="desktop-nav">
                <li><a href="#work">Work</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#testimonials">Testimonials</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
        <div class="menu-icon">
            <span></span>
        </div>
    </header>

    <div class="mobile-nav">
        <button class="mobile-nav-close" aria-label="Close menu">×</button>
        <ul>
            <li><a href="#work">Work</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#testimonials">Testimonials</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <div class="mobile-nav-footer">
            <p>Let's create something amazing together</p>
            <a href="mailto:ripal.251204@gmail.com">ripal.251204@gmail.com</a>
        </div>
    </div>

    <div class="split-container" id="work">
        <div class="left-panel">
            @if(isset($projects) && count($projects) > 0)
                @foreach($projects as $index => $project)
                <div class="image-container {{ $index === 0 ? 'active' : '' }}" data-project="{{ $index }}">
                    <div class="project-image" style="background-image: url('{{ asset('imagess/woi.jpg') }}');"></div>
                </div>
                @endforeach
            @else
                <div class="image-container active" data-project="0">
                    <div class="project-image" style="background-image: url('{{ asset('imagess/woi.jpg') }}');"></div>
                </div>
                <div class="image-container" data-project="1">
                    <div class="project-image" style="background-image: url('{{ asset('imagess/woi.jpg') }}');"></div>
                </div>
                <div class="image-container" data-project="2">
                    <div class="project-image" style="background-image: url('{{ asset('imagess/woi.jpg') }}');"></div>
                </div>
            @endif
        </div>

        <div class="right-panel">
            @if(isset($projects) && count($projects) > 0)
                @foreach($projects as $index => $project)
                <div class="project-details {{ $index === 0 ? 'active' : '' }}" data-project="{{ $index }}">
                    <div class="project-number">0{{ $index + 1 }} / 0{{ count($projects) }}</div>
                    <h1 class="project-title">{{ $project->title }}</h1>
                    <span class="project-category">{{ $project->category ?? 'Web Design' }}</span>
                    <p class="project-description">
                        {{ $project->description }}
                    </p>
                    <div class="project-info">
                        <div class="info-item">
                            <h4>Client</h4>
                            <p>{{ $project->client ?? 'Internal Project' }}</p>
                        </div>
                        <div class="info-item">
                            <h4>Year</h4>
                            <p>{{ $project->year ?? '2026' }}</p>
                        </div>
                        <div class="info-item">
                            <h4>Role</h4>
                            <p>{{ $project->role ?? 'Developer' }}</p>
                        </div>
                    </div>
                    <a href="{{ $project->link ?? '#' }}" class="view-project-btn">View Project →</a>
                </div>
                @endforeach
            @else
                <div class="project-details active" data-project="0">
                    <div class="project-number">01 / 03</div>
                    <h1 class="project-title">Meticulous Web Design for Modern Tech Brand</h1>
                    <span class="project-category">Web Design</span>
                    <p class="project-description">A complete website overhaul focused on sleek dark UI, high performance, and structured systems analysis architecture.</p>
                    <div class="project-info">
                        <div class="info-item"><h4>Client</h4><p>Stellar Tech</p></div>
                        <div class="info-item"><h4>Year</h4><p>2026</p></div>
                        <div class="info-item"><h4>Role</h4><p>Frontend Dev</p></div>
                    </div>
                    <a href="#" class="view-project-btn">View Project →</a>
                </div>
            @endif
        </div>

        <div class="project-controls">
            <div class="progress-indicator">
                @if(isset($projects) && count($projects) > 0)
                    @foreach($projects as $index => $project)
                    <div class="progress-dot {{ $index === 0 ? 'active' : '' }}" data-project="{{ $index }}"></div>
                    @endforeach
                @else
                    <div class="progress-dot active" data-project="0"></div>
                    <div class="progress-dot" data-project="1"></div>
                    <div class="progress-dot" data-project="2"></div>
                @endif
            </div>
            <div class="navigation">
                <div class="nav-arrow" id="prevBtn">
                    <div class="arrow arrow-left"></div>
                </div>
                <div class="nav-arrow" id="nextBtn">
                    <div class="arrow arrow-right"></div>
                </div>
            </div>
        </div>
    </div>

    <section id="about" class="about-section">
        <div class="about-split">
            <div class="about-content">
                <h2>{{ $profile_title ?? 'About Me' }}</h2>
                <p>{{ $profile_bio_1 ?? "Hello, my name is Rifalsya Dwi Putra Safei. I am a student currently pursuing a degree in Information Systems at Esa Unggul University in Tangerang. I am interested in the Information Systems program because I want to expand my knowledge in the digital world. As a student, I always strive to learn, adapt to technological advancements, and improve my skills so that I can become a competent individual who is ready to face the challenges of the professional world." }}</p>
                <p>{{ $profile_bio_2 ?? 'I am currently developing a website called “Freshwater Fish Information System,” which is designed for people who want to find out about the different types of freshwater fish in a particular country.' }}</p>
                <div class="about-stats">
                    <div class="stat-item">
                        <h3>{{ isset($projects) ? count($projects) : 1 }}</h3>
                        <p>Projects</p>
                    </div>
                    <div class="stat-item">
                        <h3>{{ isset($projects) ? count($projects) : 1 }}</h3>
                        <p>Clients</p>
                    </div>
                    <div class="stat-item">
                        <h3>
                            @php
                                $tahunMulaiKuliah = 2024;
                                $tahunSekarang = date('Y');
                                $experience = $tahunSekarang - $tahunMulaiKuliah;
                                echo $experience > 0 ? $experience : 0;
                            @endphp
                        </h3>
                        <p>Experience</p>
                    </div>
                </div>
            </div>
            <div class="about-image" style="background-image: url('{{ asset('imagess/muka guwa.png.jpg') }}'); background-size: cover; background-position: center;"></div>
        </div>
    </section>

    <section id="services" class="services-section">
        <div class="services-container">
            <div class="section-header">
                <h2>What I Do</h2>
                <p>Comprehensive design services tailored to your needs</p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-number">01</div>
                    <h3>Brand Identity</h3>
                    <p>Creating cohesive visual identities that capture your brand's essence and resonate with your audience.</p>
                    <ul class="service-list">
                        <li>Logo Design</li>
                        <li>Brand Strategy</li>
                        <li>Visual Guidelines</li>
                        <li>Brand Collateral</li>
                    </ul>
                </div>
                <div class="service-card">
                    <div class="service-number">02</div>
                    <h3>Web Design</h3>
                    <p>Designing beautiful, functional websites that deliver exceptional user experiences across all devices.</p>
                    <ul class="service-list">
                        <li>UI/UX Design</li>
                        <li>Responsive Design</li>
                        <li>Prototyping</li>
                        <li>Frontend Development</li>
                    </ul>
                </div>
                <div class="service-card">
                    <div class="service-number">03</div>
                    <h3>Digital Strategy</h3>
                    <p>Strategic planning and consulting to help your brand succeed in the digital landscape.</p>
                    <ul class="service-list">
                        <li>User Research</li>
                        <li>Content Strategy</li>
                        <li>Digital Roadmaps</li>
                        <li>Analytics & Insights</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials" class="testimonials-section">
        <div class="testimonials-container">
            <div class="section-header">
                <h2>Client Testimonials</h2>
                <p>What people say about working with me</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="quote-icon">"</div>
                    <p class="testimonial-text">Working with this designer was an absolute pleasure. The brand identity they created exceeded our expectations and perfectly captured our vision. Highly recommended!</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">AS</div>
                        <div class="author-info">
                            <h4>Ahmad Solih</h4>
                            <p>CEO, Real Madrid</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="quote-icon">"</div>
                    <p class="testimonial-text">The attention to detail and creative approach made all the difference. Our website redesign not only looks stunning but has significantly improved our conversion rates.</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">BA</div>
                        <div class="author-info">
                            <h4>Bani Adam</h4>
                            <p>Duta Esgul</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="quote-icon">"</div>
                    <p class="testimonial-text">Professional, creative, and always on time. The entire process was smooth and collaborative. We couldn't be happier with the final results.</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">GN</div>
                        <div class="author-info">
                            <h4>Gunawan Nastiar</h4>
                            <p>Mahasiswa Esgul</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact-section">
        <div class="contact-split">
            <div class="contact-info">
                <h2>Let's Work Together</h2>
                <p>Punya proyek dalam pikiran? Saya ingin mendengarnya. Kirimkan saya pesan dan mari kita ciptakan sesuatu yang luar biasa bersama.</p>
                <div class="contact-details">
                    <div class="contact-item">
                        <div class="contact-item-icon">📧</div>
                        <div class="contact-item-content">
                            <h4>Email</h4>
                            <a href="mailto:ripal.251204@gmail.com">ripal.251204@gmail.com</a>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-item-icon">📱</div>
                        <div class="contact-item-content">
                            <h4>WhatsApp</h4>
                            <a href="https://wa.me/6288808141183" target="_blank" rel="noopener noreferrer">+62 888-0814-1183</a>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-item-icon">📍</div>
                        <div class="contact-item-content">
                            <h4>Location</h4>
                            <a href="https://www.google.com/maps/place/Indonesia, Banten, Tangerang" target="_blank">Indonesia, Banten, Tangerang</a>
                        </div>
                    </div>
                </div>
                <div class="social-links">
                    <a href="#" class="social-link" title="Dribbble">Dr</a>
                    <a href="#" class="social-link" title="Behance">Be</a>
                    <a href="#" class="social-link" title="Instagram">In</a>
                    <a href="#" class="social-link" title="LinkedIn">Li</a>
                    <a href="#" class="social-link" title="Twitter">Tw</a>
                </div>
            </div>

            <form class="contact-form" action="#" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <div class="button-container">
                    <button type="submit" class="submit-btn">Send Message</button>
                </div>
            </form>
        </div>
    </section>

    <footer>
        <p>Copyright © 2026 Your Company Name. All rights reserved. Design: <a rel="nofollow" href="https://www.tooplate.com" target="_blank">Tooplate</a></p>
    </footer>

    <script src="{{ asset('front/tooplate-split-scripts.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const totalProjects = {{ (isset($projects) && count($projects) > 0) ? count($projects) : 1 }};
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            let currentIndex = 0;

            function updateNavButtons() {
                if (currentIndex === 0) {
                    if (prevBtn) prevBtn.classList.add('disabled');
                } else {
                    if (prevBtn) prevBtn.classList.remove('disabled');
                }

                if (currentIndex >= totalProjects - 1) {
                    if (nextBtn) nextBtn.classList.add('disabled');
                } else {
                    if (nextBtn) nextBtn.classList.remove('disabled');
                }
            }

            updateNavButtons();

            const handleNavClick = function (e, action) {
                if (action === 'next' && currentIndex >= totalProjects - 1) {
                    e.stopImmediatePropagation();
                    e.preventDefault();
                    return false;
                }
                if (action === 'prev' && currentIndex <= 0) {
                    e.stopImmediatePropagation();
                    e.preventDefault();
                    return false;
                }

                if (action === 'next') currentIndex++;
                if (action === 'prev') currentIndex--;

                setTimeout(updateNavButtons, 50);
            };

            if (prevBtn) {
                prevBtn.addEventListener('click', function(e) { handleNavClick(e, 'prev'); }, true);
            }
            if (nextBtn) {
                nextBtn.addEventListener('click', function(e) { handleNavClick(e, 'next'); }, true);
            }
        });
    </script>
</body>
</html>
