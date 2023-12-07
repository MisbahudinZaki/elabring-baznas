// Di dalam file scripts.js Anda

document.addEventListener('DOMContentLoaded', function () {
    var sidebar = document.getElementById('sidebar');
    var content = document.getElementById('content');
    var toggleButton = document.getElementById('toggle-sidebar');
    var hideButton = document.getElementById('hide-sidebar');

    toggleButton.addEventListener('click', function () {
        sidebar.classList.toggle('active');
        content.classList.toggle('active');
        if (sidebar.classList.contains('active')) {
            toggleButton.textContent = 'Hide Sidebar';
        } else {
            toggleButton.textContent = 'Show Sidebar';
        }
    });

    hideButton.addEventListener('click', function () {
        sidebar.classList.remove('active');
        content.classList.remove('active');
        toggleButton.textContent = 'Show Sidebar';
    });
});
