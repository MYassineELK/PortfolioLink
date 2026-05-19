
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


    function generateBio() {
        const raw = document.getElementById('bio-input').value.trim();
        const parts = raw.split(',').map(s => s.trim());
        const name = parts[0] || '';
        const school = parts[1] || '';
        const skills = parts[2] || '';

        if (!name) {
            alert('Enter at least your name');
            return;
        }

        document.getElementById('bio-result').style.display = 'block';
        document.getElementById('bio-result').textContent = '⏳ Generating...';

        const fd = new FormData();
        fd.append('generate_bio', '1');
        fd.append('name', name);
        fd.append('school', school);
        fd.append('skills', skills);

        fetch(window.location.href, { // ← هنا التغيير
                method: 'POST',
                body: fd
            })
            .then(r => r.json())
            .then(data => {
                document.getElementById('bio-result').textContent = data.status === 'success' ?
                    data.bio : '❌ ' + data.message;
            })
            .catch(() => {
                document.getElementById('bio-result').textContent = '❌ Server error';
            });
    }

    function toggleBioPanel() {
        const panel = document.getElementById('bio-panel');
        const launcher = document.getElementById('bio-launcher');
        const visible = panel.style.opacity === '1';

        if (visible) {
            panel.style.opacity = '0';
            panel.style.transform = 'translateY(16px) scale(0.97)';
            panel.style.pointerEvents = 'none';
            launcher.style.transform = 'scale(1)';
        } else {
            panel.style.opacity = '1';
            panel.style.transform = 'translateY(0) scale(1)';
            panel.style.pointerEvents = 'all';
            launcher.style.transform = 'scale(0.92)';
            document.getElementById('bio-input').focus();
        }
    }
