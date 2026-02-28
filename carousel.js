/* Active nav saat scroll */
window.addEventListener('scroll', () => {
  const sections = document.querySelectorAll('section[id], div[id]');
  let current = '';
  sections.forEach(s => {
    if (window.scrollY >= s.offsetTop - 100) current = s.id;
  });
  document.querySelectorAll('.navbar-nirwana .nav-link').forEach(a => {
    a.classList.remove('active');
    if (a.getAttribute('href') === '#' + current) a.classList.add('active');
  });
});

/* Carousel */
(() => {
  const track    = document.getElementById('carouselTrack');
  const btnPrev  = document.getElementById('btnPrev');
  const btnNext  = document.getElementById('btnNext');
  const dotsWrap = document.getElementById('carouselDots');
  const cards    = Array.from(track.querySelectorAll('.layanan-card'));
  let current = 0;

  function visibleCount() {
    return Math.max(1, Math.floor(track.parentElement.clientWidth / (cards[0].offsetWidth + 18)));
  }
  function maxIndex() { return Math.max(0, cards.length - visibleCount()); }

  function buildDots() {
    dotsWrap.innerHTML = '';
    for (let i = 0; i <= maxIndex(); i++) {
      const d = document.createElement('span');
      d.className = 'dot' + (i === current ? ' active' : '');
      d.addEventListener('click', () => goTo(i));
      dotsWrap.appendChild(d);
    }
  }
  function updateDots() {
    dotsWrap.querySelectorAll('.dot').forEach((d, i) => d.classList.toggle('active', i === current));
  }
  function goTo(idx) {
    current = Math.max(0, Math.min(idx, maxIndex()));
    track.style.transform = `translateX(-${current * (cards[0].offsetWidth + 18)}px)`;
    updateDots();
  }

  btnPrev.addEventListener('click', () => goTo(current - 1));
  btnNext.addEventListener('click', () => goTo(current + 1));
  buildDots();

  let rt;
  window.addEventListener('resize', () => {
    clearTimeout(rt);
    rt = setTimeout(() => { current = Math.min(current, maxIndex()); buildDots(); goTo(current); }, 150);
  });
})();

/*Kanan atas wok*/
const profileBox = document.querySelector('.profile-box');
const avatarCircle = document.querySelector('.avatar-circle');

avatarCircle.addEventListener('click', () => profileBox.classList.toggle('show'));
