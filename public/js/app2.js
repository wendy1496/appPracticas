const $fileInput2 = document.getElementById('image2')
const $dropZone2 = document.getElementById('result-image2')
const $img2 = document.getElementById('img-result2')

$dropZone2.addEventListener('click', () => $fileInput.click())

$dropZone2.addEventListener('dragover', (e) => {
	e.preventDefault()

	$dropZone2.classList.add('form-file__result2--active')
})

$dropZone2.addEventListener('dragleave', (e) => {
	e.preventDefault()

	$dropZone2.classList.remove('form-file__result2--active')
})

const uploadImage2 = (file) => {
	const fileReader = new FileReader()
	fileReader.readAsDataURL(file)

	fileReader.addEventListener('load', (e) => {
		$img2.setAttribute('src', e.target.result)
	})
}

$dropZone2.addEventListener('drop', (e) => {
	e.preventDefault()

	/* console.log(e.dataTransfer) */

	$fileInput2.files = e.dataTransfer.files
	const file = $fileInput2.files[0]

	uploadImage2(file)
})

$fileInput2.addEventListener('change', (e) => {
	/* console.log(e.target.files[0]) */
	const file = e.target.files[0]

	uploadImage2(file)
})