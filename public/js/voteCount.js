document.addEventListener('DOMContentLoaded', function() {
    const voteCount = document.querySelector('.vote-count');
    const arrowUp = document.querySelector('.fa-chevron-up');
    const arrowDown = document.querySelector('.fa-chevron-down');
    
    const votes = parseInt(voteCount.textContent);

    if (votes < 50) {
        voteCount.classList.add('red-text');
        arrowDown.classList.add('red-icon');
    } else {
        voteCount.classList.add('green-text');
        arrowUp.classList.add('green-icon');
    }
});