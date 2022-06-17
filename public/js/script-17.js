tailwind.config = {
    theme: {
        extend: {
            height: {
                '22px': '22px',
            },
            colors: {
                'default': '#E8F6F8',
                'default-hover': '#077C98',
                'default-border': '#202C31',
                'default-text': '#00161E',
            }
        }
    }
}

const category_edit = document.querySelectorAll('.editModel');
category_edit.forEach(function (item) {
    item.addEventListener('click', (e) => {
        const id = item.dataset.id;
        const version = item.dataset.version;
        showEditCategory(id, version);
    });
});

async function showEditCategory(id, version) {
    const urlVersion = '/api/category/get-version/' + id;
    const responseVersion = await fetch(urlVersion);
    const resultVersion = await responseVersion.text();

    const text = document.getElementById('inputNameCategory');
    console.log(version)
    console.log(resultVersion)
    if (version === resultVersion) {
        const url = '/api/category/get-one/' + id;
        const response = await fetch(url);
        const result = await response.json();
        text.value = result.name;

        //
        const btnEdit = document.getElementById('btn-edit');
        if (btnEdit) {
            btnEdit.addEventListener('click', (e) => {
                editCategory(id, text.value, version);
            });
        }
    } else {
        text.disabled = true;
        text.className += "disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none";
        console.log('version khac nhau');
        if (confirm("Version khác nhau, bạn có muốn tải lại trang không?")) {
            location.reload();
        }
    }
}

async function editCategory(id, text, version) {
    const url = '/admin/danh-muc/cap-nhat/' + id;
    console.log(id)
    console.log(text)
    const data = {name: text, version: version};
    const token = document.querySelector('meta[name=csrf-token]').getAttribute('content');
    const response = await fetch(url, {
        method: "PUT",
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify(data)
    });
    location.reload();
}

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
