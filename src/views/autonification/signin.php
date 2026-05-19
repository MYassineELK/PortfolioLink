<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PortfolioLink — Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet" />

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sora: ['Sora', 'sans-serif'],
            dm:   ['DM Sans', 'sans-serif'],
          },
          animation: {
            'fade-up':   'fadeUp 0.7s ease both',
            'fade-up-1': 'fadeUp 0.7s 0.15s ease both',
            'fade-up-2': 'fadeUp 0.7s 0.30s ease both',
            'fade-up-3': 'fadeUp 0.7s 0.45s ease both',
          },
          keyframes: {
            fadeUp: {
              from: { opacity: '0', transform: 'translateY(18px)' },
              to:   { opacity: '1', transform: 'translateY(0)' },
            },
          },
        },
      },
    }
  </script>
        <script src="src/assets/js/js_signin.js"></script>
     <link rel="stylesheet" href="src/assets/css/style_singin.css">


 
</head>

<body class="min-h-screen flex items-center justify-center font-dm p-5">

  <div class="grid grid-cols-2 w-full max-w-4xl h-[620px] rounded-3xl overflow-hidden shadow-2xl card-border">

    <!-- LEFT — Splash -->
    <div class="relative bg-[#080e1d] flex flex-col items-center justify-between px-10 py-12 left-glow overflow-hidden">

      <div class="absolute top-3 left-1/2 -translate-x-1/2 w-14 h-1 bg-white/10 rounded-full"></div>

      <!-- Icon -->
      <div class="animate-fade-up">
        <div class="w-[66px] h-[66px] rounded-[18px] bg-blue-950/60 border border-blue-500/20 flex items-center justify-center">
          <svg width="34" height="34" viewBox="0 0 32 32" fill="none">
            <circle cx="16" cy="16" r="4"   fill="#5a9fff"/>
            <circle cx="16" cy="5"  r="2.8" fill="#4f8fff"/>
            <circle cx="16" cy="27" r="2.8" fill="#4f8fff"/>
            <circle cx="5"  cy="16" r="2.8" fill="#4f8fff"/>
            <circle cx="27" cy="16" r="2.8" fill="#4f8fff"/>
            <circle cx="8.5"  cy="8.5"  r="2.3" fill="#3a7aee"/>
            <circle cx="23.5" cy="23.5" r="2.3" fill="#3a7aee"/>
            <circle cx="23.5" cy="8.5"  r="2.3" fill="#3a7aee"/>
            <circle cx="8.5"  cy="23.5" r="2.3" fill="#3a7aee"/>
          </svg>
        </div>
      </div>

      <!-- Text -->
      <div class="animate-fade-up-1 flex flex-col items-center gap-5 text-center">
        <div>
          <h1 class="font-sora font-extrabold text-white leading-none" style="font-size:46px;letter-spacing:-2px;">Academic</h1>
          <h1 class="font-sora font-extrabold gradient-text leading-none" style="font-size:46px;letter-spacing:-2px;">Futurism</h1>
        </div>
        <p class="text-[13.5px] text-blue-200/55 leading-relaxed max-w-[210px]">
          The bridge between academic excellence and professional opportunities. Showcase your journey.
        </p>
      </div>

      <!-- Dots -->
      <div class="animate-fade-up-2 flex items-center gap-[7px]">
        <span class="w-2 h-2 rounded-full bg-blue-400/70"></span>
        <span class="w-2 h-2 rounded-full bg-purple-500/50"></span>
        <span class="w-2 h-2 rounded-full bg-blue-900/70"></span>
      </div>

      <!-- Branding -->
      <div class="animate-fade-up-3 flex items-center gap-2">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
          <path d="M9 2L14 6.5V12L9 16L4 12V6.5L9 2Z" stroke="rgba(160,185,255,0.5)" stroke-width="1.2" fill="none"/>
          <path d="M9 5.5L12 8V11.5L9 14L6 11.5V8L9 5.5Z" fill="rgba(80,130,255,0.2)" stroke="rgba(100,150,255,0.35)" stroke-width="0.8"/>
        </svg>
        <span class="text-[10.5px] font-medium tracking-[3px] uppercase text-blue-300/40">PortfolioLink</span>
      </div>

    </div>
<form action="index.php?action=login" method="POST" id="form">
    <!-- RIGHT — Login Form -->
    <div class="bg-[#0f1623] flex flex-col justify-center px-12 py-10 gap-6">

      <!-- Role Selector -->
      <div class="flex flex-col items-center gap-3">
        <p class="text-[11px] font-semibold tracking-[2.5px] uppercase text-white/30">Select your role</p>
        <div id="rols" class="flex items-center rounded-full p-1 gap-1 role-tabs-wrap">
          <span class="role-tab active" onclick="setRole(this)">Student</span>
          <span class="role-tab"        onclick="setRole(this)">Professor</span>
          <span class="role-tab"        onclick="setRole(this)">Company</span>
          <input type="hidden" name="role" id="role" value="Student">

        </div>
      </div>

      <!-- Heading -->
      <div>
        <h2 class="font-sora font-bold text-white text-3xl leading-tight">Welcome back</h2>
        <p class="text-[13px] text-white/40 mt-1">Enter your credentials to access your academic portal.</p>
      </div>

      <!-- Inputs -->
      <div class="flex flex-col gap-5">
        <input type="email" id="email" name="Email"  placeholder="Email Address" class="input-line" />
        <input type="password" id="pwd" name="pwd" placeholder="Password"      class="input-line" />
      </div>

      <!-- Remember / Forgot -->
      <div class="flex items-center justify-between -mt-1">
        <label class="flex items-center gap-2 cursor-pointer">
          <input type="checkbox" class="w-4 h-4 rounded" />
          <span class="text-[13px] text-white/40">Remember me</span>
        </label>
        <a href="#" class="text-[13px] text-blue-400 hover:text-blue-300 transition-colors">Forgot password?</a>
      </div>

      <!-- Sign In Button -->
      <span  onclick="validation()"  class="btn-signin w-full py-3.5 rounded-full text-white text-[13px] font-semibold tracking-widest uppercase">
       <center> Sign in to PortfolioLink</center>
      </span>

      <!-- Divider -->
      <div class="flex items-center gap-3">
        <div class="flex-1 h-px bg-white/10"></div>
        <span class="text-[11px] text-white/30 tracking-widest uppercase">Or continue with</span>
        <div class="flex-1 h-px bg-white/10"></div>
      </div>

      <!-- LinkedIn Button -->
      <button class="btn-outline w-full py-3.5 rounded-full flex items-center justify-center gap-3 text-white/75 text-[13px] font-medium">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
          <rect width="24" height="24" rx="4" fill="#0A66C2"/>
          <path d="M7 9.5H5V19H7V9.5ZM6 8.5C5.4 8.5 5 8.1 5 7.5C5 6.9 5.4 6.5 6 6.5C6.6 6.5 7 6.9 7 7.5C7 8.1 6.6 8.5 6 8.5ZM19 19H17V14C17 12.9 16.6 12 15.5 12C14.6 12 14 12.7 14 14V19H12V9.5H14V10.5C14.5 9.8 15.3 9.4 16.2 9.4C17.8 9.4 19 10.6 19 12.8V19Z" fill="white"/>
        </svg>
        Import from LinkedIn PDF
      </button>

      <!-- Register -->
      <p class="text-center text-[13px] text-white/35">
        New to PortfolioLink?
        <a href="index.php?action=p_signup" class="text-blue-400 hover:text-blue-300 transition-colors ml-1">Create an account</a>
      </p>

    </div>
    </form>
  </div>

 

</body>
</html>