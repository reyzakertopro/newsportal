const featCards= document.querySelectorAll('.featured .card');

// set thumbnail featured
featCards[0].classList.add('appear');

// Tombol next carousel
document.querySelector('.feat-btn#next').onclick= ()=> {
  for(let featCard of featCards) {
    if(featCard.classList.contains('appear')) {
      featCard.classList.remove('appear');
      if(featCard.nextElementSibling.classList.contains('card')) {
        featCard.nextElementSibling.classList.add('appear');
      } else {
        document.querySelector('.featured').firstElementChild.classList.add('appear');
      } break;
    }
  }
};

// Tombol previous carousel
document.querySelector('.feat-btn#prev').onclick= ()=> {
    for(let featCard of featCards) {
      if(featCard.classList.contains('appear')) {
        featCard.classList.remove('appear');
        if(featCard.previousElementSibling) {
          featCard.previousElementSibling.classList.add('appear');

        } else {
          featCards[featCards.length- 1].classList.add('appear');

        } break;

      }

    }

};
