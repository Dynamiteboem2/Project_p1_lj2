window.onscroll = function() {myFunction()};

function myFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("pbar").style.width = scrolled + "%";
}



let lastScrollTop = 0;
const nav = document.querySelector('.nav');

window.addEventListener('scroll', function () {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
        // Scrollen naar beneden - verberg de nav
        nav.style.top = `-${nav.offsetHeight}px`; // Verbergt de nav met een animatie
    } else {
        // Scrollen naar boven - toon de nav
        nav.style.top = "0";
    }
    lastScrollTop = scrollTop;
});
