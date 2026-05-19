document.addEventListener('DOMContentLoaded', () => {

    const msgs     = document.getElementById('chMsgs');
    const inputEl  = document.getElementById('chInput');
    const win      = document.getElementById('chat-window');
    const launcher = document.getElementById('chat-launcher');

    function scrollBot() {
        if (msgs) msgs.scrollTop = msgs.scrollHeight; // ← null guard
    }

    function chOpen()  { win.style.display = 'flex'; launcher.style.display = 'none'; scrollBot(); }
    function chClose() { win.style.display = 'none'; launcher.style.display = 'flex'; }

    function addMsg(role, text) {
        const row = document.createElement('div');
        row.className = 'ch-row ' + role;
        row.innerHTML = role === 'bot'
            ? `<div class="ch-msg-av">🤖</div><div class="ch-bubble">${text}</div>`
            : `<div class="ch-bubble">${text}</div>`;
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

    function chSend(e) {
        e.preventDefault();
        const msg = inputEl.value.trim();
        if (!msg) return;

        addMsg('user', msg);
        inputEl.value = '';
        inputEl.focus();
        addTyping();

        const CHAT_URL = '/php/php poo/Projet_Tutore/PortfolioLink/src/views/autonification/chatboot.php';

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
            addMsg('bot', data.status === 'success'
                ? data.bot_reply
                : '⚠️ ' + (data.message || 'Something went wrong.')
            );
        })
        .catch(err => {
            removeTyping();
            console.error('Chat error:', err);
            addMsg('bot', '❌ Could not reach the server. Please try again.');
        });
    }

    // Expose functions used in HTML (onclick attributes, etc.)
    window.chOpen  = chOpen;
    window.chClose = chClose;
    window.chSend  = chSend;

    scrollBot();
});