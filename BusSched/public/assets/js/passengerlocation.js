document.addEventListener("DOMContentLoaded", function () {
    // Disable click events on passed halts
    const passedHalts = document.querySelectorAll('.passed');
    for (let i = 0; i < passedHalts.length; i++) {
    passedHalts[i].style.pointerEvents = 'none';
    }
});