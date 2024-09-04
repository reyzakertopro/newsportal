const editables= document.querySelectorAll('[contenteditable]');
const inputs= document.querySelectorAll('input');
const banner= document.querySelector('#bannerArtikel');
const clearBanner= document.querySelector('#clearBanner');
const submits= document.querySelectorAll('[type=submit]');

inputs.forEach(input=> input.classList.add('hidden'));

submits.forEach(submit=> {
  submit.onclick= ()=> {
    document.querySelector('form').onsubmit= ()=> {
      document.querySelector('form').action= document.querySelector('form').action+ submit.id;

    };

    editables.forEach(editable=> {
      if(editable.id== 'penulis'&& editable.innerHTML== ''||
         editable.id== 'kontakPenulis'&& editable.innerHTML== ''||
         editable.id== 'judulArtikel'&& editable.innerHTML== ''||
         editable.id== 'isiArtikel'&& editable.innerHTML== '') {
        editable.classList.add('required');
        event.preventDefault();

      }

    });

  };

});

if(document.querySelector('[type=checkbox]')) {
  if(document.querySelector('[type=checkbox]').getAttribute('trigger')== 'true')
  document.querySelector('[type=checkbox]').setAttribute('checked', '');

}

clearBanner.onclick= ()=> {
  document.querySelector('.banner').setAttribute('for', 'bannerArtikel');
  clearBanner.classList.add('hidden');
  document.querySelector('.caption').classList.add('hidden');
  document.querySelectorAll('.banner span').forEach(el=> {
    el.classList.remove('hidden');

  });
  document.querySelector('.banner').style.background=
    'linear-gradient(rgba(1, 1, 3, 0.05), rgba(1, 1, 3, 0.5)), url("http://localhost/newsportal/public/uploads/") center center / cover';

};

if(document.querySelector('.banner').style.backgroundImage!=
  'linear-gradient(rgba(1, 1, 3, 0.05), rgba(1, 1, 3, 0.5)), url("http://localhost/newsportal/public/uploads/")') {
    document.querySelector('.banner').removeAttribute('for');
    clearBanner.classList.remove('hidden');
    document.querySelector('.caption').classList.remove('hidden');
    document.querySelectorAll('.banner span').forEach(el=> {
      el.classList.add('hidden');

    });

  }

banner.onchange= ()=> {
  let link= URL.createObjectURL(banner.files[0]);
  document.querySelector('.banner').style.background=
    'linear-gradient(180deg, rgba(1, 1, 3, .05), rgba(1, 1, 3, .5)), url('+ link+ ') center center / cover';
  document.querySelector('.banner').removeAttribute('for');
  clearBanner.classList.toggle('hidden');
  document.querySelector('.caption').classList.toggle('hidden');
  document.querySelectorAll('.banner span').forEach(el=> {
    el.classList.toggle('hidden');

  });

};

editables.forEach(editable=> {
  editable.innerHTML= document.querySelector('[name='+ editable.id+ ']').value;
  editable.onkeyup= ()=> {
    document.querySelector('[type=text][name='+ editable.id+ ']').value= editable.innerHTML;

  };

});
