<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=1280">
<title>PortfolioLink — Where Academic Work Meets Opportunity</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,700;0,9..144,900;1,9..144,300;1,9..144,700&family=Plus+Jakarta+Sans:wght@300;400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="src/assets/css/style_page_pranispale.css">

</head>
<body>

<div class="cursor-glow" id="cglow"></div>

<!-- NAV -->
<nav>
  <a href="#" class="logo">
    <div class="logo-mark">
      <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="2" y="2" width="5" height="5" rx="1.5" fill="#fff"/><rect x="9" y="2" width="5" height="5" rx="1.5" fill="#fff" opacity=".5"/><rect x="2" y="9" width="5" height="5" rx="1.5" fill="#fff" opacity=".5"/><rect x="9" y="9" width="5" height="5" rx="1.5" fill="#fff"/></svg>
    </div>
    <span class="logo-text">Portfolio<span>Link</span></span>
  </a>
  <ul class="nav-links">
    <li><a href="#platform">Platform</a></li>
    <li><a href="#features">Features</a></li>
    <li><a href="#roles">For Who</a></li>
    <li><a href="#how">How it works</a></li>
  </ul>
  <div class="nav-right">
    <a href="index.php?action=p_login" class="btn-ng">Sign in</a>
    <a href="index.php?action=p_signup" class="btn-nm">Get started →</a>
  </div>
</nav>

<!-- HERO -->
<section class="hero">
  <div class="hero-bg">
    <div class="blob b1"></div><div class="blob b2"></div><div class="blob b3"></div>
  </div>
  <div class="hero-content">
    <div class="eyebrow"><div class="edot"></div>Academic Year 2025–2026 · v1.0</div>
    <h1>Your best work<br><em>deserves to be seen.</em><span class="l2">Finally.</span></h1>
    <p class="hero-desc">PortfolioLink connects students, professors, and companies — where academic projects get officially validated and talent gets discovered.</p>
    <div class="hero-actions">
      <a href="./views/autonification/signup.php" class="btn-bm">Build your portfolio <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M3 7h8M7 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
      <a href="./views/autonification/signin.php" class="btn-bg">Sign in</a>
    </div>
  </div>
  <div class="hero-mockup">
    <div class="mglow"></div>
    <div class="browser">
      <div class="bbar">
        <div class="bdots"><span></span><span></span><span></span></div>
        <div class="burl">portfoliolink.ma/dashboard</div>
        <div style="width:60px"></div>
      </div>
      <div class="dprev">
        <div class="dsidebar">
          <div class="ditem act"><div class="dic" style="background:var(--blue);border-radius:4px"></div>Dashboard</div>
          <div class="ditem"><div class="dic" style="background:var(--s3)"></div>My Projects</div>
          <div class="ditem"><div class="dic" style="background:var(--s3)"></div>Portfolio</div>
          <div class="ditem"><div class="dic" style="background:var(--s3)"></div>Messages</div>
          <div class="ditem"><div class="dic" style="background:var(--s3)"></div>Settings</div>
        </div>
        <div class="dmain">
          <div class="drow">
            <div class="kpi"><div class="kv m">2,418</div><div class="kl">STUDENTS</div></div>
            <div class="kpi"><div class="kv g">130</div><div class="kl">COMPANIES</div></div>
            <div class="kpi"><div class="kv r">96%</div><div class="kl">APPROVAL RATE</div></div>
          </div>
          <div style="font-size:11px;color:var(--t3);font-family:'JetBrains Mono',monospace;margin-bottom:10px">Recent submissions</div>
          <div class="plist">
            <div class="prow"><div class="pav" style="background:linear-gradient(135deg,var(--blue),var(--purple))">YK</div><div class="pi"><div class="pt">Smart Irrigation System with ML</div><div class="ps">Yassin El Kacimi · 2h ago</div></div><div class="sp sa">Pending</div></div>
            <div class="prow"><div class="pav" style="background:linear-gradient(135deg,var(--green),#0FA860)">DA</div><div class="pi"><div class="pt">E-Commerce Platform PHP OOP</div><div class="ps">Douaa Amrani · 1d ago</div></div><div class="sp sg">Approved</div></div>
            <div class="prow"><div class="pav" style="background:linear-gradient(135deg,var(--amber),#C07818)">NB</div><div class="pi"><div class="pt">Real-time Chat App — WebSockets</div><div class="ps">Najwa Benmoussa · 3d ago</div></div><div class="sp sg">Approved</div></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<hr class="div">
<div class="logos-bar">
  <div class="ll">Used at leading institutions</div>
  <div class="logos-marquee-wrap">
    <div class="logos-marquee-fade-l"></div>
    <div class="logos-marquee-fade-r"></div>
    <div class="logos-marquee-inner">
      <span class="li">🎓 ISTA Casablanca</span>
      <span class="li-sep">✦</span>
      <span class="li">🎓 OFPPT Tanger</span>
      <span class="li-sep">✦</span>
      <span class="li">🎓 ENSA Tanger</span>
      <span class="li-sep">✦</span>
      <span class="li">🎓 ENSI Tanger</span>
      <span class="li-sep">✦</span>
      <span class="li">🎓 FST Tanger</span>
      <span class="li-sep">✦</span>
      <span class="li">🎓 ENSIAS Rabat</span>
      <span class="li-sep">✦</span>
      <span class="li">🎓 ENCG Settat</span>
      <span class="li-sep">✦</span>
      <span class="li">🎓 ISTA Casablanca</span>
      <span class="li-sep">✦</span>
      <span class="li">🎓 OFPPT Tanger</span>
      <span class="li-sep">✦</span>
      <span class="li">🎓 ENSA Tanger</span>
      <span class="li-sep">✦</span>
      <span class="li">🎓 ENSI Tanger</span>
      <span class="li-sep">✦</span>
      <span class="li">🎓 FST Tanger</span>
      <span class="li-sep">✦</span>
      <span class="li">🎓 ENSIAS Rabat</span>
      <span class="li-sep">✦</span>
      <span class="li">🎓 ENCG Settat</span>
      <span class="li-sep">✦</span>
    </div>
  </div>
</div>
<hr class="div">

<!-- ══════════════════════════════════════
     PLATFORM SHOWCASE — 3 REAL PAGES
══════════════════════════════════════ -->
<section class="showcase-sec reveal" id="platform">
  <div class="sh">
    <div class="sh-tag">// The platform</div>
    <h2>Every role has<br><em>its own workspace.</em></h2>
    <p>Three tailored experiences — built around how students, professors, and companies actually work.</p>
  </div>

  <div class="showcase-tabs">
    <button class="stab act" onclick="switchShow('rq',this)">
      📋 Review Queue
      <span class="stab-badge">12</span>
    </button>
    <button class="stab" onclick="switchShow('ps',this)">⚙️ Profile Settings</button>
    <button class="stab" onclick="switchShow('ts',this)">🔍 Talent Search</button>
  </div>

  <!-- ── PANEL 1: REVIEW QUEUE ── -->
  <div class="spanel act" id="show-rq">
    <div class="app-shell">
      <!-- top bar -->
      <div class="app-topbar">
        <div class="app-logo-sm">
          <div class="dot"><svg width="9" height="9" viewBox="0 0 16 16" fill="none"><rect x="2" y="2" width="5" height="5" rx="1.5" fill="#fff"/><rect x="9" y="9" width="5" height="5" rx="1.5" fill="#fff"/></svg></div>
          PortfolioLink
        </div>
        <div class="app-search">
          <span class="app-search-icon">🔍</span>
          <span class="app-search-txt">Search projects, students, or skills...</span>
        </div>
        <div class="app-topnav">
          <span class="atnl">Dashboard</span>
          <span class="atnl">Analytics</span>
          <span class="atnl">Messages</span>
          <span class="atnl act">Students</span>
        </div>
        <div class="app-topbar-right">
          <div class="notif-btn">🔔</div>
          <div class="avatar-sm">PR</div>
        </div>
      </div>
      <!-- layout -->
      <div class="rq-layout">
        <div class="rq-sidebar">
          <div class="rq-sidebar-label">Navigation</div>
          <div class="rq-sidebar-item"><div class="rq-sidebar-item-l"><div class="rq-sic" style="background:var(--s3)"></div>Overview</div></div>
          <div class="rq-sidebar-item act"><div class="rq-sidebar-item-l"><div class="rq-sic" style="background:var(--blue)"></div>Pending Reviews</div><div class="rq-badge">12</div></div>
          <div class="rq-sidebar-item"><div class="rq-sidebar-item-l"><div class="rq-sic" style="background:var(--s3)"></div>Completed</div></div>
          <div class="rq-sidebar-item"><div class="rq-sidebar-item-l"><div class="rq-sic" style="background:var(--s3)"></div>My Students</div></div>
          <div class="rq-sidebar-item"><div class="rq-sidebar-item-l"><div class="rq-sic" style="background:var(--s3)"></div>Curriculum</div></div>
          <div style="margin-top:auto;padding-top:20px">
            <div class="rq-progress">
              <div class="rq-prog-label">Review Progress</div>
              <div class="rq-prog-bar"><div class="rq-prog-fill"></div></div>
              <div class="rq-prog-sub">8 of 12 projects reviewed today</div>
            </div>
          </div>
        </div>
        <div class="rq-main">
          <div class="rq-header">
            <div>
              <div class="rq-title-h">Review Queue</div>
              <div class="rq-title-sub">Manage and evaluate student project submissions. Ensure high standards for the PortfolioLink showcase.</div>
            </div>
            <div class="rq-header-btns">
              <div class="rq-btn">⚙ Filter</div>
              <div class="rq-btn">↕ Newest First</div>
            </div>
          </div>
          <div class="rq-card-grid">
            <div class="rq-card">
              <div class="rq-card-img" style="background:linear-gradient(135deg,#1a1a2e,#16213e)">
                <div class="rq-card-img-inner">🤖</div>
                <div class="rq-card-img-badge" style="background:rgba(245,166,35,.15);color:var(--amber)">AI · ML</div>
              </div>
              <div class="rq-card-body">
                <div class="rq-card-meta">
                  <div class="rq-card-av" style="background:linear-gradient(135deg,var(--blue),var(--purple))">AJ</div>
                  <div class="rq-card-name">Alex Johnson · Computer Science · Oct 12</div>
                </div>
                <div class="rq-card-title">AI Ethics Analysis Framework</div>
                <div class="rq-card-desc">Exploring the ethical implications of large scale AI models through a new quantitative auditing framework...</div>
                <div class="rq-review-btn">Review Submission</div>
              </div>
            </div>
            <div class="rq-card">
              <div class="rq-card-img" style="background:linear-gradient(135deg,#0d2137,#1a3550)">
                <div class="rq-card-img-inner">🌆</div>
                <div class="rq-card-img-badge" style="background:rgba(45,217,143,.1);color:var(--green)">Engineering</div>
              </div>
              <div class="rq-card-body">
                <div class="rq-card-meta">
                  <div class="rq-card-av" style="background:linear-gradient(135deg,var(--green),#0FA860)">SC</div>
                  <div class="rq-card-name">Sarah Chen · Urban Engineering · Oct 11</div>
                </div>
                <div class="rq-card-title">Sustainable Urbanism: Vertical Gardens</div>
                <div class="rq-card-desc">A study on green architecture in dense urban environments focusing on bio-integrated design...</div>
                <div class="rq-review-btn">Review Submission</div>
              </div>
            </div>
            <div class="rq-card">
              <div class="rq-card-img" style="background:linear-gradient(135deg,#1e1428,#2d1f3d)">
                <div class="rq-card-img-inner">⛓️</div>
                <div class="rq-card-img-badge" style="background:rgba(123,94,167,.12);color:var(--purple)">Blockchain</div>
              </div>
              <div class="rq-card-body">
                <div class="rq-card-meta">
                  <div class="rq-card-av" style="background:linear-gradient(135deg,var(--amber),#C07818)">EW</div>
                  <div class="rq-card-name">Emma Wilson · Engineering · Oct 10</div>
                </div>
                <div class="rq-card-title">Blockchain Supply Tracker</div>
                <div class="rq-card-desc">Implementation of distributed ledger technology to ensure transparency in supply chain management...</div>
                <div class="rq-review-btn">Review Submission</div>
              </div>
            </div>
            <div class="rq-card">
              <div class="rq-card-img" style="background:linear-gradient(135deg,#0f1f2d,#1a3040)">
                <div class="rq-card-img-inner">🧠</div>
                <div class="rq-card-img-badge" style="background:rgba(79,142,247,.1);color:var(--blue)">Data Science</div>
              </div>
              <div class="rq-card-body">
                <div class="rq-card-meta">
                  <div class="rq-card-av" style="background:linear-gradient(135deg,var(--red),#A03030)">MR</div>
                  <div class="rq-card-name">Mike Ross · Data Science · Oct 10</div>
                </div>
                <div class="rq-card-title">Neural Network Optimization</div>
                <div class="rq-card-desc">Improving backpropagation efficiency in deep learning models using localized weighting vectors and pruned layers...</div>
                <div class="rq-review-btn">Review Submission</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ── PANEL 2: PROFILE SETTINGS ── -->
  <div class="spanel" id="show-ps">
    <div class="app-shell">
      <div class="app-topbar">
        <div class="app-logo-sm">
          <div class="dot"><svg width="9" height="9" viewBox="0 0 16 16" fill="none"><rect x="2" y="2" width="5" height="5" rx="1.5" fill="#fff"/><rect x="9" y="9" width="5" height="5" rx="1.5" fill="#fff"/></svg></div>
          PortfolioLink
        </div>
        <div class="app-search">
          <span class="app-search-icon">🔍</span>
          <span class="app-search-txt">Search projects or people...</span>
        </div>
        <div class="app-topnav">
          <span class="atnl">Projects</span>
          <span class="atnl">Network</span>
          <span class="atnl">Resources</span>
        </div>
        <div class="app-topbar-right">
          <div class="notif-btn">🔔</div>
          <div class="avatar-sm">AR</div>
        </div>
      </div>
      <div class="ps-layout">
        <div class="ps-sidebar">
          <div class="ps-preview-label">Live Preview</div>
          <div class="ps-card">
            <div class="ps-card-top">
              <div class="ps-avatar-wrap">
                <div class="ps-avatar">🎓</div>
                <div class="ps-pro-badge">PRO</div>
              </div>
              <div class="ps-name">Alex Rivers</div>
              <div class="ps-role">Computer Science Student</div>
            </div>
            <div class="ps-meta">
              <div class="ps-meta-row">San Francisco, CA</div>
              <div class="ps-meta-row uni">Tech Institute of Technology</div>
            </div>
            <div class="ps-quote">"Passionate about AI and full-stack development. Looking for research opportunities in LLMs."</div>
            <div class="ps-skills-row">
              <span class="ps-sk">Python</span>
              <span class="ps-sk">React</span>
              <span class="ps-sk">TensorFlow</span>
            </div>
            <div class="ps-view-btn">View Full Portfolio</div>
          </div>
          <div class="ps-vis-info">
            <span class="ps-vis-icon">ℹ️</span>
            <span style="font-size:11px;color:var(--t2);font-weight:300">Profile Visibility — Changes are synced in real-time. Make sure your summary is engaging for recruiters.</span>
          </div>
        </div>
        <div class="ps-main">
          <div class="ps-breadcrumb">Dashboard › Settings › <span>Edit Profile</span></div>
          <div class="ps-page-title">Profile Settings</div>
          <div class="ps-page-sub">Manage your public information and academic credentials.</div>
          <div class="ps-field-label">Profile Image</div>
          <div class="ps-img-row">
            <div class="ps-img-circle">🎓</div>
            <div>
              <div class="ps-img-actions">
                <button class="ps-btn-up">Upload New</button>
                <button class="ps-btn-rm">Remove</button>
              </div>
              <div class="ps-img-hint" style="margin-top:6px">JPG, GIF or PNG. Max size 3MB. Recommended 400×400px.</div>
            </div>
          </div>
          <div class="ps-field-label" style="margin-bottom:14px">👤 Personal Information</div>
          <div class="ps-form-grid">
            <div>
              <div style="font-size:11px;color:var(--t3);margin-bottom:5px">Full Name</div>
              <input class="ps-input" value="Alex Rivers" readonly>
            </div>
            <div>
              <div style="font-size:11px;color:var(--t3);margin-bottom:5px">Current Role</div>
              <input class="ps-input" value="Computer Science Student" readonly>
            </div>
          </div>
          <div style="margin-bottom:14px">
            <div style="font-size:11px;color:var(--t3);margin-bottom:5px">University / Institution</div>
            <input class="ps-input" value="Tech Institute of Technology" readonly style="width:100%">
          </div>
          <div style="font-size:11px;color:var(--t3);margin-bottom:5px">Bio Summary</div>
          <textarea class="ps-textarea" readonly>Passionate about AI and full-stack development. Looking for research opportunities in LLMs.</textarea>
          <div class="ps-bottom-bar">
            <div class="ps-unsaved">⚠ Unsaved changes will be lost if you leave.</div>
            <div class="ps-btns-row">
              <button class="ps-discard">Discard</button>
              <button class="ps-save">Save Changes</button>
            </div>
          </div>
          <div class="pdf-section">
            <div class="pdf-section-title">Academic CV &amp; Projects PDF</div>
            <div class="pdf-dropzone">
              <div class="pdf-dropzone-icon">📎</div>
              <div class="pdf-dropzone-title">Drag and drop your CV here</div>
              <div class="pdf-dropzone-sub">We'll automatically extract your skills and projects. <span class="pdf-browse">Or browse files</span></div>
            </div>
            <div class="pdf-progress">
              <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:6px">
                <span style="font-size:11px;color:var(--t2)">⚡ Extracting details...</span>
                <span style="font-size:11px;color:var(--blue);font-family:'JetBrains Mono',monospace">74%</span>
              </div>
              <div class="pdf-prog-bar-wrap"><div class="pdf-prog-fill"></div></div>
              <div class="pdf-steps">
                <div class="pdf-step done">Reading</div>
                <div class="pdf-step active">Extracting</div>
                <div class="pdf-step todo">Done</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ── PANEL 3: TALENT SEARCH ── -->
  <div class="spanel" id="show-ts">
    <div class="app-shell">
      <div class="app-topbar">
        <div class="app-logo-sm">
          <div class="dot"><svg width="9" height="9" viewBox="0 0 16 16" fill="none"><rect x="2" y="2" width="5" height="5" rx="1.5" fill="#fff"/><rect x="9" y="9" width="5" height="5" rx="1.5" fill="#fff"/></svg></div>
          PortfolioLink
        </div>
        <div class="app-topnav">
          <span class="atnl">Explore</span>
          <span class="atnl">Students</span>
          <span class="atnl act">Companies</span>
          <span class="atnl">Resources</span>
        </div>
        <div class="app-search" style="max-width:200px">
          <span class="app-search-icon">🔍</span>
          <span class="app-search-txt">Search talent...</span>
        </div>
        <div class="app-topbar-right">
          <div style="padding:6px 14px;background:var(--blue);border-radius:8px;font-size:12px;font-weight:600;color:#fff;cursor:default">+ Post a Job</div>
          <div class="avatar-sm">CO</div>
        </div>
      </div>
      <div class="ts-layout">
        <div class="ts-header">
          <div class="ts-title">Talent Search &amp; Discovery</div>
          <div class="ts-sub">Access a curated network of elite academic talent. Filter by validated skills and explore groundbreaking student projects.</div>
        </div>
        <div class="ts-filters">
          <div class="ts-filter-btn act">All Talents</div>
          <div class="ts-filter-btn">UI/UX <span class="ts-filter-tag">●</span></div>
          <div class="ts-filter-btn">JavaScript</div>
          <div class="ts-filter-btn">Python</div>
          <div class="ts-filter-btn">Data Science</div>
          <div class="ts-filter-btn">React</div>
          <div class="ts-filter-btn">Machine Learning</div>
          <div class="ts-filter-btn">Figma</div>
          <div class="ts-filter-btn">Research</div>
          <div class="ts-more-btn">More Filters ⊞</div>
        </div>
        <div class="ts-grid">
          <div class="ts-card">
            <div class="ts-card-top-badge">TOP TALENT</div>
            <div class="ts-card-av" style="background:linear-gradient(135deg,var(--blue),var(--purple))">AR</div>
            <div class="ts-card-name">Alex Rivera</div>
            <div class="ts-card-uni">Stanford University</div>
            <div class="ts-card-skills">
              <span class="ts-skill">JavaScript</span><span class="ts-skill">UI/UX</span><span class="ts-skill">React</span><span class="ts-skill">TypeScript</span>
            </div>
            <div class="ts-card-btns">
              <div class="ts-view-btn">View Portfolio</div>
              <div class="ts-contact-btn">Contact</div>
            </div>
          </div>
          <div class="ts-card">
            <div class="ts-card-av" style="background:linear-gradient(135deg,var(--green),#0FA860)">SC</div>
            <div class="ts-card-name">Sarah Chen</div>
            <div class="ts-card-uni">MIT</div>
            <div class="ts-card-skills">
              <span class="ts-skill">Python</span><span class="ts-skill">Data Science</span><span class="ts-skill">TensorFlow</span>
            </div>
            <div class="ts-card-btns">
              <div class="ts-view-btn">View Portfolio</div>
              <div class="ts-contact-btn">Contact</div>
            </div>
          </div>
          <div class="ts-card">
            <div class="ts-card-av" style="background:linear-gradient(135deg,var(--amber),#C07818)">JS</div>
            <div class="ts-card-name">Jordan Smyth</div>
            <div class="ts-card-uni">RISD</div>
            <div class="ts-card-skills">
              <span class="ts-skill">Figma</span><span class="ts-skill">UI/UX</span><span class="ts-skill">Motion</span>
            </div>
            <div class="ts-card-btns">
              <div class="ts-view-btn">View Portfolio</div>
              <div class="ts-contact-btn">Contact</div>
            </div>
          </div>
          <div class="ts-card">
            <div class="ts-card-av" style="background:linear-gradient(135deg,var(--red),#A03030)">TR</div>
            <div class="ts-card-name">Taylor Reed</div>
            <div class="ts-card-uni">Georgia Tech</div>
            <div class="ts-card-skills">
              <span class="ts-skill">C++</span><span class="ts-skill">Robotics</span><span class="ts-skill">AI</span>
            </div>
            <div class="ts-card-btns">
              <div class="ts-view-btn">View Portfolio</div>
              <div class="ts-contact-btn">Contact</div>
            </div>
          </div>
          <div class="ts-card">
            <div class="ts-card-av" style="background:linear-gradient(135deg,var(--purple),#5A3D8A)">CM</div>
            <div class="ts-card-name">Casey Morgan</div>
            <div class="ts-card-uni">UC Berkeley</div>
            <div class="ts-card-skills">
              <span class="ts-skill">Product Design</span><span class="ts-skill">Research</span><span class="ts-skill">Strategy</span>
            </div>
            <div class="ts-card-btns">
              <div class="ts-view-btn">View Portfolio</div>
              <div class="ts-contact-btn">Contact</div>
            </div>
          </div>
          <div class="ts-card">
            <div class="ts-card-av" style="background:linear-gradient(135deg,#2DD98F,#0FA860)">RV</div>
            <div class="ts-card-name">Riley Vance</div>
            <div class="ts-card-uni">Carnegie Mellon</div>
            <div class="ts-card-skills">
              <span class="ts-skill">Java</span><span class="ts-skill">Backend</span><span class="ts-skill">Cloud</span>
            </div>
            <div class="ts-card-btns">
              <div class="ts-view-btn">View Portfolio</div>
              <div class="ts-contact-btn">Contact</div>
            </div>
          </div>
        </div>
        <div class="ts-load-more">
          <div class="ts-load-btn">Load More Talent</div>
        </div>
      </div>
    </div>
  </div>
</section>

<hr class="div">

<!-- FEATURES -->
<section class="feat-sec reveal" id="features">
  <div class="sh reveal">
    <div class="sh-tag">// Core features</div>
    <h2>Everything built for<br><em>academic talent.</em></h2>
    <p>No bloat. Just the tools that actually bridge the gap between academia and industry.</p>
  </div>
  <div class="fg">
    <div class="fc lg reveal">
      <div class="fi">🎯</div>
      <h3>Professor-backed validation</h3>
      <p>Every skill badge is earned through a project reviewed and approved by a real professor. Companies see proof, not claims.</p>
      <div class="fv">
        <div class="fvh">professor_dashboard.php · review queue</div>
        <div class="fvb">
          <div class="qcard">
            <div class="qtop"><span class="qt">Smart Irrigation with ML — Yassin K.</span><span class="sp sa">Pending</span></div>
            <div class="sflow" style="margin-bottom:10px"><span class="stag sm">Python</span><span class="stag sb">TensorFlow</span><span class="stag sg2">PostgreSQL</span></div>
            <div class="qbott"><button class="qbtn qap">✓ Approve</button><button class="qbtn qrj">✕ Reject</button></div>
          </div>
          <div class="qcard">
            <div class="qtop"><span class="qt">Blockchain Voting System — Adil H.</span><span class="sp sg">Approved</span></div>
            <div class="sflow"><span class="stag sro">Solidity</span><span class="stag sb">Web3.js</span><span class="stag sm">Ethereum</span></div>
          </div>
        </div>
      </div>
    </div>
    <div class="fc reveal">
      <div class="fi">🔍</div>
      <h3>Skill-first talent search</h3>
      <p>Companies filter by validated skills. No self-reported CVs — only verified academic evidence.</p>
      <div class="fv">
        <div class="fvh">company_search.php</div>
        <div class="fvb">
          <div class="sbar"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"><circle cx="5" cy="5" r="3.5" stroke="currentColor" stroke-width="1.2"/><path d="M8 8l2 2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/></svg>PHP · PostgreSQL · MVC</div>
          <div class="rcard"><div class="rav" style="background:linear-gradient(135deg,var(--blue),var(--purple))">YK</div><div class="ri2"><div class="rn">Yassin El Kacimi</div><div class="rsk"><span class="rs sm">PHP</span><span class="rs sb">MVC</span><span class="rs sg2">SQL</span></div></div><span class="sp sg">3 projects</span></div>
          <div class="rcard"><div class="rav" style="background:linear-gradient(135deg,var(--red),#A03030)">NB</div><div class="ri2"><div class="rn">Najwa Benmoussa</div><div class="rsk"><span class="rs sro">React</span><span class="rs sm">Node.js</span></div></div><span class="sp sg">2 projects</span></div>
        </div>
      </div>
    </div>
    <div class="fc reveal">
      <div class="fi">📄</div>
      <h3>LinkedIn PDF import</h3>
      <p>Drop your LinkedIn export and the platform auto-fills your profile. Review, edit, save — no retyping.</p>
      <div class="fv" style="padding:20px">
        <div style="border:1.5px dashed var(--bd2);border-radius:10px;padding:24px;text-align:center">
          <div style="font-size:28px;margin-bottom:8px">📎</div>
          <div style="font-size:12px;font-weight:500;margin-bottom:4px">Drop your LinkedIn PDF</div>
          <div style="font-size:11px;color:var(--t3)">or click to browse</div>
        </div>
        <div style="margin-top:14px;display:flex;flex-direction:column;gap:6px">
          <div style="background:rgba(45,217,143,.06);border:1px solid rgba(45,217,143,.18);border-radius:6px;padding:8px 12px;font-size:11px;font-family:'JetBrains Mono',monospace;color:var(--green)">✓ Name extracted</div>
          <div style="background:rgba(45,217,143,.06);border:1px solid rgba(45,217,143,.18);border-radius:6px;padding:8px 12px;font-size:11px;font-family:'JetBrains Mono',monospace;color:var(--green)">✓ Education extracted</div>
          <div style="background:var(--s3);border:1px solid var(--bd);border-radius:6px;padding:8px 12px;font-size:11px;font-family:'JetBrains Mono',monospace;color:var(--t3)">... Extracting skills</div>
        </div>
      </div>
    </div>
    <div class="fc reveal">
      <div class="fi">📊</div>
      <h3>Admin analytics</h3>
      <p>Real-time stats — students, approvals, top skills — with live charts and activity feeds.</p>
      <div class="fv">
        <div class="fvh">admin_dashboard.php · live stats</div>
        <div class="fvb">
          <div style="display:flex;gap:8px;margin-bottom:12px">
            <div style="flex:1;background:var(--s3);border-radius:8px;padding:12px;text-align:center"><div style="font-family:'Fraunces',serif;font-size:22px;font-weight:700;color:var(--blue);letter-spacing:-1px">480</div><div style="font-size:10px;color:var(--t3);margin-top:2px;font-family:'JetBrains Mono',monospace">STUDENTS</div></div>
            <div style="flex:1;background:var(--s3);border-radius:8px;padding:12px;text-align:center"><div style="font-family:'Fraunces',serif;font-size:22px;font-weight:700;color:var(--amber);letter-spacing:-1px">130</div><div style="font-size:10px;color:var(--t3);margin-top:2px;font-family:'JetBrains Mono',monospace">COMPANIES</div></div>
          </div>
          <div style="font-size:10px;color:var(--t3);font-family:'JetBrains Mono',monospace;margin-bottom:8px">TOP SKILLS</div>
          <div style="display:flex;flex-direction:column;gap:5px">
            <div style="display:flex;align-items:center;gap:8px"><div style="flex:1;background:var(--s3);border-radius:4px;height:6px;overflow:hidden"><div style="width:80%;height:100%;background:var(--blue);border-radius:4px"></div></div><span style="font-size:10px;color:var(--t2);width:28px;font-family:'JetBrains Mono',monospace">PHP</span></div>
            <div style="display:flex;align-items:center;gap:8px"><div style="flex:1;background:var(--s3);border-radius:4px;height:6px;overflow:hidden"><div style="width:65%;height:100%;background:var(--green);border-radius:4px"></div></div><span style="font-size:10px;color:var(--t2);width:28px;font-family:'JetBrains Mono',monospace">SQL</span></div>
            <div style="display:flex;align-items:center;gap:8px"><div style="flex:1;background:var(--s3);border-radius:4px;height:6px;overflow:hidden"><div style="width:50%;height:100%;background:var(--amber);border-radius:4px"></div></div><span style="font-size:10px;color:var(--t2);width:28px;font-family:'JetBrains Mono',monospace">JS</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ROLES -->
<section class="roles-sec" id="roles">
  <div class="sh reveal">
    <div class="sh-tag">// Built for three roles</div>
    <h2>One platform,<br><em>three experiences.</em></h2>
  </div>
  <div class="rtabs reveal">
    <button class="rtab act" onclick="switchRole('student',this)">👨‍🎓 Students</button>
    <button class="rtab" onclick="switchRole('professor',this)">👨‍🏫 Professors</button>
    <button class="rtab" onclick="switchRole('company',this)">🏢 Companies</button>
  </div>
  <div>
    <div class="rpanel act" id="rs">
      <div class="rpcon">
        <div class="rpicon">🎓</div>
        <h3>Build a portfolio that proves it.</h3>
        <p>Turn your academic projects into a professional showcase. Get skills validated by professors and become visible to 130+ companies — before you even graduate.</p>
        <div class="rperks">
          <div class="perk"><div class="pdot"></div><div class="ptx"><strong>Submit projects</strong> — title, description, teammates, files, all in one place.</div></div>
          <div class="perk"><div class="pdot"></div><div class="ptx"><strong>Collect skill badges</strong> — each backed by a professor-approved project.</div></div>
          <div class="perk"><div class="pdot"></div><div class="ptx"><strong>Public portfolio page</strong> — share a single link with any recruiter worldwide.</div></div>
          <div class="perk"><div class="pdot"></div><div class="ptx"><strong>LinkedIn PDF import</strong> — set up your profile in under 2 minutes.</div></div>
        </div>
      </div>
      <div class="rpvis">
        <div class="rpvh">public_portfolio.php — Live preview</div>
        <div class="pcp">
          <div class="pcpt"><div class="pcpav">YK</div><div><div class="pcpn">Yassin El Kacimi</div><div class="pcps">Bac Sciences Physiques · ISTA Casablanca · 2025</div></div></div>
          <div class="pcpb">
            <div class="pcpsk"><span class="stag sm">PHP OOP</span><span class="stag sb">PostgreSQL</span><span class="stag sg2">MVC</span><span class="stag sro">JavaScript</span></div>
            <div class="pcpp"><div class="pcppt">✅ Smart Irrigation System — ML + PostgreSQL</div><div class="pcpps">Validated by Prof. Benhaddou · Jan 2025</div></div>
          </div>
        </div>
      </div>
    </div>
    <div class="rpanel" id="rp">
      <div class="rpcon">
        <div class="rpicon">📋</div>
        <h3>Your validation carries real weight.</h3>
        <p>Review student submissions, tag the skills demonstrated, and approve or reject with structured feedback. Your stamp makes students credible in the job market.</p>
        <div class="rperks">
          <div class="perk"><div class="pdot"></div><div class="ptx"><strong>Central review dashboard</strong> — all pending projects in one clean queue.</div></div>
          <div class="perk"><div class="pdot"></div><div class="ptx"><strong>Skill tagging</strong> — select exactly which skills a project demonstrates.</div></div>
          <div class="perk"><div class="pdot"></div><div class="ptx"><strong>Structured feedback</strong> — rejection comments that actually help students improve.</div></div>
          <div class="perk"><div class="pdot"></div><div class="ptx"><strong>Cohort tracking</strong> — see your students' progress across multiple projects.</div></div>
        </div>
      </div>
      <div class="rpvis">
        <div class="rpvh">professor_dashboard.php — Review modal</div>
        <div class="qcard" style="background:var(--s2)">
          <div class="qtop"><span class="qt">E-Commerce Platform</span><span style="font-size:11px;color:var(--t3)">Adil H. · 2d ago</span></div>
          <div class="sflow" style="margin:8px 0"><span class="stag sm">PHP</span><span class="stag sb">MVC</span><span class="stag sg2">MySQL</span></div>
          <div style="font-size:11.5px;color:var(--t2);font-weight:300;line-height:1.6;margin-bottom:10px">Full e-commerce system with cart, auth, and admin panel using PHP OOP and MVC pattern.</div>
          <div class="qbott"><button class="qbtn qap">✓ Approve + tag skills</button><button class="qbtn qrj">✕ Reject</button></div>
        </div>
      </div>
    </div>
    <div class="rpanel" id="rc">
      <div class="rpcon">
        <div class="rpicon">🏢</div>
        <h3>Hire students who've proved it.</h3>
        <p>Skip self-reported CVs. Search students by validated skills from real academic projects — approved by professors, not just listed on a resume.</p>
        <div class="rperks">
          <div class="perk"><div class="pdot"></div><div class="ptx"><strong>Skill-first filtering</strong> — find students by specific validated technologies.</div></div>
          <div class="perk"><div class="pdot"></div><div class="ptx"><strong>Full portfolio access</strong> — see projects, descriptions, and professor validation.</div></div>
          <div class="perk"><div class="pdot"></div><div class="ptx"><strong>Direct contact requests</strong> — reach out to candidates in one click.</div></div>
          <div class="perk"><div class="pdot"></div><div class="ptx"><strong>Verified talent only</strong> — every result has at least one approved project.</div></div>
        </div>
      </div>
      <div class="rpvis">
        <div class="rpvh">company_search.php — Talent search</div>
        <div class="sbar"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"><circle cx="5" cy="5" r="3.5" stroke="currentColor" stroke-width="1.2"/><path d="M8 8l2 2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/></svg>Filter: PHP · PostgreSQL · MVC</div>
        <div class="rcard"><div class="rav" style="background:linear-gradient(135deg,var(--blue),var(--purple))">YK</div><div class="ri2"><div class="rn">Yassin El Kacimi</div><div class="rsk"><span class="rs sm">PHP OOP</span><span class="rs sb">PostgreSQL</span><span class="rs sg2">MVC</span></div></div><span class="sp sg">3 projects</span></div>
        <div class="rcard"><div class="rav" style="background:linear-gradient(135deg,var(--green),#0FA860)">DA</div><div class="ri2"><div class="rn">Douaa Amrani</div><div class="rsk"><span class="rs sm">PHP</span><span class="rs sro">JS</span><span class="rs sb">SQL</span></div></div><span class="sp sg">2 projects</span></div>
      </div>
    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="how-sec" id="how">
  <div class="sh reveal">
    <div class="sh-tag">// The process</div>
    <h2>From registration<br><em>to opportunity.</em></h2>
  </div>
  <div class="how-g">
    <div class="hstep reveal"><div class="sn">01</div><h4>Create your profile</h4><p>Register as a student, professor, or company. Import from LinkedIn PDF or fill it in — takes two minutes.</p></div>
    <div class="hstep reveal"><div class="sn">02</div><h4>Submit projects</h4><p>Students add academic projects with descriptions, teammates, and files. Submit to a professor for official review.</p></div>
    <div class="hstep reveal"><div class="sn">03</div><h4>Get validated</h4><p>Professors review and tag the specific technical skills each project demonstrates. Approval adds a verified badge.</p></div>
    <div class="hstep reveal"><div class="sn">04</div><h4>Get discovered</h4><p>Your portfolio goes live. Companies filter by skill and find you. One link = your complete professional proof.</p></div>
  </div>
</section>

<!-- STATS -->
<section class="stats-sec">
  <div class="statg">
    <div class="sbox reveal"><div class="snum">12<span class="suf">+</span></div><div class="slbl">Universities</div></div>
    <div class="sbox reveal"><div class="snum">480<span class="suf">+</span></div><div class="slbl">Student Portfolios</div></div>
    <div class="sbox reveal"><div class="snum">2.4<span class="suf">k</span></div><div class="slbl">Projects Validated</div></div>
    <div class="sbox reveal"><div class="snum">130<span class="suf">+</span></div><div class="slbl">Companies Recruiting</div></div>
    <div class="sbox reveal"><div class="snum">96<span class="suf">%</span></div><div class="slbl">Approval Rate</div></div>
  </div>
</section>

<!-- CTA -->
<section class="cta-sec">
  <div class="ctain reveal">
    <h2>Ready to prove<br><em>what you can do?</em></h2>
    <p>Join hundreds of students already turning academic work into career opportunities.</p>
    <div class="cbtns">
      <a href="./views/autonification/signup.php" class="btn-bm">Create your portfolio <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M3 7h8M7 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
      <a href="./views/autonification/signin.php" class="btn-bg">Sign in</a>
    </div>
  </div>
</section>

<?php 

include_once "./src/views/autonification/chatboot.php"
?>
<!-- FOOTER -->
<footer>
  <a href="#" class="flogo">
    <div style="width:22px;height:22px;background:linear-gradient(135deg,var(--blue),var(--purple));border-radius:6px;display:grid;place-items:center;flex-shrink:0">
      <svg width="11" height="11" viewBox="0 0 16 16" fill="none"><rect x="2" y="2" width="5" height="5" rx="1.5" fill="#fff"/><rect x="9" y="9" width="5" height="5" rx="1.5" fill="#fff"/></svg>
    </div>
    PortfolioLink
  </a>
  <ul class="flinks">
    <li><a href="./views/autonification/signin.php">Login</a></li>
    <li><a href="./views/autonification/signup.php">Register</a></li>
    <li><a href="admin_dashboard.php">Admin</a></li>
    <li><a href="https://github.com/MYassineELK/Plateforme-de-Portfolio-Professionnel-Adaptatif" target="_blank">GitHub ↗</a></li>
  </ul>
  <div class="fcopy">© 2025 PortfolioLink · ENSI Project</div>
</footer>

<script>
/* cursor glow */
document.addEventListener('mousemove', e => {
  document.getElementById('cglow').style.cssText += `left:${e.clientX}px;top:${e.clientY}px`;
});

/* scroll reveal */
const obs = new IntersectionObserver(entries => {
  entries.forEach((e, i) => {
    if (e.isIntersecting) { setTimeout(() => e.target.classList.add('vis'), i * 60); obs.unobserve(e.target); }
  });
}, { threshold: .1 });
document.querySelectorAll('.reveal').forEach(el => obs.observe(el));

/* showcase tabs */
function switchShow(id, btn) {
  document.querySelectorAll('.stab').forEach(t => t.classList.remove('act'));
  document.querySelectorAll('.spanel').forEach(p => p.classList.remove('act'));
  btn.classList.add('act');
  document.getElementById('show-' + id).classList.add('act');
}

/* role tabs */
function switchRole(r, btn) {
  document.querySelectorAll('.rtab').forEach(t => t.classList.remove('act'));
  document.querySelectorAll('.rpanel').forEach(p => p.classList.remove('act'));
  btn.classList.add('act');
  const map = { student: 'rs', professor: 'rp', company: 'rc' };
  document.getElementById(map[r]).classList.add('act');
}
</script>
</body>
</html>