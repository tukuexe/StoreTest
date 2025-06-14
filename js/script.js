// Mobile menu toggle functionality (can be added later)
document.addEventListener('DOMContentLoaded', function() {
    // Add any interactive functionality here
    console.log('Website loaded');
    
    // Example: Add smooth scrolling to all links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});