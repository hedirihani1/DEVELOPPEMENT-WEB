document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("contact-form");
    const confirmationMessage = document.getElementById("confirmation-message");

    form.addEventListener("submit", function(event) {
        event.preventDefault();
        confirmationMessage.classList.remove("hidden");
        form.reset();
    });
});

