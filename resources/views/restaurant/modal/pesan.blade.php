<div class="modal fade" id="pesanModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Order</h4>
            </div>
            <form action="/transaction/restaurant" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="container">
                    <div class="row">
                            <div class="col-md-12" id="itemBasket">
                            </div>
                            <div class="col-md-5">
                                <button class="btn btn-sm btn-primary">Tax 10%</button>
                                <button class="btn btn-sm btn-primary">Service Charge 5% </button>
                                <div class="form-group" style="margin-top: 0.5rem;">

                                    <p style="font-weight: 400; font-size:15px;">Total:
                                    <span style="font-weight: 600; font-size:18px;" id="totalPrice">0</span>
                                </div>
                                <div class="alert alert-info alert-dismissible" role="alert" style="font-size: 15px; margin-bottom:12px;">
                                    <strong>You Must Fill In The Data Below!</strong>
                                  </div>
                                <div class="form-group">
                                    <label for="edit_name">Name</label>
                                    <input type="text" class="form-control" name="name" id="edit_name" placeholder="Input in here ..." required>
                                </div>
                                <div class="form-group">
                                    <label for="room_name">Room Number</label>
                                    <input type="text" class="form-control" name="name_room" id="room_name" placeholder="Input in here ..." required>
                                </div>
                                <div class="form-group">
                                    <label for="whatsapp_number">Whatsapp</label>
                                    <input type="number" class="form-control" name="no_wa" id="whatsapp_number" placeholder="Input in here ..." required>
                                    <input type="hidden" name="selected_items" id="selectedItemsInput">
                                </div>
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" name="date" id="date" placeholder="Input in here ..." required>
                                </div>
                                <div class="form-group">
                                    <label for="whatsapp_time">Time</label>
                                    <input type="time" class="form-control" name="time" id="time" placeholder="Input in here ..." required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="submitForm()">Pesan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Dapatkan waktu saat ini dalam UTC dan tambahkan offset UTC+7 (420 menit)
    var now = new Date();
    var utcOffset = 420; // 420 menit = 7 jam
    now.setMinutes(now.getMinutes() + now.getTimezoneOffset() + utcOffset);

    // Format jam dan menit dengan padStart untuk dua digit
    var hours = String(now.getHours()).padStart(2, '0');
    var minutes = String(now.getMinutes()).padStart(2, '0');
    var currentTime = hours + ':' + minutes;

    // Setel nilai default waktu pada input time
    document.getElementById('time').value = currentTime;

    // Dapatkan tanggal hari ini dalam format YYYY-MM-DD
    var today = now.toISOString().split('T')[0];

    // Jika waktu sekarang adalah 00:00 hingga 06:59, tambahkan satu hari ke tanggal hari ini
    if (hours < 7) {
        now.setDate(now.getDate() + 1);
        today = now.toISOString().split('T')[0];
    }

    // Setel nilai default dan min untuk input tanggal
    var dateInput = document.getElementById('date');
    dateInput.value = today;
    dateInput.setAttribute('min', today);

    // Fungsi untuk mengatur min time jika tanggal adalah hari ini
    document.getElementById('date').addEventListener('change', function() {
        var selectedDate = this.value;
        var now = new Date();
        now.setMinutes(now.getMinutes() + now.getTimezoneOffset() + utcOffset);
        if (selectedDate === today) {
            // Format waktu tanpa detik
            var hours = String(now.getHours()).padStart(2, '0');
            var minutes = String(now.getMinutes()).padStart(2, '0');
            var timeNow = hours + ':' + minutes;
            document.getElementById('time').setAttribute('min', timeNow);
        } else {
            document.getElementById('time').removeAttribute('min');
        }
    });
</script>



