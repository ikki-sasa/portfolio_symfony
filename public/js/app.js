const navbar = document.querySelector('#nav');
const navBtn = document.querySelector('#nav-btn');
const closeBtn = document.querySelector('#close-btn');
const sidebar = document.querySelector('#sidebar');
const date = document.querySelector('#date');
// add fixed class to navbar
window.addEventListener('scroll', function () {
  if (window.pageYOffset > 80) {
    navbar.classList.add('navbar-fixed');
  } else {
    navbar.classList.remove('navbar-fixed');
  }
});
// show sidebar
navBtn.addEventListener('click', function () {
  sidebar.classList.add('show-sidebar');
});
closeBtn.addEventListener('click', function () {
  sidebar.classList.remove('show-sidebar');
});
// set year
date.innerHTML = new Date().getFullYear();

// BUTTON Top
const scrollBtn = document.querySelector('.top-btn');

window.addEventListener('scroll', () => {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    scrollBtn.style.display = 'block';
  } else {
    scrollBtn.style.display = 'none';
  }
});
scrollBtn.addEventListener('click', () => {
  window.scroll({
    top: 0,
    behavior: 'smooth',
  });
});

// TOGGLE NAV
const links = document.getElementById('nav-links');

navBtn.addEventListener('click', () => {
  links.classList.toggle('show-links');
});

// smooth scroll
const scrollLinks = document.querySelectorAll('.scroll-link');
scrollLinks.forEach((link) => {
  link.addEventListener('click', (e) => {
    // prevent default
    e.preventDefault();
    links.classList.remove('show-links');

    const id = e.target.getAttribute('href').slice(1);
    const element = document.getElementById(id);
    //
    let position = element.offsetTop - 82;

    window.scrollTo({
      left: 0,
      // top: element.offsetTop,
      top: position,
      behavior: 'smooth',
    });
  });
});
