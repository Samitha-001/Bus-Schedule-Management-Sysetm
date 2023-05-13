document.addEventListener("DOMContentLoaded", function () {
});


const busNoInput = document.getElementById('bus_no');

busNoInput.addEventListener('input', function() {
  busNoInput.setCustomValidity(''); // Clear any previous error message
  busNoInput.checkValidity(); // Trigger the browser's validation

  if (!busNoInput.validity.valid) {
    busNoInput.setCustomValidity('Please enter a valid bus number (e.g., NC1234).');
  }
});