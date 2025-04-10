window.addEventListener('DOMContentLoaded', () => {
const openBtn = document.getElementById('open-menu');
const closeBtn = document.getElementById('close-menu');
const menu = document.getElementById('menu');

    openBtn.addEventListener('click', () => {
      menu.style.display = 'block';
      openBtn.style.display = 'none';
      closeBtn.style.display = 'block';
  });

    closeBtn.addEventListener('click', () => {
      menu.style.display = 'none';
      closeBtn.style.display = 'none';
      openBtn.style.display = 'block';
  });

})
