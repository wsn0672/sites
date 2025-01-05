const title = document.querySelector('#title');
const one = document.querySelector('#one');
const two = document.querySelector('#two');
const three = document.querySelector('#three');

const keyframes1 = {
    opacity: [0, 1],
    translate: ['0 40px', 0],
};
const keyframes2 = {
    opacity: [0, 1],
    translate: ['0 60px', 0],
};
const keyframes3 = {
    opacity: [0, 1],
    translate: ['0 70px', 0],
};
const keyframes4 = {
    opacity: [0, 1],
    translate: ['0 80px', 0],
};
const options = {
    duration: 1000,
    easing: 'ease-out',
    fill: 'forwards'
};

title.style.opacity = '0';
one.style.opacity = '0';
two.style.opacity = '0';
three.style.opacity = '0';

title.animate(keyframes1, options);
setTimeout(function() {
    one.animate(keyframes2, options);
  }, 100);
setTimeout(function() {
    two.animate(keyframes3, options);
  }, 200);
setTimeout(function() {
    three.animate(keyframes4, options);
  }, 300);

