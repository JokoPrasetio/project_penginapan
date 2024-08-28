function ApprovedOrder(uid, name, name_room){
    var modalApproved = $("#modal_approved")
    var formApproved = $("#form_confirm_approved")
    var confirmApproved = $("#confirm_approve")

    modalApproved.modal("show")
    confirmApproved.html(`${name}  (${name_room})`)
    formApproved.attr("action", `/approved-order/${uid}`)
}

function rejectOrder(uid, name, name_room){
    var modalReject = $("#modal_reject")
    var formReject = $("#form_reject_approved")
    var confirmReject = $("#confirm_reject")

    modalReject.modal("show")
    confirmReject.html(`${name}  (${name_room})`)
    formReject.attr("action", `/reject-order/${uid}`)
}

function detailOrder(uid){
    fetch(`/detail-order/${uid}`)
    .then(response => {
        if(!response.ok){
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then(data=>{
        showOrderDetailsInModal(data);
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });
}


function showOrderDetailsInModal(data){
    var modalDetail =$("#modal_detail")
    modalDetail.modal("show")
    var confirmDetail =$("#confirm_detail_pesanan")
    confirmDetail.html(`${data?.name}  (${data?.name_room})`)
    var bodyTable = $("#body_table")

    bodyTable.empty();

    data?.transaction_detail.forEach((item, index) => {
        let row = `
        <tr>
            <td>${index + 1}</td>
            <td>${item?.product?.name}</td>
            <td>${item.qty}</td>
            <td>${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0, maximumFractionDigits: 0 }).format(item.price)}</td>
        </tr>
    `;
    bodyTable.append(row);
    });
}

function reportDownload(){
    var modalReport = $("#modal_report")
    modalReport.modal("show")

    fetch()
}

function historyApproval(){
    var historyModal = $("#modal_history")
    var bodyTableHistory = $("#body_table_history")
        historyModal.modal("show")
        bodyTableHistory.empty();
        fetch(`/history`)
        .then(response => {
            if(!response.ok){
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(data=>{
            data.forEach((item, index) => {
                let row = `
                    <tr>
                        <td>${index + 1}</td>
                        <td>
                        <del>
                          <button
                            class="btn ${item?.status === 'approved' ? 'btn-success' : 'btn-danger'}"
                            style="margin-right: 0.5rem;">
                            ${item?.status === 'approved' ? 'Diterima' : 'Ditolak'}
                            </button>

                        </del>
                        </td>
                        <td>${item?.name}</td>
                        <td>${item.name_room}</td>
                        <td>${item.no_wa}</td>
                        <td>${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0, maximumFractionDigits: 0 }).format(item.total_price)}</td>
                       <td>${new Date(item.created_at).toLocaleString('id-ID', {
                            day: '2-digit',
                            month: 'short',
                            year: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit'
                        })}</td>

                    </tr>
                `
                bodyTableHistory.append(row)
            })
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}
