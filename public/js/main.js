document.addEventListener("DOMContentLoaded", function () {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const subtotalElement = document.getElementById('subtotal');
    const totalElement = document.getElementById('total');

    // Daftar alat
    const alatCounters = document.querySelectorAll('.jumlah');
    const plusButtons = document.querySelectorAll('.plus');
    const minusButtons = document.querySelectorAll('.min');

    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            updateSubtotal();
        });
    });

    plusButtons.forEach(function (button, index) {
        button.addEventListener('click', function () {
            incrementCount(index);
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

});

//disable button plus minus
const disableElements = document.querySelectorAll('.disable input, .disable button');

disableElements.forEach(element => {
    element.style.pointerEvents = 'none';
    element.style.opacity = 0.6;
});

const disableButtons = document.querySelectorAll('.disable button');

disableButtons.forEach(button => {
    button.addEventListener('mouseover', function () {
        this.style.backgroundColor = 'initial';
        this.style.cursor = 'not-allowed';
    });
});

// let disableButtonBeforeOrder = document.getElementById('button-disable')
// disableButtonBeforeOrder.disabled = true

// const activateButton = () => {
//     disableButtonBeforeOrder.disabled = false
// }

// redirect pages
const redirectPage = () => {
    window.open('https://wa.me/6285854950450', '_blank')
    window.location.href = '../riwayat-pemesanan'
}










