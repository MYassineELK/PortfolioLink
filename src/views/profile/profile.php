<?php
session_start();
if (isset($_SESSION["email"])) {
    require_once __DIR__ . '/../../model/user.php';
    require_once __DIR__ . '/../../core/Database.php';
    $user = new User($pdo, "yassin", "elk", "elk", 'elk', "p");
    $u = $user->findetd($_SESSION["email"]);
}
if ($u['skills_json']==null) {
   $skills = [];
}else  $skills = json_decode($u['skills_json'], true);


if ($u['projects_json']==null) {
   $project = [];
}else  $project = json_decode($u['projects_json'], true);


if ($u['recommendations_json']==null) {
   $recommendations = [];
}else  $recommendations = json_decode($u['recommendations_json'], true);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php if (isset($u["nom"]) && $u["nom"] != "") {
                echo $u["nom"] . " " . $u["prenom"];
            } ?> — Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Oswald:wght@300;400;500&family=JetBrains+Mono:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="src/assets/css/style_p.css">
        <script src="src/assets/js/js_profile.js" defer></script>


</head>

<body class="grid-bg">  

    <canvas id="particleCanvas"></canvas>

    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="orb" style="width:500px;height:500px;top:-10%;left:15%;background:rgba(0,145,255,0.04);animation-delay:-3s"></div>
        <div class="orb" style="width:400px;height:400px;bottom:10%;right:-5%;background:rgba(0,229,255,0.03);animation-delay:-7s;animation-duration:15s"></div>
        <div class="orb" style="width:300px;height:300px;top:50%;left:60%;background:rgba(0,145,255,0.025);animation-delay:-1s;animation-duration:18s"></div>
    </div>

    <nav class="fixed top-0 left-0 right-0 z-50" style="background:rgba(5,5,5,0.7);backdrop-filter:blur(20px) saturate(1.2);border-bottom:1px solid rgba(255,255,255,0.04);">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
            <a href="#" class="flex items-center gap-2.5 group">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center relative overflow-hidden" style="background:linear-gradient(135deg,#0091FF,#00E5FF);">
                    <span class="font-oswald text-sm font-medium text-black relative z-10"> <?=  strtoupper($u["nom"][0]) ?> <?= strtoupper($u["prenom"][0]) ?></span>
                    <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-20 transition-opacity"></div>
                </div>
                <span class="font-oswald text-base tracking-tight text-gray-300 group-hover:text-white transition-colors hidden sm:inline"><?php if (isset($u["nom"]) && $u["nom"] != "") {
                                                                                                                                                echo $u["nom"] . " " . $u["prenom"];
                                                                                                                                            } ?></span>
            </a>
            <div class="hidden md:flex items-center gap-10">
                <a href="#about" class="nav-link">About</a>
                <a href="#projects" class="nav-link">Projects</a>
                <a href="#recommendation" class="nav-link">Recommendation</a>
            </div>
            <button class="md:hidden text-gray-400 hover:text-white transition-colors p-1" id="menuBtn" aria-label="Toggle menu">
                <i data-lucide="menu" class="w-5 h-5"></i>
            </button>
        </div>
        <div class="mobile-menu md:hidden" id="mobileMenu">
            <div class="px-6 pb-5 pt-2 flex flex-col gap-4">
                <a href="#about" class="nav-link">About</a>
                <a href="#projects" class="nav-link">Projects</a>
                <a href="#recommendation" class="nav-link">Recommendation</a>
            </div>
        </div>
    </nav>

    <div class="relative z-10 pt-16">

        <section class=" px-6 pt-12 pb-8 md:pt-16 md:pb-10">
            <div class="reveal flex flex-col items-center text-center">

                <!-- Photo — top -->
                <div class="avatar-container mb-6">
                    <div class="avatar-glow"></div>
                    <div class="avatar-ring">
                        <img src="src\assets\images\<?php if (isset($u["photo_url"]) && $u["photo_url"] != "") {
                                                        echo $u["photo_url"];
                                                    } ?>"
                            alt="" class="w-28 h-28 md:w-36 md:h-36 rounded-full object-cover" />
                    </div>
                </div>

                <h1 class="font-oswald font-light text-4xl md:text-5xl tracking-tight leading-tight mb-3">
                    <?php if (isset($u["nom"]) && $u["nom"] != "") {
                        echo $u["nom"];
                    } ?> <span class="gradient-text"> <?php if (isset($u["prenom"]) && $u["prenom"] != "") {
                                                                echo $u["prenom"];
                                                            } ?></span>
                </h1>
                <div class="flex flex-wrap items-center justify-center gap-x-4 gap-y-1.5 text-sm text-gray-400 mb-2">
                    <span class="flex items-center gap-2">
                        <i data-lucide="graduation-cap" class="w-4 h-4 text-blue-400/50 flex-shrink-0"></i>
                        <?php if (isset($u["filiere"]) && $u["filiere"] != "") {
                            echo $u["filiere"];
                        } ?>
                    </span>
                    <span class="hidden sm:inline text-gray-700">—</span>
                    <span> <?php if (isset($u["etablissement"]) && $u["etablissement"] != "") {
                                echo $u["etablissement"] . " . " . date("Y");
                            } ?></span>
                    <span class="hidden sm:inline text-gray-700">·</span>
                    <span class="font-mono text-xs text-gray-500">GPA 3.84 / 4.0</span>
                </div>
                <div class="flex items-center gap-2 mb-8">
                    <div class="status-dot"></div>
                    <span class="font-mono text-[11px] text-green-400/70">Open to opportunities</span>
                </div>

                <!-- Buttons — bottom -->
                <div class="flex items-center gap-3">
                    <a href="#" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-xs font-bold tracking-widest text-black transition-all duration-300 group"
                        style="background:linear-gradient(135deg,#0091FF,#00E5FF);box-shadow:0 0 20px rgba(0,145,255,0.3);">
                        <i data-lucide="mail" class="w-3.5 h-3.5 relative z-10"></i>
                        <span class="relative z-10">CONTACT STUDENT</span>
                    </a>

                    <a href="<?php if (isset($u["cv_url"]) && $u["cv_url"] != "") {
                                    echo "src/assets/cvs/" . trim($u["cv_url"]);
                                } ?>" download="<?php if (isset($u["nom"]) && $u["nom"] != "") {
                                                    echo $u["nom"] . "_" . $u["prenom"];
                                                } ?>_CV.pdf" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-xs font-bold tracking-widest transition-all duration-300"
                        style="border:1px solid rgba(255,255,255,0.1);color:#9CA3AF;"
                        onmouseenter="this.style.borderColor='rgba(0,145,255,0.3)';this.style.color='#fff';this.style.background='rgba(0,145,255,0.06)'"
                        onmouseleave="this.style.borderColor='rgba(255,255,255,0.1)';this.style.color='#9CA3AF';this.style.background='transparent'">
                        <i data-lucide="download" class="w-3.5 h-3.5"></i>
                        DOWNLOAD CV
                    </a>
                </div>

            </div>
        </section>

        <div class="section-divider max-w-7xl mx-auto"></div>

        <!-- ═══════ TWO-COLUMN BODY ═══════ -->
        <section class="max-w-7xl mx-auto px-6 py-10 md:py-14">
            <div class="two-col flex gap-8 lg:gap-10" style="align-items:flex-start;">

                <!-- ─── LEFT COLUMN ─── -->
                <div class="col-left flex flex-col gap-8" style="width:38%;flex-shrink:0;">

                    <!-- Tech Stack -->
                    <div class="reveal">
                        <div class="section-label mb-4">Tech Stack</div>
                        <div class="flex flex-wrap gap-2">
                            <?php
                            foreach ($skills as $key => $value) {
                                echo " <span class='tech-tag'>" . $value['skill_name'] . "</span>";
                            }
                            ?>
                        </div>
                    </div>

                    <!-- About -->
                    <div id="about" class="reveal reveal-delay-1">
                        <div class="section-label mb-4">About</div>
                        <div class="glow-card p-7 md:p-8 relative">
                            <div class="absolute top-4 left-4 w-5 h-5 border-t border-l border-blue-500/20 rounded-tl-sm"></div>
                            <div class="absolute top-4 right-4 w-5 h-5 border-t border-r border-blue-500/20 rounded-tr-sm"></div>
                            <div class="absolute bottom-4 left-4 w-5 h-5 border-b border-l border-blue-500/20 rounded-bl-sm"></div>
                            <div class="absolute bottom-4 right-4 w-5 h-5 border-b border-r border-blue-500/20 rounded-br-sm"></div>
                            <p class="text-gray-300 text-sm leading-[1.85]">
                                <?php if (isset($u["bio"]) && $u["bio"] != "") {
                                    echo $u["bio"];
                                } ?>
                            </p>
                        </div>
                    </div>

                    <!-- Recommendation -->
                    <div id="recommendation" class="reveal reveal-delay-2">
                        <div class="section-label mb-4">Recommendation</div>
                     <?php 
                     foreach ($recommendations as $key => $vv) {?>
                        <div class="animated-border">
                            <div class="p-7 md:p-8">
                                <div class="flex gap-5">
                                    <div class="quote-bar"></div>
                                    <div class="flex-1">
                                        <div class="font-oswald text-5xl leading-none gradient-text-subtle opacity-30 mb-1">"</div>
                                        <p class="text-gray-300 text-sm leading-[1.8] -mt-5 mb-5">
                                        <?= $vv["content"] ?>
                                        </p>
                                        <div class="flex items-center gap-3 pt-4" style="border-top:1px solid rgba(255,255,255,0.05);">
                                            <div class="relative">
                                                <img src="https://picsum.photos/seed/professor-chen/80/80.jpg" alt="Dr. Wei Chen" class="w-10 h-10 rounded-full object-cover" style="border:1px solid rgba(255,255,255,0.1);" />
                                                <div class="absolute -bottom-0.5 -right-0.5 w-3.5 h-3.5 rounded-full flex items-center justify-center" style="background:#050505;border:1px solid rgba(255,255,255,0.1);">
                                                    <i data-lucide="badge-check" class="w-2 h-2 text-blue-400"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-xs font-medium text-white">Dr.<?= $vv["author_name"] ?></div>
                                                <div class="text-[11px] text-gray-500"><?= $vv["author_specialty"] ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php }
                     ?>
                    </div>

                </div>

                <!-- ─── RIGHT COLUMN ─── -->
                <div class="col-right flex-1 min-w-0">
                    <div id="projects" class="reveal">
                        <div class="section-label mb-4">Project History</div>

                        <div class="flex flex-col gap-6">

                            <!-- Project 1 -->
                             <?php  
                             $i=0;
                             foreach ($project as $key => $value) {$i++?>
                                <div class="project-entry">
                                <div class="corner-glow"></div>
                                <div class="img-wrap">
                                    <img src="src\assets\images\images_project\<?= $value["image"] ?>"  class="project-img" />
                                    <div class="img-overlay"></div>
                                    <div class="scan-lines"></div>
                                    <div class="scan-beam"></div>
                                    <div class="absolute top-4 left-5 z-10">
                                        <span class="px-2.5 py-1 rounded-md text-[10px] font-mono font-medium tracking-wider"
                                            style="<?php 
                                            if ( $value["status"]==="draft") {
                                               echo "background: rgba(107, 114, 128, 0.15);border:1px solid rgba(0,145,255,0.25);color:#9CA3AF;backdrop-filter:blur(12px);";
                                            }elseif( $value["status"]==="pending"){
                                                echo "background: rgba(245, 158, 11, 0.15);border:1px solid rgba(251, 191, 36, 0.3);color:#FBBF24;backdrop-filter:blur(12px);";
                                            }elseif( $value["status"]==="approved"){
                                                echo "background: rgba(16, 185, 129, 0.15);border:1px solid rgba(52, 211, 153, 0.3);color:#34D399;backdrop-filter:blur(12px);";
                                            }elseif( $value["status"]==="rejected"){
                                                echo "background: rgba(239, 68, 68, 0.15);border:1px solid rgba(248, 113, 113, 0.3);color:#F87171;backdrop-filter:blur(12px);";
                                            }
                                            ?>">
                                            ⬡ <?= $value["status"] ?>
                                        </span>
                                    </div>
                                    <div class="absolute bottom-4 left-5 right-5 z-10">
                                        <div class="font-mono text-[10px] text-blue-400/50 mb-1 tracking-wider">0<?= $i ?></div>
                                        <h3 class="font-oswald text-2xl tracking-tight"><?= $value["title"] ?> </h3>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <p class="text-gray-400 text-sm leading-[1.75] mb-5">
                                       <?= $value["description"] ?> 
                                    </p>
                                    <div class="flex flex-wrap gap-1.5 mb-5">
                                        <?php 
                                        foreach ($value["project_skills"] as $k => $v) {?>
                                            <span class="mini-tag"><?= $v ?></span>
                                       <?php  }
                                        ?>
                                      
                                    </div>
                                    <div class="flex items-center justify-between pt-4" style="border-top:1px solid rgba(255,255,255,0.04);">
                                        <div class="flex items-center gap-3 flex-wrap">
                                            <span class="meta-chip"><i data-lucide="git-branch" class="w-3 h-3"></i> v<?= $value["version"] ?></span>
                                            <span class="meta-chip"><i data-lucide="user" class="w-3 h-3"></i> Dr.<?= $value["prof_name"] ?> </span>
                                        </div>
                                        <a href="<?= $value["github"] ?>" class="view-details-btn">View Details <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i></a>
                                    </div>
                                </div>
                            </div>
                             <?php }
                             
                             ?>
                           

                           

                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Footer -->
        <footer style="border-top:1px solid rgba(255,255,255,0.03);">
            <div class="max-w-7xl mx-auto px-6 py-8 flex flex-col md:flex-row items-center justify-between gap-3">
                <div class="flex items-center gap-2">
                    <div class="w-5 h-5 rounded flex items-center justify-center" style="background:linear-gradient(135deg,#0091FF,#00E5FF);">
                        <span class="font-oswald text-[8px] font-medium text-black"><?=  strtoupper($u["nom"][0]) ?> <?= strtoupper($u["prenom"][0]) ?></span>
                    </div>
                    <span class="text-[11px] text-gray-700">©<?= date("Y") ?>  <?= $u["nom"] ?> <?= $u["prenom"] ?>  </span>
                </div>
                <span class="text-[10px] text-gray-700 font-mono tracking-wider"><?= strtoupper("PortfolioLink") ?></span>
            </div>
        </footer>

    </div>


</body>

</html>