window.addEventListener('DOMContentLoaded', () => {
  const openBtn = document.getElementById('open-menu');
  const openBtn2 = document.getElementById('open-menu2');
  const closeBtn = document.getElementById('close-menu');
  const closeBtn2 = document.getElementById('close-menu2');
  const menu = document.getElementById('menu');

  function openMenu() {
    menu.classList.remove("hidden", "hide");

    // skryj obě "open" tlačítka
    openBtn.style.display = 'none';
    openBtn2.style.display = 'none';

    // zobraz obě "close" tlačítka
    closeBtn.style.display = 'block';
    closeBtn2.style.display = 'block';
  }

  function closeMenu() {
    menu.classList.add("hide");

    // skryj obě "close" tlačítka
    closeBtn.style.display = 'none';
    closeBtn2.style.display = 'none';

    // zobraz obě "open" tlačítka
    openBtn.style.display = 'block';
    openBtn2.style.display = 'block';
  }

  openBtn.addEventListener('click', openMenu);
  openBtn2.addEventListener('click', openMenu);
  closeBtn.addEventListener('click', closeMenu);
  closeBtn2.addEventListener('click', closeMenu);
});
