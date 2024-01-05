// navbar active
document.addEventListener('DOMContentLoaded', function () {
    const navbarParent = document.getElementById('scrollbar')
    const links = document.querySelectorAll('#link')
    navbarParent.addEventListener('click', function (e) {
        links.forEach(function (link) {
            if (link.classList.contains('active')) {
                link.classList.remove('active')
            }
        })
        e.target.classList.add('active')
    })
})