document.addEventListener("DOMContentLoaded", function() {
    const removeButtons = document.querySelectorAll(".remove-btn");
    const emptyMessage = document.querySelector(".empty-message");
    
    removeButtons.forEach(button => {
        button.addEventListener("click", function() {
            this.parentElement.remove();
            checkEmptyWishlist();
        });
    });

    function checkEmptyWishlist() {
        if (document.querySelectorAll(".wishlist-item").length === 0) {
            emptyMessage.style.display = "block";
        }
    }
});
