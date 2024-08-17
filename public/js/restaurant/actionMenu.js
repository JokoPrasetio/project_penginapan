function editItem(uid, name, category, price, description){
    var modalEdit = $("#editModal")
    var formEdit = $("#form_edit")
    var editName = document.getElementById("edit_name")
    var editCategory = document.getElementById("edit_category")
    var editPrice = document.getElementById("edit_price")
    var editDescription = document.getElementById("edit_description")

    modalEdit.modal("show")

    editName.value = name
    editCategory.value = category
    editPrice.value = price
    editDescription.value = description

    formEdit.attr("action", `/product/${uid}`)
}

function deleteItem(uid, name){
    var modalDelete = $("#deleteModal")
    var formDelete = $("#form_delete")
    var confirmItem = document.getElementById("confirm_item")
    modalDelete.modal("show")
    confirmItem.textContent  = name

    formDelete.attr("action", `/product/${uid}`)
}
