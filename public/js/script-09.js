// Unfollow confirm
const noticeTitle = document.querySelector('#notice-title')
const noticeBody = document.querySelector('#notice-body')
const idHidden = document.querySelector('#id_hidden')
const urlHidden = document.querySelector('#url_hidden')
const unfollowBtn = document.querySelector('#unfollow')

function unfollow() {
    const name = `<i class="text-capitalize">${unfollowBtn.dataset.name}</i>`
    noticeTitle.innerHTML = `Bỏ theo dõi ${name}`;
    idHidden.value = unfollowBtn.dataset.id;
    urlHidden.value = unfollowBtn.dataset.url;
    noticeBody.innerHTML = `Bạn có chắc sẽ bỏ theo dõi chứ. Nếu bỏ theo dõi bạn sẽ không còn nhận được thông báo từ ${name} nữa.`
}


//Follow 
const followBtn = document.querySelector('#follow')

async function followCreation() {
    const url = '../api/follow';
    const data = { id: followBtn.dataset.id };

    const token = document.querySelector('meta[name=csrf-token]').getAttribute('content');
    const response = await fetch(url, {
        method: "post",
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify(data)
    });

    const result = await response.text();
    if (result == 1) {
        const name = `<i class="text-capitalize">${followBtn.dataset.name}</i>`
        noticeTitle.innerHTML = `Bỏ theo dõi ${name}`;
        idHidden.value = followBtn.dataset.id;
        urlHidden.value = followBtn.dataset.url;
        noticeBody.innerHTML = `Bạn có chắc sẽ bỏ theo dõi chứ. Nếu bỏ theo dõi bạn sẽ không còn nhận được thông báo từ ${name} nữa.`

        alert('Theo dõi thành công')
        const wrapFollow = document.querySelector('#wrap-follow')
        wrapFollow.innerHTML =
            `
            <span id="unfollow" onclick="unfollow()" data-id="${followBtn.dataset.id}" data-name="${followBtn.dataset.name}"  data-bs-toggle="modal" data-bs-target="#notice" class="unfollow-link btn btn-warning"><i class="fa-solid fa-heart-crack"></i> Bỏ theo dõi</span>
        `
    }
}
