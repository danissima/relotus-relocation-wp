import setupCarousel from './carousel.js'

setupDocumentsCarousel()
setupDocumentsPreview()

function setupDocumentsCarousel() {
  const carousel = document.querySelector('[data-carousel="about-documents"]')
  if (!carousel) return

  const carouselArrows = document.querySelector('[data-carousel-arrows="about-documents"]')
  const carouselSlides = carousel.querySelectorAll('[data-carousel-slide]')
  const isCarouselActive = (carouselSlides.length > 3 && window.innerWidth >= 1024)
    || (carouselSlides.length > 2 && window.innerWidth < 1024)
    || (carouselSlides.length > 1 && window.innerWidth < 768)

  if (!isCarouselActive) {
    carouselArrows.style.display = 'none'
    return
  }

  setupCarousel(
    carousel,
    {
      align: 'start',
      breakpoints: {
        '(max-width: 767px)': {
          align: 'center',
        },
      },
    },
    carouselArrows,
  )
}

function setupDocumentsPreview() {
  const gallery = document.getElementById('about-documents-carousel')
  if (!gallery) {
    return
  }

  const lightbox = new PhotoSwipeLightbox({
    gallery: '#about-documents-carousel',
    children: 'a',
    pswpModule: PhotoSwipe
  });

  lightbox.init();
}
