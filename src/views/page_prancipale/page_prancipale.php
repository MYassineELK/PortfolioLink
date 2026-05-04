<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=1280">
<title>PortfolioLink — Where Academic Work Meets Opportunity</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,700;0,9..144,900;1,9..144,300;1,9..144,700&family=Plus+Jakarta+Sans:wght@300;400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{
  --bg:#0D0F14;--s1:#161920;--s2:#1E2330;--s3:#252A3A;
  --bd:rgba(255,255,255,0.06);--bd2:rgba(255,255,255,0.12);
  --blue:#4F8EF7;--purple:#7B5EA7;--green:#2DD98F;--amber:#F5A623;--red:#E05C5C;
  --tx:#F0F2F7;--t2:#9CA3AF;--t3:#6B7280;
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{background:var(--bg);color:var(--tx);font-family:'Plus Jakarta Sans',sans-serif;font-size:16px;line-height:1.6;overflow-x:hidden;-webkit-font-smoothing:antialiased}
::selection{background:var(--blue);color:#fff}
::-webkit-scrollbar{width:4px}::-webkit-scrollbar-track{background:transparent}::-webkit-scrollbar-thumb{background:var(--s3);border-radius:4px}
.cursor-glow{position:fixed;width:500px;height:500px;border-radius:50%;background:radial-gradient(circle,rgba(79,142,247,0.05) 0%,transparent 70%);pointer-events:none;transform:translate(-50%,-50%);z-index:0;transition:transform .08s linear}

/* ── NAV ── */
nav{position:fixed;top:20px;left:50%;transform:translateX(-50%);width:calc(100% - 80px);max-width:1240px;height:56px;display:flex;align-items:center;justify-content:space-between;padding:0 24px;background:rgba(22,25,32,0.85);backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);border:1px solid var(--bd2);border-radius:16px;z-index:999;animation:navIn .6s cubic-bezier(.16,1,.3,1) both}
@keyframes navIn{from{opacity:0;transform:translateX(-50%) translateY(-12px)}to{opacity:1;transform:translateX(-50%) translateY(0)}}
.logo{display:flex;align-items:center;gap:10px;text-decoration:none}
.logo-mark{width:30px;height:30px;border-radius:8px;display:grid;place-items:center;flex-shrink:0;background:linear-gradient(135deg,var(--blue),var(--purple))}
.logo-mark svg{fill:#fff}
.logo-text{font-family:'Fraunces',serif;font-size:17px;font-weight:700;color:var(--tx);letter-spacing:-.3px}
.logo-text span{color:var(--blue)}
.nav-links{display:flex;align-items:center;gap:4px;list-style:none}
.nav-links a{padding:6px 14px;border-radius:8px;font-size:13.5px;color:var(--t2);text-decoration:none;transition:background .15s,color .15s}
.nav-links a:hover{background:var(--s2);color:var(--tx)}
.nav-right{display:flex;align-items:center;gap:10px}
.btn-ng{padding:7px 18px;border:1px solid var(--bd2);background:transparent;color:var(--t2);font-family:'Plus Jakarta Sans',sans-serif;font-size:13.5px;font-weight:500;border-radius:9px;cursor:pointer;text-decoration:none;transition:all .15s}
.btn-ng:hover{border-color:rgba(255,255,255,.22);color:var(--tx);background:var(--s2)}
.btn-nm{padding:7px 18px;background:var(--blue);color:#fff;font-family:'Plus Jakarta Sans',sans-serif;font-size:13.5px;font-weight:600;border:none;border-radius:9px;cursor:pointer;text-decoration:none;transition:transform .1s,background .15s}
.btn-nm:hover{background:#6B9EF8}.btn-nm:active{transform:scale(.97)}

/* ── HERO ── */
.hero{min-height:100vh;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:140px 60px 80px;text-align:center;position:relative;overflow:hidden}
.hero-bg{position:absolute;inset:0;pointer-events:none;overflow:hidden}
.blob{position:absolute;border-radius:50%;filter:blur(90px);opacity:.14}
.b1{width:700px;height:700px;background:var(--blue);top:-200px;left:-100px;animation:d1 18s ease infinite alternate}
.b2{width:600px;height:600px;background:var(--purple);top:-100px;right:-150px;animation:d2 22s ease infinite alternate}
.b3{width:400px;height:400px;background:var(--green);bottom:0;left:40%;animation:d3 15s ease infinite alternate;opacity:.07}
@keyframes d1{to{transform:translate(60px,80px) scale(1.1)}}
@keyframes d2{to{transform:translate(-50px,60px) scale(.95)}}
@keyframes d3{to{transform:translate(40px,-30px) scale(1.05)}}
.hero-bg::after{content:'';position:absolute;inset:0;background-image:radial-gradient(circle,rgba(255,255,255,.055) 1px,transparent 1px);background-size:36px 36px;mask-image:radial-gradient(ellipse 80% 80% at 50% 50%,black 30%,transparent 100%)}
.hero-content{position:relative;z-index:1}
.eyebrow{display:inline-flex;align-items:center;gap:8px;padding:5px 14px 5px 8px;background:rgba(79,142,247,.08);border:1px solid rgba(79,142,247,.25);border-radius:100px;font-size:12.5px;font-weight:500;color:var(--blue);font-family:'JetBrains Mono',monospace;letter-spacing:.02em;margin-bottom:36px;animation:fup .8s .1s cubic-bezier(.16,1,.3,1) both}
.edot{width:18px;height:18px;background:var(--blue);border-radius:50%;display:grid;place-items:center;position:relative}
.edot::after{content:'';width:7px;height:7px;background:#fff;border-radius:50%;animation:blink 1.5s ease infinite}
@keyframes blink{0%,100%{opacity:1}50%{opacity:.4}}
.hero h1{font-family:'Fraunces',serif;font-size:clamp(60px,6.5vw,100px);font-weight:900;line-height:.95;letter-spacing:-3px;max-width:900px;margin:0 auto;animation:fup .8s .2s cubic-bezier(.16,1,.3,1) both}
.hero h1 em{font-style:italic;color:var(--blue)}
.hero h1 .l2{display:block;color:var(--t2);font-style:italic;font-weight:300}
.hero-desc{margin:28px auto 0;font-size:18px;font-weight:300;color:var(--t2);max-width:500px;line-height:1.7;animation:fup .8s .3s cubic-bezier(.16,1,.3,1) both}
.hero-actions{display:flex;align-items:center;justify-content:center;gap:14px;margin-top:44px;animation:fup .8s .4s cubic-bezier(.16,1,.3,1) both}
.btn-bm{display:inline-flex;align-items:center;gap:8px;padding:15px 36px;background:var(--blue);color:#fff;font-family:'Plus Jakarta Sans',sans-serif;font-size:15px;font-weight:600;border:none;border-radius:14px;cursor:pointer;text-decoration:none;transition:all .15s;box-shadow:0 0 40px rgba(79,142,247,.3)}
.btn-bm:hover{background:#6B9EF8;transform:translateY(-2px);box-shadow:0 0 60px rgba(79,142,247,.4)}
.btn-bm:active{transform:scale(.97)}
.btn-bg{display:inline-flex;align-items:center;gap:8px;padding:15px 32px;background:transparent;border:1px solid var(--bd2);color:var(--t2);font-family:'Plus Jakarta Sans',sans-serif;font-size:15px;font-weight:500;border-radius:14px;cursor:pointer;text-decoration:none;transition:all .15s}
.btn-bg:hover{border-color:rgba(255,255,255,.22);color:var(--tx);background:var(--s2)}
@keyframes fup{from{opacity:0;transform:translateY(24px)}to{opacity:1;transform:translateY(0)}}

/* ── HERO BROWSER ── */
.hero-mockup{margin-top:72px;position:relative;z-index:1;animation:fup .9s .5s cubic-bezier(.16,1,.3,1) both}
.mglow{position:absolute;bottom:-60px;left:50%;transform:translateX(-50%);width:800px;height:200px;background:radial-gradient(ellipse,rgba(79,142,247,.12),transparent 70%);pointer-events:none}
.browser{width:900px;margin:0 auto;background:var(--s1);border:1px solid var(--bd2);border-radius:16px;overflow:hidden;box-shadow:0 40px 120px rgba(0,0,0,.7),0 0 0 1px rgba(255,255,255,.04)}
.bbar{background:var(--s2);padding:12px 16px;display:flex;align-items:center;gap:12px;border-bottom:1px solid var(--bd)}
.bdots{display:flex;gap:6px}
.bdots span{width:10px;height:10px;border-radius:50%}
.bdots span:nth-child(1){background:var(--red)}
.bdots span:nth-child(2){background:var(--amber)}
.bdots span:nth-child(3){background:var(--green)}
.burl{flex:1;background:var(--s3);border:1px solid var(--bd);border-radius:6px;padding:5px 12px;font-size:12px;color:var(--t3);font-family:'JetBrains Mono',monospace;text-align:center}
.dprev{display:grid;grid-template-columns:200px 1fr;height:380px}
.dsidebar{background:var(--s2);border-right:1px solid var(--bd);padding:20px 14px;display:flex;flex-direction:column;gap:4px}
.ditem{display:flex;align-items:center;gap:10px;padding:8px 10px;border-radius:8px;font-size:12px;color:var(--t2);cursor:default;transition:background .15s}
.ditem.act{background:rgba(79,142,247,.1);color:var(--blue);font-weight:500}
.ditem:not(.act):hover{background:var(--s3)}
.dic{width:16px;height:16px;border-radius:4px;opacity:.7}
.dmain{padding:20px;overflow:hidden}
.drow{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-bottom:16px}
.kpi{background:var(--s2);border:1px solid var(--bd);border-radius:10px;padding:14px}
.kv{font-family:'Fraunces',serif;font-size:24px;font-weight:700;letter-spacing:-1px}
.kv.m{color:var(--blue)}.kv.g{color:var(--amber)}.kv.r{color:var(--green)}
.kl{font-size:11px;color:var(--t3);margin-top:2px}
.plist{display:flex;flex-direction:column;gap:8px}
.prow{display:flex;align-items:center;gap:10px;background:var(--s2);border:1px solid var(--bd);border-radius:8px;padding:10px 12px}
.pav{width:28px;height:28px;border-radius:50%;font-size:10px;display:grid;place-items:center;font-weight:600;flex-shrink:0;color:#fff}
.pi{flex:1}
.pt{font-size:11.5px;font-weight:500;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.ps{font-size:10px;color:var(--t3);margin-top:1px}
.sp{padding:3px 8px;border-radius:100px;font-size:10px;font-weight:500;font-family:'JetBrains Mono',monospace;flex-shrink:0}
.sg{background:rgba(45,217,143,.1);color:var(--green);border:1px solid rgba(45,217,143,.2)}
.sa{background:rgba(245,166,35,.1);color:var(--amber);border:1px solid rgba(245,166,35,.2)}
.sr{background:rgba(224,92,92,.1);color:var(--red);border:1px solid rgba(224,92,92,.2)}

.div{border:none;border-top:1px solid var(--bd);max-width:1240px;margin:0 auto}

/* ── LOGOS ── */
.logos-bar{padding:48px 60px;text-align:center;max-width:1240px;margin:0 auto}
.ll{font-size:12px;letter-spacing:.1em;text-transform:uppercase;color:var(--t3);font-family:'JetBrains Mono',monospace;margin-bottom:28px}
.logos-marquee-wrap{position:relative;overflow:hidden;width:100%}
.logos-marquee-fade-l,.logos-marquee-fade-r{position:absolute;top:0;bottom:0;width:120px;z-index:2;pointer-events:none}
.logos-marquee-fade-l{left:0;background:linear-gradient(to right,var(--bg),transparent)}
.logos-marquee-fade-r{right:0;background:linear-gradient(to left,var(--bg),transparent)}
.logos-marquee-inner{display:inline-flex;align-items:center;white-space:nowrap;animation:logoScroll 32s linear infinite}
.logos-marquee-wrap:hover .logos-marquee-inner{animation-play-state:paused}
@keyframes logoScroll{from{transform:translateX(0)}to{transform:translateX(-50%)}}
.li{display:inline-block;font-family:'Fraunces',serif;font-size:15px;font-weight:700;color:var(--t3);letter-spacing:-.2px;padding:0 28px;transition:color .25s;cursor:default}
.li:hover{color:var(--blue)}
.li-sep{color:var(--blue);font-size:10px;opacity:.35;flex-shrink:0}

/* ── SECTION HEADER ── */
.sh{margin-bottom:64px}
.sh-tag{display:inline-block;font-family:'JetBrains Mono',monospace;font-size:11.5px;color:var(--blue);letter-spacing:.12em;text-transform:uppercase;margin-bottom:16px}
.sh h2{font-family:'Fraunces',serif;font-size:clamp(36px,4vw,58px);font-weight:900;letter-spacing:-2px;line-height:1.0;color:var(--tx)}
.sh h2 em{font-style:italic;font-weight:300;color:var(--t2)}
.sh p{margin-top:18px;font-size:16.5px;color:var(--t2);font-weight:300;max-width:480px;line-height:1.75}

/* ═══════════════════════════════════════
   PLATFORM SHOWCASE SECTION — NEW
═══════════════════════════════════════ */
.showcase-sec{padding:100px 60px;max-width:1240px;margin:0 auto}
.showcase-tabs{display:flex;gap:8px;margin-bottom:40px;border-bottom:1px solid var(--bd)}
.stab{
  display:flex;align-items:center;gap:8px;
  padding:12px 22px 16px;font-size:14px;font-weight:500;color:var(--t2);
  cursor:pointer;border:none;background:transparent;
  border-bottom:2px solid transparent;margin-bottom:-1px;
  transition:color .15s,border-color .15s;
  font-family:'Plus Jakarta Sans',sans-serif;
}
.stab:hover{color:var(--tx)}
.stab.act{color:var(--blue);border-bottom-color:var(--blue)}
.stab-badge{
  padding:2px 8px;background:rgba(224,92,92,.12);
  color:var(--red);border-radius:100px;font-size:11px;
  font-family:'JetBrains Mono',monospace;
}
.spanel{display:none}
.spanel.act{display:block}

/* ── App Chrome wrapper ── */
.app-shell{
  background:var(--s1);border:1px solid var(--bd2);border-radius:18px;overflow:hidden;
  box-shadow:0 48px 100px rgba(0,0,0,.6),0 0 0 1px rgba(255,255,255,.04);
}
.app-topbar{
  height:52px;background:var(--s2);border-bottom:1px solid var(--bd);
  display:flex;align-items:center;padding:0 20px;gap:16px;
}
.app-logo-sm{
  display:flex;align-items:center;gap:8px;font-family:'Fraunces',serif;
  font-size:14px;font-weight:700;color:var(--tx);
}
.app-logo-sm .dot{width:18px;height:18px;border-radius:5px;background:linear-gradient(135deg,var(--blue),var(--purple));display:grid;place-items:center}
.app-logo-sm .dot svg{fill:#fff}
.app-search{
  flex:1;max-width:280px;height:30px;background:var(--s3);border:1px solid var(--bd);
  border-radius:8px;display:flex;align-items:center;padding:0 10px;gap:7px;
}
.app-search-icon{color:var(--t3);font-size:12px}
.app-search-txt{font-size:12px;color:var(--t3);font-family:'JetBrains Mono',monospace}
.app-topnav{display:flex;align-items:center;gap:2px;margin-left:auto}
.atnl{padding:5px 12px;border-radius:6px;font-size:12.5px;color:var(--t2);cursor:default;transition:background .15s}
.atnl:hover{background:var(--s3);color:var(--tx)}
.atnl.act{color:var(--blue)}
.app-topbar-right{display:flex;align-items:center;gap:10px;margin-left:16px}
.notif-btn{width:28px;height:28px;border-radius:7px;background:var(--s3);border:1px solid var(--bd);display:grid;place-items:center;cursor:default}
.avatar-sm{width:28px;height:28px;border-radius:50%;background:linear-gradient(135deg,var(--blue),var(--purple));display:grid;place-items:center;font-size:11px;font-weight:700;color:#fff}

/* ── REVIEW QUEUE ── */
.rq-layout{display:grid;grid-template-columns:200px 1fr;min-height:520px}
.rq-sidebar{background:var(--s2);border-right:1px solid var(--bd);padding:20px 14px;display:flex;flex-direction:column;gap:2px}
.rq-sidebar-label{font-size:10px;color:var(--t3);font-family:'JetBrains Mono',monospace;letter-spacing:.08em;text-transform:uppercase;padding:6px 10px;margin-top:4px}
.rq-sidebar-item{display:flex;align-items:center;justify-content:space-between;padding:8px 10px;border-radius:8px;font-size:12.5px;color:var(--t2);cursor:default;transition:background .15s}
.rq-sidebar-item:hover{background:var(--s3);color:var(--tx)}
.rq-sidebar-item.act{background:rgba(79,142,247,.1);color:var(--blue)}
.rq-sidebar-item-l{display:flex;align-items:center;gap:9px}
.rq-sic{width:15px;height:15px;border-radius:4px;opacity:.6}
.rq-badge{padding:1px 6px;background:var(--red);color:#fff;border-radius:100px;font-size:10px;font-family:'JetBrains Mono',monospace}
.rq-main{padding:28px 32px;overflow:hidden}
.rq-header{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:24px}
.rq-title-h{font-family:'Fraunces',serif;font-size:26px;font-weight:900;letter-spacing:-.8px;margin-bottom:6px}
.rq-title-sub{font-size:12.5px;color:var(--t2);font-weight:300;max-width:360px}
.rq-header-btns{display:flex;gap:8px}
.rq-btn{padding:7px 14px;border:1px solid var(--bd2);background:transparent;border-radius:8px;font-size:12px;color:var(--t2);cursor:default;display:flex;align-items:center;gap:6px;font-family:'Plus Jakarta Sans',sans-serif}
.rq-card-grid{display:grid;grid-template-columns:1fr 1fr;gap:14px}
.rq-card{background:var(--s2);border:1px solid var(--bd);border-radius:14px;overflow:hidden;transition:border-color .2s,transform .2s;cursor:default}
.rq-card:hover{border-color:var(--bd2);transform:translateY(-2px)}
.rq-card-img{height:100px;background:var(--s3);overflow:hidden;position:relative}
.rq-card-img-inner{width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:32px}
.rq-card-img-badge{position:absolute;top:8px;left:8px;padding:3px 8px;border-radius:6px;font-size:10px;font-family:'JetBrains Mono',monospace;font-weight:500}
.rq-card-body{padding:14px}
.rq-card-meta{display:flex;align-items:center;gap:8px;margin-bottom:8px}
.rq-card-av{width:22px;height:22px;border-radius:50%;font-size:8px;font-weight:700;display:grid;place-items:center;color:#fff;flex-shrink:0}
.rq-card-name{font-size:11px;color:var(--t2)}
.rq-card-title{font-size:14px;font-weight:600;letter-spacing:-.2px;margin-bottom:6px;line-height:1.3}
.rq-card-desc{font-size:11px;color:var(--t3);line-height:1.6;margin-bottom:12px;font-weight:300}
.rq-review-btn{width:100%;padding:8px;background:var(--s3);border:1px solid var(--bd);border-radius:8px;font-size:12px;color:var(--t2);cursor:default;font-family:'Plus Jakarta Sans',sans-serif;transition:all .15s;text-align:center}
.rq-review-btn:hover{background:rgba(79,142,247,.08);border-color:rgba(79,142,247,.25);color:var(--blue)}
.rq-progress{margin-top:20px;padding:12px 16px;background:var(--s2);border:1px solid var(--bd);border-radius:10px}
.rq-prog-label{font-size:11px;color:var(--t3);font-family:'JetBrains Mono',monospace;margin-bottom:8px;text-transform:uppercase;letter-spacing:.05em}
.rq-prog-bar{height:5px;background:var(--s3);border-radius:3px;overflow:hidden}
.rq-prog-fill{height:100%;background:linear-gradient(90deg,var(--blue),var(--purple));border-radius:3px;width:67%}
.rq-prog-sub{font-size:10.5px;color:var(--t3);margin-top:6px}

/* ── PROFILE SETTINGS ── */
.ps-layout{display:grid;grid-template-columns:260px 1fr;min-height:520px}
.ps-sidebar{background:var(--s2);border-right:1px solid var(--bd);padding:24px 18px}
.ps-preview-label{font-size:11px;color:var(--blue);font-family:'JetBrains Mono',monospace;letter-spacing:.06em;text-transform:uppercase;margin-bottom:14px;display:flex;align-items:center;gap:6px}
.ps-preview-label::before{content:'';width:6px;height:6px;border-radius:50%;background:var(--blue);flex-shrink:0;animation:blink 1.5s ease infinite}
.ps-card{background:var(--s1);border:1px solid var(--bd2);border-radius:14px;overflow:hidden;margin-bottom:14px}
.ps-card-top{background:linear-gradient(135deg,rgba(79,142,247,.15),rgba(123,94,167,.1));padding:20px;text-align:center;border-bottom:1px solid var(--bd)}
.ps-avatar-wrap{position:relative;display:inline-block;margin-bottom:12px}
.ps-avatar{width:60px;height:60px;border-radius:50%;background:linear-gradient(135deg,var(--blue),var(--purple));display:grid;place-items:center;font-size:22px;margin:0 auto}
.ps-pro-badge{position:absolute;top:-2px;right:-2px;padding:2px 7px;background:var(--blue);color:#fff;border-radius:100px;font-size:9px;font-family:'JetBrains Mono',monospace;font-weight:500}
.ps-name{font-family:'Fraunces',serif;font-size:16px;font-weight:700;margin-bottom:3px}
.ps-role{font-size:11px;color:var(--t2)}
.ps-meta{padding:12px 16px;display:flex;flex-direction:column;gap:6px}
.ps-meta-row{display:flex;align-items:center;gap:7px;font-size:11px;color:var(--t3)}
.ps-meta-row::before{content:'📍';font-size:10px}
.ps-meta-row.uni::before{content:'🏫'}
.ps-quote{padding:8px 12px;background:var(--s3);margin:0 12px 12px;border-radius:8px;font-size:11px;color:var(--t2);font-style:italic;line-height:1.5;border-left:2px solid var(--blue)}
.ps-skills-row{display:flex;gap:5px;padding:0 12px 12px;flex-wrap:wrap}
.ps-sk{padding:2px 8px;border-radius:100px;font-size:10px;font-family:'JetBrains Mono',monospace;border:1px solid var(--bd2);color:var(--t2)}
.ps-view-btn{display:block;margin:0 12px 12px;padding:8px;background:linear-gradient(135deg,var(--blue),var(--purple));color:#fff;border-radius:8px;font-size:12px;font-weight:600;text-align:center;cursor:default}
.ps-vis-info{padding:10px 12px;background:rgba(79,142,247,.06);border:1px solid rgba(79,142,247,.15);border-radius:9px;font-size:11px;color:var(--t2);display:flex;gap:8px;align-items:flex-start}
.ps-vis-icon{color:var(--blue);flex-shrink:0;margin-top:1px}
.ps-main{padding:28px 32px;overflow:hidden}
.ps-breadcrumb{font-size:12px;color:var(--t3);margin-bottom:20px;display:flex;align-items:center;gap:6px}
.ps-breadcrumb span{color:var(--blue)}
.ps-page-title{font-family:'Fraunces',serif;font-size:26px;font-weight:900;letter-spacing:-.8px;margin-bottom:4px}
.ps-page-sub{font-size:13px;color:var(--t2);margin-bottom:28px}
.ps-field-label{font-size:11px;font-weight:500;color:var(--t3);margin-bottom:6px;letter-spacing:.02em;text-transform:uppercase;font-family:'JetBrains Mono',monospace}
.ps-img-row{display:flex;align-items:center;gap:16px;margin-bottom:24px}
.ps-img-circle{width:70px;height:70px;border-radius:50%;background:linear-gradient(135deg,var(--blue),var(--purple));display:grid;place-items:center;font-size:24px;flex-shrink:0;overflow:hidden}
.ps-img-actions{display:flex;flex-direction:column;gap:6px}
.ps-btn-up{padding:7px 18px;background:var(--blue);color:#fff;border:none;border-radius:8px;font-size:12.5px;font-weight:600;cursor:default;font-family:'Plus Jakarta Sans',sans-serif}
.ps-btn-rm{padding:7px 18px;background:transparent;border:1px solid var(--bd2);color:var(--t2);border-radius:8px;font-size:12.5px;cursor:default;font-family:'Plus Jakarta Sans',sans-serif}
.ps-img-hint{font-size:11px;color:var(--t3);margin-top:2px}
.ps-form-grid{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:14px}
.ps-input{width:100%;padding:9px 12px;background:var(--s2);border:1px solid var(--bd2);border-radius:8px;font-size:13px;color:var(--tx);font-family:'Plus Jakarta Sans',sans-serif;outline:none}
.ps-input::placeholder{color:var(--t3)}
.ps-input:focus{border-color:rgba(79,142,247,.5);box-shadow:0 0 0 3px rgba(79,142,247,.08)}
.ps-textarea{width:100%;padding:9px 12px;background:var(--s2);border:1px solid var(--bd2);border-radius:8px;font-size:13px;color:var(--tx);font-family:'Plus Jakarta Sans',sans-serif;resize:none;height:80px;outline:none;margin-bottom:20px}
.ps-bottom-bar{display:flex;align-items:center;justify-content:space-between;padding:12px 0;border-top:1px solid var(--bd)}
.ps-unsaved{font-size:11.5px;color:var(--amber)}
.ps-btns-row{display:flex;gap:10px}
.ps-discard{padding:8px 20px;background:transparent;border:1px solid var(--bd2);color:var(--t2);border-radius:8px;font-size:13px;cursor:default;font-family:'Plus Jakarta Sans',sans-serif}
.ps-save{padding:8px 22px;background:var(--blue);color:#fff;border:none;border-radius:8px;font-size:13px;font-weight:600;cursor:default;font-family:'Plus Jakarta Sans',sans-serif}
/* PDF section */
.pdf-section{margin-top:4px}
.pdf-section-title{font-size:13px;font-weight:600;margin-bottom:12px;display:flex;align-items:center;gap:8px}
.pdf-section-title::before{content:'📄';font-size:14px}
.pdf-dropzone{border:1.5px dashed var(--bd2);border-radius:12px;padding:28px;text-align:center;transition:all .2s}
.pdf-dropzone-icon{font-size:32px;margin-bottom:10px}
.pdf-dropzone-title{font-size:13px;font-weight:600;margin-bottom:4px}
.pdf-dropzone-sub{font-size:11px;color:var(--t3)}
.pdf-browse{color:var(--blue);cursor:default}
.pdf-progress{margin-top:16px}
.pdf-prog-bar-wrap{height:6px;background:var(--s3);border-radius:3px;overflow:hidden;margin-bottom:8px}
.pdf-prog-fill{height:100%;background:linear-gradient(90deg,var(--blue),var(--purple));border-radius:3px;width:74%;animation:prog 2s ease infinite alternate}
@keyframes prog{from{width:60%}to{width:84%}}
.pdf-steps{display:flex;align-items:center;gap:16px;justify-content:center}
.pdf-step{font-size:10.5px;font-family:'JetBrains Mono',monospace;display:flex;align-items:center;gap:5px}
.pdf-step.done{color:var(--green)}
.pdf-step.active{color:var(--blue)}
.pdf-step.todo{color:var(--t3)}
.pdf-step::before{content:'•'}
.pdf-step.done::before{content:'✓'}
.pdf-step.active::before{content:'◉'}

/* ── TALENT SEARCH ── */
.ts-layout{min-height:520px;padding:28px 32px}
.ts-header{margin-bottom:24px}
.ts-title{font-family:'Fraunces',serif;font-size:30px;font-weight:900;letter-spacing:-1px;margin-bottom:8px}
.ts-sub{font-size:13px;color:var(--t2);font-weight:300;max-width:440px}
.ts-filters{display:flex;align-items:center;gap:8px;margin-bottom:24px;flex-wrap:wrap}
.ts-filter-btn{
  display:flex;align-items:center;gap:6px;
  padding:7px 16px;border-radius:100px;font-size:13px;font-weight:500;
  cursor:default;transition:all .15s;border:1px solid var(--bd2);color:var(--t2);background:transparent;
  font-family:'Plus Jakarta Sans',sans-serif;
}
.ts-filter-btn:hover{border-color:rgba(79,142,247,.35);color:var(--tx)}
.ts-filter-btn.act{background:var(--blue);color:#fff;border-color:var(--blue)}
.ts-filter-tag{padding:2px 6px;border-radius:100px;font-size:10px;background:rgba(255,255,255,.15)}
.ts-more-btn{display:flex;align-items:center;gap:6px;padding:7px 16px;border-radius:100px;font-size:12.5px;color:var(--t2);cursor:default;border:1px solid var(--bd2);margin-left:auto}
.ts-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-bottom:24px}
.ts-card{background:var(--s2);border:1px solid var(--bd);border-radius:14px;padding:20px;position:relative;transition:border-color .2s,transform .2s;cursor:default}
.ts-card:hover{border-color:var(--bd2);transform:translateY(-2px)}
.ts-card-top-badge{position:absolute;top:12px;right:12px;padding:3px 9px;border-radius:100px;font-size:10px;font-family:'JetBrains Mono',monospace;font-weight:500;background:rgba(245,166,35,.12);color:var(--amber);border:1px solid rgba(245,166,35,.25)}
.ts-card-av{width:44px;height:44px;border-radius:50%;display:grid;place-items:center;font-size:16px;font-weight:700;color:#fff;margin-bottom:12px;overflow:hidden;font-family:'Fraunces',serif}
.ts-card-name{font-family:'Fraunces',serif;font-size:16px;font-weight:700;letter-spacing:-.3px;margin-bottom:4px}
.ts-card-uni{font-size:11.5px;color:var(--t2);margin-bottom:12px;display:flex;align-items:center;gap:5px}
.ts-card-uni::before{content:'🏛';font-size:11px}
.ts-card-skills{display:flex;gap:5px;flex-wrap:wrap;margin-bottom:14px}
.ts-skill{padding:3px 9px;border-radius:100px;font-size:10.5px;font-family:'JetBrains Mono',monospace;border:1px solid var(--bd2);color:var(--t2)}
.ts-card-btns{display:flex;gap:8px}
.ts-view-btn{flex:1;padding:8px;background:var(--s3);border:1px solid var(--bd2);border-radius:8px;font-size:12px;font-weight:500;color:var(--tx);cursor:default;text-align:center;font-family:'Plus Jakarta Sans',sans-serif;transition:all .15s}
.ts-view-btn:hover{background:rgba(79,142,247,.1);border-color:rgba(79,142,247,.3);color:var(--blue)}
.ts-contact-btn{flex:1;padding:8px;background:linear-gradient(135deg,var(--blue),var(--purple));border:none;border-radius:8px;font-size:12px;font-weight:600;color:#fff;cursor:default;text-align:center;font-family:'Plus Jakarta Sans',sans-serif}
.ts-load-more{display:flex;justify-content:center}
.ts-load-btn{padding:10px 32px;border:1px solid var(--bd2);border-radius:100px;font-size:13.5px;color:var(--t2);cursor:default;font-family:'Plus Jakarta Sans',sans-serif;transition:all .15s}
.ts-load-btn:hover{border-color:rgba(79,142,247,.3);color:var(--blue)}

/* ── FEATURES ── */
.feat-sec{padding:100px 60px;max-width:1240px;margin:0 auto}
.fg{display:grid;grid-template-columns:1fr 1fr 1fr;gap:20px}
.fc{background:var(--s1);border:1px solid var(--bd);border-radius:20px;padding:32px;position:relative;overflow:hidden;transition:border-color .25s,transform .25s;cursor:default}
.fc:hover{border-color:var(--bd2);transform:translateY(-4px)}
.fc.lg{grid-column:span 2}
.fc::before{content:'';position:absolute;top:0;left:24px;right:24px;height:1px;background:linear-gradient(90deg,transparent,rgba(79,142,247,.5),transparent);opacity:0;transition:opacity .3s}
.fc:hover::before{opacity:1}
.fi{width:44px;height:44px;border-radius:12px;border:1px solid var(--bd2);background:var(--s2);display:grid;place-items:center;font-size:20px;margin-bottom:20px}
.fc h3{font-family:'Fraunces',serif;font-size:22px;font-weight:700;letter-spacing:-.5px;margin-bottom:10px;color:var(--tx)}
.fc p{font-size:14px;color:var(--t2);line-height:1.75;font-weight:300}
.fv{margin-top:28px;background:var(--s2);border:1px solid var(--bd);border-radius:12px;overflow:hidden}
.fvh{background:var(--s3);padding:10px 14px;font-size:11px;color:var(--t3);font-family:'JetBrains Mono',monospace;border-bottom:1px solid var(--bd)}
.fvb{padding:16px}
.sflow{display:flex;flex-wrap:wrap;gap:8px}
.stag{padding:5px 12px;border-radius:100px;font-size:11.5px;font-weight:500;font-family:'JetBrains Mono',monospace;border:1px solid}
.sm{border-color:rgba(45,217,143,.3);color:var(--green);background:rgba(45,217,143,.06)}
.sg2{border-color:rgba(245,166,35,.3);color:var(--amber);background:rgba(245,166,35,.06)}
.sb{border-color:rgba(79,142,247,.3);color:var(--blue);background:rgba(79,142,247,.06)}
.sro{border-color:rgba(123,94,167,.3);color:var(--purple);background:rgba(123,94,167,.06)}
.qcard{background:var(--s3);border:1px solid var(--bd);border-radius:10px;padding:12px 14px;margin-bottom:8px}
.qtop{display:flex;align-items:center;justify-content:space-between;margin-bottom:8px}
.qt{font-size:12.5px;font-weight:500}
.qbott{display:flex;gap:6px;margin-top:10px}
.qbtn{flex:1;padding:6px;border-radius:6px;font-size:11px;font-weight:500;font-family:'Plus Jakarta Sans',sans-serif;cursor:pointer;border:1px solid;transition:all .15s}
.qap{border-color:rgba(45,217,143,.3);color:var(--green);background:rgba(45,217,143,.06)}
.qap:hover{background:rgba(45,217,143,.12)}
.qrj{border-color:rgba(224,92,92,.3);color:var(--red);background:rgba(224,92,92,.06)}
.qrj:hover{background:rgba(224,92,92,.12)}

/* ── ROLES ── */
.roles-sec{padding:0 60px 100px;max-width:1240px;margin:0 auto}
.rtabs{display:flex;gap:8px;margin-bottom:40px;border-bottom:1px solid var(--bd);padding-bottom:0}
.rtab{padding:12px 24px 16px;font-size:14px;font-weight:500;color:var(--t2);cursor:pointer;border:none;background:transparent;border-bottom:2px solid transparent;margin-bottom:-1px;transition:color .15s,border-color .15s;font-family:'Plus Jakarta Sans',sans-serif}
.rtab:hover{color:var(--tx)}
.rtab.act{color:var(--blue);border-bottom-color:var(--blue)}
.rpanel{display:none;grid-template-columns:1fr 1fr;gap:60px;align-items:center}
.rpanel.act{display:grid}
.rpicon{width:60px;height:60px;border-radius:16px;border:1px solid var(--bd2);background:var(--s2);display:grid;place-items:center;font-size:28px;margin-bottom:28px}
.rpcon h3{font-family:'Fraunces',serif;font-size:38px;font-weight:900;letter-spacing:-1.5px;line-height:1.05;margin-bottom:16px}
.rpcon p{font-size:16px;color:var(--t2);font-weight:300;line-height:1.75;max-width:400px;margin-bottom:32px}
.rperks{display:flex;flex-direction:column;gap:12px}
.perk{display:flex;align-items:flex-start;gap:12px}
.pdot{width:6px;height:6px;border-radius:50%;background:var(--blue);margin-top:8px;flex-shrink:0}
.ptx{font-size:14px;color:var(--t2);line-height:1.65}
.ptx strong{color:var(--tx);font-weight:500}
.rpvis{background:var(--s1);border:1px solid var(--bd2);border-radius:20px;padding:28px;overflow:hidden}
.rpvh{font-size:11px;color:var(--t3);font-family:'JetBrains Mono',monospace;margin-bottom:16px;letter-spacing:.05em}
.pcp{background:var(--s2);border:1px solid var(--bd);border-radius:12px;overflow:hidden}
.pcpt{background:linear-gradient(135deg,rgba(79,142,247,.12),rgba(123,94,167,.08));padding:24px;display:flex;align-items:center;gap:16px;border-bottom:1px solid var(--bd)}
.pcpav{width:52px;height:52px;border-radius:50%;background:linear-gradient(135deg,var(--blue),var(--purple));display:grid;place-items:center;font-family:'Fraunces',serif;font-size:20px;font-weight:700;color:#fff}
.pcpn{font-family:'Fraunces',serif;font-size:18px;font-weight:700;letter-spacing:-.3px}
.pcps{font-size:12px;color:var(--t2);margin-top:2px}
.pcpb{padding:16px}
.pcpsk{display:flex;gap:6px;flex-wrap:wrap;margin-bottom:14px}
.pcpp{background:var(--s3);border-radius:8px;padding:10px 12px;border-left:3px solid var(--green)}
.pcppt{font-size:12px;font-weight:500}
.pcpps{font-size:11px;color:var(--t3);margin-top:2px}
.sbar{background:var(--s3);border:1px solid var(--bd2);border-radius:8px;padding:10px 14px;font-size:12px;color:var(--t3);font-family:'JetBrains Mono',monospace;margin-bottom:14px;display:flex;align-items:center;gap:8px}
.rcard{display:flex;align-items:center;gap:12px;background:var(--s3);border:1px solid var(--bd);border-radius:10px;padding:12px 14px;margin-bottom:8px;transition:border-color .15s}
.rcard:hover{border-color:rgba(79,142,247,.3)}
.rav{width:34px;height:34px;border-radius:50%;display:grid;place-items:center;font-size:12px;font-weight:600;color:#fff;flex-shrink:0}
.ri2{flex:1}
.rn{font-size:12.5px;font-weight:500}
.rsk{display:flex;gap:4px;margin-top:4px;flex-wrap:wrap}
.rs{padding:2px 7px;border-radius:100px;font-size:10px;font-weight:500;font-family:'JetBrains Mono',monospace}

/* ── HOW ── */
.how-sec{padding:100px 60px;max-width:1240px;margin:0 auto}
.how-g{display:grid;grid-template-columns:repeat(4,1fr);gap:2px;margin-top:64px}
.hstep{background:var(--s1);border:1px solid var(--bd);padding:36px 28px;transition:background .2s;cursor:default}
.hstep:first-child{border-radius:16px 0 0 16px}
.hstep:last-child{border-radius:0 16px 16px 0}
.hstep:hover{background:var(--s2)}
.sn{font-family:'Fraunces',serif;font-size:56px;font-weight:900;color:var(--s3);line-height:1;margin-bottom:20px;letter-spacing:-2px;transition:color .2s}
.hstep:hover .sn{color:var(--blue)}
.hstep h4{font-family:'Fraunces',serif;font-size:19px;font-weight:700;letter-spacing:-.3px;margin-bottom:10px}
.hstep p{font-size:13.5px;color:var(--t2);line-height:1.7;font-weight:300}

/* ── STATS ── */
.stats-sec{padding:0 60px 100px;max-width:1240px;margin:0 auto}
.statg{display:grid;grid-template-columns:repeat(5,1fr);gap:2px}
.sbox{background:var(--s1);border:1px solid var(--bd);padding:36px 28px;text-align:center;transition:background .2s;cursor:default}
.sbox:first-child{border-radius:16px 0 0 16px}
.sbox:last-child{border-radius:0 16px 16px 0}
.sbox:hover{background:var(--s2)}
.snum{font-family:'Fraunces',serif;font-size:48px;font-weight:900;letter-spacing:-2px;line-height:1}
.snum .suf{font-size:28px;color:var(--blue)}
.slbl{font-size:12px;color:var(--t3);margin-top:8px;font-family:'JetBrains Mono',monospace;letter-spacing:.05em;text-transform:uppercase}

/* ── CTA ── */
.cta-sec{padding:0 60px 140px;max-width:1240px;margin:0 auto}
.ctain{position:relative;border-radius:28px;overflow:hidden;padding:100px 80px;text-align:center;background:var(--s1);border:1px solid var(--bd2)}
.ctain::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse 60% 60% at 50% -10%,rgba(79,142,247,.09),transparent),radial-gradient(ellipse 40% 40% at 80% 100%,rgba(123,94,167,.07),transparent);pointer-events:none}
.ctain::after{content:'';position:absolute;top:0;left:0;right:0;height:1px;background:linear-gradient(90deg,transparent,var(--blue),var(--purple),transparent)}
.ctain h2{position:relative;font-family:'Fraunces',serif;font-size:clamp(40px,5vw,68px);font-weight:900;letter-spacing:-2.5px;line-height:1;margin-bottom:18px}
.ctain h2 em{font-style:italic;font-weight:300;color:var(--t2)}
.ctain p{position:relative;font-size:17px;color:var(--t2);font-weight:300;max-width:440px;margin:0 auto 44px;line-height:1.75}
.cbtns{position:relative;display:flex;justify-content:center;gap:12px}

/* ── FOOTER ── */
footer{border-top:1px solid var(--bd);padding:36px 60px;max-width:1240px;margin:0 auto;display:flex;align-items:center;justify-content:space-between}
.flogo{font-family:'Fraunces',serif;font-size:16px;font-weight:700;color:var(--t3);display:flex;align-items:center;gap:8px;text-decoration:none}
.flinks{display:flex;gap:24px;list-style:none}
.flinks a{font-size:13px;color:var(--t3);text-decoration:none;transition:color .15s}
.flinks a:hover{color:var(--t2)}
.fcopy{font-size:12px;color:var(--t3);font-family:'JetBrains Mono',monospace}
.reveal{opacity:0;transform:translateY(28px);transition:opacity .7s cubic-bezier(.16,1,.3,1),transform .7s cubic-bezier(.16,1,.3,1)}
.reveal.vis{opacity:1;transform:translateY(0)}
</style>
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