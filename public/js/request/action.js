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
    $('#modal_detail').modal('show');

    var confirmDetail =$("#confirm_detail_pesanan")
    confirmDetail.html(`${data?.name}  (${data?.name_room})`)
    var bodyTable = $("#body_table_detail")

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

function historyApproval(page = 1) {
    const historyModal = $("#modal_history");
    const bodyTableHistory = $("#body_table_history");
    const perPage = 10; // Jumlah item per halaman

    historyModal.modal("show");
    bodyTableHistory.empty();

    fetch(`/history?page=${page}&limit=${perPage}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            const transactions = data.data;
            const totalPages = data.last_page;
            const currentPage = data.current_page; // Ambil halaman saat ini dari data
            // Render rows
            bodyTableHistory.empty();
            transactions.forEach((item, index) => {
                let row = `
                    <tr>
                        <td>${(currentPage - 1) * perPage + index + 1}</td>
                        <td>
                            <button class="btn ${item.status === 'approved' ? 'btn-success' : 'btn-danger'}" style="margin-right: 0.5rem;">
                                ${item.status === 'approved' ? 'Diterima' : 'Ditolak'}
                            </button>
                        </td>
                        <td>${item.name}</td>
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
                `;
                bodyTableHistory.append(row);
            });

            // Add pagination controls
            let pagination = '<nav><ul class="pagination">';

            // Previous page
            pagination += `
                <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                    <a class="page-link" href="#" aria-label="Previous" ${currentPage === 1 ? '' : `onclick="historyApproval(${currentPage - 1})"`}>
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            `;

            // Page numbers
            for (let i = 1; i <= totalPages; i++) {
                pagination += `
                    <li class="page-item ${i === currentPage ? 'active' : ''}">
                        <a class="page-link" href="#" ${i === currentPage ? '' : `onclick="historyApproval(${i})"`}>${i}</a>
                    </li>
                `;
            }

            // Next page
            pagination += `
                <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                    <a class="page-link" href="#" aria-label="Next" ${currentPage === totalPages ? '' : `onclick="historyApproval(${currentPage + 1})"`}>
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            `;

            pagination += '</ul></nav>';
            bodyTableHistory.append(pagination);
        })


        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}
