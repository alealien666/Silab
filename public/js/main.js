// ngitung total
document.addEventListener("DOMContentLoaded", function () {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const subtotalElement = document.getElementById('subtotal');
    const totalElement = document.getElementById('total')

    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            updateSubtotal();
        });
    });

    function updateSubtotal() {
        var subtotal = 0;
        checkboxes.forEach(function (checkbox) {
            if (checkbox.checked) {
                const harga = parseFloat(checkbox.getAttribute('data-harga'));
                if (!isNaN(harga)) {
                    subtotal += harga;
                }
            }
        });
        subtotalElement.textContent = 'Rp. ' + subtotal.toFixed(2);
        updateTotal(subtotal)
    }

    function updateTotal(subtotal) {
        const total = subtotal;
        totalElement.textContent = 'Rp. ' + total.toFixed(2);
    }

    updateSubtotal();
});

// lokal storage cookie
// Periksa preferensi mode gelap saat halaman dimuat
const darkModePreference = localStorage.getItem('darkMode');
if (darkModePreference === 'true') {
    enableDarkMode();
}

// Tambahkan event listener ke tombol
darkModeButton.addEventListener('click', () => {
    // Perbarui preferensi mode gelap
    const currentPreference = localStorage.getItem('darkMode');
    const newPreference = currentPreference === 'true' ? 'false' : 'true';
    localStorage.setItem('darkMode', newPreference);

    // Terapkan mode gelap atau terang
    if (newPreference === 'true') {
        enableDarkMode();
    } else {
        disableDarkMode();
    }
});
