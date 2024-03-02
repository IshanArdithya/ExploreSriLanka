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