<?php

session_start();
?>
<?php
if (session_status() === PHP_SESSION_NONE) session_start();

if (isset($_POST['generate_bio'])) {
    if (ob_get_length()) ob_clean();

    $name    = $_POST['fName']    ?? '';
    $school  = $_POST['fUni']  ?? '';
    $skills  = $_POST['skill']  ?? '';

    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/php poo/Projet_Tutore/PortfolioLink/src/model/chatboot.php';

    $prompt = "Write a short professional LinkedIn bio (max 2 lines) for {$name}, 
               studying at {$school}, skilled in {$skills}. 
               Return only the bio text. answer in fr";

    try {
        $bio = chatboot::boi($prompt);
        echo json_encode(['status' => 'success', 'bio' => $bio]);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>PortfolioLink – Edit Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="src/assets/css/stayle_seting.css">
    <script src="src/assets/js/js_setiong.js"></script>

</head>

<body>

    <?php
    include_once "navbar.php";

    ?>


    <div class="main">
    
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

            <div class="sidebar">
                <div class="sidebar-label">
                    <span>Live Preview</span>
                    <span class="live-dot">Synced</span>
                </div>

             
                <div class="pcard">
                  

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
                                  <?php if (isset($_SESSION["email"])) {
                        require_once __DIR__ . '/../../model/user.php';
                        require_once __DIR__ . '/../../core/Database.php';
                        $user = new User($pdo, "yassin", "elk", "elk", 'elk', "p");
                        $u = $user->findetd($_SESSION["email"]);
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
                            <p style="font-family:'Syne',sans-serif;font-weight:700;font-size:16px;line-height:1.2" id="pvName"><?php if (isset($us) ) {
                                
                            echo $u['nom'] . " " . $u['prenom'] ;}?></p>
                            <p style="font-size:12px;color:var(--muted2);margin-top:3px" id="pvRole"><?php if (isset($us) ) {
                                
                                echo $u['filiere'] ;}?></p>
                        </div>
                        <div style="margin-top:10px;display:flex;flex-direction:column;gap:5px">
                            <div style="display:flex;align-items:center;gap:6px;font-size:11px;color:var(--muted)">
                                <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                                    <circle cx="12" cy="11" r="3" />
                                </svg>
                                <span id="pvLoc"><?php if (isset($us) ) {
                                    
                                    echo $u['ville'] ;}?></span>
                            </div>
                            <div style="display:flex;align-items:center;gap:6px;font-size:11px;color:var(--muted)">
                                <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                    </svg>
                                <span id="pvUni"><?php if (isset($us) ) {
                                    
                                    echo $u['etablissement'];} ?></span>
                            </div>
                        </div>
                        <p style="font-size:11px;color:var(--muted2);font-style:italic;margin-top:11px;line-height:1.65" id="pvBio"><?php if (isset($us) ) {
                            
                        echo $u['bio'] ;}?></p>
                        <div style="display:flex;flex-wrap:wrap;gap:5px;margin-top:11px" id="pvChips">
                            <?php if (isset($u)) {
                              if ($u['skills_json']==null) {
                               $skills=[];
                            }else $skills = json_decode($u['skills_json'], true);
                            foreach ($skills as $key => $v) { ?>
                                <span class="chip"><?php 
                                    
                                    echo $v["skill_name"];?></span>
                            <?php } 
                            }
                           ?>



                        </div>
                        <a href="index.php?action=profile">
                            <button class="btn-p" style="width:100%;margin-top:16px;font-size:12.5px;padding:10px">View Full Portfolio</button>
                        </a>
                    </div>
                </div>

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

            <div style="display:flex;flex-direction:column;gap:20px">

                <div>
                    <h1 style="font-size:31px;font-weight:800;letter-spacing:-.6px;line-height:1.1">Profile Settings</h1>
                    <p style="font-size:14px;color:var(--muted2);margin-top:7px">Manage your public information and academic credentials.</p>
                </div>

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
                                    <input class="finp" name="fName" id="fName" value="<?php if (isset($us)) {
                                        
                                        echo $us['nom'] . " " . $us['prenom'] ;}?>" oninput="sync()" placeholder="Your full name" />
                                </div>
                                <div>
                                    <label class="flabel">Education sector</label>
                                    <input class="finp" name="fRole" id="fRole" value="<?php if (isset($us)) {
                                        
                                        echo $us['filiere'];} ?>" oninput="sync()" placeholder="e.g. CS Student" />
                                </div>
                                <div>
                                    <label class="flabel">University / Institution</label>
                                    <input class="finp" name="fUni" id="fUni" value="<?php if (isset($us)) {
                                        
                                        echo $us['etablissement'];} ?>" oninput="sync()" placeholder="Your institution" />
                                </div>
                                <div>
                                    <label class="flabel">City</label>
                                    <input class="finp" name="ville" id="fUni" value="<?php if (isset($us)) {
                                        
                                        echo $us['ville'];} ?>" oninput="sync()" placeholder="Your institution" />
                                </div>

                                <div style="grid-column:1/-1">
                                    <table>
                                        <tr style="width: 100%;">
                                            <td> <label class="flabel">Bio Summary</label>
                                            </td>
                                            <td>
                                                <div id="bio-launcher" style="margin-left: 640px   ; cursor: pointer;" onclick="toggleBioPanel()">
                                                    <svg width="28px" height="28px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.9087 3.87352C16.4681 3.31421 17.2266 3 18.0176 3C18.4093 3 18.7971 3.07714 19.1589 3.22702C19.5208 3.3769 19.8495 3.59658 20.1265 3.87352C20.4034 4.15046 20.6231 4.47924 20.773 4.84108C20.9229 5.20292 21 5.59074 21 5.98239C21 6.37404 20.9229 6.76186 20.773 7.1237C20.6231 7.48554 20.4034 7.81432 20.1265 8.09126L19.0231 9.19466C18.6326 9.58519 17.9994 9.58519 17.6089 9.19467L14.8053 6.39114C14.4148 6.00062 14.4148 5.36745 14.8053 4.97693L15.9087 3.87352ZM13.3911 7.80536C13.0006 7.41483 12.3674 7.41483 11.9769 7.80536L5.01084 14.7714C4.37004 15.4122 3.91545 16.2151 3.69566 17.0943L3.02986 19.7575C2.94467 20.0982 3.04452 20.4587 3.2929 20.7071C3.54128 20.9555 3.90177 21.0553 4.24254 20.9701L6.90572 20.3043C7.78488 20.0846 8.58778 19.63 9.22857 18.9892L16.1946 12.0231C16.5852 11.6326 16.5852 10.9994 16.1946 10.6089L13.3911 7.80536Z" fill="#ffffff"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 20C12 19.4477 12.4477 19 13 19L20 19C20.5523 19 21 19.4477 21 20C21 20.5523 20.5523 21 20 21L13 21C12.4477 21 12 20.5523 12 20Z" fill="#ffffff"></path>
                                                        </g>
                                                    </svg>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>

                                    <textarea class="finp" id="bio-result" name="Bio" rows="4" oninput="sync()" placeholder="Tell recruiters about yourself..."><?php if (isset($us)) {
                                        
                                    echo $us['bio'] ;}?></textarea>
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



                <div id="bio-panel"
                    style="position:fixed; bottom:165px; right:28px; z-index:9996;
            width:340px; background:#0D0F14;
            border:1px solid rgba(255,255,255,0.08);
            border-radius:18px; overflow:hidden;
            box-shadow:0 24px 60px rgba(0,0,0,0.6);
            font-family:'Plus Jakarta Sans',sans-serif;
            opacity:0; transform:translateY(16px) scale(0.97);
            pointer-events:none;
            transition:opacity 0.25s ease, transform 0.25s ease;">

                    <div style="display:flex; align-items:center; justify-content:space-between;
                padding:13px 16px; background:#161920;
                border-bottom:1px solid rgba(255,255,255,0.07);">
                        <span style="font-size:13px; font-weight:600; color:#F0F2F7;">✨ AI Bio Generator</span>
                        <span onclick="toggleBioPanel()"
                            style="cursor:pointer; color:#9CA3AF; font-size:18px; line-height:1; padding:0 4px;">×</span>
                    </div>

                    <div style="padding:14px; display:flex; flex-direction:column; gap:8px;">

                        <input type="text" id="bio-input" name="skill"
                            placeholder="Yacine, ENSI Tanger, PHP Docker AI"
                            style="width:100%; box-sizing:border-box;
                      background:#1E2330; border:1px solid rgba(255,255,255,0.08);
                      border-radius:10px; padding:10px 13px;
                      font-size:13px; color:#F0F2F7;
                      font-family:'Plus Jakarta Sans',sans-serif;
                      outline:none;">

                        <p style="font-size:11px; color:#4B5563; margin:0;">
                            Format: Name, School, Skills
                        </p>

                        <button onclick="generateBio()"
                            style="width:100%; padding:10px;
                       background:linear-gradient(135deg,#4F8EF7,#7B5EA7);
                       color:white; border:none; border-radius:10px;
                       font-size:13px; font-weight:600; cursor:pointer;
                       font-family:'Plus Jakarta Sans',sans-serif;
                       transition:opacity 0.2s;">
                            <span id="bio-btn-text">⚡ Generate Bio</span>
                        </button>




                    </div>
                </div>

                <div id="bio-result" style="display:none; margin-top:10px; padding:12px; background:#f0f4ff; border-radius:10px; font-size:14px; color:#1a1a2e;"></div>


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

    <div class="toast" id="toastEl">
        <div class="t-icon">
            <svg fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
        </div>
        <span id="toastTxt">Saved!</span>
    </div>

</body>

</html>