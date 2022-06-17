
//Edit
const creation_edit = document.querySelectorAll('.editModel');

creation_edit.forEach(function (item) {
    item.addEventListener('click', (e) => {
        const id = item.dataset.id;
        const version = item.dataset.version;
        const urlImg = item.dataset.url;
        showEditCreation(id, version, urlImg);
    });
});

async function showEditCreation(id, version, urlImg) {
    const urlVersion = '/api/admin/get-creation-version/' + id + '/' + version;
    const responseVersion = await fetch(urlVersion);
    //Lấy được version hiện tại ở database
    const resultVersion = await responseVersion.text();

    //Lấy id ở tường sửa
    let idHidden = document.getElementById('idEdit');
    let versionEdit = document.getElementById('versionEdit');
    let edit_name = document.getElementById('edit_name');
    let edit_author = document.getElementById('edit_author');
    let edit_source = document.getElementById('edit_source');
    let edit_status = document.getElementById('edit_status');

    let edit_types = document.getElementById('edit_types');
    let types_new = document.getElementById('types');
    let types_new_new = [];
    

    let edit_description = document.getElementById('edit_description');


    let edit_image = document.getElementById('edit_image');
    let image = document.getElementById('image');

    // console.log(resultVersion)

    if(resultVersion === '1'){
        const url = '/api/admin/get-creation-data/' + id;
        const response = await fetch(url);
        const result = await response.json();

        //Đổ dữ liệu vào
        edit_name.value = result[0].name;
        edit_author.value = result[0].author;
        edit_source.value = result[0].source;
        edit_status.value = result[0].status;
        let valueType = "";
        result[1].forEach(element => {
            valueType += element.name + ',';
        });
        edit_types.value = valueType;
        edit_description.value = result[0].description;
        
        edit_image.src = urlImg+'/'+result[0].image;

        idHidden.value = id;

        versionEdit.value = version;
        
    } else {
        console.log('version khac nhau');
        if (confirm("Version khác nhau, bạn có muốn tải lại trang không?")) {
            location.reload();
        }
    }
}

// async function editCreation(id, edit_name, edit_author, edit_source, edit_status ,arr_type, edit_description, edit_image, version) {
//     const url = '/admin/' + id;

//     const data = {
//                 name : edit_name,
//                 author : edit_author,
//                 source : edit_source,
//                 status : edit_status,
//                 types : arr_type,
//                 description : edit_description,
//                 image : edit_image,
//                 version: version
//             };
//     const token = document.querySelector('meta[name=csrf-token]').getAttribute('content');
//     const response = await fetch(url, {
//         method: "PUT",
//         headers: {
//             'Content-Type': 'application/json',
//             'Accept': 'application/json',
//             'X-CSRF-TOKEN': token
//         },
//         body: JSON.stringify(data)
//     });

//     var a = response.text();
    
//     console.log(a);
//     location.reload();
// }


//Delete
const btnDel = document.querySelectorAll('.btn-delete');
btnDel.forEach(item => {
    item.addEventListener('click', (e) => {
        const id = item.dataset.id;
        const name = item.dataset.name;
        console.log(name);
        showDeleteCreation(id, item.dataset.name);
    })
})

function showDeleteCreation(id, name) {
    let text = document.querySelector('#delete-text');
    const idDel = document.querySelector('#idDelete');
    console.log(idDel);
    text.innerHTML = 'Bạn có chắc chắn muốn xóa truyện có tên ' + name + ' không?';
    idDel.value = id;

}
