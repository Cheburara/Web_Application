// Get the form and all its steps
const form = document.getElementById("garbage-form");
const formSteps = Array.from(form.querySelectorAll(".form-step"));

// Add event listener to the form to prevent default submission
form.addEventListener("submit", function (event) {
    event.preventDefault();
});

// Keep track of the current step
let currentStep = 0;

// Show the current step and hide the rest
function showStep(stepIndex) {
    formSteps.forEach((step, index) => {
        if (index === stepIndex) {
            step.style.display = "block";
        } else {
            step.style.display = "none";
        }
    });
    currentStep = stepIndex;
}

// Set up "Next" buttons to move to the next step
const nextButtons = Array.from(form.querySelectorAll(".next-btn"));
nextButtons.forEach((button) => {
    button.addEventListener("click", function () {
        // Validate input before moving to the next step
        const currentInputs = formSteps[currentStep].querySelectorAll(
            "input, select"
        );
        let isValid = true;
        currentInputs.forEach((input) => {
            if (!input.checkValidity()) {
                isValid = false;
                input.reportValidity();
            }
        });
        if (isValid) {
            showStep(currentStep + 1);
        }
    });
});

// Set up "Previous" buttons to move to the previous step
const prevButtons = Array.from(form.querySelectorAll(".prev-btn"));
prevButtons.forEach((button) => {
    button.addEventListener("click", function () {
        showStep(currentStep - 1);
    });
});

// Show the first step to start
showStep(0);


var input = document.getElementById('address-input');
var options = {
    componentRestrictions: { country: 'ee' }
};
var autocomplete = new google.maps.places.Autocomplete(input, options);