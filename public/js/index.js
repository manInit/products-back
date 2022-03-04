// image gallery

const imageFull = $('.product__image--full')[0]

$('.product__image').hover(e => { 
  imageFull.src = e.target.src
})

// counter

const counter = $('.counter')

counter.children('.counter__plus').click(e => {
  const counterValue = counter.children('.counter__value')
  let currentCount = parseInt(counterValue.text())

  counterValue.text(++currentCount)
  counter.children('.counter__minus').prop('disabled', currentCount <= 1)
})

counter.children('.counter__minus').click(e => {
  const counterValue = counter.children('.counter__value')
  let currentCount = parseInt(counterValue.text())

  counterValue.text(--currentCount)
  counter.children('.counter__minus').prop('disabled', currentCount <= 1)
})

//shopcart

function trueProductWordForm(count) {
	count %= 100
	const countLastDigit = count % 10 

	if (count >= 11 && count <= 19) return 'товаров'
	if (countLastDigit >= 2 && countLastDigit <= 4) return 'товара'
	if (countLastDigit === 1) return 'товар'

	return 'товаров'
}

function trueAddWordForm(count) {
  count %= 100
  const countLastDigit = count % 10

  if (count === 11) return 'добавлено'
  if (countLastDigit === 1) return 'добавлен'

	return 'добавлено'
}


$('#buy-btn').click(e => {
  const count = counter.children('.counter__value').text()
  const productWord = trueProductWordForm(count)
  const addWord = trueAddWordForm(count)

  $('#buy-btn').notify(
    `В корзину ${addWord} ${count} ${productWord}`, 
    'success', { 
      position: 'bottom' 
    }
  )
})
