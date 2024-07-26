document.getElementById('login').addEventListener('click', function() {
    window.location.href ='LoginView';
});

document.getElementById('signup').addEventListener('click', function() {
    window.location.href ='SignUpView';
});

document.getElementById('bid_without_login').addEventListener('click', function() {
    window.location.href ='LoginView';
});

const passwordField = document.getElementById("password");
const togglePassword = document.querySelector(".password-toggle-icon i");

togglePassword.addEventListener("click", function () {
if (passwordField.type === "password") {
    passwordField.type = "text";
    togglePassword.classList.remove("fa-eye");
    togglePassword.classList.add("fa-eye-slash");
} else {
    passwordField.type = "password";
    togglePassword.classList.remove("fa-eye-slash");
    togglePassword.classList.add("fa-eye");
}
});