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
    let edit_name = document.getElementById('edit_name');
    let edit_author = document.getElementById('edit_author');
    let edit_source = document.getElementById('edit_source');
    let edit_status = document.getElementById('edit_status');
    let edit_types = document.getElementById('edit_types');
    let edit_description = document.getElementById('edit_description');
    let edit_image = document.getElementById('edit_image');

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

        const btnEdit = document.getElementById('btn-edit');
        if (btnEdit) {
            btnEdit.addEventListener('click', (e) => {
                
                // editCreation(id, 
                //     edit_name.value,
                //     edit_author.value,
                //     edit_source.value,
                //     edit_status.value,
                //     edit_types.value,
                //     edit_description.value,
                //     edit_image.src, 
                //     version);
            });
        }
    } else {
        console.log('version khac nhau');
        if (confirm("Version khác nhau, bạn có muốn tải lại trang không?")) {
            location.reload();
        }
    }
}

// async function editCreation(id, edit_name, edit_author, edit_source, edit_status ,edit_types, edit_description, edit_image, version) {
//     const url = '/admin/' + id;

//     const data = {
//                 name : edit_name,
//                 author : edit_author,
//                 source : edit_source,
//                 status : edit_status,
//                 types : edit_types,
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
//     location.reload();
// }


//Delete
const category_del = document.querySelectorAll('.delete-category');
category_del.forEach(item => {
    item.addEventListener('click', (e) => {
        showDeleteCategory(item.dataset.id);
    })
})

async function showDeleteCategory(id) {
    const url = '/api/category/get-one/' + id;
    const response = await fetch(url);
    const result = await response.json();

    const text = document.getElementById('delete-text');
    text.innerHTML = 'Bạn có chắc chắn muốn xóa danh mục "' + result.name.toUpperCase() + '" này không?';

    //
    const btnDel = document.getElementById('btn-delete');
    if (btnDel) {
        btnDel.addEventListener('click', (e) => {
            deleteCategory(id);
        });
    }
}

async function deleteCategory(id) {
    const url = '/admin/danh-muc/xoa/' + id;
    const data = {id: id};
    const token = document.querySelector('meta[name=csrf-token]').getAttribute('content');
    const response = await fetch(url, {
        method: "DELETE",
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': token
        },
        // body: JSON.stringify(data)
    });
    console.log(response.json());
    location.reload();
}