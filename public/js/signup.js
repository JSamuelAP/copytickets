const radioCliente = document.querySelector('#flexRadioDefault1');
const radioOrganizador = document.querySelector('#flexRadioDefault2');
const inputNombre = document.querySelector('#nombre');
const description = document.querySelector('#description');

radioCliente.addEventListener('change', () => {
    inputNombre.placeholder = 'Nombre*';
    description.classList.add('d-none');
})
radioOrganizador.addEventListener('change', () => {
    inputNombre.placeholder = 'Nombre de la empresa organizadora*';
    description.classList.remove('d-none');
})
