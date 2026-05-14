    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark"> <!-- Starts in Cinematic Dark -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portfolio | John Paul S. Saunar</title>
        <!-- Bootstrap 5.3 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
        <style>
    :root {
        /* Vibrant Crimson for accents */
        --accent-crimson: #ff2d55; 
        /* Deep Crimson-Black for the background */
        --dark-bg: #0d0204; 
        --card-bg: #161616;
    }

    body {
        font-family: 'Poppins', sans-serif;
        scroll-behavior: smooth;
        /* Atmospheric crimson glow for dark mode */
        background: radial-gradient(circle at 50% 40%, #2a050c 0%, #050505 100%) no-repeat fixed;
        background-color: var(--dark-bg);
        color: #ffffff;
        transition: background-color 0.4s ease, color 0.4s ease;
    }

    /* Cinematic Animations */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .reveal { animation: fadeInUp 1s ease-out; }

    /* Navigation */
    .navbar {
        background-color: rgba(10, 2, 4, 0.85) !important;
        backdrop-filter: blur(15px);
        border-bottom: 1px solid rgba(255, 45, 85, 0.1);
    }

    /* Hero Section */
    .hero-section {
        height: 100vh;
        background: radial-gradient(circle at 20% 35%, rgba(255, 45, 85, 0.15), transparent 45%),
                    radial-gradient(circle at 80% 70%, rgba(255, 45, 85, 0.1), transparent 45%),
                    linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)),
                    url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=1920');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        display: flex;
        align-items: center;
        color: white;
    }

    .btn-cspc {
        background-color: var(--accent-crimson);
        color: #fff;
        font-weight: bold;
        padding: 12px 30px;
        border: none;
        transition: 0.3s;
        box-shadow: 0 0 20px rgba(255, 45, 85, 0.4);
    }
    .btn-cspc:hover {
        background-color: #ff5e7e;
        box-shadow: 0 0 30px rgba(255, 45, 85, 0.6);
        color: white;
        transform: scale(1.05);
    }

    .profile-box {
        width: 100%;
        max-width: 350px;
        aspect-ratio: 1 / 1;
        object-fit: cover;
        border-radius: 20px;
        border: 2px solid rgba(255, 45, 85, 0.5);
        box-shadow: 0 0 40px rgba(255, 45, 85, 0.2);
    }

    .project-img-container {
        width: 100%;
        height: 220px;
        overflow: hidden;
    }
    .project-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.5s;
    }

    .card-project {
        background-color: var(--card-bg);
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.05);
        box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        overflow: hidden;
        border-radius: 15px;
        cursor: pointer;
    }
    .card-project:hover {
        transform: translateY(-10px);
        border-color: var(--accent-crimson);
        box-shadow: 0 15px 40px rgba(255, 45, 85, 0.15);
    }

    /* Keep sections transparent in dark mode */
    #about, #projects {
        background: transparent !important;
    }

    footer {
        background: #080102;
        color: white;
        padding: 40px 0;
        border-top: 1px solid rgba(255, 45, 85, 0.1);
    }

    .text-crimson { color: var(--accent-crimson) !important; }
    #themeToggle { cursor: pointer; color: var(--accent-crimson); font-size: 1.2rem; }

    /* --- LIGHT MODE FIXES --- */
    /* This makes sure the links and background work when you switch to Light */
    [data-bs-theme="light"] body { 
        background: #fcfcfc !important; 
        color: #1a1a1a; 
    }
    [data-bs-theme="light"] .navbar { 
        background-color: rgba(255, 255, 255, 0.95) !important; 
        border-bottom: 1px solid #dee2e6;
    }
    /* Fixes invisible Home/About/Projects links in Light Mode */
    [data-bs-theme="light"] .navbar .nav-link { 
        color: #1a1a1a !important; 
    }
    [data-bs-theme="light"] .card-project { 
        background-color: #ffffff; 
        color: #333; 
        border: 1px solid #eee; 
    }
    [data-bs-theme="light"] #about, [data-bs-theme="light"] #projects {
        background: #ffffff !important;
    }
    [data-bs-theme="light"] #contact { 
        background-color: #ffffff !important; 
        color: #000 !important; 
        border-top: 1px solid #dee2e6;
    }
    /* Fixes invisible icons in the footer in Light Mode */
    [data-bs-theme="light"] #contact i { 
        color: #1a1a1a !important; 
    }
</style>
    </head>
    <body>


        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
            <div class="container">
                <h2 class="fw-bold mb-3"href="#home">My<span class="text-crimson">World</span></h2>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
                    
                        <!-- THEME TOGGLE BUTTON -->
                        <li class="nav-item ms-lg-3">
                            <div id="themeToggle" class="nav-link">
                                <i class="fas fa-moon" id="themeIcon"></i>
                            </div>
                        </li>


                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item"><a class="nav-link btn btn-cspc ms-lg-3 text-white" href="{{ url('/dashboard') }}">Dashboard</a></li>
                            @else
                                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>


        <!-- Home Section -->
        <header id="home" class="hero-section">
            <div class="container text-center">
                <div class="reveal">
                    <h2 class="fw-bold mb-3"href="#home">WELCOME<span class="text-crimson"> TO</span></h2>
                    <h1 class="display-1 fw-bold mb-4">MY <span class="text-crimson">PORTFOLIO</span></h1>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="#projects" class="btn btn-cspc btn-lg shadow">Explore Work</a>
                        <a href="#about" class="btn btn-outline-light btn-lg px-4">Learn More</a>
                    </div>
                </div>
            </div>
        </header>


        <!-- About Section -->
        <section id="about" class="py-5">
            <div class="container py-5">
                <div class="row align-items-center">
                    <!-- Profile Image Box -->
                    <div class="col-md-5 mb-4 mb-md-0 text-center reveal">
                        <img src="{{ asset('images/profile.png') }}"
                            alt="John Paul S. Saunar"
                            class="profile-box">
                    </div>
                    <!-- Text Content -->
                    <div class="col-md-7 ps-md-5 reveal">
                        <h2 class="fw-bold mb-3">About <span class="text-crimson">Me</span></h2>
                        <h5 class="opacity-80 mb-5  ">HI, I'M JOHN PAUL S. SAUNAR</h5>
                        <p class="lead opacity-75">
                            A 3rd Year Bachelor of Science in Information Systems student at Camarines Sur Polytechnic Colleges. I enjoy learning about technology and developing my skills in web development and system design.
                        </p>
                        <p class="lead opacity-75">
                            Outside of academics, I love watching anime, playing basketball, and spending my free time relaxing. I’m also known as a sleepy head among my friends. I enjoy exploring new ideas, improving my creativity, and balancing school life with my hobbies and interests.
                        </p>
                    
                        <div class="row mt-4">
                            <div class="col-6 col-md-3 mb-2"><span class="badge border border-danger text-crimson p-2 w-100">Laravel</span></div>
                            <div class="col-6 col-md-3 mb-2"><span class="badge border border-danger text-crimson p-2 w-100">MySQL</span></div>
                            <div class="col-6 col-md-3 mb-2"><span class="badge border border-danger text-crimson p-2 w-100">Bootstrap</span></div>
                            <div class="col-6 col-md-3 mb-2"><span class="badge border border-danger text-crimson p-2 w-100">Cloudflare</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Projects Section -->
    <section id="projects" class="py-5">
        <div class="container py-5">
            <div class="text-center mb-5 reveal">
                <h2 class="fw-bold">Featured Projects</h2>
                <div class="mx-auto" style="width: 290px; height: 3px; background: var(--accent-crimson);"></div>
            </div>

            <div class="row">
                @forelse($projects as $project)
                    <div class="col-md-4 mb-4 reveal">
                        <!-- Added data-bs attributes to trigger the modal -->
                        <div class="card card-project h-100" data-bs-toggle="modal" data-bs-target="#projectModal{{ $project->id }}">
                            <div class="project-img-container">
                                @if($project->image_url)
                                    <img src="{{ asset('storage/' . $project->image_url) }}" alt="{{ $project->title }}">
                                @else
                                    <img src="https://via.placeholder.com/500x500?text=Project+Box" alt="Placeholder">
                                @endif
                            </div>
                            <div class="card-body p-4">
                                <h5 class="card-title fw-bold text-crimson">{{ $project->title }}</h5>
                                <p class="card-text opacity-50 small">{{ Str::limit($project->description, 100) }}</p>
                                <div class="text-end mt-2">
                                    <span class="text-crimson small fw-bold">View Details →</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Individual Project Modal -->
                    <div class="modal fade" id="projectModal{{ $project->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content border-0 shadow-lg">
                                <div class="modal-header border-0">
                                    <h4 class="modal-title fw-bold text-crimson">{{ $project->title }}</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body pb-5">
                                    <div class="row align-items-center">
                                        <div class="col-md-6 mb-4 mb-md-0">
                                            <div class="rounded overflow-hidden shadow-sm border">
                                                @if($project->image_url)
                                                    <img src="{{ asset('storage/' . $project->image_url) }}" class="w-100" alt="{{ $project->title }}">
                                                @else
                                                    <img src="https://via.placeholder.com/500x500?text=Project+Image" class="w-100" alt="Placeholder">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 px-lg-4 text-start">
                                            <h6 class="fw-bold mb-3 text-uppercase small opacity-50">Project Description</h6>
                                            <!-- style="white-space: pre-line;" preserves line breaks from your database -->
                                            <p class="opacity-75 mb-0" style="white-space: pre-line; font-size: 0.95rem;">
                                                {{ $project->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center opacity-50">
                        <p>No projects to display yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

        <!-- Footer -->
    <!-- Contact & Footer Section -->
    <!-- Contact & Footer Section -->
        <footer id="contact" class="text-white py-5" style="background-color: var(--cspc-blue);">
            <div class="container text-center">
                <h4 class="fw-bold mb-4">Get In Touch</h4>

    <div class="row justify-content-center mb-4">
                    <!-- Phone Number -->
                    <div class="col-md-4 mb-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <!-- Icon color changed to text-white and size to fs-6 -->
                            <i class="fas fa-phone-alt me-2 text-white fs-6"></i>
                            <span class="fs-6">+63 912 345 6789</span>
                        </div>
                    </div>
                    <!-- Gmail -->
                    <div class="col-md-4 mb-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <!-- Icon color changed to text-white and size to fs-6 -->
                            <i class="fas fa-envelope me-2 text-white fs-6"></i>
                            <span class="fs-6">johnpaul.saunar@gmail.com</span>
                        </div>
                    </div>


                    <!-- Facebook -->
                    <div class="col-md-4 mb-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <!-- Icon color changed to text-white and size to fs-6 -->
                            <i class="fab fa-facebook me-2 text-white fs-6"></i>
                            <span href="https://facebook.com/paul.saunar" target="_blank" class="fs-6">Paul Saunar</span>
                        </div>
                    </div>
                </div>


                <hr class="bg-light opacity-25">
                <p class="mb-0 opacity-75 small">&copy; 2026 John Paul S. Saunar | CSPC BSIS Student</p>
                <p class="small opacity-50 mt-1">CCIS 106 Final Project - Laravel CRUD Application</p>
            </div>
        </footer>


        <!-- THEME TOGGLE SCRIPT -->
        <script>
            const themeToggle = document.getElementById('themeToggle');
            const themeIcon = document.getElementById('themeIcon');
            const html = document.documentElement;


            // Check for saved user preference, default to dark
            const savedTheme = localStorage.getItem('theme') || 'dark';
            html.setAttribute('data-bs-theme', savedTheme);
            updateIcon(savedTheme);


            themeToggle.addEventListener('click', () => {
                const currentTheme = html.getAttribute('data-bs-theme');
                const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            
                html.setAttribute('data-bs-theme', newTheme);
                localStorage.setItem('theme', newTheme);
                updateIcon(newTheme);
            });


            function updateIcon(theme) {
                if (theme === 'dark') {
                    themeIcon.classList.replace('fa-sun', 'fa-moon');
                } else {
                    themeIcon.classList.replace('fa-moon', 'fa-sun');
                }
            }
        </script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>