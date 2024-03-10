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

// this script removes URL parameters when page loads.
window.onload = function() {
    // get the current URL
    var url = window.location.href;

    // check if the URL contains any parameters
    if (url.indexOf('?') !== -1) {
        // remove the parameters by getting the URL up to the '?'
        var cleanUrl = url.substring(0, url.indexOf('?'));
        
        // replace the current URL with the clean URL (without parameters)
        window.history.replaceState({}, document.title, cleanUrl);
    }
};
