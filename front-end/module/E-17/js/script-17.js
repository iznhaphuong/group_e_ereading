tailwind.config = {
    theme: {
        extend: {
            colors: {
                'default': '#077C98',
            }
        }
    }
}

const modal = document.querySelector('.modal');
const showModal = document.querySelector('.add-user');
const closeModal = document.querySelectorAll('.close-modal');
showModal.addEventListener('click', function (){
    modal.classList.remove('hidden')
});
closeModal.forEach(close => {
    close.addEventListener('click', function (){
        modal.classList.add('hidden')
    });
});