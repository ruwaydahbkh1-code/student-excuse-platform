const form = document.getElementById('loginForm');
const identifier = document.getElementById('identifier');
const password = document.getElementById('password');
const role = document.getElementById('role');
const loginBtn = document.getElementById('loginBtn');
const togglePassword = document.getElementById('togglePassword');

// 🔹 تفعيل الزر فقط إذا كانت الحقول ممتلئة
function checkFields() {
  if (identifier.value.trim() && password.value.trim() && role.value.trim()) {
    loginBtn.disabled = false;
  } else {
    loginBtn.disabled = true;
  }
}

identifier.addEventListener('input', checkFields);
password.addEventListener('input', checkFields);
role.addEventListener('change', checkFields);

// 🔹 إظهار وإخفاء كلمة المرور
togglePassword.addEventListener('click', () => {
  const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
  password.setAttribute('type', type);
});

// 🔹 التحقق عند الإرسال
form.addEventListener('submit', function (e) {
  e.preventDefault();

  const idValue = identifier.value.trim();
  const passValue = password.value.trim();
  const roleValue = role.value;

  if (!idValue) return alert("الرجاء إدخال البريد الإلكتروني أو الرقم الجامعي");
  if (passValue.length < 8) return alert("كلمة المرور يجب أن تكون 8 أحرف أو أكثر");

  alert("تم تسجيل الدخول بنجاح ✅");
  // هنا لاحقًا نربطه بـ login.php
});