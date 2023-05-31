const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');


registerLink.addEventListener('click', () => {
    wrapper.classList.add('active');
});

loginLink.addEventListener('click', () => {
    wrapper.classList.remove('active');
});

// document.querySelector('#register').addEventListener("submit", function(event) {
//     event.preventDefault();
  
//     var checkbox = document.querySelector('#remember');
//     if (checkbox.checked) {
//       event.target.submit();
//     } else {
//       alert("Please agree to the terms & conditions before submitting the form.");
//     }
// });

document.addEventListener('DOMContentLoaded', function() {
    const agreeCheckbox = document.getElementById('agree-checkbox');
    const registerButton = document.getElementById('register-button');

    agreeCheckbox.addEventListener('change', function() {
        registerButton.disabled = !agreeCheckbox.checked;
    });
});
  