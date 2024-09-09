const burger= document.querySelector('#burg');
const sideBar= document.querySelector('.side-bar');
const closeNav= document.querySelector('#close-nav');

burger.onclick= ()=> {
  sideBar.classList.toggle('active');
  document.querySelector('body').classList.toggle('active');

};

closeNav.onclick= ()=> {
  sideBar.classList.remove('active');
  document.querySelector('body').classList.remove('active');

};

document.addEventListener('click', function(e){
  if(!document.querySelector('nav').contains(e.target)
     ||document.querySelector('#close').contains(e.target)){
    sideBar.classList.remove('active');
    document.querySelector('body').classList.remove('active');

  }

});
