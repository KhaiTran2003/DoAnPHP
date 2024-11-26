<script>
    // Tìm tất cả các card có class .clickable-card
    const clickableCards = document.querySelectorAll('.clickable-card');

    clickableCards.forEach(card => {
        // Lắng nghe sự kiện click
        card.addEventListener('click', function() {
            // Chuyển hướng tới trang ../staff/index.php
            window.location.href = "../supllier/index.php";
        });
    });
</script>
