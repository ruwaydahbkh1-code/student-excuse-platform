document.getElementById('loginBtn').addEventListener('click', function() {
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;

    if (!email.includes('@')) {
        alert('اكتب إيميل صحيح');
        return;
    }

    if (password.length < 8) {
        alert('كلمة السر لازم تكون 8 أحرف أو أكثر');
        return;
    }

    alert('تمام! بياناتك صحيحة، نقدر نرسلها للسيرفر');
});