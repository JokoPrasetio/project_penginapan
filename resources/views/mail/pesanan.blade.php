<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notifikasi Email</title>
</head>
<body>
    <div class="email-container" style="margin-top: 1rem">
        <div class="content">
            <div
                style="max-width: 600px; margin: auto; background: #F5F5F5; padding: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); border-radius: 10px;">
                <p style="margin-bottom: 20px; color:black">Pemberitahuan Pesanan dan Minuman</p>
                <ul style="background-color: #62a6eb; padding: 15px; border-radius: 5px;">
                <li style="color: white; font-weight:600">Terdapat Pesanan dari kamar: {{ $payload['name_room'] ?? '-'}}
                    </li>

                </ul>
                <p style="margin-bottom: 12px; color:rgb(54, 51, 51)">Konfirmasi Sekarang di website</p>
                <p style="margin-bottom: 20px; color:black">Terimakasih</p>
            </div>

        <div class="footer" style="text-align:center; margin-top:2rem">
            <p style="color:black">&copy; 2024. All rights reserved.</p>
        </div>
        </div>
    </div>
</body>
</html>
