const loginText = document.querySelector(".title-text .login");
const loginForm = document.querySelector("form.login");
const loginBtn = document.querySelector("label.login");
const signupBtn = document.querySelector("label.signup");
const signupLink = document.querySelector("form .signup-link a");
signupBtn.onclick = (() => {
    loginForm.style.marginLeft = "-50%";
    loginText.style.marginLeft = "-50%";
});
loginBtn.onclick = (() => {
    loginForm.style.marginLeft = "0%";
    loginText.style.marginLeft = "0%";
});
signupLink.onclick = (() => {
    signupBtn.click();
    return false;
});

const signupForm = document.getElementById("signupForm");
signupForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;
    if (password !== confirmPassword) {
        alert("Passwords do not match");
        return;
    }

    try {
        const res = await fetch("http://localhost/Certificado/bookStore/REST/public/index.php/users", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ name, email, password })
        });
        const data = await res.json();
        if (res.ok) {
            alert("Account created successfully. You can log in now.");
            signupForm.reset();
            loginBtn.click();
        } else {
            alert(data.message || "Registration failed");
        }
    } catch (err) {
        alert("Network error. Please try again.");
    }
});

// login form
loginForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const email = document.getElementById("email_login").value.trim();
    const password = document.getElementById("password_login").value;
    try {
        const res = await fetch("http://localhost/Certificado/bookStore/REST/public/index.php/login", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ email, password })
        });
        const data = await res.json();
        if (res.ok && data.token) {
            localStorage.setItem("token", data.token);
            alert("Login successful");
            loginForm.reset();
            loginBtn.click();
            window.location.href = "http://localhost/Certificado/bookStore/index.php";
        } else {
            alert(data.message || "Login failed");
        }
    } catch (err) {
        alert("Network error. Please try again.");
    }
});