
let creation_id = document.querySelector('#title').dataset.creationId;
let chapter_id = document.querySelector('#chapter-content').dataset.chapterId;
let my_history = JSON.parse(localStorage.getItem('my_history'));
if (my_history == null || my_history.length == 0) {
    my_history = []
    my_history.push({
        'creation_id': creation_id,
        'chapter_id': chapter_id
    })
}

let flag = true
my_history.forEach(element => {
    //thay the chapter id cua truyen truoc do da luu
    if (element.creation_id == creation_id) {
        element.chapter_id = chapter_id
        flag = false;
    }
});

//neu van chua duoc thay the, (chua co trong mang thi them moi)
if (flag) {
    my_history.push({
        'creation_id': creation_id,
        'chapter_id': chapter_id
    })
}
console.log(my_history);
localStorage.setItem('my_history', JSON.stringify(my_history))

function selectChap() {
    const chapter = document.querySelector('#select-chapter').value;
    console.log(chapter);
}
