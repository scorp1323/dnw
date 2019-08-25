const slider = document.querySelector('#grayscale')

slider.addEventListener('input', onChange)

function onChange() {
  console.log(slider.value)
}