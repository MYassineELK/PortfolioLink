<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PortfolioLink — Create Account</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet" />

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sora: ['Sora', 'sans-serif'],
            dm: ['DM Sans', 'sans-serif'],
          },
          animation: {
            'fade-up': 'fadeUp 0.7s ease both',
            'fade-up-1': 'fadeUp 0.7s 0.15s ease both',
            'fade-up-2': 'fadeUp 0.7s 0.30s ease both',
            'fade-up-3': 'fadeUp 0.7s 0.45s ease both',
          },
          keyframes: {
            fadeUp: {
              from: {
                opacity: '0',
                transform: 'translateY(18px)'
              },
              to: {
                opacity: '1',
                transform: 'translateY(0)'
              },
            },
          },
        },
      },
    }
  </script>

  <style>
    body {
      background: #0d1117;
    }

    .gradient-text {
      background: linear-gradient(90deg, #4f8fff 0%, #9b6bff 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .left-glow::before {
      content: '';
      position: absolute;
      inset: 0;
      background: radial-gradient(ellipse 80% 50% at 50% 5%, rgba(30, 80, 210, 0.25) 0%, transparent 65%);
      pointer-events: none;
      border-radius: inherit;
    }

    .input-line {
      background: transparent;
      border: none;
      border-bottom: 1px solid rgba(255, 255, 255, 0.15);
      outline: none;
      width: 100%;
      padding: 10px 0;
      color: #fff;
      font-size: 14px;
      font-family: 'DM Sans', sans-serif;
      transition: border-color 0.2s;
    }

    .input-line::placeholder {
      color: rgba(255, 255, 255, 0.35);
    }

    .input-line:focus {
      border-bottom-color: rgba(100, 160, 255, 0.6);
    }

    .input-li {
      background: transparent;
      border: none;
      border-bottom: 1px solid rgba(255, 255, 255, 0.15);
      outline: none;
      width: 100%;
      padding: 10px 0;
      color: #fff;
      font-size: 14px;
      font-family: 'DM Sans', sans-serif;
      transition: border-color 0.2s;
    }

    .input-li:focus {
      border-bottom-color: red;
    }

    .btn-primary {
      background: linear-gradient(90deg, #4f8fff 0%, #8b5cf6 100%);
      transition: opacity 0.2s, transform 0.15s;
    }

    .btn-primary:hover {
      opacity: 0.9;
    }

    .btn-primary:active {
      transform: scale(0.98);
    }

    .btn-outline {
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid rgba(255, 255, 255, 0.10);
      transition: background 0.2s;
    }

    .btn-outline:hover {
      background: rgba(255, 255, 255, 0.08);
    }

    .role-tab.active {
      background: linear-gradient(90deg, #4f8fff, #7c5cf6);
      color: #fff;
    }

    .role-tab {
      cursor: pointer;
      padding: 8px 20px;
      border-radius: 999px;
      font-size: 13px;
      font-weight: 500;
      color: rgba(255, 255, 255, 0.45);
      transition: all 0.2s;
      font-family: 'DM Sans', sans-serif;
    }

    .role-tab:not(.active):hover {
      color: rgba(255, 255, 255, 0.75);
    }

    /* password strength bar */
    .strength-bar {
      height: 3px;
      border-radius: 99px;
      transition: width 0.3s, background 0.3s;
    }

    input[type="checkbox"] {
      accent-color: #4f8fff;
    }
  </style>
</head>

<body class="min-h-screen flex items-center justify-center font-dm p-5">

  <div class="grid grid-cols-2 w-full max-w-4xl rounded-3xl overflow-hidden shadow-2xl" style="min-height:660px; border:1px solid rgba(255,255,255,0.06);">

    <!-- ══════════════ LEFT — Splash ══════════════ -->
    <div class="relative bg-[#080e1d] flex flex-col items-center justify-between px-10 py-12 left-glow overflow-hidden">

      <div class="absolute top-3 left-1/2 -translate-x-1/2 w-14 h-1 bg-white/10 rounded-full"></div>

      <!-- Icon -->
      <div class="animate-fade-up">
        <div class="w-[66px] h-[66px] rounded-[18px] bg-blue-950/60 border border-blue-500/20 flex items-center justify-center">
          <svg width="34" height="34" viewBox="0 0 32 32" fill="none">
            <circle cx="16" cy="16" r="4" fill="#5a9fff" />
            <circle cx="16" cy="5" r="2.8" fill="#4f8fff" />
            <circle cx="16" cy="27" r="2.8" fill="#4f8fff" />
            <circle cx="5" cy="16" r="2.8" fill="#4f8fff" />
            <circle cx="27" cy="16" r="2.8" fill="#4f8fff" />
            <circle cx="8.5" cy="8.5" r="2.3" fill="#3a7aee" />
            <circle cx="23.5" cy="23.5" r="2.3" fill="#3a7aee" />
            <circle cx="23.5" cy="8.5" r="2.3" fill="#3a7aee" />
            <circle cx="8.5" cy="23.5" r="2.3" fill="#3a7aee" />
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
          <path d="M9 2L14 6.5V12L9 16L4 12V6.5L9 2Z" stroke="rgba(160,185,255,0.5)" stroke-width="1.2" fill="none" />
          <path d="M9 5.5L12 8V11.5L9 14L6 11.5V8L9 5.5Z" fill="rgba(80,130,255,0.2)" stroke="rgba(100,150,255,0.35)" stroke-width="0.8" />
        </svg>
        <span class="text-[10.5px] font-medium tracking-[3px] uppercase text-blue-300/40">PortfolioLink</span>
      </div>
    </div>

    <!-- ══════════════ RIGHT — Register Form ══════════════ -->
    <form action="index.php?action=signup" method="post" id="form">
      <div class="bg-[#0f1623] flex flex-col justify-center px-12 py-10 gap-5 overflow-y-auto">

        <!-- Role Selector -->
        <div class="flex flex-col items-center gap-3">
          <p class="text-[11px] font-semibold tracking-[2.5px] uppercase text-white/35">Select your role</p>
          <div class="flex items-center rounded-full p-1 gap-1" id="rols" style="background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.07);">
            <span class="role-tab" onclick="setRole(this)">Student</span>
            <span class="role-tab" onclick="setRole(this)">Professor</span>
            <span class="role-tab" onclick="setRole(this)">Company</span>
            <input type="hidden" name="role" id="role">
          </div>
        </div>

        <!-- Heading -->
        <div>
          <h2 class="font-sora font-bold text-white text-3xl leading-tight">Create account</h2>
          <p class="text-[13px] text-white/40 mt-1">Join PortfolioLink and showcase your academic journey.</p>
        </div>

        <!-- Name row -->
        <div class="grid grid-cols-2 gap-4">
          <div>
            <input type="text" name="First_Name" id="name" placeholder="First Name" class="input-line" />
          </div>
          <div>
            <input type="text" name="Last_Name" id="last_name" placeholder="Last Name" class="input-line" />
          </div>
        </div>

        <!-- Email -->
        <div>
          <input type="email" name="Email" id="email" placeholder="Email Address" class="input-line" />
        </div>

        <!-- Password + strength -->
        <div>
          <div class="relative">
            <input type="password" name="Password" id="pwd" placeholder="Password" class="input-line pr-8" oninput="checkStrength(this.value)" />
            <span onclick="togglePwd('pwd','eyePwd')" class="absolute right-0 top-1/2 -translate-y-1/2 text-white/30 hover:text-white/60 transition-colors">
              <svg id="eyePwd" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                <circle cx="12" cy="12" r="3" />
              </svg>
            </span>
          </div>
          <!-- Strength bar -->
          <div class="flex gap-1 mt-2">
            <div class="flex-1 h-[3px] rounded-full bg-white/10 overflow-hidden">
              <div id="bar1" class="strength-bar w-0 bg-red-500"></div>
            </div>
            <div class="flex-1 h-[3px] rounded-full bg-white/10 overflow-hidden">
              <div id="bar2" class="strength-bar w-0 bg-yellow-400"></div>
            </div>
            <div class="flex-1 h-[3px] rounded-full bg-white/10 overflow-hidden">
              <div id="bar3" class="strength-bar w-0 bg-green-400"></div>
            </div>
          </div>
          <p id="strengthLabel" class="text-[11px] text-white/30 mt-1"></p>
        </div>

        <!-- Confirm Password -->
        <div class="relative">
          <input type="password" id="cpwd" placeholder="Confirm Password" class="input-line pr-8" />
          <span onclick="togglePwd('cpwd','eyeCpwd')" class="absolute right-0 top-1/2 -translate-y-1/2 text-white/30 hover:text-white/60 transition-colors">
            <svg id="eyeCpwd" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
              <circle cx="12" cy="12" r="3" />
            </svg>
          </span>
        </div>

        <!-- Terms -->
        <label class="flex items-start gap-2.5 cursor-pointer">
          <input type="checkbox" class="mt-0.5 w-4 h-4" />
          <span class="text-[13px] text-white/40 leading-relaxed">
            I agree to the
            <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors">Terms of Service</a>
            and
            <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors">Privacy Policy</a>
          </span>
        </label>

        <!-- Create Button -->
        <span onclick="validation()" class="btn-primary w-full py-3.5  rounded-full text-white text-[13px] font-semibold tracking-widest uppercase">
          <center>Create my account</center>
        </span>

        <!-- Login link -->
        <p class="text-center text-[13px] text-white/35">
          Already have an account?
          <a href="index.php?action=p_login" class="text-blue-400 hover:text-blue-300 transition-colors ml-1">Sign in</a>
        </p>

      </div>
    </form>
  </div>

  <script>
    function setRole(el) {
      document.getElementById("rols").style.border = "none"
      document.querySelectorAll('.role-tab').forEach(t => t.classList.remove('active'));
      el.classList.add('active');
      document.getElementById("role").value = el.innerText
    }


    // validation inpute
    function validation() {

      let furst_name = document.getElementById("name");
      let pas = document.getElementById("pwd");
      let pasc = document.getElementById("cpwd");
      let last_name = document.getElementById("last_name");
      let role = document.getElementById("role");
      let email = document.getElementById("email");
      if (role.value == "") {
        document.getElementById("rols").style.borderColor = "red"

      } else if (furst_name.value == "") {
        furst_name.focus()
        furst_name.className = "input-li"

      } else if (last_name.value == "") {
        last_name.focus()
        last_name.className = "input-li"
      } else if (email.value == "") {
        email.focus()
        email.className = "input-li"
      } else if (!/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/.test(email.value)) {
        email.focus()
        email.className = "input-li"
      } else if (pas.value == "" || document.getElementById("strengthLabel").textContent == "Weak") {
        pas.focus()
        pas.className = "input-li"
      } else if (pasc.value == "" || pas.value != pasc.value) {
        pasc.focus()
        pasc.className = "input-li"
      } else {
        document.getElementById("form").submit()
      }

    }
    // 
    function togglePwd(inputId, iconId) {
      const inp = document.getElementById(inputId);
      inp.type = inp.type === 'password' ? 'text' : 'password';
    }

    function checkStrength(val) {
      const bars = ['bar1', 'bar2', 'bar3'];
      const labels = ['', 'Weak', 'Fair', 'Strong'];
      let score = 0;
      if (val.length >= 8) score++;
      if (/[A-Z]/.test(val) && /[0-9]/.test(val)) score++;
      if (/[^A-Za-z0-9]/.test(val) && val.length >= 12) score++;

      bars.forEach((id, i) => {
        document.getElementById(id).style.width = i < score ? '100%' : '0%';
      });
      document.getElementById('strengthLabel').textContent = val.length ? labels[score] || 'Weak' : '';
    }
  </script>

</body>

</html>