dropdowns = document.querySelectorAll('.dropdown')
dropdowns.forEach(element => {
    var e = element.childNodes[3]
    element.addEventListener('mouseover', function () {
        e.classList.add('show')
    })

    element.addEventListener('mouseout', function () {
        e.classList.remove('show')
    })
});

