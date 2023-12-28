/////////////////////////////////////////////////////
// Carrousell para scroll dos projetos(NÃO FINALIZADO)
document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.querySelector('.third-content');
    const prevButton = document.querySelector('.prev-button');
    const nextButton = document.querySelector('.next-button');
  
    let currentIndex = 0;
  
    nextButton.addEventListener('click', function () {
      showSlide(currentIndex + 1);
      console.log("clicou")
    });
  
    prevButton.addEventListener('click', function () {
      showSlide(currentIndex - 1);
      console.log("clicou")
    });
  
    function showSlide(index) {
      const totalSlides = document.querySelectorAll('.professor-item').length;
      console.log(totalSlides)
  
      if (index < 0) {
        index = totalSlides - 1;
      } else if (index >= totalSlides) {
        index = 0;
      }
  
      currentIndex = index;
      if (index == 7) {
        index = 0;
      }
      const translateValue = -index * 50 + '%';
      carousel.style.transform = 'translateX(' + translateValue + ')';
    }
  });