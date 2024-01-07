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

// local storage tema
const currentTheme = localStorage.getItem('theme') || 'dark' //pakai logikal or untuk menset default theme jika tidak maka nilainya akan null
document.documentElement.setAttribute('data-layout-mode', currentTheme)

function toggleTheme() {
    const currentTheme = document.documentElement.getAttribute('data-layout-mode')
    const newTheme = currentTheme == 'light' ? 'light' : 'dark'

    localStorage.setItem('theme', newTheme)
    document.documentElement.setAttribute('data-layout-mode', newTheme)
}

document.querySelector('.light-dark-mode').addEventListener('click', toggleTheme)

