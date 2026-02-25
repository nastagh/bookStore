const account_container = document.querySelector(".account_container");
const account_icon = document.getElementById("accountIcon");
const account_name = document.getElementById("accountName");
const header = document.querySelector("header");
const BASE_URL = (header && header.getAttribute("data-base-url")) || "";

function getUserFromToken() {
    const token = localStorage.getItem("token");
    if (!token) return null;
    try {
        const payload = token.split(".")[1];
        if (!payload) return null;
        const json = atob(payload.replace(/-/g, "+").replace(/_/g, "/"));
        const data = JSON.parse(json);
        return data.user || null;
    } catch (_) {
        return null;
    }
}

function setAccountDisplay() {
    const user = getUserFromToken();
    const idRole = user ? user.id_role : null;
    const isAdmin = idRole === 1;

    if (!account_icon) return;

    if (!user) {
        account_icon.src = BASE_URL + "public/assets/images/account.svg";
        account_icon.alt = "account";
        account_icon.title = "Account";
        if (account_name) account_name.textContent = "";
    } else if (isAdmin) {
        account_icon.src = BASE_URL + "public/assets/images/account-admin.svg";
        account_icon.alt = "admin";
        account_icon.title = "Admin";
        if (account_name) account_name.textContent = "admin";
    } else {
        account_icon.src = BASE_URL + "public/assets/images/account-login.svg";
        account_icon.alt = "user";
        account_icon.title = user.name || "User";
        if (account_name) account_name.textContent = user.name || user.email || "";
    }
}

setAccountDisplay();

if (account_container) {
    account_container.addEventListener("click", () => {
        if (getUserFromToken()) {
            const confirm = window.confirm("Are you would like to logout?");
            if (confirm) {
                alert("Logout successful");
                localStorage.removeItem("token");
                setAccountDisplay();
                window.location.href = BASE_URL + "index.php";
            }
        } else {
            window.location.href = BASE_URL + "app/views/layout/login.php";
        }
    });
}

