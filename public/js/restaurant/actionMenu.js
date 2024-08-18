
function editItem(uid, name, category, price, description){
    // Mendapatkan elemen modal edit dan form
    var modalEdit = $("#editModal");
    var formEdit = $("#form_edit");
    var editName = document.getElementById("edit_name");
    var editCategory = document.getElementById("edit_category");
    var editPrice = document.getElementById("edit_price");
    var editDescription = document.getElementById("edit_description");

    // Menampilkan modal edit
    modalEdit.modal("show");

    // Mengisi form dengan data item yang akan diedit
    editName.value = name;
    editCategory.value = category;
    editPrice.value = price;
    editDescription.value = description;

    // Mengatur action URL untuk form edit sesuai dengan UID item
    formEdit.attr("action", `/product/${uid}`);
}

function deleteItem(uid, name){
    var modalDelete = $("#deleteModal");
    var formDelete = $("#form_delete");
    var confirmItem = document.getElementById("confirm_item");

    modalDelete.modal("show");
    confirmItem.textContent = name;
    formDelete.attr("action", `/product/${uid}`);
}


var itemCountElement = document.getElementById('itemCount');
var selectedItems = [];
var totalPrice = 0;
var buttonPesanan = document.getElementById('floating-button');

function shopItem(uid, name, price, image) {
    // Memeriksa apakah item sudah ada di keranjang (selectedItems)
    let existingItem = selectedItems.find(item => item.uid === uid);

    if (!existingItem) {
        // Jika item belum ada, tambahkan ke selectedItems
        selectedItems.push({ uid, name, price, qty: 1 , image});
        totalPrice += price;
        itemCountElement.textContent = selectedItems.length;

        // Tampilkan jumlah pesanan dan tombol tambah/kurang
        document.getElementById(`amount-${uid}`).style.display = 'flex';
        updateQtyDisplay(uid);

        // Tambahkan event listener untuk tombol tambah/kurang qty
        document.getElementById(`increaseQty-${uid}`).addEventListener('click', function() {
            increaseQty(uid);
        });

        // document.getElementById(`decreaseQty-${uid}`).addEventListener('click', function() {
        //     decreaseQty(uid);
        // });
        document.getElementById(`decreaseQtys-${uid}`).addEventListener('click', function() {
            decreaseQtys(uid);
        });
    } else {
        // Jika item sudah ada di keranjang, tampilkan alert
        alert('Item sudah ada di keranjang.');
    }

    // Tampilkan tombol pesanan
    buttonPesanan.style.display = 'block';
}

function updateQtyDisplay(uid) {
    // Temukan item berdasarkan UID
    let qtyElement = document.getElementById(`produkPesananJumlah-${uid}`);
    let qtyResultElement = document.getElementById(`produkPesananJumlahResult-${uid}`);
    let item = selectedItems.find(item => item.uid === uid);
    if (item) {

        if (qtyElement) {
            qtyElement.textContent = item.qty;
        }

        if (qtyResultElement) {
            qtyResultElement.textContent = item.qty;
        }

        let decreaseBtn = document.getElementById(`decreaseQty-${uid}`);
        if (decreaseBtn) {
            decreaseBtn.disabled = item.qty <= 1;
        }
    }

}

function increaseQty(uid) {
    // Temukan item berdasarkan UID dan tingkatkan quantity-nya
    let item = selectedItems.find(item => item.uid === uid);
    if (item) {
        item.qty += 1;
        totalPrice = item.price * item.qty;
        updateQtyDisplay(uid);
        updateTotalPrice();
    }
}

function decreaseQty(uid) {
    // Temukan item berdasarkan UID
    let item = selectedItems.find(item => item.uid === uid);
    console.log(selectedItems);

    // Jika item ditemukan dan kuantitas lebih dari 1, kurangi kuantitasnya
    if (item && item.qty > 1) {
        item.qty -= 1;
        totalPrice -= item.price;

        // Perbarui tampilan kuantitas dan total harga
        updateQtyDisplay(uid);
        document.getElementById(`produkPesananJumlahResult-${uid}`).textContent = item.qty;
        updateTotalPrice();
    } else {
        // Jika kuantitas menjadi 1 atau kurang, hapus item dari keranjang
        deleteListPesanan(uid);

    }

}
function decreaseQtys(uid) {
    // Temukan item berdasarkan UID
    let item = selectedItems.find(item => item.uid === uid);

    // Jika item ditemukan dan kuantitas lebih dari 1, kurangi kuantitasnya
    if (item && item.qty > 1) {
        item.qty -= 1;
        totalPrice -= item.price;

        // Perbarui tampilan kuantitas dan total harga
        updateQtyDisplay(uid);
        document.getElementById(`produkPesananJumlahResult-${uid}`).textContent = item.qty;
        updateTotalPrice();
    } else {
        // Jika kuantitas menjadi 1 atau kurang, hapus item dari keranjang
        let amountElement = document.getElementById(`amount-${uid}`);
        if (amountElement) {
            amountElement.style.display = 'none';
        }
        selectedItems = selectedItems.filter(item => item.uid !== uid);

        // Perbarui jumlah item dalam elemen itemCountElement
        itemCountElement.textContent = selectedItems.length;

        // Sembunyikan tombol "Pesan" jika keranjang kosong
        if (selectedItems.length === 0) {
            document.getElementById("floating-button").style.display = 'none';
        }
    }
}

function pesananModal(){
    var pesanModal = $("#pesanModal");
    var itemInBasket = document.getElementById("itemBasket")
    pesanModal.modal("show");

    itemInBasket.innerHTML = "";
    selectedItems.forEach(( data, index) => {
        const newDiv = document.createElement("div");
        newDiv.className = "row restaurant_item";
        newDiv.style.marginBottom = "20px";
         newDiv.innerHTML = `
         <div class="col-xs-4">
                <a href="#"><img src="assets/img/product/${data.image}" class="img-responsive" alt=""></a>
        </div>
        <div class="col-xs-8">
                <h4 class="product-name">
                    <a href="#">${data.name}</a>
                    <button type="button" class="btn btn-danger btn-xs" onclick="deleteListPesanan('${data.uid}')">
                        <i class="fa-solid fa-trash" style="font-size:12px;"></i>
                    </button>
                </h4>
                <p class="product-price" style="font-size:20px; font-weight:600;">${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0, maximumFractionDigits: 0 }).format(data.price)}</p>
                <div class="quantity-controls d-flex" style="display: flex; align-items: center;">
                    <button type="button" class="btn btn-danger btn-sm" onclick="decreaseQty('${data.uid}')">-</button>
                    <span class="quantity-display" id="produkPesananJumlahResult-${data.uid}" style="margin: 0 10px;">${data.qty}</span>
                    <button type="button" class="btn btn-success btn-sm" onclick="increaseQty('${data.uid}')">+</button>
                </div>
        </div>
        <div class="col-xs-12">
            <hr style="width: 45%; margin: 15px 0; border: 0; border-top: 1px solid #ddd;">
            </div>
        `;
        itemInBasket.appendChild(newDiv)
        updateQtyDisplay(data.uid);
    })
    updateTotalPrice();

}

function updateTotalPrice() {
    totalPrice = 0; // Reset total harga

    selectedItems.forEach(item => {
        totalPrice += item.price * item.qty;
    });

    // Perbarui tampilan total harga di elemen dengan id 'totalPrice'
    var totalHargaElement = document.getElementById('totalPrice');
    if (totalHargaElement) {
        totalHargaElement.textContent = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }).format(totalPrice);
    }
}



function deleteListPesanan(uid) {
    // Temukan indeks produk dalam array selectedItems
    let productIndex = selectedItems.findIndex((p) => p.uid === uid);

    // Jika produk ditemukan dalam array
    if (productIndex !== -1) {
        // Ambil item dari array
        let item = selectedItems[productIndex];
        totalPrice -= item.price * item.qty;
        selectedItems.splice(productIndex, 1);
        itemCountElement.textContent = selectedItems.length;
        pesananModal();

        // Sembunyikan elemen yang menampilkan jumlah item jika ada
        let amountElement = document.getElementById(`amount-${uid}`);
        if (amountElement) {
            amountElement.style.display = 'none';
        }

        // Jika keranjang kosong, sembunyikan tombol pesanan
        if (selectedItems.length === 0) {
            buttonPesanan.style.display = 'none';
            var pesanModal = $("#pesanModal");
            pesanModal.modal("hide")
        }

    }
}

function submitForm() {
    let simplifiedItems = selectedItems.map(item => ({
        uid:item.uid,
        qty: item.qty,
        price: item.price
    }));
    let selectedItemsJson = JSON.stringify(simplifiedItems);
    document.getElementById('selectedItemsInput').value = selectedItemsJson;
    // document.getElementById('selectedItemsInput').value = selectedItemsJson;
}


// Menambahkan event listener saat dokumen selesai dimuat
document.addEventListener('DOMContentLoaded', function() {
    updateQtyDisplay();

});
