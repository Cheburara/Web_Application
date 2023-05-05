const editButton = document.getElementById("edit");
const phoneField = document.getElementById("phone");
const passwordField = document.getElementById("password");
const confirmPasswordField = document.getElementById("confirm_password");

editButton.addEventListener("click", function() {
  phoneField.style.display = "block";
  passwordField.style.display = "block";
  confirmPasswordField.style.display = "block";
});
