import setupCarousel from './carousel.js'

setupStoriesCarousel()
setupLoadMore()

function setupStoriesCarousel() {
  const carousel = document.querySelector('[data-carousel="stories"]')
  if (!carousel) return

  const carouselArrows = document.querySelector('[data-carousel-arrows="stories"]')
  const carouselSlides = carousel.querySelectorAll('[data-carousel-slide]')
  const isCarouselActive = (carouselSlides.length > 4 && window.innerWidth >= 1280)
    || (carouselSlides.length > 3 && window.innerWidth < 1280)
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

function setupLoadMore() {
  const section = document.querySelector('[data-stories]')
  if (!section) {
    return
  }

  const controlsContainer = section.querySelector('[data-stories-controls]')
  const grid = section.querySelector('[data-stories-container]')
  if (!controlsContainer) {
    return
  }

  const button = controlsContainer.querySelector('[data-button="stories-more"]')
  let currentPage = 1
  console.log('a')

  button.addEventListener('click', () => {
    button.classList.add('button_loading')

    currentPage++

    /* create request body */
    const formData = new FormData()
    formData.append('action', 'stories_load_more')
    formData.append('paged', currentPage)

    fetch('/wp-admin/admin-ajax.php', {
      method: 'POST',
      body: new URLSearchParams(formData)
    })
      .then(response => response.json())
      .then(response => {
        grid.insertAdjacentHTML('beforeend', response.html || '')

        /* if no more pages available */
        if (currentPage >= response.total_pages) {
          controlsContainer.style.display = 'none'
        }
      })
      .finally(() => {
        button.classList.remove('button_loading')
      })
  })
}
