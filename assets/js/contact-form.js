setupContactForm()

function setupContactForm() {
	const form = document.querySelector('[data-form="contact"]')
	if (!form) {
		return
	}

	const submitButton = form.querySelector('[data-button="contact-submit"]')
	const successNode = form.querySelector('[data-form-success]')
	const errorNode = form.querySelector('[data-form-error]')
	let successShowTimeout = null
	let errorShowTimeout = null

	form.addEventListener('submit', (event) => {
		event.preventDefault()
		submitButton.classList.add('button_loading')
		successNode.style.display = 'none'
		clearTimeout(successShowTimeout)
		errorNode.style.display = 'none'
		clearTimeout(errorShowTimeout)

		const formData = new FormData(form)

		fetch('/wp-content/themes/relotus-relocation/mail-contact.php', {
			method: 'POST',
			body: formData,
		})
			.then((res) => res.text())
			.then((res) => {
				if (res === 'ok') {
					form.reset()
					successNode.style.display = 'block'
					successShowTimeout = setTimeout(() => {
						successNode.style.display = 'none'
					}, 3000)
				} else if (res === 'error') {
					errorNode.style.display = 'block'
					errorShowTimeout = setTimeout(() => {
						errorNode.style.display = 'none'
					}, 3000)
				}
			})
			.catch(() => {
				errorNode.style.display = 'block'
				errorShowTimeout = setTimeout(() => {
					errorNode.style.display = 'none'
				}, 3000)
			})
			.finally(() => {
				submitButton.classList.remove('button_loading')
			})
	})
}
