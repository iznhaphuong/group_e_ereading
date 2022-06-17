const selector = document.querySelector('select')

const options = document.querySelectorAll('option')
options.forEach(element => {
    if (element.value == selector.dataset.select.trim()) {
        element.setAttribute('selected', true)
    } else {
        element.removeAttribute('selected')
    }
});

function updatefield() {
    const qClone = document.querySelector('#q_clone');
    qClone.value = document.querySelector('#keyword-following').value
}
// Unfollow confirm
const noticeTitle = document.querySelector('#notice-title')
const noticeBody = document.querySelector('#notice-body')
const unfollows = document.querySelectorAll('.unfollow')
const idHidden = document.querySelector('#id_hidden')
const urlHidden = document.querySelector('#url_hidden')

unfollows.forEach(element => {
    element.addEventListener('click', function () {
        const name = `<i class="text-capitalize">${element.dataset.name}</i>`
        noticeTitle.innerHTML = `Bỏ theo dõi ${name}`;
        idHidden.value = element.dataset.id;
        urlHidden.value = element.dataset.url;
        noticeBody.innerHTML = `Bạn có chắc sẽ bỏ theo dõi chứ. Nếu bỏ theo dõi bạn sẽ không còn nhận được thông báo từ ${name} nữa.`
    });
});

