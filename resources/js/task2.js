const inputs = document.querySelectorAll('[name^="input_"], [name^="button_"]');
const fields = Array.from(inputs).map(input => ({
    input,
    wrapper: input.closest('p')
}));
function renderFields() {
    fields.forEach(field => {
        field.input.name.split('_')[1] == e.target.value ? document.body.appendChild(field.wrapper) : field.wrapper.remove(); 
    });
}
function renderFields(type) {
    fields.forEach(field => {
        field.input.name.split('_')[1] == type ? document.body.appendChild(field.wrapper) : field.wrapper.remove(); 
    });
}
const typeSelect = document.querySelector('[name="type_val"]');
typeSelect.addEventListener('change', () => {
    renderFields(typeSelect.value);
});
renderFields(typeSelect.value);