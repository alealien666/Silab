// ngitung total
document.addEventListener("DOMContentLoaded", function () {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]')
    const subtotalElement = document.getElementById('subtotal');
    const totalElement = document.getElementById('total')
    const totalHarga = document.getElementById('totalHarga')

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
        totalElement.textContent = 'Rp. ' + total.toFixed(2)
        totalHarga.textContent = 'Rp. ' + total.toFixed(2)
    }

    updateSubtotal();
});

// shipping info
function savePersonalInfo() {
    // Simpan data Personal Info ke variabel JavaScript
    let nama = document.getElementById('nama').value;
    let lab = document.getElementById('lab').value;
    let notelp = document.getElementById('no-telp').value;
    let jenis = document.getElementById('jenis').value;
    let masuk = document.getElementById('masuk').value;
    let keluar = document.getElementById('keluar').value;
    // let alat = document.getElementById('selected_alat').value;
    let total = document.getElementById('total')

    // isi data Shipping Info
    document.getElementById('shipping-nama').value = nama;
    document.getElementById('shipping-lab').value = lab;
    document.getElementById('shipping-notelp').value = notelp;
    document.getElementById('shipping-jenispesanan').value = jenis;
    document.getElementById('shipping-masuk').value = masuk;
    document.getElementById('shipping-keluar').value = keluar;
    document.getElementById('totalHarga').value = total;
    // document.getElementById('shipping-alat').value = selected_alat;

    // let selectedAlat = [];
    // let checkboxes = document.querySelectorAll('input[name="selected_alat[]"]:checked');
    // checkboxes.forEach((checkbox) => {
    //     selectedAlat.push({
    //         jenis_alat: checkbox.parentNode.previousElementSibling.previousElementSibling.textContent.trim(),
    //         harga: checkbox.dataset.harga
    //     });
    // });

    // // Menampilkan data alat di shipping info
    // let shippingAlat = document.getElementById('shipping-alat');
    // shippingAlat.innerHTML = "";
    // selectedAlat.forEach((item) => {
    //     let alatInfo = document.createElement('p');
    //     alatInfo.textContent = `Nama Alat: ${item.jenis_alat}, Harga: ${item.harga}`;
    //     shippingAlat.appendChild(alatInfo);
    // });

    // Menampilkan Shipping Info dan menyembunyikan Personal Info
    //     const personal = document.getElementById('personal-info')
    //     personal.disabled = true
    //     document.getElementById('shipping-info')
}


