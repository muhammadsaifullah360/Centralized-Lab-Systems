document.querySelectorAll('.btn-delete').forEach((button) => {
    button.addEventListener('click', function (event) {
        event.preventDefault()
        if (confirm("Are you sure?")) {
            let action = this.getAttribute('href')
            let form = document.getElementById('form-delete')
            form.setAttribute('action', action)
            // console.log(form)
            form.submit();
        }
    })
})

// fade out animation
$('.error-msg').delay(3000).fadeOut(350);

let filterName = document.getElementById('filter-name')
if(filterName){
    filterName.addEventListener('change', function () {
    let name = this.value || this.options[this.selectedIndex].value
    window.location.href = window.location.href.split('?')[0] + '?name=' + name

})}
