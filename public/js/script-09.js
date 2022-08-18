// Continue confirm
const continueModal = document.querySelector('#continue')
const continueTitle = document.querySelector('#continue-title')
const continueBody = document.querySelector('#continue-body')
const continueLink = document.querySelector('#continue-link')
const continueClose = document.querySelector('#continue-close')

continueClose.addEventListener('click', function () {
    continueModal.classList.remove('d-block')
})

function isRead() {
    const creation_id = continueModal.dataset.id;
    var chapter_id = null;
    var creation_name = continueModal.dataset.name

    var my_history = JSON.parse(localStorage.getItem('my_history'));
    if (my_history !== null) {
        my_history.forEach(element => {
            if (element.creation_id == creation_id) {
                chapter_id = element.chapter_id
            }
        });
    }


    if (chapter_id != null) {
        continueModal.classList.add('show')
        continueModal.classList.add('d-block')
        getRecentChap(creation_id, chapter_id, creation_name)
    }
}

isRead()

async function getRecentChap(creation_id, chapter_id, creation_name) {
    const url = '../api/isread';
    const data = {
        creation_id: creation_id,
        chapter_id, chapter_id
    };
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
    const result = await response.json();
    if (result != null) {
        continueTitle.innerHTML = `Lần trước bạn đã đọc đến Chương ${result[0].chapter_number}`
        continueBody.innerHTML = `Bạn có muốn tiếp tục đọc chương ${result[0].chapter_number} ${result[0].chapter_name} chứ?`
        if (result[0].chapter_number == 1) {
            continueLink.setAttribute('href', `/reading/${MD5(creation_id + creation_name)}`)
        } else {
            continueLink.setAttribute('href', `/reading-${MD5(creation_id + result[0].chapter_number)}`)
        }
    }
}

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
function countViews(){
    // const url = '../api/countViews';
    const token = localStorage.getItem('view');
    console.log("token - " + token);
    
    // const data = {
    //     creation_id: creation_id,
    //     count: countViews
    // };
    // const response = await fetch(url, {
    //     method: "post",
    //     headers: {
    //         'Content-Type': 'application/json',
    //         'Accept': 'application/json',
    //         'X-CSRF-TOKEN': token
    //     },
    //     body: JSON.stringify(data)
    // });

    // const result = await response.text();
}
countViews();
