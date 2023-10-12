$('#bestseller_carousel').owlCarousel({
    loop: true,
    margin: 10,
    //   center: true,
    nav: true,
    responsive: {
      0: {
        items: 1,
      },
      400: {
        items: 1,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 3,
      },
      1200: {
        items: 4,
      },
    },
  });
  
  
  $('#upcoming_books_carousel').owlCarousel({
  loop: true,
  margin: 10,
  autoplay: true,
  autoplayTimeout: 2000,
//   nav: true,
  responsive: {
    0: {
      items: 1,
    },
    400: {
      items: 1,
    },
    600: {
      items: 2,
    },
    1000: {
      items: 3,
    },
    1200: {
      items: 4,
    },
  },
});
  
  // preview on hover images
    
  let bigImg = document.querySelector(".previewon_hover");

let smImg = document.querySelectorAll(".preview_img");
console.log({ smImg });
smImg.forEach((el) => {
    el.addEventListener("click", () => {
        bigImg.src = el.currentSrc;
    });
    console.log({ el: el.currentSrc });
});
  
  // image hover overlay
  
  let img = document.querySelector('.author_details');
  let img1 = document.querySelector('.onhover_active');
  img.addEventListener('mouseover', (evnt) => {
    img1.style.opacity = '1';
  });
  img.addEventListener('mouseout', (evnt) => {
    img1.style.opacity = '0';
  });
  

