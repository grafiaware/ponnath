$('.ui.tree.accordion').accordion(); 

const navbar = document.querySelector(".navbar");
const navbarSticky = document.querySelector(".navbar-sticking");
const scrollWatcher = document.createElement("div");

scrollWatcher.setAttribute("data-scroll-watcher", "");
navbar.before(scrollWatcher);

const navObserver = new IntersectionObserver(
  (entries) => {
    navbar.classList.toggle("hide", !entries[0].isIntersecting);
    navbarSticky.classList.toggle("show", !entries[0].isIntersecting);
  },
  { rootMargin: "85px 0px 0px 0px" }
);

navObserver.observe(scrollWatcher);


