<x-app-layout>
    <x-slot name="header">
        <div style="display:flex; justify-content:space-between; align-items:center; font-family:'Poppins',sans-serif;">
            <div style="display:flex; align-items:center;">
               <!-- BACK TO DASHBOARD -->
                <a href="{{ route('dashboard') }}" style="text-decoration: none; color: #94a3b8; font-size: 0.85rem; display: flex; align-items: center; gap: 6px; transition: 0.3s; margin-right: 15px;" onmouseover="this.style.color='#ff2d55'" onmouseout="this.style.color='#94a3b8'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                    Back to Dashboard
                </a>

                <!-- Vertical Separator Line -->
                <div style="width:1px; height:20px; background:rgba(255,45,85,0.2); margin-right: 15px;"></div>

                <!-- THEME TOGGLE BUTTON -->
                <div id="themeToggle" style="cursor: pointer; color: var(--accent-crimson); font-size: 1.1rem; display: flex; align-items: center;">
                    <i class="fas fa-moon" id="themeIcon"></i>
                </div>
            </div>
            
            <h2 style="
    font-weight:600;
    font-size:1rem;
    opacity:0.8;
    color:inherit;
    position:absolute;
    left:50%;
    transform:translateX(-50%);
    margin:0;
">
    Editing The Project
</h2>
        </div>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,600;1,300&family=Poppins:wght@300;400;600&display=swap');

        :root {
            --accent-crimson: #ff2d55;
            --dark-bg: #050505;
            --card-bg: rgba(22, 5, 8, 0.7); 
            --border: rgba(255, 45, 85, 0.2);
            --text: #ffffff;
            --muted: #94a3b8;
        }

        /* --- NAVIGATION & HEADER OVERRIDES --- */
        nav, header { 
            background-color: #080102 !important; 
            border-bottom: 1px solid var(--border) !important;
            transition: 0.4s;
        }
        nav a, nav button, header h2, header a { color: #ffffff !important; }

        /* --- PAGE BACKGROUND --- */
        .min-h-screen {
            background: radial-gradient(circle at 50% 0%, #2a050c 0%, #050505 100%) no-repeat fixed !important;
            transition: 0.4s;
        }

        .cin-page { padding: 44px 32px; max-width: 800px; margin: 0 auto; animation: fadeIn .8s ease; }
        
        /* --- CARD STYLING --- */
        .cin-card { 
            background: var(--card-bg); 
            backdrop-filter: blur(12px); 
            border-radius: 20px; 
            border: 1px solid var(--border); 
            padding: 40px; 
            box-shadow: 0 25px 50px rgba(0,0,0,0.4); 
        }

        .cin-label { display:block; margin-bottom:8px; font-size:.75rem; text-transform:uppercase; letter-spacing:.1em; color: var(--muted); font-weight:600; }
        
        .cin-input, .cin-textarea { 
            width:100%; background: rgba(255,255,255,0.03); border: 1px solid var(--border); 
            border-radius: 12px; padding: 14px 16px; color: #fff; transition: .3s; margin-bottom: 24px; 
        }
        .cin-input:focus, .cin-textarea:focus { outline:none; border-color: var(--accent-crimson); box-shadow: 0 0 15px rgba(255,45,85,0.2); }

        .update-btn { 
            background: var(--accent-crimson); color: white; border: none; padding: 14px 32px; border-radius: 10px; 
            font-weight: 700; cursor: pointer; transition: .3s; box-shadow: 0 0 15px rgba(255, 45, 85, 0.3);
        }
        .update-btn:hover { background: #ff5e7e; transform: translateY(-2px); box-shadow: 0 0 25px rgba(255, 45, 85, 0.5); }

        em { color: var(--accent-crimson); font-style: normal; }

        /* --- LIGHT MODE OVERRIDES --- */
        [data-bs-theme="light"] .min-h-screen { background: #f8fafc !important; }
        [data-bs-theme="light"] nav, [data-bs-theme="light"] header { background-color: #ffffff !important; border-bottom: 1px solid #e2e8f0 !important; }
        [data-bs-theme="light"] nav a, [data-bs-theme="light"] nav button, [data-bs-theme="light"] header h2, [data-bs-theme="light"] header a { color: #1e293b !important; }
        [data-bs-theme="light"] .cin-card { background: #ffffff !important; border: 1px solid #e2e8f0 !important; color: #1e293b !important; backdrop-filter: none !important; box-shadow: 0 10px 25px rgba(0,0,0,0.05) !important; }
        [data-bs-theme="light"] .cin-input, [data-bs-theme="light"] .cin-textarea { background: #fff !important; border: 1px solid #e2e8f0 !important; color: #1e293b !important; }
        [data-bs-theme="light"] .cin-label { color: #64748b !important; }

        @keyframes fadeIn { from { opacity:0; transform:translateY(15px); } to { opacity:1; transform:translateY(0); } }
    </style>

    <div class="cin-page">
        <div class="cin-card">
            <h3 style="font-family:'Cormorant Garamond',serif; font-size:2.2rem; font-weight:300; margin-bottom: 35px; color: inherit;">
                Edit <em>{{ $project->title }}</em>
            </h3>

            <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="cin-group">
                    <label class="cin-label">Project Title</label>
                    <input type="text" name="title" class="cin-input" value="{{ old('title', $project->title) }}" required>
                </div>

                <div class="cin-group">
                    <label class="cin-label">Description</label>
                    <textarea name="description" class="cin-textarea" rows="5" required>{{ old('description', $project->description) }}</textarea>
                </div>

                <div class="cin-group">
                    <label class="cin-label">Project Link (Optional)</label>
                    <input type="url" name="project_link" class="cin-input" value="{{ old('project_link', $project->project_link) }}">
                </div>

                <div class="cin-group" style="margin-bottom: 40px;">
                    <label class="cin-label">Current Preview</label>
                    @if($project->image_url)
                        <img src="{{ asset('storage/' . $project->image_url) }}" style="width: 150px; height: 100px; object-fit: cover; border-radius: 12px; margin-bottom: 15px; display: block; border: 1px solid var(--border);">
                    @endif
                    <label class="cin-label">Update Image</label>
                    <input type="file" name="image" class="cin-input" style="padding: 10px;">
                </div>

                <div style="text-align: right;">
                    <button type="submit" class="update-btn">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- THEME TOGGLE SCRIPT -->
    <script>
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = document.getElementById('themeIcon');
        const html = document.documentElement;

        // Sync preference
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
</x-app-layout>