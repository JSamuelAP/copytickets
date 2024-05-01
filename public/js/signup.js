const radioCliente= document.querySelector('#flexRadioDefault1');
const radioOrganizador = document.querySelector('#flexRadioDefault2');
const description = document.querySelector('#description');

radioCliente.addEventListener('change', () => {
    description.classList.add('d-none');
})
radioOrganizador.addEventListener('change', () => {
    description.classList.remove('d-none');
})
