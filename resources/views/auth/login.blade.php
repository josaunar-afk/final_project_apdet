<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,600;1,300&family=Poppins:wght@300;400;600&display=swap');

        /* --- CRITICAL: Override Laravel Breeze Default Layout --- */
        /* This removes the white background and centering box from the default guest layout */
        .min-h-screen {
            background: radial-gradient(circle at 50% 0%, #2a050c 0%, #050505 100%) !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }
        /* Hide the default logo container if it exists in your guest layout */
        .min-h-screen > div:first-child:not(.cin-wrapper) {
            display: none !important;
        }
        /* Make the inner Breeze container transparent and full width */
        .w-full.sm\:max-w-md {
            background: transparent !important;
            box-shadow: none !important;
            border: none !important;
            max-width: 480px !important;
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
        }
        
        .cin-card { 
            background: var(--card-bg); 
            backdrop-filter: blur(15px); 
            border-radius: 24px; 
            border: 1px solid var(--border); 
            padding: 45px; 
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
            border-radius: 12px; padding: 14px 16px; color: #fff !important; transition: .3s; 
            margin-bottom: 24px; outline: none;
        }
        .cin-input:focus { border-color: var(--accent-crimson); box-shadow: 0 0 15px rgba(255,45,85,0.2); }

        .login-btn { 
            width: 100%; background: var(--accent-crimson); color: white; border: none; 
            padding: 16px; border-radius: 12px; font-weight: 700; cursor: pointer; 
            transition: .3s; box-shadow: 0 0 20px rgba(255, 45, 85, 0.3);
            text-transform: uppercase; letter-spacing: 1.5px; margin-top: 10px;
        }
        .login-btn:hover { background: #ff5e7e; transform: translateY(-2px); box-shadow: 0 0 30px rgba(255, 45, 85, 0.5); }

        .back-home {
            text-decoration: none; color: var(--muted); font-size: 0.85rem; 
            display: flex; align-items: center; gap: 6px; transition: 0.3s; 
            margin-bottom: 25px;
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
                Log <em>In</em>
            </h3>
            <p style="color: var(--muted); font-size: 0.9rem; margin-bottom: 35px;">Access your creative dashboard</p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

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

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="cin-group">
                    <label class="cin-label" for="email">Email Address</label>
                    <input id="email" type="email" name="email" class="cin-input" value="{{ old('email') }}" required autofocus placeholder="Enter your email">
                </div>

                <!-- Password -->
                <div class="cin-group">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                        <label class="cin-label" style="margin:0;">Password</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" style="color: var(--accent-crimson); font-size: 0.75rem; text-decoration: none; opacity: 0.8;">Forgot?</a>
                        @endif
                    </div>
                    <input id="password" type="password" name="password" class="cin-input" required autocomplete="current-password" placeholder="••••••••">
                </div>

                <!-- Remember Me -->
                <div style="margin-bottom: 30px;">
                    <label for="remember_me" style="display: flex; align-items: center; cursor: pointer; color: var(--muted); font-size: 0.85rem;">
                        <input id="remember_me" type="checkbox" name="remember" style="accent-color: var(--accent-crimson); margin-right: 10px; width: 16px; height: 16px; border-radius: 4px; border: 1px solid var(--border); background: transparent;">
                        Remember me
                    </label>
                </div>

                <button type="submit" class="login-btn">
                    Sign In
                </button>
                
                @if (Route::has('register'))
                    <div style="text-align: center; margin-top: 30px; font-size: 0.85rem; color: var(--muted);">
                        New here? <a href="{{ route('register') }}" style="color: var(--accent-crimson); text-decoration: none; font-weight: 600;">Create Account</a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</x-guest-layout>