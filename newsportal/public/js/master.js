const editorsPicks= document.querySelectorAll('.edipick-card');

editorsPicks[0].classList.add('active');
document.querySelector('button:has(.fa-chevron-left)').onclick= previous;
document.querySelector('button:has(.fa-chevron-right)').onclick= next;

function next() {
  for(let editorsPick of editorsPicks) {
    if(editorsPick.classList.contains('active')) {
      editorsPick.classList.remove('active');
      if(editorsPick.nextElementSibling.classList.contains('edipick-card')) {
        editorsPick.nextElementSibling.classList.add('active');

      } else {
        editorsPicks[0].classList.add('active');

      } break;

    }

  }

}

function previous() {
  for(let editorsPick of editorsPicks) {
    if(editorsPick.classList.contains('active')) {
      editorsPick.classList.remove('active');
      if(editorsPick.previousElementSibling!= undefined) {
        editorsPick.previousElementSibling.classList.add('active');

      } else {
        editorsPicks[editorsPicks.length- 1].classList.add('active');

      } break;

    }

  }

}

let xB, xA;
editorsPicks.forEach(editorsPick=> {
  editorsPick.ontouchstart= (e)=> {xB= e.touches[0].pageX;};
  editorsPick.ontouchend= (e)=> {
    xA= e.changedTouches[0].pageX;
    if(xA> xB) {previous();}
    else if(xA< xB) {next();}

  };

});

const duration= 10* 60* 1000;
const interval= 10* 1000;
let remainingTime= duration;
function autoSlide(){
  next();
  remainingTime-= interval;
  if(remainingTime> 0){
    setTimeout(autoSlide, interval);

  }
}

autoSlide();
