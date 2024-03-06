function toggleDropdown() {
    var menu = document.getElementById('dropdown-menu');
    if (menu.style.display === 'none') {
        menu.style.display = 'block';
        document.addEventListener('click', closeDropdown);
    } else {
        menu.style.display = 'none';
        document.removeEventListener('click', closeDropdown);
    }
}
function closeDropdown(event) {
    if (!document.getElementById('dropdown-container').contains(event.target)) {
        var menu = document.getElementById('dropdown-menu');
        menu.style.display = 'none';
        document.removeEventListener('click', closeDropdown);
    }
}
function logout() {
    document.querySelector('#logout-form').submit();
}

function showFullScreenImage(imageUrl) {
    var fullScreenImage = document.getElementById('fullScreenImage');
    var fullScreenImg = document.getElementById('fullScreenImg');
    fullScreenImg.src = imageUrl;
    fullScreenImage.style.display = 'flex';
    fullScreenImage.addEventListener('click', function() {
        fullScreenImage.style.display = 'none';
    });
}