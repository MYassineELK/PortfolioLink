
function setRole(el) {
    document.getElementById("rols").style.border = "none"
    document.querySelectorAll('.role-tab').forEach(t => t.classList.remove('active'));
    el.classList.add('active');
    document.getElementById("role").value = el.innerText
}
// validation inpute
function validation() {

    let pas = document.getElementById("pwd");
    let email = document.getElementById("email");
    let role = document.getElementById("role");
    if (role.value == "") {
        document.getElementById("rols").style.borderColor = "red"

    } else if (email.value == "") {
        email.focus()
        email.className = "input-li"
    } else if (!/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/.test(email.value)) {
        email.focus()
        email.className = "input-li"
    } else if (pas.value == "") {
        pas.focus()
        pas.className = "input-li"
    } else {
        document.getElementById("form").submit()
    }

}
