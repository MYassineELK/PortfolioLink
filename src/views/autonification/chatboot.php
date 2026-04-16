<?php
// 1. بدء الجلسة فوراً للتمكن من عرض التاريخ وتخزين البيانات
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ── هذا الجزء يشتغل فقط عند AJAX POST ──
if (isset($_POST["prompt"])) {
    // تنظيف المخرجات لضمان إرسال JSON نقي
    if (ob_get_length()) ob_clean();

    try {
        // تصحيح المسار: إضافة / قبل النقاط للرجوع للخلف بشكل صحيح
       // هذا السطر يبحث عن المجلد الرئيسي للمشروع ثم يدخل لـ model
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/php poo/Projet_Tutore/PortfolioLink/src/model/chatboot.php';

        $userPrompt  = $_POST["prompt"];
        $botResponse = chatboot::chatboot($userPrompt);

        // حفظ في الـ session (تأمين القيم من الـ null لـ PHP 8.1)
        $_SESSION["chate"][] = [$userPrompt ?? '', $botResponse ?? ''];

        header('Content-Type: application/json');
        echo json_encode([
            'status'    => 'success',
            'bot_reply' => $botResponse
        ]);
    } catch (Exception $e) {
        header('Content-Type: application/json', true, 500);
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PortfolioLink Assistant</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
/* ════════════════════════════════
   CSS VARIABLES — brand colors
════════════════════════════════ */
:root {
    --chat-primary:   #4F8EF7;
    --chat-purple:    #7B5EA7;
    --chat-bg:        #0D0F14;
    --chat-surface:   #161920;
    --chat-surface2:  #1E2330;
    --chat-border:    rgba(255,255,255,0.08);
    --chat-text:      #F0F2F7;
    --chat-muted:     #9CA3AF;
    --chat-green:     #2DD98F;
}

/* ════════════════════════════════
   LAUNCHER BUTTON
════════════════════════════════ */
#chat-launcher {
    position: fixed;
    bottom: 28px;
    right: 28px;
    z-index: 9998;
    width: 58px;
    height: 58px;
    background: linear-gradient(135deg, var(--chat-primary), var(--chat-purple));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    border: none;
    box-shadow: 0 8px 32px rgba(79,142,247,0.45);
    transition: transform 0.25s cubic-bezier(.34,1.56,.64,1), box-shadow 0.25s;
    outline: none;
}
#chat-launcher:hover {
    transform: scale(1.1);
    box-shadow: 0 12px 40px rgba(79,142,247,0.6);
}
#chat-launcher:active { transform: scale(0.96); }

/* Sonar ring */
#chat-launcher::after {
    content: '';
    position: absolute;
    inset: -4px;
    border-radius: 50%;
    border: 2px solid rgba(79,142,247,0.4);
    animation: sonar 2s ease-out infinite;
}
@keyframes sonar {
    0%  { transform: scale(1); opacity: 0.8; }
    100%{ transform: scale(1.8); opacity: 0; }
}

/* Notification dot */
#chat-notif {
    position: absolute;
    top: 4px;
    right: 4px;
    width: 12px;
    height: 12px;
    background: var(--chat-green);
    border-radius: 50%;
    border: 2px solid var(--chat-bg);
    animation: blink 2s ease infinite;
}
@keyframes blink { 0%,100%{opacity:1} 50%{opacity:.4} }

/* ════════════════════════════════
   CHAT WINDOW
════════════════════════════════ */
#chat-window {
    position: fixed;
    bottom: 30px;
    right: 28px;
    z-index: 9999;
    width: 375px;
    height: 580px;
    background: var(--chat-bg);
    border: 1px solid var(--chat-border);
    border-radius: 22px;
    display: none;
    flex-direction: column;
    overflow: hidden;
    box-shadow: 0 32px 80px rgba(0,0,0,0.7), 0 0 0 1px rgba(255,255,255,0.04);
    font-family: 'Plus Jakarta Sans', sans-serif;
    animation: slideUp 0.35s cubic-bezier(.16,1,.3,1) both;
}
@keyframes slideUp {
    from { opacity:0; transform:translateY(24px) scale(.97); }
    to   { opacity:1; transform:translateY(0) scale(1); }
}

/* ── HEADER ── */
.ch-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 16px 20px;
    background: var(--chat-surface);
    border-bottom: 1px solid var(--chat-border);
    flex-shrink: 0;
}
.ch-bot-info { display: flex; align-items: center; gap: 12px; }
.ch-avatar {
    width: 38px;
    height: 38px;
    background: linear-gradient(135deg, var(--chat-primary), var(--chat-purple));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
    box-shadow: 0 0 16px rgba(79,142,247,0.3);
}
.ch-name {
    font-size: 14px;
    font-weight: 600;
    color: var(--chat-text);
}
.ch-status {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 11px;
    color: var(--chat-green);
    margin-top: 2px;
}
.ch-status::before {
    content: '';
    width: 6px;
    height: 6px;
    background: var(--chat-green);
    border-radius: 50%;
    animation: blink 2s ease infinite;
}
.ch-close {
    width: 28px;
    height: 28px;
    border-radius: 8px;
    background: var(--chat-surface2);
    border: 1px solid var(--chat-border);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    color: var(--chat-muted);
    transition: all .2s;
}
.ch-close:hover { background: rgba(224,92,92,.1); color: #E05C5C; border-color: rgba(224,92,92,.3); }

/* ── MESSAGES ── */
.ch-messages {
    flex: 1;
    overflow-y: auto;
    padding: 16px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    scrollbar-width: none;
}
.ch-messages::-webkit-scrollbar { display: none; }

.ch-row { display: flex; width: 100%; }
.ch-row.user { justify-content: flex-end; }
.ch-row.bot  { justify-content: flex-start; align-items: flex-end; gap: 8px; }

/* bot avatar in messages */
.ch-msg-av {
    width: 26px;
    height: 26px;
    background: linear-gradient(135deg, var(--chat-primary), var(--chat-purple));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    flex-shrink: 0;
}

.ch-bubble {
    max-width: 78%;
    padding: 10px 14px;
    font-size: 13.5px;
    line-height: 1.55;
    border-radius: 16px;
    word-break: break-word;
}
.ch-row.user .ch-bubble {
    background: linear-gradient(135deg, var(--chat-primary), var(--chat-purple));
    color: #fff;
    border-radius: 16px 16px 4px 16px;
}
.ch-row.bot .ch-bubble {
    background: var(--chat-surface2);
    color: var(--chat-text);
    border: 1px solid var(--chat-border);
    border-radius: 16px 16px 16px 4px;
}

/* typing indicator */
.ch-typing .ch-bubble {
    display: flex;
    align-items: center;
    gap: 4px;
    padding: 12px 16px;
}
.ch-typing .ch-bubble span {
    width: 6px;
    height: 6px;
    background: var(--chat-muted);
    border-radius: 50%;
    animation: typingDot 1.2s ease infinite;
}
.ch-typing .ch-bubble span:nth-child(2) { animation-delay: .2s; }
.ch-typing .ch-bubble span:nth-child(3) { animation-delay: .4s; }
@keyframes typingDot {
    0%,60%,100% { transform: translateY(0); }
    30%          { transform: translateY(-6px); }
}

/* ── INPUT ── */
.ch-footer {
    padding: 12px 14px;
    background: var(--chat-surface);
    border-top: 1px solid var(--chat-border);
    flex-shrink: 0;
}
.ch-input-wrap {
    display: flex;
    align-items: center;
    gap: 8px;
    background: var(--chat-surface2);
    border: 1px solid var(--chat-border);
    border-radius: 12px;
    padding: 6px 6px 6px 14px;
    transition: border-color .2s;
}
.ch-input-wrap:focus-within {
    border-color: rgba(79,142,247,.4);
    box-shadow: 0 0 0 3px rgba(79,142,247,.08);
}
.ch-input-wrap input {
    flex: 1;
    background: transparent;
    border: none;
    outline: none;
    font-size: 13.5px;
    color: var(--chat-text);
    font-family: 'Plus Jakarta Sans', sans-serif;
}
.ch-input-wrap input::placeholder { color: var(--chat-muted); }
.ch-send {
    width: 34px;
    height: 34px;
    background: linear-gradient(135deg, var(--chat-primary), var(--chat-purple));
    border: none;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    flex-shrink: 0;
    transition: transform .15s, box-shadow .2s;
    color: #fff;
}
.ch-send:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 14px rgba(79,142,247,.4);
}
.ch-send:active { transform: scale(.95); }

/* ── QUICK REPLIES ── */
.ch-quick {
    display: flex;
    gap: 6px;
    flex-wrap: wrap;
    padding: 8px 14px 0;
}
.ch-quick-btn {
    padding: 5px 12px;
    background: transparent;
    border: 1px solid var(--chat-border);
    border-radius: 100px;
    font-size: 11.5px;
    color: var(--chat-muted);
    cursor: pointer;
    font-family: 'Plus Jakarta Sans', sans-serif;
    transition: all .2s;
    white-space: nowrap;
}
.ch-quick-btn:hover {
    border-color: rgba(79,142,247,.35);
    color: var(--chat-primary);
    background: rgba(79,142,247,.06);
}
</style>
</head>
<body>

<button id="chat-launcher" onclick="chOpen()" title="Chat with assistant">
    <div id="chat-notif"></div>
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
    </svg>
</button>

<div id="chat-window">

    <div class="ch-header">
        <div class="ch-bot-info">
            <div class="ch-avatar">🤖</div>
            <div>
                <div class="ch-name">Portfolio Assistant</div>
                <div class="ch-status">Online — ready to help</div>
            </div>
        </div>
        <div class="ch-close" onclick="chClose()" title="Close">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <line x1="1" y1="1" x2="13" y2="13"/><line x1="13" y1="1" x2="1" y2="13"/>
            </svg>
        </div>
    </div>

    <div class="ch-messages" id="chMsgs">
        <div class="ch-row bot">
            <div class="ch-msg-av">🤖</div>
            <div class="ch-bubble">
                👋 Hi! I'm your PortfolioLink assistant.<br>
                How can I help you today?
            </div>
        </div>

        <?php if (!empty($_SESSION["chate"])): ?>
            <?php foreach ($_SESSION["chate"] as $chat): ?>
                <div class="ch-row user">
                    <div class="ch-bubble"><?= htmlspecialchars($chat[0] ?? '') ?></div>
                </div>
                <div class="ch-row bot">
                    <div class="ch-msg-av">🤖</div>
                    <div class="ch-bubble"><?= htmlspecialchars($chat[1] ?? '') ?></div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="ch-footer">
        <form id="chForm" onsubmit="chSend(event)">
            <div class="ch-input-wrap">
                <input
                    type="text"
                    id="chInput"
                    placeholder="Type your message..."
                    autocomplete="off"
                    required
                />
                <button type="submit" class="ch-send" title="Send">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="22" y1="2" x2="11" y2="13"/>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                    </svg>
                </button>
            </div>
        </form>
    </div>

</div>

<script>
// ── helpers ──────────────────────────────────
const msgs     = document.getElementById('chMsgs');
const inputEl  = document.getElementById('chInput');
const win      = document.getElementById('chat-window');
const launcher = document.getElementById('chat-launcher');

function scrollBot() { msgs.scrollTop = msgs.scrollHeight; }

function chOpen()  { win.style.display = 'flex'; launcher.style.display = 'none'; scrollBot(); }
function chClose() { win.style.display = 'none'; launcher.style.display = 'flex'; }

function addMsg(role, text) {
    const row = document.createElement('div');
    row.className = 'ch-row ' + role;
    if (role === 'bot') {
        row.innerHTML = `<div class="ch-msg-av">🤖</div><div class="ch-bubble">${text}</div>`;
    } else {
        row.innerHTML = `<div class="ch-bubble">${text}</div>`;
    }
    msgs.appendChild(row);
    scrollBot();
    return row;
}

function addTyping() {
    const row = document.createElement('div');
    row.className = 'ch-row bot ch-typing';
    row.id = 'chTyping';
    row.innerHTML = `<div class="ch-msg-av">🤖</div><div class="ch-bubble"><span></span><span></span><span></span></div>`;
    msgs.appendChild(row);
    scrollBot();
}

function removeTyping() {
    const t = document.getElementById('chTyping');
    if (t) t.remove();
}

// ── SEND ─────────────────────────────────────
function chSend(e) {
    e.preventDefault();
    const msg = inputEl.value.trim();
    if (!msg) return;

    addMsg('user', msg);
    inputEl.value = '';
    inputEl.focus();
    addTyping();

    // استخدام الرابط الحالي لضمان الوصول لمعالج الـ POST في الأعلى
// جرب وضع المسار الكامل للملف من جذور السيرفر
const CHAT_URL = '/php/php poo/Projet_Tutore/PortfolioLink/src/views/autonification/chatboot.php';;

    const fd = new FormData();
    fd.append('prompt', msg);

    fetch(CHAT_URL, {
        method: 'POST',
        body: fd,
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(res => {
        if (!res.ok) throw new Error('HTTP ' + res.status);
        return res.json();
    })
    .then(data => {
        removeTyping();
        if (data.status === 'success') {
            addMsg('bot', data.bot_reply);
        } else {
            addMsg('bot', '⚠️ ' + (data.message || 'Something went wrong.'));
        }
    })
    .catch(err => {
        removeTyping();
        console.error('Chat error:', err);
        addMsg('bot', '❌ Could not reach the server. Please try again.');
    });
}

window.addEventListener('load', scrollBot);
</script>

</body>
</html>