// Select all "Bid Now" buttons
document.querySelectorAll('.submit').forEach(button => {
    button.addEventListener('click', function() {
        // Get product details from data attributes
        const productId = this.getAttribute('data-product-id');
        const prodName = this.getAttribute('data-prod-name');
        const minBid = this.getAttribute('data-min-bid');
        const curBid = this.getAttribute('data-cur-bid');
        const endDate = this.getAttribute('data-end-date');

        // Populate modal fields with product data
        document.querySelector('.product-name').textContent = `${prodName}`;
        document.querySelector('#productId').value = productId;
        document.querySelector('#minBidValue').textContent = `$${minBid}`;
        document.querySelector('#curBidValue').textContent = `$${curBid}`;

        // Start countdown
        startCountdown(endDate);

        // Show the modal
        const modal = document.getElementById('bidModal');
        modal.style.display = 'block';

        // Close modal logic
        const closeModal = document.querySelector('.close');
        closeModal.onclick = () => {
            modal.style.display = 'none';
            clearInterval(countdownInterval); // Stop countdown when modal closes
        };

        window.onclick = (event) => {
            if (event.target === modal) {
                modal.style.display = 'none';
                clearInterval(countdownInterval); // Stop countdown when clicking outside
            }
        };
    });
});

let countdownInterval;

// Start and update the countdown every second
function startCountdown(endDate) {
    clearInterval(countdownInterval); // Clear any existing countdown intervals

    function updateCountdown() {
        const now = new Date().getTime();
        const end = new Date(endDate).getTime();
        const distance = end - now;

        if (distance < 0) {
            document.querySelector('#endTime').textContent = "EXPIRED";
            clearInterval(countdownInterval); // Stop updating if expired
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.querySelector('#endTime').textContent = `${days}d ${hours}h ${minutes}m ${seconds}s`;
    }

    updateCountdown(); // Initial call to set the timer immediately
    countdownInterval = setInterval(updateCountdown, 1000); // Update countdown every second
}
