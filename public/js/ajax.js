const keywordFollowing = document.querySelector('#keyword-following')

async function searchFollowing() {
    const url = './api/dang-theo-doi/search';
    const data = {
        keyword: keywordFollowing.value
    };
    const token = document.querySelector('meta[name=csrf-token]').getAttribute('content');
    const response = await fetch(url, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify(data)
    });

    // Nhan kq & giao dien
    const result = await response.json();
    console.log(result);
    const contentFollowing = document.querySelector('#content-following');
    contentFollowing.innerHTML = '';
//     result.forEach(element => {
//         contentFollowing.innerHTML += `
//         <div class="col">
//                             <div class="card text-white">
//                                 <img src="/images/covers/${element.image}" class="card-img"
//                                     alt="...">
//                                 <div class="card-img-overlay">
//                                     <div class="m-group-button">
//                                         <ul>
//                                             <li class="button-item"><a href="#" title="Đọc tiếp"><i
//                                                         class="fa-solid fa-book-open"></i></a></li>
//                                             <li class="button-item"><a href="#" title="Bỏ theo dõi"><i
//                                                         class="fa-solid fa-heart-crack"></i></a></li>
//                                         </ul>
//                                     </div>
//                                     <div class="m-wrap-genre">
//                                         <div class="genre-item full"></div>
//                                         <div class="genre-item new"></div>
//                                         <div class="genre-item hot"></div>
//                                     </div>

//                                     <div class="m-wrap-infor">
//                                         <h5 class="card-title text-capitalize pb-2">${element.name}</h5>
//                                         <div class="card-text d-flex justify-content-between pb-4"><span
//                                                 class="text-capitalize">${element.author}</span>5 ngày
//                                             trước
//                                         </div>
//                                     </div>
//                                 </div>
//                             </div>
//                         </div>
//         `
//     });
}

