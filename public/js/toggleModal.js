const profile_modal = document.getElementById('profile-modal');
const profile_nav = document.querySelector('.nav-profile');
const profile_modal_close = document.querySelector('.profile-modal-close');

profile_nav.addEventListener('click', function(){
    profile_modal.style.right="0";
})

profile_modal_close.addEventListener('click', function(){
    profile_modal.style.right="-350px";
})