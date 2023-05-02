// Get the form and all its steps
const form1 = document.getElementById("garbage-form");
const formSteps = Array.from(form1.querySelectorAll(".form-step"));



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
const nextButtons = Array.from(form1.querySelectorAll(".next-btn"));
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
const prevButtons = Array.from(form1.querySelectorAll(".prev-btn"));
prevButtons.forEach((button) => {
    button.addEventListener("click", function () {
        showStep(currentStep - 1);
    });
});

// Show the first step to start
showStep(0);



// Get the second form and all its steps
const form2 = document.getElementById("form2");
const form2Steps = Array.from(form2.querySelectorAll(".form-step"));

// Add event listener to the second form to prevent default submission


// Keep track of the current step for both forms
let currentStep2 = 0;

// Show the current step and hide the rest for form 2
function showStep2(stepIndex) {
    form2Steps.forEach((step, index) => {
        if (index === stepIndex) {
            step.style.display = "block";
        } else {
            step.style.display = "none";
        }
    });
    currentStep2 = stepIndex;
}


// Set up "Next" buttons to move to the next step for form 2
const nextButtons2 = Array.from(form2.querySelectorAll(".next-btn"));
nextButtons2.forEach((button) => {
    button.addEventListener("click", function () {
        // Validate input before moving to the next step
        const currentInputs = form2Steps[currentStep2].querySelectorAll("input, select");
        let isValid = true;
        currentInputs.forEach((input) => {
            if (!input.checkValidity()) {
                isValid = false;
                input.reportValidity();
            }
        });
        if (isValid) {
            showStep2(currentStep2 + 1);
        }
    });
});

const prevButtons2 = Array.from(form2.querySelectorAll(".prev-btn"));
prevButtons2.forEach((button) => {
    button.addEventListener("click", function () {
        showStep2(currentStep2 - 1);
    });
});

showStep2(0); // show the first step of the second form

// aga

const checkboxes = document.querySelectorAll('input[type="checkbox"]');
let checkedCount = 0;

checkboxes.forEach((checkbox) => {
    checkbox.addEventListener('change', () => {
        if (checkbox.checked) {
            checkedCount++;
            if (checkedCount > 2) {
                checkbox.checked = false;
                checkedCount--;
            }
        } else {
            checkedCount--;
        }
    });
});




// Add event listener to each button
function toggleActive(button) {
    var buttons = document.getElementsByClassName("tablinks");
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].classList.remove("active");
    }
    button.classList.add("active");
}



// Add an event listener to the time and service elements to calculate the price automatically
document.addEventListener("DOMContentLoaded", function() {
    var timeElements = document.querySelectorAll('input[name="timehour"]');
    for (var i = 0; i < timeElements.length; i++) {
        timeElements[i].addEventListener("change", calculatePrice);
    }

    var serviceElements = document.querySelectorAll('input[name="service"]');
    for (var i = 0; i < serviceElements.length; i++) {
        serviceElements[i].addEventListener("change", calculatePrice);
    }
});

    function toggle_visibility(id) {
    var e = document.getElementById(id);
    if(e.style.display == 'block')
    e.style.display = 'none';
    else
    e.style.display = 'block';

    var otherFormId = id === 'garbage-form' ? 'form2' : 'garbage-form';
    var otherForm = document.getElementById(otherFormId);
    otherForm.style.display = 'none';
}