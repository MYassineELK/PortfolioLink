    <nav class="nav">
        <div class="nav-inner">
            <a href="#" class="logo">
                <div class="logo-mark">
                    <svg width="16" height="16" fill="none" stroke="#fff" stroke-width="2.3" viewBox="0 0 24 24">
                        <circle cx="12" cy="8" r="4" />
                        <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" />
                    </svg>
                </div>
                <span class="logo-text">PortfolioLink</span>
            </a>

            <div class="search-wrap">
                <svg width="13" height="13" fill="none" stroke="var(--muted)" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8" />
                    <path d="M21 21l-4.35-4.35" />
                </svg>
                <input placeholder="Search projects or people..." />
            </div>

            <div class="nav-actions">
                <a href="#" class="nav-lnk">Projects</a>
                <a href="#" class="nav-lnk">Network</a>
                <a href="#" class="nav-lnk">Resources</a>
                <div class="icon-btn">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <div class="notif-pip"></div>
                </div>
                <div class="user-pill" id="navAv">
                     <?php  if (isset($_SESSION["email"])) {
                                    require_once __DIR__ . '/../../model/user.php';
                                    require_once __DIR__ . '/../../core/Database.php';
                                    $user = new User($pdo, "yassin", "elk", "elk", 'elk', "p");
                                    $us = $user->find($_SESSION["email"]);
                                }
                                ?>
                                <img src="src\assets\images\<?php if (isset($us["photo_url"]) && $us["photo_url"] != "") {
                                                echo $us["photo_url"];
                                            } ?>" alt="">
                    <svg width="16" height="16" fill="none" stroke="var(--muted2)" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="8" r="4" />
                        <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" />
                    </svg>
                </div>
            </div>
        </div>
    </nav>