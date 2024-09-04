const burger= document.querySelector('#burger-menu');
const navMenu= document.querySelector('.nav-menu');

burger.onclick= ()=> {
  navMenu.classList.toggle('active');
  document.querySelector('body').classList.toggle('active');

};

document.addEventListener('click', function(e){
  if(!document.querySelector('nav').contains(e.target)
     ||document.querySelector('#close').contains(e.target)){
    navMenu.classList.remove('active');
    document.querySelector('body').classList.remove('active');

  }

});
