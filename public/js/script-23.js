
const clearBtn = document.querySelector('.btn-clear')
clearBtn.addEventListener('click', function () {
    localStorage.removeItem('my_history')
    getHistory()
})

async function getHistory() {
    const url = './api/history';
    let my_history = JSON.parse(localStorage.getItem('my_history'));

    const data = { history: my_history };
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
    const creationShow = document.querySelector('#creation-show');
    creationShow.innerHTML = ''
    result.forEach(element => {
        creationShow.innerHTML += `
        <div class="col">
                        <div class="card text-white">
                            <img src="images/covers/${element.image}" class="card-img" alt="...">
                            <div class="card-img-overlay">
                                <div class="m-group-button">
                                    <ul>
                                        <li class="button-item"><a href="chi-tiet/${MD5(element.id + element.name)}" title="Đọc tiếp"><i class="fa-solid fa-book-open"></i></a></li>
                                        <li class="button-item"><a href="#" title="Xóa"><i class="fa-solid fa-trash-can"></i></a></li>
                                    </ul>
                                </div>
                                <div class="m-wrap-infor">
                                    <h5 class="card-title text-capitalize pb-2">${element.name}</h5>
                                    <div class="card-text d-flex justify-content-between pb-4"><span class="text-capitalize">${element.author}
                                            - </span>5 ngày trước<span class="comment"><i class="fa-solid fa-comment"></i>
                                            3</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        `
    });
}
getHistory()
