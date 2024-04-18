$( document ).ready(function() {
  scrollHome();
  const words = ['Calcio a 5', 'Tennis', 'Calcio a 8', 'Pallavolo', 'Padel', 'Baseball', 'Beach Volley']; 

  let currentWordIndex = 0;
  let currentWord = words[currentWordIndex];
  let index = 0;
  const word = document.getElementById('word');
  function showLetters() {
    if (index < currentWord.length) {
      word.innerHTML += currentWord.charAt(index);
      index++;
      setTimeout(showLetters, 120); 
    } else {
      setTimeout(() => {
        word.innerHTML = '';
        index = 0;
        currentWordIndex = (currentWordIndex + 1) % words.length;
        currentWord = words[currentWordIndex];
        showLetters();
      }, 500); 
    }
  }  
  showLetters();
});


function wrong_pswd()
{
    swal({
        title: "Login Fallito",
        text: "Password sbagliata",
        icon: "warning",
        button: "Ok",
      }).then((value) => {document.location.href = "./index.php"; });
}
function wrong_email()
{
    swal({
        title: "Login Fallito",
        text: "Email Sbagliata",
        icon: "warning",
        button: "Ok",
      }).then((value) => {document.location.href = "./index.php"; });

}
function success_login(){
  swal({
      title: "Login Eseguito",
      text: "Login eseguito con successo!",
      icon: "success",
      button: "Ok",
    }).then((value) => {
      document.location.href = "./welcome.php"; });
  }

function scrollHome() {
  const navbar = document.querySelector('.navbar');
    const homeLink = document.querySelector('a[href="#home"]');
    const chiSiamoLink = document.querySelector('a[href="#chi-siamo"]');

    window.addEventListener('scroll', () => {
      const scrollPosition = window.scrollY;
      const chiSiamoSection = document.getElementById('chi-siamo');
      const sectionOffset = chiSiamoSection.offsetTop - navbar.offsetHeight;

      if (scrollPosition >= sectionOffset) {
        chiSiamoLink.parentElement.classList.add('active');
        homeLink.parentElement.classList.remove('active');
      } else {
        homeLink.parentElement.classList.add('active');
        chiSiamoLink.parentElement.classList.remove('active');
      }
    });

    homeLink.addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });

    chiSiamoLink.addEventListener('click', (e) => {
      e.preventDefault();

      const chiSiamoSection = document.getElementById('chi-siamo');
      const sectionOffset = chiSiamoSection.offsetTop - navbar.offsetHeight;

      window.scrollTo({
        top: sectionOffset,
        behavior: 'smooth'
      });

    });
}