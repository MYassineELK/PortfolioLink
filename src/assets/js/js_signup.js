
    function setRole(el) {
      document.getElementById("rols").style.border = "none"
      document.querySelectorAll('.role-tab').forEach(t => t.classList.remove('active'));
      el.classList.add('active');
      document.getElementById("role").value = el.innerText
    }


    // validation inpute
    function validation() {

      let furst_name = document.getElementById("name");
      let pas = document.getElementById("pwd");
      let pasc = document.getElementById("cpwd");
      let last_name = document.getElementById("last_name");
      let role = document.getElementById("role");
      let email = document.getElementById("email");
      if (role.value == "") {
        document.getElementById("rols").style.borderColor = "red"

      } else if (furst_name.value == "") {
        furst_name.focus()
        furst_name.className = "input-li"

      } else if (last_name.value == "") {
        last_name.focus()
        last_name.className = "input-li"
      } else if (email.value == "") {
        email.focus()
        email.className = "input-li"
      } else if (!/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/.test(email.value)) {
        email.focus()
        email.className = "input-li"
      } else if (pas.value == "" || document.getElementById("strengthLabel").textContent == "Weak") {
        pas.focus()
        pas.className = "input-li"
      } else if (pasc.value == "" || pas.value != pasc.value) {
        pasc.focus()
        pasc.className = "input-li"
      } else {
        document.getElementById("form").submit()
      }

    }
    // 
    function togglePwd(inputId, iconId) {
      const inp = document.getElementById(inputId);
      inp.type = inp.type === 'password' ? 'text' : 'password';
    }

    function checkStrength(val) {
      const bars = ['bar1', 'bar2', 'bar3'];
      const labels = ['', 'Weak', 'Fair', 'Strong'];
      let score = 0;
      if (val.length >= 8) score++;
      if (/[A-Z]/.test(val) && /[0-9]/.test(val)) score++;
      if (/[^A-Za-z0-9]/.test(val) && val.length >= 12) score++;

      bars.forEach((id, i) => {
        document.getElementById(id).style.width = i < score ? '100%' : '0%';
      });
      document.getElementById('strengthLabel').textContent = val.length ? labels[score] || 'Weak' : '';
    }
  