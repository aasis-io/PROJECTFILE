// const passwordToggleButton = document.getElementById("passwordToggler"),
//   passwordInputField = document.getElementById("passwordField");

// passwordToggleButton.addEventListener("click", function () {
//   if (passwordInputField.type === "password") {
//     passwordInputField.type = "text";
//     passwordToggleButton.classList.add = "Hide";
//   } else {
//     passwordInputField.type = "password";
//     // passwordToggleButton.textContent = "Show";
//   }
// });

function togglePassword() {
  var passwordToggleButton = document.getElementById("passwordToggler"),
    passwordInputField = document.getElementById("passwordField"),
    passwordInputField2 = document.getElementById("passwordField2");

  passwordInputField.type = passwordToggleButton.checked ? "text" : "password";
  passwordInputField2.type = passwordToggleButton.checked ? "text" : "password";
}
