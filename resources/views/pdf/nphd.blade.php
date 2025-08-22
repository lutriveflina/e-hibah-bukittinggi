@extends('pdf._app')

@section('pdf-content')
    <div class="w-100 d-flex flex-row justify-content-end mb-3">
        <p>22 Agustus 2021</p>
    </div>
    <table class="table table-borderless">
        <tr>
            <td style="width: 10%;">Nomor</td>
            <td style="width: 1%;">:</td>
            <td style="width: 39%;"></td>
            <td class="text-end">22 Agustus 2025</td>
        </tr>
        <tr>
            <td>Sifat</td>
            <td>:</td>
            <td></td>
            <td class="text-center">
                <dt>Kepada</dt>
            </td>
        </tr>
        <tr>
            <td>Lampiran</td>
            <td>:</td>
            <td></td>
            <td class="text-center" rowspan="2">Yth. Kepala Bidang Pemuda<br>Dinas Pemuda dan Olahraga</td>
        </tr>
        <tr>
            <td>Hal</td>
            <td>:</td>
            <td>Permohonan Penandatanganan<br>NPHD a.n. Koni</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td class="ps-2">Di</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-center">
                <dt>Bukittinggi</dt>
            </td>
        </tr>
    </table>

    <div class="container">
        <div class="letter-details">
            <table>
                <tr>
                    <td>Salam</td>
                    <td>:</td>
                    <td>Sehubungan dengan Permohonan Hibah Daerah yang diajukan, Kami:</td>
                </tr>
            </table>
        </div>

        <div class="letter-details">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>Masjid Al Barokah</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>di Jakarta pusat</td>
                </tr>
                <tr>
                    <td>Nommal Sekolah</td>
                    <td>:</td>
                    <td>Rp. 21.250.000</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>{dua puluh satu juta dua ratus lima puluh ribu rupiah}</td>
                </tr>
            </table>
        </div>

        <div class="letter-body">
            <p>dengan ini disampaikan hal sebagai berikut:</p>

            <ol class="numbered-list">
                <li>Rincian anggaran biaya/renvanan penggunaan Hibah degiknitig telah sesuai dengan rincian anggaran
                    biaya.renvana penggunaan hibah yang direkomendasikan oleh bidan olahraga Dinas pemuda dan olahraga.</li>
                <li>berkenaan hal tersebut kami mohon untuk dapat dilaksanakan penandatangan nahkah perjanjian hibah daerah
                    sesuai dengan ketentuan yang tercantum dalam peraturan gubernur no 27 tahun 2023 tentang perubahan atasw
                    peraturan gubernut nomor 35 tahun 2021 tentang tata cara pemberian gibah dan bantuan sosial..</li>
            </ol>
        </div>

        <div class="closing">
            <p>Demikian surat permohonan penandatangan NPHD ini disampaikan dan kerja samanya diucapkan terimakasih</p>
        </div>

        <div class="signature-section">
            <div class="signature-location">
                <strong>PENERIMA HDM,</strong>
            </div>

            <div style="margin-top: 60px;">
                <div class="signature-name">
                    <strong>( meterai 10.000 )</strong>
                </div>
                <div class="signature-title">
                    <strong>(ketual puteri)</strong>
                </div>
            </div>
        </div>
    </div>
@endsection
