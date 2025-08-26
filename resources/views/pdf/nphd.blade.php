@extends('pdf._app')

@push('style')
    <style>
        @page {
            size: 215mm 330mm;
            margin: 18mm;
        }

        body {
            font-family: "Times New Roman", serif;
            max-width: 179mm;
            /* 215mm - 36mm (18mm * 2) */
            margin: 0 auto;
            line-height: 1.6;
            color: #000;
        }

        .judul-utama {
            text-align: center;
            font-weight: bold;
            font-size: 14px;
            line-height: 1.4;
            white-space: pre-line;
            margin-bottom: 20px;
        }

        .nomor-surat {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .section-header {
            font-weight: bold;
            text-transform: uppercase;
            border-bottom: 1px solid #000;
            padding-bottom: 2px;
            margin-top: 15px;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .paragraph-indent {
            text-align: justify;
            text-indent: 8mm;
            margin-bottom: 10px;
        }

        .no-indent {
            text-align: justify;
            text-indent: 0;
            margin-bottom: 10px;
        }

        .pasal {
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 8px;
        }

        .ttd-space {
            height: 28mm;
            border: none;
        }

        .signature-area {
            page-break-inside: avoid;
            margin-top: 30px;
        }

        .signature-box {
            text-align: center;
            border: none;
        }

        .materai-box {
            width: 40px;
            height: 20px;
            border: 1px dashed #666;
            display: inline-block;
            margin: 5px;
            text-align: center;
            font-size: 8px;
            line-height: 20px;
        }

        table {
            page-break-inside: avoid;
        }

        th,
        td {
            word-break: break-word;
            vertical-align: top;
        }

        .currency {
            text-align: right;
        }

        .angka-kurung {
            counter-reset: item;
            /* reset counter */
            list-style: none;
            /* hilangkan numbering default */
            padding-left: 20px;
        }

        .angka-kurung li {
            counter-increment: item;
            margin-bottom: 5px;
            text-align: justify;
        }

        .angka-kurung li::before {
            content: "(" counter(item) ") ";
            /* tampilkan (1), (2), (3) */
            font-weight: normal;
        }

        .signature-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .signature-col {
            width: 50%;
            vertical-align: top;
        }

        .materai-box {
            border: 1px dashed #000;
            width: 60px;
            height: 80px;
            margin: 10px auto;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .ttd-space {
            height: 80px;
            /* ruang tanda tangan */
        }

        .signature-line {
            border-bottom: 1px solid #000;
            margin: 0 auto 5px auto;
            width: 80%;
            text-align: center;
        }

        /* Print specific styles */
        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .page-break {
                page-break-before: always;
            }
        }

        /* Page counter for print */
        body {
            counter-reset: page-number;
        }

        @media print {
            @page {
                @bottom-center {
                    content: "- " counter(page) " -";
                    font-family: "Times New Roman", serif;
                    font-size: 10px;
                }
            }
        }
    </style>
@endpush

@section('pdf-content')
    <div class="container-fluid">
        <!-- Judul Utama -->
        <div class="judul-utama mb-3">
            NASKAH PERJANJIAN HIBAH DAERAH DALAM BENTUK UANG
        </div>
        <div class="judul-utama mb-3">
            PERJANJIAN
        </div>
        <div class="judul-utama mb-3">
            ANTARA
        </div>
        <div class="judul-utama mb-3">
            PEMERINTAH DAERAH KOTA BUKITTINGGI
        </div>
        <div class="judul-utama mb-3">
            DAN
        </div>
        <div class="judul-utama mb-3">
            PENERIMA HIBAH
        </div>

        <!-- Nomor Surat -->
        <div class="nomor-surat">
            Nomor: ...................
        </div>

        <!-- Para Pihak -->
        <div class="mb-4">
            <p class="paragraph-indent">
                Pada hari ini, ..............., tanggal ..... bulan ...... Tahun ......, yang bertanda tangan di bawah ini:
            </p>

            <p class="no-indent">
                <strong>PIHAK PERTAMA:</strong> [ nama_jabatan_pejabat ], [ nama_pejabat ], NIP
                [ nip_pejabat ], dalam hal ini bertindak untuk dan atas nama Pemerintah Daerah Kota Bukittinggi,
                berkedudukan di [ alamat_instansi ], selanjutnya disebut <strong>PIHAK PERTAMA</strong>.
            </p>

            <p class="no-indent">
                <strong>PIHAK KEDUA:</strong> [ nama_lembaga_penerima ], yang diwakili oleh
                [ nama_penanggung_jawab ], [ identitas_nik_akta ], beralamat di [ alamat_penerima ], selanjutnya
                disebut <strong>PIHAK KEDUA</strong>.
            </p>
        </div>

        <!-- Pertimbangan/Dasar Hukum -->
        <div class="mb-4">
            <h6 class="section-header">Pertimbangan</h6>
            <div class="no-indent">
                Bahwa PIHAK PERTAMA dan PIHAK KEDUA sepakat untuk mengadakan Perjanjian Hibah Daerah dengan pertimbangan
                sebagai berikut:
            </div>
            <ol class="mb-3">
                <li class="list-number">Undang-Undang Nomor 23 Tahun 2014 tentang Pemerintahan Daerah</li>
                <li>Peraturan Pemerintah Nomor 12 Tahun 2019 tentang Pengelolaan Keuangan Daerah</li>
                <li>Peraturan Menteri Dalam Negeri Nomor 32 Tahun 2011 tentang Pedoman Pemberian Hibah dan Bantuan
                    Sosial</li>
                <li>[ peraturan_daerah_terkait ]</li>
                <li>[ dokumen_anggaran_daerah ]</li>
            </ol>
        </div>

        <!-- Ketentuan Hibah -->
        <div class="mb-4">
            <h6 class="section-header">Ketentuan Hibah</h6>

            <div class="pasal">Pasal 1<br>Nilai dan Tujuan Hibah</div>
            <ol class="angka-kurung">
                <li>PIHAK PERTAMA memberikan hibah kepada PIHAK KEDUA sebesar <strong>Rp
                        {{ number_format($nominal_rab, 0, ',', '.') }}</strong>
                    ({{ ucwords(App\helpers\General::Terbilang($nominal_rab)) }} Rupiah).</li>
                <li>Hibah sebagaimana dimaksud pada ayat (1) diberikan untuk [ tujuan_hibah ].</li>
            </ol>

            <div class="pasal">Pasal 2<br>Ruang Lingkup dan Jangka Waktu</div>
            <p class="paragraph-indent">
                (1) Ruang lingkup hibah meliputi [ ruang_lingkup_hibah ].
            </p>
            <p class="paragraph-indent">
                (2) Jangka waktu pelaksanaan hibah adalah [ jangka_waktu ] terhitung sejak penandatanganan
                perjanjian ini.
            </p>

            <div class="pasal">Pasal 3<br>Penyaluran Hibah</div>
            <p class="paragraph-indent">
                (1) Penyaluran hibah dilakukan melalui rekening [ nomor_rekening_penerima ] atas nama
                [ nama_rekening ].
            </p>
            <p class="paragraph-indent">
                (2) Penyaluran hibah dilaksanakan setelah PIHAK KEDUA memenuhi persyaratan administrasi yang ditentukan.
            </p>

            <div class="pasal">Pasal 4<br>Pelaporan dan Pengawasan</div>
            <p class="paragraph-indent">
                (1) PIHAK KEDUA wajib menyampaikan laporan penggunaan hibah kepada PIHAK PERTAMA setiap
                [ periode_laporan ].
            </p>
            <p class="paragraph-indent">
                (2) PIHAK PERTAMA berhak melakukan pengawasan terhadap penggunaan hibah yang diberikan.
            </p>

            <div class="pasal">Pasal 5<br>Pengembalian Sisa Hibah</div>
            <p class="paragraph-indent">
                PIHAK KEDUA wajib mengembalikan sisa hibah yang tidak digunakan sesuai tujuan kepada kas daerah.
            </p>
        </div>

        <!-- Tabel RAB -->
        <div class="mb-4">
            <h6 class="section-header">Rencana Anggaran Biaya (RAB)</h6>
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Rincian Kegiatan</th>
                        <th>Volume</th>
                        <th>Satuan</th>
                        <th>Harga Satuan</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kegiatans as $kegiatan)
                        <tr class="bg-warning">
                            <td colspan="4" class="text-start">{{ $kegiatan->nama_kegiatan }}</td>
                            <td class="text-end">
                                {{ number_format(
                                    collect($kegiatan->rincian)->pluck('subtotal')->filter(fn($val) => is_numeric($val))->sum(),
                                    0,
                                    ',',
                                    '.',
                                ) }}
                            </td>
                        </tr>
                        @foreach ($kegiatan->rincian as $rincian)
                            <tr class="">
                                <td class="text-start">{{ $rincian->keterangan }}</td>
                                <td>{{ $rincian->volume }}</td>
                                <td class="text-start">{{ $rincian->satuan->name }}</td>
                                <td class="text-end">{{ number_format($rincian->harga, 0, ',', '.') }}
                                </td>
                                <td class="text-end">{{ number_format($rincian->subtotal, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                    <tr class="bg-warning">
                        <th colspan="4">Total</th>
                        <th colspan="4" class="text-end">{{ number_format($nominal_rab, 0, ',', '.') }}</th>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Penggunaan Hibah -->
        <div class="mb-4">
            <h6 class="section-header">Penggunaan Hibah</h6>
            <p class="paragraph-indent">
                Hibah yang diberikan akan digunakan untuk [ penggunaan_hibah ] dengan output yang diharapkan berupa
                [ output_diharapkan ].
            </p>
            <p class="paragraph-indent">
                Jadwal pelaksanaan kegiatan adalah [ jadwal_pelaksanaan ].
            </p>
        </div>

        <!-- Larangan dan Sanksi -->
        <div class="mb-4">
            <h6 class="section-header">Larangan dan Sanksi</h6>
            <div class="no-indent">
                PIHAK KEDUA dilarang:
            </div>
            <ol>
                <li>Menggunakan hibah untuk kepentingan di luar tujuan yang telah ditetapkan</li>
                <li>Memindahtangankan hibah kepada pihak lain tanpa persetujuan PIHAK PERTAMA</li>
                <li>Melakukan kegiatan yang bertentangan dengan peraturan perundang-undangan</li>
                <li>[ larangan_tambahan ]</li>
            </ol>
            <p class="paragraph-indent">
                Apabila PIHAK KEDUA melanggar ketentuan tersebut di atas, maka PIHAK PERTAMA berhak menghentikan hibah
                dan meminta pengembalian hibah yang telah diberikan.
            </p>
        </div>

        <!-- Penutup -->
        <div class="mb-4">
            <h6 class="section-header">Penutup</h6>
            <p class="paragraph-indent">
                Perjanjian ini dibuat dalam 3 (tiga) rangkap yang mempunyai kekuatan hukum yang sama, masing-masing
                untuk PIHAK PERTAMA, PIHAK KEDUA, dan arsip.
            </p>
            <p class="paragraph-indent">
                Hal-hal yang belum diatur dalam perjanjian ini akan ditetapkan kemudian berdasarkan kesepakatan kedua
                belah pihak sesuai dengan peraturan perundang-undangan yang berlaku.
            </p>
        </div>

        <div class="text-end mb-3">
            [ tempat ], [ tanggal_lengkap ]
        </div>

        <!-- Tanda Tangan -->
        <div class="signature-area">
            <table class="signature-table">
                <tr>
                    <!-- PIHAK KEDUA -->
                    <td class="signature-col" style="text-align:center;">
                        <strong>PIHAK KEDUA</strong><br>
                        [ nama_lembaga_penerima ]<br>
                        [ jabatan_penerima ]

                        <div class="ttd-space"></div>

                        <div class="signature-line">
                            <strong>[ nama_penanggung_jawab ]</strong>
                        </div>
                        <div>[ jabatan_penanggung_jawab ]</div>
                        <div>[ nik_penanggung_jawab ]</div>
                    </td>

                    <!-- PIHAK PERTAMA -->
                    <td class="signature-col" style="text-align:center;">
                        <strong>PIHAK PERTAMA</strong><br>
                        Pemerintah Daerah Kota Bukittinggi<br>
                        [ nama_jabatan_pejabat ]

                        <div class="ttd-space"></div>

                        <div class="signature-line">
                            <strong>[ nama_pejabat ]</strong>
                        </div>
                        <div>[ jabatan_pejabat ]</div>
                        <div>NIP [ nip_pejabat ]</div>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    {{--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script> --}}
@endsection
