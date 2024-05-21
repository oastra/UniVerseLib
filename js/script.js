// Add custom JavaScript here

function userScroll() {
  const navbar = document.querySelector(".navbar");

  window,
    addEventListener("scroll", () => {
      if (window.scrollY > 50) {
        navbar.classList.add("bg-dark");
        navbar.classList.add("navbar-sticky");
      } else {
        navbar.classList.remove("bg-dark");
        navbar.classList.remove("navbar-sticky");
      }
    });
}
document.addEventListener("DOMContentLoaded", userScroll);

// close the modal 1

document.getElementById("registerBtn").addEventListener("click", function () {
  var modal = new bootstrap.Modal(document.getElementById("modal1"));
  modal.hide();
  window.location.href = "#header";
});

// Validation Sing UP

document.addEventListener("DOMContentLoaded", function () {
  const signupForm = document.getElementById("signupForm");

  // Real-time password validation
  document
    .getElementById("signupPassword")
    .addEventListener("input", function () {
      const password = this.value;
      const errorMessages = [];

      if (password.length < 8) {
        errorMessages.push("Password must be at least 8 characters long.");
      }
      if (!/[A-Z]/.test(password)) {
        errorMessages.push(
          "Password must contain at least one uppercase letter."
        );
      }
      if (!/[a-z]/.test(password)) {
        errorMessages.push(
          "Password must contain at least one lowercase letter."
        );
      }
      if (!/[0-9]/.test(password)) {
        errorMessages.push("Password must contain at least one number.");
      }
      if (!/[!@#$%^&*(),.?\":{}|<>]/.test(password)) {
        errorMessages.push(
          "Password must contain at least one special character."
        );
      }

      const errorDiv = document.getElementById("passwordError");
      errorDiv.innerHTML = errorMessages.join("<br>");
    });

  // Handle form submission
  signupForm.addEventListener("submit", function (event) {
    event.preventDefault();
    const formData = new FormData(signupForm);

    fetch("signup.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          alert("Registration successful!");
          window.location.href = "dashboard.php";
        } else {
          const errorsDiv = document.getElementById("signupErrors");
          errorsDiv.style.display = "block";
          errorsDiv.innerHTML =
            "<ul>" +
            data.errors.map((error) => "<li>" + error + "</li>").join("") +
            "</ul>";
        }
      })
      .catch((error) => console.error("Error:", error));
  });
});
