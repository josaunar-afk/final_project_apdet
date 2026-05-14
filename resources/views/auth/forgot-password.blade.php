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
            border-radius: 12px; padding: 14px 16px; color: #fff !important; transition: .3s; 
            margin-bottom: 24px; outline: none;
        }
        .cin-input:focus { border-color: var(--accent-crimson); box-shadow: 0 0 15px rgba(255,45,85,0.2); }

        .reset-btn { 
            width: 100%; background: var(--accent-crimson); color: white; border: none; 
            padding: 16px; border-radius: 12px; font-weight: 700; cursor: pointer; 
            transition: .3s; box-shadow: 0 0 20px rgba(255, 45, 85, 0.3);
            text-transform: uppercase; letter-spacing: 1.5px;
        }
        .reset-btn:hover { background: #ff5e7e; transform: translateY(-2px); box-shadow: 0 0 30px rgba(255, 45, 85, 0.5); }

        .back-link {
            text-decoration: none; color: var(--muted); font-size: 0.85rem; 
            display: inline-flex; align-items: center; gap: 6px; transition: 0.3s; 
            margin-bottom: 20px;
        }
        .back-link:hover { color: var(--accent-crimson); }

        .info-text {
            color: var(--muted);
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        @keyframes fadeIn { from { opacity:0; transform:translateY(20px); } to { opacity:1; transform:translateY(0); } }
        em { color: var(--accent-crimson); font-style: normal; }
    </style>

    <div class="cin-wrapper">
        <!-- Navigation -->
        <a href="{{ route('login') }}" class="back-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
            Back to Login
        </a>

        <div class="cin-card">
            <h3 style="font-family:'Cormorant Garamond',serif; font-size:2.5rem; font-weight:300; margin-bottom: 10px;">
                Reset <em>Password</em>
            </h3>
            
            <p class="info-text">
                {{ __('Forgot your password? No problem. Enter your email address and we will send you a reset link.') }}
            </p>

            <!-- Session Status (Success Message) -->
            <x-auth-session-status class="mb-4" style="color: #4ade80; font-size: 0.9rem;" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="cin-group">
                    <label class="cin-label" for="email">Email Address</label>
                    <input id="email" type="email" name="email" class="cin-input" value="{{ old('email') }}" required autofocus placeholder="Enter your registered email">
                    <x-input-error :messages="$errors->get('email')" style="color: #f87171; font-size: 0.8rem; margin-top: -15px; margin-bottom: 15px;" />
                </div>

                <button type="submit" class="reset-btn">
                    {{ __('Email Reset Link') }}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>