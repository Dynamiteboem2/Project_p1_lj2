window.onscroll = function() {myFunction()};

function myFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("pbar").style.width = scrolled + "%";
}



// let lastScrollTop = 0;
// const nav = document.querySelector('.nav');

// window.addEventListener('scroll', function () {
//     let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

//     if (scrollTop > lastScrollTop) {
       
//         nav.style.top = `-${nav.offsetHeight}px`; 
//     } else {
        
//         nav.style.top = "0";
//     }
//     lastScrollTop = scrollTop;
// });
