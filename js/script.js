const menus = document.querySelector('nav ul');
const menuBtn = document.querySelector('.menu-btn');
const closeBtn = document.querySelector('.close-btn');
const header = document.querySelector('header');

menuBtn.addEventListener('click', () => {
  menus.classList.add('display');
});

closeBtn.addEventListener('click', () => {
    menus.classList.remove('display');
  });

//   navigation bar
window.addEventListener('scroll', () => {
    if(document.documentElement.scrollTop > 20){
        header.classList.add('sticky');
    }else{
        header.classList.remove('sticky');
    }
});

// Static counter
const counters = document.querySelectorAll('.numbers');
counters.forEach((counter) => {
    counter.textContent = '0';

    incrementCouters();

    function incrementCouters(){
        let currentNum = +counter.textContent;
        const numCount = counter.getAttribute('num-count');

        const increment = numCount / 25;

        currentNum = Math.ceil(currentNum + increment);

        if(currentNum < numCount){
            counter.textContent = currentNum;
            setTimeout(incrementCouters, 70);
        }else{
            counter.textContent = numCount;   
        }
    }  
});

window.onload = function() {
    var url = window.location.href;
    if (url.indexOf('?') !== -1) {
        var cleanUrl = url.substring(0, url.indexOf('?'));
        window.history.replaceState({}, document.title, cleanUrl);
    }
};
// scroll top button
 
let toTop = document.getElementById('toTop');
let isVisible = false;

window.addEventListener('scroll', () => {
    if (this.scrollY > 500 && !isVisible) {
        toTop.classList.add('show');
        isVisible = true;
        toTop.addEventListener('click', scrollToTop);
    } else if (this.scrollY <= 500 && isVisible) {
        toTop.classList.remove('show');
        isVisible = false;
        toTop.removeEventListener('click', scrollToTop);
    }
});

function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}
