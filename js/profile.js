document.addEventListener("DOMContentLoaded", function () {
    const editBtn = document.getElementById('editBtn');
    const saveBtn = document.getElementById('saveBtn');
    const logoutBtn = document.getElementById('logoutBtn');
    const inputs = document.querySelectorAll('input[type="text"]');

    editBtn.addEventListener('click', function () {
        saveBtn.style.display = 'block';
        editBtn.style.display = 'none';
        logoutBtn.style.display = 'none';

        inputs.forEach(function(input) {
            input.disabled = false;
        });
    });

    saveBtn.addEventListener('click', function () {
        saveBtn.style.display = 'none';
        editBtn.style.display = 'block';
        logoutBtn.style.display = 'block';

        inputs.forEach(function(input) {
            input.disabled = true;
        });
    });
});