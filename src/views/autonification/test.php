<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>PortfolioLink – Edit Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        :root {
            --bg: #090c14;
            --surface: #0d1119;
            --card: #111827;
            --card2: #0f1623;
            --border: #1a2640;
            --border2: #223052;
            --accent: #3b82f6;
            --accent-dim: rgba(59, 130, 246, 0.12);
            --accent-glow: rgba(59, 130, 246, 0.18);
            --text: #ddeaf8;
            --muted: #4d6a8e;
            --muted2: #7a9abf;
            --green: #22c55e;
            --green-dim: rgba(34, 197, 94, 0.12);
        }

        body {
            background: var(--bg);
            font-family: 'Inter', sans-serif;
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden
        }

        h1,
        h2,
        .syne {
            font-family: 'Syne', sans-serif
        }

        /* subtle dot grid bg */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: radial-gradient(circle, rgba(59, 130, 246, 0.06) 1px, transparent 1px);
            background-size: 28px 28px;
            pointer-events: none;
            z-index: 0
        }

        /* NAV */
        .nav {
            background: rgba(9, 12, 20, 0.9);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 100
        }

        .nav-inner {
            max-width: 1180px;
            margin: 0 auto;
            padding: 0 28px;
            height: 58px;
            display: flex;
            align-items: center;
            gap: 28px
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
            text-decoration: none
        }

        .logo-mark {
            width: 32px;
            height: 32px;
            border-radius: 9px;
            background: var(--accent);
            display: flex;
            align-items: center;
            justify-content: center
        }

        .logo-text {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 17px;
            color: var(--text);
            letter-spacing: -.3px
        }

        .search-wrap {
            flex: 1;
            max-width: 280px;
            background: rgba(17, 24, 39, 0.9);
            border: 1px solid var(--border);
            border-radius: 9px;
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 8px 14px;
            transition: all .2s
        }

        .search-wrap:focus-within {
            border-color: rgba(59, 130, 246, 0.5);
            background: rgba(59, 130, 246, 0.04)
        }

        .search-wrap input {
            background: none;
            border: none;
            outline: none;
            color: var(--text);
            font-size: 13px;
            width: 100%;
            font-family: 'Inter', sans-serif
        }

        .search-wrap input::placeholder {
            color: var(--muted)
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-left: auto
        }

        .nav-lnk {
            color: var(--muted2);
            font-size: 13.5px;
            font-weight: 500;
            text-decoration: none;
            transition: color .2s;
            letter-spacing: .01em
        }

        .nav-lnk:hover {
            color: var(--text)
        }

        .icon-btn {
            position: relative;
            display: flex;
            align-items: center;
            color: var(--muted2);
            cursor: pointer;
            transition: color .2s
        }

        .icon-btn:hover {
            color: var(--text)
        }

        .notif-pip {
            width: 7px;
            height: 7px;
            background: var(--accent);
            border-radius: 50%;
            border: 2px solid var(--bg);
            position: absolute;
            top: -1px;
            right: -1px
        }

        .user-pill {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            border: 1.5px solid var(--border2);
            background: rgba(30, 45, 71, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            overflow: hidden;
            transition: border-color .2s
        }

        .user-pill:hover {
            border-color: rgba(59, 130, 246, 0.5)
        }

        /* MAIN CONTAINER */
        .main {
            max-width: 1180px;
            margin: 0 auto;
            padding: 0 28px 72px;
            position: relative;
            z-index: 1
        }

        /* BREADCRUMB */
        .bc {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12.5px;
            color: var(--muted);
            padding: 20px 0 28px
        }

        .bc a {
            color: var(--muted);
            text-decoration: none;
            transition: color .2s
        }

        .bc a:hover {
            color: var(--muted2)
        }

        .bc .cur {
            color: var(--accent);
            font-weight: 500
        }

        /* GRID */
        .page-grid {
            display: grid;
            grid-template-columns: 292px 1fr;
            gap: 24px;
            align-items: start
        }

        /* SIDEBAR */
        .sidebar {
            display: flex;
            flex-direction: column;
            gap: 14px;
            position: sticky;
            top: 74px
        }

        .sidebar-label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 4px
        }

        .sidebar-label span:first-child {
            font-size: 10.5px;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--muted)
        }

        .live-dot {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 11px;
            color: var(--green)
        }

        .live-dot::before {
            content: '';
            display: inline-block;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--green);
            animation: pulse 2s infinite
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1
            }

            50% {
                opacity: .5
            }
        }

        /* PREVIEW CARD */
        .pcard {
            background: linear-gradient(160deg, #101828 0%, #0d1420 100%);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden
        }

        .pcard-banner {
            height: 70px;
            background: linear-gradient(135deg, #0c1e3f 0%, #091629 60%, #0e2242 100%);
            position: relative;
            overflow: hidden
        }

        .pcard-banner::after {
            content: '';
            position: absolute;
            inset: 0;
            background: repeating-linear-gradient(60deg, transparent, transparent 18px, rgba(59, 130, 246, 0.04) 18px, rgba(59, 130, 246, 0.04) 19px)
        }

        .pcard-banner::before {
            content: '';
            position: absolute;
            bottom: -20px;
            left: -20px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: rgba(59, 130, 246, 0.08)
        }

        .pcard-body {
            padding: 0 18px 22px
        }

        .pcard-av {
            width: 58px;
            height: 58px;
            border-radius: 50%;
            border: 3px solid #0d1420;
            background: #1a2a45;
            margin-top: -29px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            z-index: 30;
        }

        .pro-pill {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #fff;
            font-family: 'Syne', sans-serif;
            font-size: 9.5px;
            font-weight: 700;
            padding: 3px 9px;
            border-radius: 5px;
            letter-spacing: .07em
        }

        .chip {
            background: rgba(26, 40, 65, 0.9);
            border: 1px solid var(--border);
            color: var(--muted2);
            border-radius: 20px;
            padding: 3px 11px;
            font-size: 11px;
            font-weight: 500
        }

        /* CARDS */
        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            transition: border-color .25s
        }

        .card:hover {
            border-color: var(--border2)
        }

        .cp {
            padding: 26px
        }

        /* SECTION HEADER */
        .sec-hd {
            display: flex;
            align-items: center;
            gap: 11px;
            margin-bottom: 24px
        }

        .sec-icon {
            width: 34px;
            height: 34px;
            flex-shrink: 0;
            border-radius: 9px;
            background: var(--accent-dim);
            border: 1px solid var(--accent-glow);
            display: flex;
            align-items: center;
            justify-content: center
        }

        .sec-icon svg {
            width: 15px;
            height: 15px;
            color: rgba(147, 197, 253, 1)
        }

        .sec-title {
            font-family: 'Syne', sans-serif;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: -.1px
        }

        /* FORM */
        .flabel {
            font-size: 10.5px;
            font-weight: 700;
            letter-spacing: .09em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 7px;
            display: block
        }

        .finp {
            background: rgba(9, 12, 20, 0.8);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 11px 15px;
            color: var(--text);
            font-size: 13.5px;
            width: 100%;
            outline: none;
            transition: all .25s;
            font-family: 'Inter', sans-serif;
            line-height: 1.5
        }

        .finp:focus {
            border-color: rgba(59, 130, 246, 0.6);
            background: rgba(59, 130, 246, 0.03);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.07)
        }

        .finp::placeholder {
            color: var(--muted)
        }

        textarea.finp {
            resize: none
        }

        /* BUTTONS */
        .btn-p {
            background: var(--accent);
            color: #fff;
            font-weight: 600;
            font-size: 13px;
            font-family: 'Inter', sans-serif;
            border-radius: 9px;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            transition: all .22s;
            letter-spacing: .01em
        }

        .btn-p:hover {
            background: #2563eb;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.3)
        }

        .btn-p:active {
            transform: none;
            box-shadow: none
        }

        .btn-g {
            background: transparent;
            color: var(--muted2);
            font-size: 13px;
            font-weight: 500;
            font-family: 'Inter', sans-serif;
            border-radius: 9px;
            padding: 10px 18px;
            border: 1px solid var(--border);
            cursor: pointer;
            transition: all .2s
        }

        .btn-g:hover {
            border-color: var(--border2);
            color: var(--text);
            background: rgba(255, 255, 255, 0.02)
        }

        /* AVATAR */
        .av-wrap {
            position: relative;
            width: 90px;
            height: 90px;
            flex-shrink: 0
        }

        .av-circle {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            border: 2px solid var(--border2);
            background: rgba(26, 40, 65, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            cursor: pointer;
            transition: all .2s
        }

        .av-circle:hover {
            border-color: rgba(59, 130, 246, 0.6)
        }

        .av-edit {
            position: absolute;
            bottom: 1px;
            right: 1px;
            width: 24px;
            height: 24px;
            background: var(--accent);
            border-radius: 50%;
            border: 2px solid var(--card);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: transform .2s
        }

        .av-edit:hover {
            transform: scale(1.1)
        }

        .av-edit svg {
            width: 10px;
            height: 10px;
            color: #fff
        }

        /* UPLOAD ZONE */
        .drop-zone {
            border: 1.5px dashed var(--border2);
            border-radius: 12px;
            background: rgba(9, 12, 20, 0.7);
            padding: 40px 24px;
            text-align: center;
            cursor: pointer;
            transition: all .25s
        }

        .drop-zone:hover,
        .drop-zone.drag {
            border-color: rgba(59, 130, 246, 0.6);
            background: rgba(59, 130, 246, 0.04)
        }

        .drop-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: var(--accent-dim);
            border: 1px solid var(--accent-glow);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 14px
        }

        .drop-icon svg {
            width: 22px;
            height: 22px;
            color: var(--accent)
        }

        /* PROGRESS */
        .prog-bar {
            height: 3px;
            background: var(--border);
            border-radius: 99px;
            overflow: hidden;
            margin-bottom: 12px
        }

        .prog-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--accent), #93c5fd);
            border-radius: 99px;
            width: 0%;
            transition: width .35s ease
        }

        .sdot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            flex-shrink: 0
        }

        .sdot-done {
            background: var(--green)
        }

        .sdot-act {
            background: var(--accent);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2)
        }

        .sdot-idle {
            background: var(--border2)
        }

        /* SOCIAL ICON */
        .soc-icon {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            border-radius: 10px;
            background: rgba(9, 12, 20, 0.8);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: border-color .2s
        }

        .soc-icon:hover {
            border-color: var(--border2)
        }

        .soc-icon svg {
            width: 15px;
            height: 15px;
            color: var(--muted2)
        }

        /* DIVIDER */
        .div {
            height: 1px;
            background: var(--border);
            margin: 22px 0
        }

        /* INFO BOX */
        .ibox {
            background: rgba(59, 130, 246, 0.06);
            border: 1px solid rgba(59, 130, 246, 0.16);
            border-radius: 10px;
            padding: 13px 15px;
            font-size: 12px;
            color: var(--muted2);
            display: flex;
            gap: 10px;
            line-height: 1.6
        }

        .ibox svg {
            width: 14px;
            height: 14px;
            color: rgba(147, 197, 253, 1);
            flex-shrink: 0;
            margin-top: 1px
        }

        /* TOAST */
        .toast {
            position: fixed;
            bottom: 26px;
            right: 26px;
            background: var(--card2);
            border: 1px solid var(--border2);
            border-left: 3px solid var(--green);
            color: var(--text);
            border-radius: 12px;
            padding: 14px 18px;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 16px 48px rgba(0, 0, 0, 0.6);
            transform: translateY(80px) scale(0.95);
            opacity: 0;
            transition: all .38s cubic-bezier(.34, 1.56, .64, 1);
            z-index: 999
        }

        .toast.show {
            transform: translateY(0) scale(1);
            opacity: 1
        }

        .t-icon {
            width: 22px;
            height: 22px;
            flex-shrink: 0;
            border-radius: 50%;
            background: var(--green-dim);
            display: flex;
            align-items: center;
            justify-content: center
        }

        .t-icon svg {
            width: 11px;
            height: 11px;
            color: var(--green)
        }

        ::-webkit-scrollbar {
            width: 4px
        }

        ::-webkit-scrollbar-track {
            background: var(--surface)
        }

        ::-webkit-scrollbar-thumb {
            background: var(--border2);
            border-radius: 99px
        }

        @keyframes spin {
            to {
                transform: rotate(360deg)
            }
        }
    </style>
</head>

<body>

    <!-- NAV -->
    <?php
    include_once "navbar.php";

    ?>

    <!-- MAIN -->
    <div class="main">
        <!-- Breadcrumb -->
        <div class="bc">
            <a href="#">Dashboard</a>
            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path d="M9 18l6-6-6-6" />
            </svg>
            <a href="#">Settings</a>
            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path d="M9 18l6-6-6-6" />
            </svg>
            <span class="cur">Edit Profile</span>
        </div>

        <div class="page-grid">

            <!-- ─── SIDEBAR ─── -->
            <div class="sidebar">
                <div class="sidebar-label">
                    <span>Live Preview</span>
                    <span class="live-dot">Synced</span>
                </div>

                <!-- Preview Card -->
                <div class="pcard">
                    <?php if (isset($_SESSION["email"])) {
                        require_once __DIR__ . '/../../model/user.php';
                        require_once __DIR__ . '/../../core/Database.php';
                        $user = new User($pdo, "yassin", "elk", "elk", 'elk', "p");
                        $u = $user->findetd($_SESSION["email"]);
                    }
                    ?>

                    <div class="pcard-banner"></div>
                    <div class="pcard-body">
                        <div style="display:flex;justify-content:space-between;align-items:flex-start">
                            <div class="pcard-av" id="pvAv">
                                <?php if (isset($_SESSION["email"])) {
                                    require_once __DIR__ . '/../../model/user.php';
                                    require_once __DIR__ . '/../../core/Database.php';
                                    $user = new User($pdo, "yassin", "elk", "elk", 'elk', "p");
                                    $us = $user->find($_SESSION["email"]);
                                }
                                ?>
                                <img src="src\assets\images\<?php if (isset($us["photo_url"]) && $us["photo_url"] != "") {
                                                                echo $us["photo_url"];
                                                            } ?>" alt="">
                                <svg width="2" height="24" fill="none" stroke="var(--muted)" stroke-width="1.8" viewBox="0 0 24 24">
                                    <circle cx="12" cy="8" r="4" />
                                    <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" />
                                </svg>
                            </div>
                            <div style="margin-top:10px"><span class="pro-pill">PRO</span></div>
                        </div>
                        <div style="margin-top:12px">
                            <p style="font-family:'Syne',sans-serif;font-weight:700;font-size:16px;line-height:1.2" id="pvName"><?= $u['nom'] . " " . $u['prenom'] ?></p>
                            <p style="font-size:12px;color:var(--muted2);margin-top:3px" id="pvRole"><?= $u['filiere'] ?></p>
                        </div>
                        <div style="margin-top:10px;display:flex;flex-direction:column;gap:5px">
                            <div style="display:flex;align-items:center;gap:6px;font-size:11px;color:var(--muted)">
                                <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                                    <circle cx="12" cy="11" r="3" />
                                </svg>
                                <span id="pvLoc"><?= $u['ville'] ?></span>
                            </div>
                            <div style="display:flex;align-items:center;gap:6px;font-size:11px;color:var(--muted)">
                                <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                </svg>
                                <span id="pvUni"><?= $u['etablissement'] ?></span>
                            </div>
                        </div>
                        <p style="font-size:11px;color:var(--muted2);font-style:italic;margin-top:11px;line-height:1.65" id="pvBio"><?= $u['bio'] ?></p>
                        <div style="display:flex;flex-wrap:wrap;gap:5px;margin-top:11px" id="pvChips">
                            <span class="chip">Python</span>
                            <span class="chip">React</span>
                            <span class="chip">TensorFlow</span>
                        </div>
                        <button class="btn-p" style="width:100%;margin-top:16px;font-size:12.5px;padding:10px">View Full Portfolio</button>
                    </div>
                </div>

                <!-- Info box -->
                <div class="ibox">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    <div>
                        <p style="font-weight:600;color:var(--text);margin-bottom:3px;font-size:12px">Profile Visibility</p>
                        Changes sync in real-time. Keep your summary compelling for recruiters.
                    </div>
                </div>
            </div>

            <!-- ─── RIGHT CONTENT ─── -->
            <div style="display:flex;flex-direction:column;gap:20px">

                <!-- Page header -->
                <div>
                    <h1 style="font-size:31px;font-weight:800;letter-spacing:-.6px;line-height:1.1">Profile Settings</h1>
                    <p style="font-size:14px;color:var(--muted2);margin-top:7px">Manage your public information and academic credentials.</p>
                </div>

                <!-- ─── PROFILE IMAGE ─── -->
                <div class="card">
                    <div class="cp">
                        <div class="sec-hd">
                            <div class="sec-icon">
                                <img src="" alt="">
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h2 class="sec-title">Profile Image</h2>
                        </div>
                        <form action="index.php?action=aploade_image" method="post" enctype="multipart/form-data" accept="image/*">
                            <div style="display:flex;align-items:center;gap:22px">
                                <div class="av-wrap">
                                    <div class="av-circle" id="avDisp" onclick="document.getElementById('imgIn').click()">
                                        <?php if (isset($_SESSION["email"])) {
                                            require_once __DIR__ . '/../../model/user.php';
                                            require_once __DIR__ . '/../../core/Database.php';
                                            $user = new User($pdo, "yassin", "elk", "elk", 'elk', "p");
                                            $us = $user->find($_SESSION["email"]);
                                        }
                                        ?>
                                        <img src="src\assets\images\<?php if (isset($us["photo_url"]) && $us["photo_url"] != "") {
                                                                        echo $us["photo_url"];
                                                                    } ?>" alt="">
                                        <svg width="34" height="34" fill="none" stroke="var(--muted)" stroke-width="1.5" viewBox="0 0 24 24">
                                            <circle cx="12" cy="8" r="4" />
                                            <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" />
                                        </svg>
                                    </div>
                                    <div class="av-edit" onclick="document.getElementById('imgIn').click()">
                                        <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                            <path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </div>
                                    <input type="file" id="imgIn" name="image" accept="image/*" style="display:none" onchange="onImg(event)" />
                                </div>

                                <div>
                                    <div style="display:flex;gap:8px;margin-bottom:9px">
                                        <input type="submit" value="Add New" style="cursor:pointer;font-size:12.5px;padding:9px 18px" class="btn-p">
                                        <label for="imgIn"></label>
                                        <button class="btn-g" style="font-size:12.5px;padding:9px 15px" onclick="rmImg()">Remove</button>
                                    </div>
                                    <p style="font-size:11.5px;color:var(--muted);line-height:1.6">JPG, GIF or PNG. Max size 2MB.<br>Recommended 400×400px.</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- ─── PERSONAL INFO ─── -->
                <div class="card">
                    <div class="cp">
                        <div class="sec-hd">
                            <div class="sec-icon">
                                <svg fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <h2 class="sec-title">Personal Information</h2>
                        </div>
                        <form action="index.php?action=sive_info" method="post">
                            <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px">
                                <?php if (isset($_SESSION["email"])) {
                                    require_once __DIR__ . '/../../model/user.php';
                                    require_once __DIR__ . '/../../core/Database.php';
                                    $user = new User($pdo, "yassin", "elk", "elk", 'elk', "p");
                                    $us = $user->findetd($_SESSION["email"]);
                                   
                                }
                                ?>

                                <div>
                                    <label class="flabel">Full Name</label>
                                    <input class="finp" name="fName" id="fName" value="<?= $us['nom'] . " " . $us['prenom'] ?>" oninput="sync()" placeholder="Your full name" />
                                </div>
                                <div>
                                    <label class="flabel">Education sector</label>
                                    <input class="finp" name="fRole" id="fRole" value="<?= $us['filiere'] ?>" oninput="sync()" placeholder="e.g. CS Student" />
                                </div>
                                <div style="grid-column:1/-1">
                                    <label class="flabel">University / Institution</label>
                                    <input class="finp" name="fUni" id="fUni" value="<?= $us['etablissement'] ?>" oninput="sync()" placeholder="Your institution" />
                                </div>
                                <div style="grid-column:1/-1">
                                    <label class="flabel">Bio Summary</label>
                                    <textarea class="finp" id="fBio" name="Bio" rows="4" oninput="sync()" placeholder="Tell recruiters about yourself..."><?= $us['bio'] ?></textarea>
                                </div>
                            </div>

                            <div class="div"></div>
                            <div style="display:flex;align-items:center;justify-content:space-between">
                                <p style="font-size:12px;color:var(--muted)">Unsaved changes will be lost if you leave.</p>
                                <div style="display:flex;gap:8px">
                                    <button class="btn-g" onclick="discard()">Discard</button>
                                    <button class="btn-p" type="submit">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- ─── CV UPLOAD ─── -->
                <div class="card">
                    <div class="cp">
                        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:24px">
                            <div class="sec-hd" style="margin-bottom:0">
                                <div class="sec-icon">
                                    <svg fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h2 class="sec-title">Academic CV & Projects PDF</h2>
                            </div>
                            <button class="btn-g" id="shareBtn" style="font-size:12px;padding:8px 14px;display:none;align-items:center;gap:6px" onclick="toast('Share link copied!')">
                                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71" />
                                    <path d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71" />
                                </svg>
                                Share Link
                            </button>
                        </div>
                        <form action="index.php?action=uploud_cv" id="fcv" method="post" enctype="multipart/form-data">
                            <div class="drop-zone" id="dz"
                                onclick="document.getElementById('cvIn').click()"
                                ondragover="ev=>{ev.preventDefault();document.getElementById('dz').classList.add('drag')}"
                                ondragleave="()=>document.getElementById('dz').classList.remove('drag')"
                                ondrop="onDrop(event)">
                                <input type="file" id="cvIn" name="cv" accept=".pdf,.doc,.docx" style="display:none" onchange="beginProg()" />
                                <div class="drop-icon">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                    </svg>
                                </div>
                                <p style="font-size:14px;font-weight:600;font-family:'Syne',sans-serif;margin-bottom:5px">Drag and drop your CV here</p>
                                <p style="font-size:12.5px;color:var(--muted);margin-bottom:14px">We'll automatically extract your skills and projects.</p>
                                <span style="font-size:13px;color:rgba(147,197,253,1);font-weight:500;border-bottom:1px solid rgba(147,197,253,0.35);padding-bottom:1px">Or browse files</span>
                            </div>
                            
                       

                        <!-- Progress area -->
                        <div id="progArea" style="display:none;margin-top:18px">
                            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:9px">
                                <div style="display:flex;align-items:center;gap:7px;font-size:12px;color:var(--muted2)">
                                    <svg id="spinSvg" width="13" height="13" fill="none" stroke="rgba(147,197,253,1)" stroke-width="2" viewBox="0 0 24 24" style="animation:spin 1s linear infinite">
                                        <path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                    <span id="progTxt">Extracting details...</span>
                                </div>
                                <span style="font-size:12px;font-weight:600;color:rgba(147,197,253,1)" id="pPct">0%</span>
                            </div>
                            <div class="prog-bar">
                                <div class="prog-fill" id="pFill"></div>
                            </div>
                            <div style="display:flex;gap:18px">
                                <div style="display:flex;align-items:center;gap:6px;font-size:11px">
                                    <div class="sdot sdot-done"></div>
                                    <span style="color:var(--green);font-weight:500">READING</span>
                                </div>
                                <div style="display:flex;align-items:center;gap:6px;font-size:11px">
                                    <div class="sdot sdot-act" id="sd2"></div>
                                    <span style="color:rgba(147,197,253,1);font-weight:600" id="sl2">EXTRACTING</span>
                                </div>
                                <div style="display:flex;align-items:center;gap:6px;font-size:11px">
                                    <div class="sdot sdot-idle" id="sd3"></div>
                                    <span style="color:var(--muted)" id="sl3">DONE</span>
                                </div>
                            </div>
                            <div style="display:flex;align-items:center;justify-content:space-between">
                                <p style="font-size:12px;color:var(--muted)">Unsaved changes will be lost if you leave.</p>
                                <div style="display:flex;gap:8px">
                                    <button class="btn-g" type="reset">Discard</button>
                                    <button class="btn-p" type="submit">Save cv</button>
                                </div>
                            </div>
                        </div>
                     
                        </form>
                    </div>
                     
                </div>

                <!-- ─── SOCIAL LINKS ─── -->
                <div class="card">
                    <div class="cp">
                        <div class="sec-hd">
                            <div class="sec-icon">
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                </svg>
                            </div>
                            <h2 class="sec-title">Social & Portfolio Links</h2>
                        </div>

                        <div style="display:flex;flex-direction:column;gap:10px">
                            <div style="display:flex;align-items:center;gap:10px">
                                <div class="soc-icon">
                                    <svg fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.44 9.8 8.2 11.38.6.11.82-.26.82-.58 0-.28-.01-1.02-.01-2-3.34.73-4.04-1.61-4.04-1.61-.55-1.38-1.33-1.75-1.33-1.75-1.09-.74.08-.73.08-.73 1.2.08 1.84 1.24 1.84 1.24 1.07 1.83 2.8 1.3 3.48 1 .11-.78.42-1.3.76-1.6-2.67-.3-5.47-1.33-5.47-5.93 0-1.31.47-2.38 1.24-3.22-.12-.3-.54-1.52.12-3.18 0 0 1.01-.32 3.3 1.23a11.5 11.5 0 013-.4c1.02 0 2.04.13 3 .4 2.28-1.55 3.29-1.23 3.29-1.23.66 1.66.24 2.88.12 3.18.77.84 1.24 1.91 1.24 3.22 0 4.61-2.81 5.63-5.48 5.92.43.37.82 1.1.82 2.22 0 1.6-.01 2.9-.01 3.29 0 .32.21.7.83.58C20.57 21.8 24 17.3 24 12c0-6.63-5.37-12-12-12z" />
                                    </svg>
                                </div>
                                <input class="finp" type="url" placeholder="https://github.com/alexrivers" style="flex:1" />
                            </div>
                            <div style="display:flex;align-items:center;gap:10px">
                                <div class="soc-icon">
                                    <svg fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                    </svg>
                                </div>
                                <input class="finp" type="url" placeholder="https://linkedin.com/in/alexrivers" style="flex:1" />
                            </div>
                            <div style="display:flex;align-items:center;gap:10px">
                                <div class="soc-icon">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" />
                                        <path d="M2 12h20M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z" />
                                    </svg>
                                </div>
                                <input class="finp" type="url" placeholder="https://yourportfolio.dev" style="flex:1" />
                            </div>
                        </div>

                        <div class="div"></div>
                        <div style="display:flex;justify-content:flex-end">
                            <button class="btn-p" onclick="toast('Social links saved!')">Save Links</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- TOAST -->
    <div class="toast" id="toastEl">
        <div class="t-icon">
            <svg fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
        </div>
        <span id="toastTxt">Saved!</span>
    </div>
    <script>
        const D = {
            name: 'Alex Rivers',
            role: 'Computer Science Student',
            uni: 'Tech Institute of Technology',
            bio: 'Passionate about AI and full-stack development. Looking for research opportunities in LLMs.'
        };

        function sync() {
            document.getElementById('pvName').textContent = document.getElementById('fName').value || 'Your Name';
            document.getElementById('pvRole').textContent = document.getElementById('fRole').value || 'Your Role';
            document.getElementById('pvUni').textContent = document.getElementById('fUni').value || 'Your Institution';
            const b = document.getElementById('fBio').value;
            document.getElementById('pvBio').textContent = b ? `"${b}"` : '';
        }

        function onImg(e) {
            const f = e.target.files[0];
            if (!f) return;
            const r = new FileReader();
            r.onload = ev => {
                const img = `<img src="${ev.target.result}" style="width:100%;height:100%;object-fit:cover"/>`;
                document.getElementById('avDisp').innerHTML = img;
                document.getElementById('pvAv').innerHTML = img;
                document.getElementById('navAv').innerHTML = img;
            };
            r.readAsDataURL(f);
        }

        function rmImg() {
            const s1 = `<svg width="34" height="34" fill="none" stroke="var(--muted)" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>`;
            const s2 = `<svg width="24" height="24" fill="none" stroke="var(--muted)" stroke-width="1.8" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>`;
            const s3 = `<svg width="16" height="16" fill="none" stroke="var(--muted2)" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>`;
            document.getElementById('avDisp').innerHTML = s1;
            document.getElementById('pvAv').innerHTML = s2;
            document.getElementById('navAv').innerHTML = s3;
            document.getElementById('imgIn').value = '';
        }

        function onDrop(e) {
            e.preventDefault();
            document.getElementById('dz').classList.remove('drag');
            if (e.dataTransfer.files[0]) beginProg();
        }

        function beginProg() {
            document.getElementById('progArea').style.display = 'block';
            document.getElementById('shareBtn').style.display = 'none';
            let p = 0;
            const iv = setInterval(() => {
                p += Math.floor(Math.random() * 7) + 3;
                if (p >= 100) {
                    p = 100;
                    clearInterval(iv);
                    endProg();
                }
                document.getElementById('pPct').textContent = p + '%';
                document.getElementById('pFill').style.width = p + '%';
            }, 80);


        }

        function endProg() {
            document.getElementById('sd2').className = 'sdot sdot-done';
            document.getElementById('sl2').style.color = 'var(--green)';
            document.getElementById('sd3').className = 'sdot sdot-done';
            document.getElementById('sl3').style.color = 'var(--green)';
            document.getElementById('sl3').textContent = 'DONE';
            document.getElementById('progTxt').textContent = 'Extraction complete';
            document.getElementById('spinSvg').style.animation = 'none';
            document.getElementById('spinSvg').style.stroke = 'var(--green)';
            document.getElementById('shareBtn').style.display = 'flex';
            toast('CV processed — skills extracted!');
        }

        function discard() {
            document.getElementById('fName').value = D.name;
            document.getElementById('fRole').value = D.role;
            document.getElementById('fUni').value = D.uni;
            document.getElementById('fBio').value = D.bio;
            sync();
            toast('Changes discarded.');
        }

        function toast(msg) {
            const el = document.getElementById('toastEl');
            document.getElementById('toastTxt').textContent = msg;
            el.classList.add('show');
            setTimeout(() => el.classList.remove('show'), 3200);
        }
    </script>
</body>

</html>