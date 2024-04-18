const terms = document.getElementById('terms');
const submit = document.getElementById('submit');

terms.addEventListener('change', (e) => {
    submit.disabled = !e.currentTarget.checked;
});


function redirectToLoginPage() {
    window.location.href = "../login.php"; // Замените "auth.php" на путь к вашей странице авторизации
}

