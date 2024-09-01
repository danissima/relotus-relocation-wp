import setupCarousel from './carousel.js'

setupJournalTags()
setupLoadMore()

function setupJournalTags() {
  const carousel = document.querySelector('[data-carousel="journal-tags"]')
  if (!carousel) return

  setupCarousel(
    carousel,
    {
      align: 'start',
      dragFree: true,
    },
  )
}

function setupLoadMore() {
  const section = document.querySelector('[data-journal]')
  if (!section) {
    return
  }

  const controlsContainer = section.querySelector('[data-journal-controls]')
  const grid = section.querySelector('[data-journal-container]')
  if (!controlsContainer) {
    return
  }

  const button = controlsContainer.querySelector('[data-button="journal-more"]')
  let currentPage = 1

  button.addEventListener('click', () => {
    button.classList.add('button_loading')

    const urlParams = new URLSearchParams(window.location.search);
    const topicId = urlParams.get('topic_id');

    currentPage++

    /* create request body */
    const formData = new FormData()
    formData.append('action', 'journal_load_more')
    formData.append('paged', currentPage)
    if (topicId) {
      formData.append('topic_id', topicId)
    }

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
