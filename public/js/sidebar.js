// public/js/sidebar.js
document.addEventListener('DOMContentLoaded', (event) => {
    const sidebar = document.getElementById('sidebar');
    const menu = document.getElementById('menu');
    const closeBtn = document.getElementById('close-btn');

    menu.addEventListener('click', () => {
        sidebar.classList.add('open');
    });

    closeBtn.addEventListener('click', () => {
        sidebar.classList.remove('open');
    });
});
