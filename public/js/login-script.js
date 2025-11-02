document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('container');
    const signUpBtn = document.getElementById('signUp');
    const signInBtn = document.getElementById('signIn');

    if (signUpBtn && signInBtn && container) {
        signUpBtn.addEventListener('click', () => {
            container.classList.add('active');
        });

        signInBtn.addEventListener('click', () => {
            container.classList.remove('active');
        });
    }
});