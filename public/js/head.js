window.addEventListener('DOMContentLoaded', () => {
const openBtn = document.getElementById('open-menu');
const openBtn2 = document.getElementById('open-menu2');
const closeBtn = document.getElementById('close-menu');
const closeBtn2 = document.getElementById('close-menu2');
const menu = document.getElementById('menu');

    openBtn.addEventListener('click', () => {
      menu.classList.remove("hidden");
      menu.classList.remove("hide");
      openBtn.style.display = 'none';
      closeBtn.style.display = 'block';
  });
    openBtn2.addEventListener('click', () => {
      menu.classList.remove("hidden");
      menu.classList.remove("hide");
      openBtn2.style.display = 'none';
      closeBtn2.style.display = 'block';
  });

    closeBtn.addEventListener('click', () => {
      menu.classList.add("hide");
      closeBtn.style.display = 'none';
      openBtn.style.display = 'block';
  });
    closeBtn2.addEventListener('click', () => {
      menu.classList.add("hide");
      closeBtn2.style.display = 'none';
      openBtn2.style.display = 'block';
  });

});
