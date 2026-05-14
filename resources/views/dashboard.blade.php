<x-app-layout>
    <x-slot name="header">
        <div style="display:flex; justify-content:space-between; align-items:center; font-family:'Poppins',sans-serif;">
            <div style="display:flex; align-items:center;">
                <!-- BACK TO HOME BUTTON -->
                <a href="{{ url('/') }}" style="text-decoration: none; color: #94a3b8; font-size: 0.85rem; display: flex; align-items: center; gap: 6px; transition: 0.3s; margin-right: 15px;" onmouseover="this.style.color='#ff2d55'" onmouseout="this.style.color='#94a3b8'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    Back to Home
                </a>

                <!-- Vertical Separator Line -->
                <div style="width:1px; height:20px; background:rgba(255,45,85,0.2); margin-right: 15px;"></div>

                <!-- NEW: THEME TOGGLE BUTTON -->
                <div id="themeToggle" style="cursor: pointer; color: var(--accent-crimson); font-size: 1.1rem; display: flex; align-items: center;">
                    <i class="fas fa-moon" id="themeIcon"></i>
                </div>
            </div>
            
            <a href="{{ route('projects.create') }}" class="add-btn">
                <i class="fas fa-plus me-1"></i> Add New Project
            </a>
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
        /* Force the dropdown content to have white text and a dark background */
.origin-top-right, [role="menu"] {
    background-color: #1a0508 !important; /* Matches your crimson-dark theme */
    border: 1px solid var(--border) !important;
}

.origin-top-right a, .origin-top-right button {
    color: #ffffff !important;
    background-color: transparent !important;
}

.origin-top-right a:hover, .origin-top-right button:hover {
    color: var(--accent-crimson) !important;
    background-color: rgba(255, 45, 85, 0.1) !important;
}
/* --- DARK MODE LOGOUT FIXES --- */

/* Removes the white background from the top nav bar and trigger button */
[data-bs-theme="dark"] nav, 
[data-bs-theme="dark"] nav button {
    background-color: transparent !important;
    color: #ffffff !important;
}

/* Fixes the white box inside the dropdown menu */
[data-bs-theme="dark"] div[role="menu"], 
[data-bs-theme="dark"] .bg-white.rounded-md.ring-1 {
    background-color: #110305 !important; /* Deep crimson black */
    border: 1px solid rgba(255, 45, 85, 0.3) !important;
}

/* Fixes the "Log Out" link color inside the dropdown */
[data-bs-theme="dark"] div[role="menu"] a, 
[data-bs-theme="dark"] div[role="menu"] button {
    color: #ffffff !important;
    background-color: transparent !important;
}

/* Hover effect for Log Out link */
[data-bs-theme="dark"] div[role="menu"] a:hover {
    color: var(--accent-crimson) !important;
    background-color: rgba(255, 45, 85, 0.1) !important;
}

/* --- LIGHT MODE REVERSION --- */

/* Ensures the Log Out link is dark gray in light mode */
[data-bs-theme="light"] div[role="menu"] a {
    color: #374151 !important; /* text-gray-700 */
}

/* Fixes the button look in Light mode */
[data-bs-theme="light"] nav button {
    background-color: #ffffff !important;
    color: #6b7280 !important; /* text-gray-500 */
    border: 1px solid #e5e7eb !important;
}
/* Fix the white block in the top right */
nav button {
    background-color: transparent !important;
    color: white !important;
}
        /* --- DARK THEME STYLES (Default) --- */
        nav, header { 
            background-color: #080102 !important; 
            border-bottom: 1px solid var(--border) !important;
        }
        nav a, nav button, header h2 { color: #ffffff !important; }
        .min-h-screen {
            background: radial-gradient(circle at 50% 0%, #2a050c 0%, #050505 100%) no-repeat fixed !important;
        }

        /* --- LIGHT MODE OVERRIDES --- */
        [data-bs-theme="light"] .min-h-screen {
            background: #f8fafc !important; /* Light Grey background */
        }
        [data-bs-theme="light"] nav, [data-bs-theme="light"] header {
            background-color: #ffffff !important;
            border-bottom: 1px solid #e2e8f0 !important;
        }
        [data-bs-theme="light"] nav a, [data-bs-theme="light"] nav button, [data-bs-theme="light"] header h2 {
            color: #1e293b !important; /* Dark Slate text */
        }
        [data-bs-theme="light"] .cin-header h1 { color: #1e293b !important; }
        [data-bs-theme="light"] .project-card {
            background: #ffffff !important;
            border: 1px solid #e2e8f0 !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1) !important;
        }
        [data-bs-theme="light"] .project-desc { color: #64748b !important; }
        [data-bs-theme="light"] .btn-edit { color: #1e293b !important; border: 1px solid #e2e8f0 !important; }
        [data-bs-theme="light"] .btn-edit:hover { background: #f1f5f9 !important; }

        /* --- DASHBOARD PAGE STYLING --- */
        .cin-page { padding: 44px 32px; max-width: 1200px; margin: 0 auto; animation: fadeIn .8s ease; }
        
        .add-btn {
            background: var(--accent-crimson);
            color: white;
            padding: 10px 24px;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            box-shadow: 0 0 15px rgba(255, 45, 85, 0.3);
        }

        .add-btn:hover {
            background: #ff5e7e;
            box-shadow: 0 0 25px rgba(255, 45, 85, 0.5);
            transform: scale(1.02);
            color: white;
        }

        .project-card {
            background: var(--card-bg);
            backdrop-filter: blur(12px);
            border-radius: 16px;
            border: 1px solid var(--border);
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 24px;
            margin-bottom: 20px;
            transition: 0.4s;
        }

        .project-card:hover { transform: translateX(10px); border-color: var(--accent-crimson); }
        .project-img { width: 100px; height: 100px; border-radius: 12px; object-fit: cover; border: 1px solid var(--border); }
        .project-info { flex-grow: 1; }
        .project-title { font-family: 'Cormorant Garamond', serif; font-size: 1.6rem; color: var(--accent-crimson); margin-bottom: 6px; font-weight: 600; }
        .project-desc { color: var(--muted); font-size: 0.9rem; line-height: 1.5; max-width: 600px; }

        .actions { display: flex; gap: 15px; }
        .btn-edit { color: #fff; text-decoration: none; font-weight: 600; font-size: 0.75rem; letter-spacing: 1px; text-transform: uppercase; padding: 8px 16px; border-radius: 6px; border: 1px solid rgba(255,255,255,0.1); }
        .btn-delete { color: #ef4444; background: none; border: 1px solid rgba(239, 68, 68, 0.2); padding: 8px 16px; border-radius: 6px; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; cursor: pointer; }

        @keyframes fadeIn { from { opacity:0; transform:translateY(15px); } to { opacity:1; transform:translateY(0); } }
        em { color: var(--accent-crimson); font-style: normal; }
    </style>

    <div class="cin-page">
        @if(session('success'))
            <div class="alert-success" style="background: rgba(16, 185, 129, 0.1); color: #10b981; padding: 15px; border-radius: 10px; border: 1px solid rgba(16,185,129,0.2); margin-bottom: 20px;">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="cin-header" style="margin-bottom: 40px; border-left: 3px solid var(--accent-crimson); padding-left: 20px;">
            <h1 style="font-family:'Cormorant Garamond',serif; font-size: 3rem; color: #fff; font-weight: 300;">My <em>Portfolio</em></h1>
            <p style="color: var(--muted); font-size: 0.8rem; letter-spacing: 0.2em; text-transform: uppercase; margin-top: 5px;">Workspace / Manage your works</p>
        </div>

        @forelse($projects as $project)
            <div class="project-card">
                <img src="{{ $project->image_url ? asset('storage/' . $project->image_url) : 'https://via.placeholder.com/100' }}" class="project-img">
                <div class="project-info">
                    <h4 class="project-title">{{ $project->title }}</h4>
                    <p class="project-desc">{{ Str::limit($project->description, 120) }}</p>
                </div>
                <div class="actions">
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn-edit">Edit</a>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Delete this project?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <div style="text-align:center; padding: 80px; color: var(--muted); border: 2px dashed var(--border); border-radius: 24px;">
                <p>No projects found.</p>
            </div>
        @endforelse
    </div>

    <!-- NEW: THEME TOGGLE SCRIPT -->
    <script>
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = document.getElementById('themeIcon');
        const html = document.documentElement;

        // Sync with preference from localStorage
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