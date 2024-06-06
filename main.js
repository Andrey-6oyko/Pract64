function validateForm() {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;
    if (password !== confirmPassword) {
        alert('Паролі не співпадають. Спробуйте ще раз.');
        return false;
    }
    return true;
}