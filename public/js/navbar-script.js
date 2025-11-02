document.addEventListener('DOMContentLoaded', () => {
  const links = document.querySelectorAll('.nav-link');
  const loginButton = document.querySelector('.btn.btn-accent');

  links.forEach(link => {
    link.addEventListener('click', () => {
      if (link.classList.contains('active')) {
        links.forEach(l => l.classList.remove('active'));
      } else {
        links.forEach(l => l.classList.remove('active'));
        link.classList.add('active');
      }
    });
  });

  if (loginButton) {
    loginButton.addEventListener('click', () => {
      links.forEach(l => l.classList.remove('active'));
    });
  }
});
