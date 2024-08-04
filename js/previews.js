document.addEventListener('DOMContentLoaded', function() {
    const prevArrow = document.querySelector('.left-arrow');
    const nextArrow = document.querySelector('.right-arrow');

    if (prevArrow) {
        prevArrow.addEventListener('click', function(e) {
            e.preventDefault();
            const prevPageUrl = prevArrow.getAttribute('href');
            if (prevPageUrl !== '#') {
                window.location.href = prevPageUrl;
            }
        });
    }

    if (nextArrow) {
        nextArrow.addEventListener('click', function(e) {
            e.preventDefault();
            const nextPageUrl = nextArrow.getAttribute('href');
            if (nextPageUrl !== '#') {
                window.location.href = nextPageUrl;
            }
        });
    }
});
