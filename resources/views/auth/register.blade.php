<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,600;1,300&family=Poppins:wght@300;400;600&display=swap');

        /* --- CRITICAL: Override Laravel Breeze Default Layout --- */
        .min-h-screen {
            background: radial-gradient(circle at 50% 0%, #2a050c 0%, #050505 100%) !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }
        .min-h-screen > div:first-child:not(.cin-wrapper) {
            display: none !important;
        }
        .w-full.sm\:max-w-md {
            background: transparent !important;
            box-shadow: none !important;
            border: none !important;
            max-width: 500px !important; /* Slightly wider for register form */
        }

        :root {
            --accent-crimson: #ff2d55;
            --card-bg: rgba(22, 5, 8, 0.8); 
            --border: rgba(255, 45, 85, 0.2);
            --text: #ffffff;
            --muted: #94a3b8;
        }

        .cin-wrapper {
            width: 100%;
            font-family: 'Poppins', sans-serif;
            animation: fadeIn 0.8s ease;
            padding: 20px;
        }
        
        .cin-card { 
            background: var(--card-bg); 
            backdrop-filter: blur(15px); 
            border-radius: 24px; 
            border: 1px solid var(--border); 
            padding: 40px; 
            box-shadow: 0 25px 50px rgba(0,0,0,0.6); 
            color: white;
        }

        .cin-label { 
            display:block; margin-bottom:8px; font-size:.75rem; 
            text-transform:uppercase; letter-spacing:.1em; 
            color: var(--muted); font-weight:600; 
        }
        
        .cin-input { 
            width:100%; background: rgba(255,255,255,0.05); border: 1px solid var(--border); 
            border-radius: 12px; padding: 12px 16px; color: #fff !important; transition: .3s; 
            margin-bottom: 20px; outline: none;
        }
        .cin-input:focus { border-color: var(--accent-crimson); box-shadow: 0 0 15px rgba(255,45,85,0.2); }

        .register-btn { 
            width: 100%; background: var(--accent-crimson); color: white; border: none; 
            padding: 16px; border-radius: 12px; font-weight: 700; cursor: pointer; 
            transition: .3s; box-shadow: 0 0 20px rgba(255, 45, 85, 0.3);
            text-transform: uppercase; letter-spacing: 1.5px; margin-top: 10px;
        }
        .register-btn:hover { background: #ff5e7e; transform: translateY(-2px); box-shadow: 0 0 30px rgba(255, 45, 85, 0.5); }

        .back-home {
            text-decoration: none; color: var(--muted); font-size: 0.85rem; 
            display: inline-flex; align-items: center; gap: 6px; transition: 0.3s; 
            margin-bottom: 20px;
        }
        .back-home:hover { color: var(--accent-crimson); }

        .error-box { 
            background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); 
            color: #f87171; padding: 16px; border-radius: 12px; margin-bottom: 24px; font-size: 0.9rem; 
        }

        @keyframes fadeIn { from { opacity:0; transform:translateY(20px); } to { opacity:1; transform:translateY(0); } }
        em { color: var(--accent-crimson); font-style: normal; }
    </style>

    <div class="cin-wrapper">
        <!-- Navigation -->
        <a href="/" class="back-home">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
            Back to Home
        </a>

        <div class="cin-card">
            <h3 style="font-family:'Cormorant Garamond',serif; font-size:2.5rem; font-weight:300; margin-bottom: 5px;">
                Create <em>Account</em>
            </h3>
            <p style="color: var(--muted); font-size: 0.9rem; margin-bottom: 30px;">Join the community of creators</p>

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="error-box">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="cin-group">
                    <label class="cin-label" for="name">Full Name</label>
                    <input id="name" type="text" name="name" class="cin-input" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="John Doe">
                </div>

                <!-- Email Address -->
                <div class="cin-group">
                    <label class="cin-label" for="email">Email Address</label>
                    <input id="email" type="email" name="email" class="cin-input" value="{{ old('email') }}" required autocomplete="username" placeholder="name@example.com">
                </div>

                <!-- Password -->
                <div class="cin-group">
                    <label class="cin-label" for="password">Password</label>
                    <input id="password" type="password" name="password" class="cin-input" required autocomplete="new-password" placeholder="••••••••">
                </div>

                <!-- Confirm Password -->
                <div class="cin-group">
                    <label class="cin-label" for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="cin-input" required autocomplete="new-password" placeholder="••••••••">
                </div>

                <button type="submit" class="register-btn">
                    Register Now
                </button>
                
                <div style="text-align: center; margin-top: 25px; font-size: 0.85rem; color: var(--muted);">
                    Already registered? <a href="{{ route('login') }}" style="color: var(--accent-crimson); text-decoration: none; font-weight: 600;">Log In</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>