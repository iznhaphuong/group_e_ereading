// Unfollow confirm
const noticeTitle = document.querySelector('#notice-title')
const noticeBody = document.querySelector('#notice-body')
const unfollow = document.querySelector('#unfollow')
const idHidden = document.querySelector('#id_hidden')
const nameHidden = document.querySelector('#name_hidden')

unfollow.addEventListener('click', function () {
    console.log('called');
    const name = `<i class="text-capitalize">${unfollow.dataset.name}</i>`
    noticeTitle.innerHTML = `Bỏ theo dõi ${name}`;
    idHidden.value = unfollow.dataset.id;
    nameHidden.value = unfollow.dataset.name;
    noticeBody.innerHTML = `Bạn có chắc sẽ bỏ theo dõi chứ. Nếu bỏ theo dõi bạn sẽ không còn nhận được thông báo từ ${name} nữa.`
});

