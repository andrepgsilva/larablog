let avatar = document.getElementById('profile-avatar');
let fileInput = document.getElementsByName('avatar')[0];

fileInput.addEventListener('change', () => {
    avatar.src = window.URL.createObjectURL(fileInput.files[0]);
    avatar.onload = function() {
        window.URL.revokeObjectURL(avatar.src);
    }
});