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
  firstFields.forEach(field => {
    field.style.display = 'none';
  });
  hiddenFields.forEach(field => {
    field.style.display = 'grid';
  });
  nextBtn.style.display = 'none';
  backBtn.style.display = 'block';
  signupBtn.style.display = 'block';
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
