document.addEventListener("DOMContentLoaded", function () {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const subtotalElement = document.getElementById('subtotal');
    const totalElement = document.getElementById('total');

    const downloadLink = document.querySelectorAll('#download')
    const disableButtonStok = document.querySelectorAll('#dis,#diss,.not')

    // Daftar alat
    const alatCounters = document.querySelectorAll('.jumlah');
    const plusButtons = document.querySelectorAll('.plus');
    const minusButtons = document.querySelectorAll('.min');

    downloadLink.forEach(function (download) {
        download.addEventListener('click', function () {
            this.classList.add('disabled')
        })
    })

    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            updateSubtotal();
        });
    });

    plusButtons.forEach(function (button, index) {
        let stock = document.querySelectorAll('#stok')[index].getAttribute('data-stok')
        const inputJumlah = alatCounters[index].querySelector('input[type="hidden"]');
        button.addEventListener('click', function () {
            if (inputJumlah.value === stock) {
                button.style.backgroundColor = 'white'
                button.style.opacity = 0.5
            } else {
                incrementCount(index);
            }
        });
    });
    minusButtons.forEach(function (button, index) {
        button.addEventListener('click', function () {
            decrementCount(index);
        });
    });

    function updateSubtotal() {
        var subtotal = 0;
        checkboxes.forEach(function (checkbox, index) {
            if (checkbox.checked) {
                const harga = parseFloat(checkbox.getAttribute('data-harga'));
                if (!isNaN(harga)) {
                    const count = parseInt(alatCounters[index].querySelector('.count').textContent, 10);
                    subtotal += harga * count;
                }
            }
        });
        subtotalElement.textContent = 'Rp. ' + subtotal.toLocaleString('id-ID');
        updateTotal(subtotal);
    }

    function updateTotal(subtotal) {
        const total = subtotal;
        totalElement.textContent = 'Rp. ' + total.toLocaleString('id-ID');
    }

    function incrementCount(index) {
        const jumlah = alatCounters[index].querySelector('.count');
        let count = parseInt(jumlah.textContent, 10); //ngekonversi bilangan bulat desimal basis 10
        count++;
        jumlah.textContent = count;

        const inputJumlah = alatCounters[index].querySelector('input[type="hidden"]');
        inputJumlah.value = count;
        // console.log(inputJumlah);
        updateSubtotal();

    }

    function decrementCount(index) {
        const jumlah = alatCounters[index].querySelector('.count');
        let count = parseInt(jumlah.textContent, 10);
        if (count > 0) {
            count--;
            jumlah.textContent = count;

            const inputJumlah = alatCounters[index].querySelector('input[type="hidden"]');
            inputJumlah.value = count;

            updateSubtotal();
        }
    }
    // disable button stok 0
    disableButtonStok.forEach(disableButton => {
        disableButton.disabled = 'true'
        disableButton.style.backgroundColor = 'white'
    });
});

// redirect pages
const redirectPage = () => {
    window.open('https://wa.me/6285854950450', '_blank')
    window.location.href = '../user/riwayat-pemesanan'
}

const disableProfile = () => {
    const test = document.getElementById('pills-bill-info')
    test.classList.toggle('bege')
    const test2 = test.classList.contains('bege')
    localStorage.setItem('bgStatus', test2)
}

const ngen = () => {
    const test = document.getElementById('pills-bill-info')
    const pler = localStorage.getItem('bgStatus')

    if (pler === 'true') {
        test.classList.add('bege')
    } else {
        test.classList.remove('bege')
    }
}

document.addEventListener('DOMContentLoaded', ngen);












