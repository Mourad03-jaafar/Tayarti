/*=============== POPUP ===============*/
document.addEventListener("DOMContentLoaded", function () {
   var modal = document.getElementById("signupModal");
   var signupBtn = document.getElementById("signupBtn");
   var closeBtn = document.getElementsByClassName("close")[0];

   signupBtn.onclick = function () {
      modal.style.display = "block";
   };

   closeBtn.onclick = function () {
      modal.style.display = "none";
   };

   modal.onclick = function (event) {
      if (event.target === modal) {
         modal.style.display = "none";
      }
   };
});

document.addEventListener("DOMContentLoaded", function () {
   // Get the signup and login modals
   var signupModal = document.getElementById("signupModal");
   var loginModal = document.getElementById("loginModal");

   // Get the link that opens the login modal
   var signupToLogin = document.getElementById("signup-to-login");

   // Get the close buttons for both modals
   var closeSignup = document.querySelector("#signupModal .close");
   var closeLogin = document.querySelector("#loginModal .close");

   // When the user clicks the "Login instead" link, open the login modal and close the signup modal
   signupToLogin.onclick = function () {
      signupModal.style.display = "none";
      loginModal.style.display = "block";
   };

   // When the user clicks the close button (x) for the signup modal, close it
   closeSignup.onclick = function () {
      signupModal.style.display = "none";
   };

   // When the user clicks the close button (x) for the login modal, close it
   closeLogin.onclick = function () {
      loginModal.style.display = "none";
   };
});
// Get the link that opens the signup modal
var loginToSignup = document.getElementById("login-to-signup");

// When the user clicks the "Sign up instead" link, open the signup modal and close the login modal
loginToSignup.onclick = function () {
   loginModal.style.display = "none";
   signupModal.style.display = "block";
};
// Get the reset password modal
var resetModal = document.getElementById("resetModal");

// Get the links that open the reset password modal and navigate between modals
var loginToReset = document.getElementById("login-to-reset");
var resetToLogin = document.getElementById("reset-to-login");
var resetToSignup = document.getElementById("reset-to-signup");

// Get the close button for the reset password modal
var closeReset = document.querySelector("#resetModal .close");

// When the user clicks the "Reset it here" link, open the reset password modal and close the login modal
loginToReset.onclick = function () {
   loginModal.style.display = "none";
   resetModal.style.display = "block";
};

// When the user clicks the "Log in instead" link, open the login modal and close the reset password modal
resetToLogin.onclick = function () {
   resetModal.style.display = "none";
   loginModal.style.display = "block";
};

// When the user clicks the "Sign up instead" link, open the signup modal and close the reset password modal
resetToSignup.onclick = function () {
   resetModal.style.display = "none";
   signupModal.style.display = "block";
};

// When the user clicks the close button (x) for the reset password modal, close it
closeReset.onclick = function () {
   resetModal.style.display = "none";
};

/*=============== SEARCH ===============*/
// Get the modal
var modal = document.getElementById("searchModal");

// Get the button that opens the modal
var btn = document.getElementById("search");

// When the user clicks the button, open the modal
btn.onclick = function () {
   modal.style.display = "flex";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
   if (event.target == modal) {
      modal.style.display = "none";
   }
};
