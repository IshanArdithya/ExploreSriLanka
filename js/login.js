const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

const nextBtn = document.querySelector('.next-btn');
const backBtn = document.querySelector('.back-btn-form');
const signupBtn = document.querySelector('.signup-btn');
const firstFields = document.querySelectorAll('.sign-up-form .input-field:nth-of-type(-n+3)');
const hiddenFields = document.querySelectorAll('.sign-up-form .input-field:nth-of-type(n+4)');
const buttonContainer = document.querySelector('.button-container');

nextBtn.addEventListener('click', () => {

  const email = document.getElementById('remail').value.trim();
  const password = document.getElementById('rpassword').value;
  const reenterPassword = document.getElementById('reenter_password').value;

  if (email === '') {
      document.getElementById('emailError').textContent = 'Please enter your email!';
      return;
  } else {
      document.getElementById('emailError').textContent = '';
  }

  if (password.trim() === '') {
      document.getElementById('passwordError').textContent = 'Please enter your password!';
      return;
  } else {
      document.getElementById('passwordError').textContent = '';
  }

  if (password !== reenterPassword) {
      document.getElementById('passwordError').textContent = 'Passwords do not match!';
      return;
  } else {
      document.getElementById('passwordError').textContent = '';
  }

  // check if email exists when next button clicked (registration)
  $.ajax({
      type: 'POST',
      url: 'http://localhost/ExploreSriLanka/login.php',
      data: {
          check_email: true, // Add a parameter to specify this is a check for email
          email: email
      },
      dataType: 'json',
      success: function(response) {
          if (response.exists) {
              document.getElementById('emailError').textContent = 'Email already exists!';
          } else {
              firstFields.forEach(field => {
                  field.style.display = 'none';
              });
              hiddenFields.forEach(field => {
                  field.style.display = 'grid';
              });
              nextBtn.style.display = 'none';
              backBtn.style.display = 'block';
              signupBtn.style.display = 'block';
          }
      },
      error: function(xhr, status, error) {
          console.error(xhr.responseText);
      }
  });
});

backBtn.addEventListener('click', () => {
  firstFields.forEach(field => {
    field.style.display = 'grid';
  });
  hiddenFields.forEach(field => {
    field.style.display = 'none';
  });
  nextBtn.style.display = 'block';
  backBtn.style.display = 'none';
  signupBtn.style.display = 'none';
});

// this script removes URL parameters when page loads.
window.onload = function() {
    // get the current URL
    var url = window.location.href;

    // check if the URL contains any parameters
    if (url.indexOf('?') !== -1) {
        // remove the parameters by getting the URL up to the '?'
        var cleanUrl = url.substring(0, url.indexOf('?'));
        
        // replace the current URL with the clean URL (without parameters)
        window.history.replaceState({}, document.title, cleanUrl);
    }
};
