import { Carousel } from 'bootstrap'

const carousels = document.querySelectorAll('.do-card-carousel')

carousels.forEach(carousel => {

	let carouselPrev = carousel.querySelector('.carousel-control-prev')
	let carouselNext = carousel.querySelector('.carousel-control-next')

	let carouselInstanse = new Carousel(carousel, {
		wrap: true,
		touch: true
	})

	carouselPrev.addEventListener('mousedown', event => {
		event.preventDefault()
		carouselInstanse.prev()
	})

	carouselNext.addEventListener('mousedown', event => {
		event.preventDefault()
		carouselInstanse.next()
	})

})
