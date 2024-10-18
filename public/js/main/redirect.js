document.getElementById("findRate").addEventListener("click", function(event) {
    event.preventDefault();

   const adult = document.getElementById('adults').value;
   const arrivalDate = document.getElementById('arrivalDate').value;
   const night = document.getElementById('night').value
    // const children = document.getElementById('children').value;

   const arrival = new Date(arrivalDate)
   const fdate_date = arrival.getDate();
   const fdate_monthyear = `${arrival.getFullYear()}-${String(arrival.getMonth() + 1).padStart(2, '0')}`;

   const url = `https://beds24.com/booking2.php?fdate_date=${fdate_date}&fdate_monthyear=${fdate_monthyear}&numnight=${night}&numadult=${adult}&ownerid=127611&propid=243917`

   window.location.href = url;
});


document.addEventListener('DOMContentLoaded', function() {
    const arrivalDateInput = document.getElementById('arrivalDate');

    // Mendapatkan tanggal saat ini
    const today = new Date();

    // Format tanggal menjadi YYYY-MM-DD (atau format lain yang diinginkan)
    const formattedDate = today.toISOString().split('T')[0];

    // Mengatur nilai input menjadi tanggal saat ini
    arrivalDateInput.value = formattedDate;

});

