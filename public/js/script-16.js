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

const edit = document.querySelectorAll('.editModel');
edit.forEach(function (item) {
    item.addEventListener('click', (e) => {
        const id = item.dataset.id;
        const version = item.dataset.version;
        showEditUser(id, version);
    });
});

async function showEditUser(id, version) {
    const urlVersion = '/api/user/get-version/' + id;
    const responseVersion = await fetch(urlVersion);
    const resultVersion = await responseVersion.text();

    const userName = document.getElementById('inputUserName');
    const userUserName = document.getElementById('inputUserUserName');
    const userEmail = document.getElementById('inputUserEmail');
    const userExp = document.getElementById('inputUserExp');
    const statusTypes = document.getElementById('statusTypes');
    const userPassword = document.getElementById('inputUserPassword');
    const inputId = document.getElementById('inputId');
    const inputVersion = document.getElementById('inputUserVersion');
    const userAvatar = document.getElementById('userAvatar');
    const btnEdit = document.getElementById('btn-edit');

    if (version === resultVersion) {
        const url = '/api/user/get-one/' + id;
        const response = await fetch(url);
        const result = await response.json();
        btnEdit.className = 'btn btn-primary text-default-text bg-default';
        userName.value = result.name;
        userUserName.value = result.username;
        userEmail.value = result.email;
        userExp.value = result.exp;
        inputId.value = id;
        inputVersion.value = version;

        if (result.type === 0) {
            statusTypes.selectedIndex = "1";
        } else {
            statusTypes.selectedIndex = "0";
        }
    } else {
        userName.disabled = true;
        userUserName.disabled = true;
        userEmail.disabled = true;
        statusTypes.disabled = true;
        userExp.disabled = true;
        userPassword.disabled = true;
        userAvatar.disabled = true;
        btnEdit.className = 'hidden';
        userName.value = "";
        userUserName.value = "";
        userEmail.value = "";
        userExp.value = "";
        inputId.value = "";
        inputVersion.value = version;
        if (confirm("Version khác nhau, bạn có muốn tải lại trang không?")) {
            location.reload();
        }
    }
}

const del = document.querySelectorAll('.delete-user');
del.forEach(item => {
    item.addEventListener('click', (e) => {
        showDeleteUser(item.dataset.id);
    })
})

async function showDeleteUser(id) {
    const url = '/api/user/get-one/' + id;
    const response = await fetch(url);
    const result = await response.json();

    const text = document.getElementById('delete-text');
    const del = document.getElementById('inputIdDel');
    del.value = id;
    text.innerHTML = 'Bạn có chắc chắn muốn xóa người dùng "' + result.name.toUpperCase() + '" này không?';
}
