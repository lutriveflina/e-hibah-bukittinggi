<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password E-Hibah</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', 'Times New Roman', serif;
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
            position: relative;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23pattern)"/></svg>');
        }

        .header-content {
            position: relative;
            z-index: 1;
        }

        .logo {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
        }

        .header h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .header p {
            font-size: 16px;
            opacity: 0.9;
        }

        .content {
            padding: 40px 30px;
        }

        .greeting {
            font-size: 18px;
            color: #1f2937;
            margin-bottom: 25px;
        }

        .message {
            background: #f8fafc;
            border-left: 4px solid #3b82f6;
            padding: 20px;
            margin: 25px 0;
            border-radius: 0 8px 8px 0;
        }

        .message h3 {
            color: #1e40af;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .password-box {
            background: #fff;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            margin: 25px 0;
            position: relative;
        }

        .password-label {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .password {
            font-family: 'Courier New', monospace;
            font-size: 24px;
            font-weight: bold;
            color: #1e40af;
            background: #eff6ff;
            padding: 15px;
            border-radius: 6px;
            border: 1px solid #dbeafe;
            letter-spacing: 2px;
        }

        .security-notice {
            background: #fef3c7;
            border: 1px solid #f59e0b;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
        }

        .security-notice h4 {
            color: #92400e;
            margin-bottom: 10px;
            font-size: 16px;
            display: flex;
            align-items: center;
        }

        .security-notice h4::before {
            content: '⚠️';
            margin-right: 8px;
        }

        .security-notice p {
            color: #78350f;
            font-size: 14px;
            line-height: 1.5;
        }

        .instructions {
            background: #f0f9ff;
            border-radius: 8px;
            padding: 25px;
            margin: 25px 0;
        }

        .instructions h4 {
            color: #1e40af;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .instructions ol {
            color: #374151;
            padding-left: 20px;
        }

        .instructions li {
            margin-bottom: 8px;
            font-size: 14px;
        }

        .footer {
            background: #f9fafb;
            padding: 30px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
        }

        .footer p {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .contact-info {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }

        .contact-info p {
            color: #9ca3af;
            font-size: 12px;
        }

        @media (max-width: 600px) {
            body {
                padding: 10px;
            }

            .header {
                padding: 30px 20px;
            }

            .content {
                padding: 30px 20px;
            }

            .header h1 {
                font-size: 24px;
            }

            .password {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <div class="header-content">
                <div class="logo">EH</div>
                <h1>E-HIBAH</h1>
                <p>Sistem Informasi Hibah Elektronik</p>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="greeting">
                Yth. Bapak/Ibu Baru Pengguna E-Hibah,
            </div>

            <p>Kami telah memproses permintaan Akun Anda untuk aplikasi E-Hibah.</p>

            <div class="message">
                <h3>Informasi Password</h3>
                <p>Berikut adalah password yang telah dibuat khusus untuk akun Anda:</p>
            </div>

            <div class="password-box">
                <div class="password-label">Password Baru Anda</div>
                <div class="password" id="newPassword">{{ $password }}</div>
            </div>

            <div class="security-notice">
                <h4>Penting - Keamanan Akun</h4>
                <p>Demi keamanan akun Anda, sangat disarankan untuk segera mengganti password ini setelah berhasil login
                    ke sistem E-Hibah. Pastikan password baru yang Anda buat memenuhi standar keamanan yang kuat.</p>
            </div>

            <div class="instructions">
                <h4>Langkah Selanjutnya:</h4>
                <ol>
                    <li>Kunjungi portal E-Hibah di alamat resmi</li>
                    <li>Masukkan username dan password baru yang tertera di atas</li>
                    <li>Setelah berhasil login, segera ubah password melalui menu "Pengaturan Akun"</li>
                    <li>Pastikan password baru mengandung minimal 8 karakter dengan kombinasi huruf besar, huruf kecil,
                        angka, dan simbol</li>
                    <li>Jangan bagikan informasi login Anda kepada siapapun</li>
                </ol>
            </div>

            <p style="margin-top: 30px; color: #6b7280;">
                Jika Anda tidak merasa melakukan permintaan reset password ini, segera hubungi administrator sistem atau
                tim support E-Hibah untuk mendapatkan bantuan lebih lanjut.
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong>Tim E-Hibah</strong></p>
            <p>Sistem Informasi Hibah Elektronik</p>

            <div class="contact-info">
                <p>Email ini dikirim secara otomatis, mohon tidak membalas email ini.</p>
                {{-- <p>Untuk bantuan lebih lanjut, hubungi support@e-hibah.go.id</p> --}}
                <p>&copy; 2025 E-Hibah. Semua hak dilindungi undang-undang.</p>
            </div>
        </div>
    </div>

    <script>
        // Optional: Add copy to clipboard functionality
        document.addEventListener('DOMContentLoaded', function() {
            const passwordElement = document.getElementById('newPassword');

            passwordElement.addEventListener('click', function() {
                // Create temporary input element
                const tempInput = document.createElement('input');
                tempInput.value = this.textContent;
                document.body.appendChild(tempInput);

                // Select and copy
                tempInput.select();
                document.execCommand('copy');
                document.body.removeChild(tempInput);

                // Show feedback
                const originalText = this.textContent;
                this.textContent = 'Disalin!';
                this.style.background = '#dcfce7';
                this.style.color = '#16a34a';

                setTimeout(() => {
                    this.textContent = originalText;
                    this.style.background = '#eff6ff';
                    this.style.color = '#1e40af';
                }, 2000);
            });

            // Add hover effect hint
            passwordElement.title = 'Klik untuk menyalin password';
            passwordElement.style.cursor = 'pointer';
        });
    </script>
</body>

</html>
