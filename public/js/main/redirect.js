document.getElementById("findRate").addEventListener("click", function(event) {
    event.preventDefault();

    // Ambil nilai dari input dan select
    const arrivalDate = document.getElementById("arrivalDate").value;
    const departureDate = document.getElementById("departureDate").value;
    const numadult = document.getElementById("adults").value;

    // Cek apakah semua input sudah diisi
    if (arrivalDate && departureDate && numadult) {
        // Format tanggal yang sesuai untuk query string
        const [month, day, year] = arrivalDate.split('/');

        // Hitung jumlah malam (numnight)
        const startDate = new Date(arrivalDate);
        const endDate = new Date(departureDate);
        const timeDiff = endDate - startDate;
        const numnight = Math.ceil(timeDiff / (1000 * 3600 * 24)); // Menggunakan Math.ceil untuk pembulatan ke atas

        // Buat URL dengan query string
        const url = `https://beds24.com/booking2.php?date_date=${day}&fdate_monthyear=${month}/${year}&numnight=${numnight}&numadult=${numadult}&subcheck=&ownerid=91884&subgetdates=1&type=0&page=showprice&referer=BookingStrip`;

        // Redirect ke URL yang telah dibangun
        window.location.href = url;
    } else {
        // Redirect ke URL default tanpa parameter jika input tidak lengkap
        window.location.href = "https://beds24.com/booking2.php";
    }
});
