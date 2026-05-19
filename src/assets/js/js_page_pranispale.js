document.addEventListener('mousemove', e => {
    document.getElementById('cglow').style.cssText += `left:${e.clientX}px;top:${e.clientY}px`;
});


const obs = new IntersectionObserver(entries => {
    entries.forEach((e, i) => {
        if (e.isIntersecting) { setTimeout(() => e.target.classList.add('vis'), i * 60); obs.unobserve(e.target); }
    });
}, { threshold: .1 });
document.querySelectorAll('.reveal').forEach(el => obs.observe(el));


function switchShow(id, btn) {
    document.querySelectorAll('.stab').forEach(t => t.classList.remove('act'));
    document.querySelectorAll('.spanel').forEach(p => p.classList.remove('act'));
    btn.classList.add('act');
    document.getElementById('show-' + id).classList.add('act');
}

function switchRole(r, btn) {
    document.querySelectorAll('.rtab').forEach(t => t.classList.remove('act'));
    document.querySelectorAll('.rpanel').forEach(p => p.classList.remove('act'));
    btn.classList.add('act');
    const map = { student: 'rs', professor: 'rp', company: 'rc' };
    document.getElementById(map[r]).classList.add('act');
}
console.log("yass")