<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <!-- <img src="{{ public_path('storage/01.PNG') }}" class="bgimg"> -->
    {{--
    <div class="row">
        <img src="{{ public_path('storage/images/01.png') }}" class="bgimg">
    </div> --}}

    <table style="width: 688px;">
        <tbody>
            <tr>
                <td style="width: 649px;"><img src="{{ public_path('storage/images/kop.png') }}" style="width: 600px; height: 100px;"> </td>
                <td><a style="font-size: 5pt;">No : {{ $id }}</a></td>
            </tr>
        </tbody>
    </table>
    <!-- DivTable.com -->
    <table style="width: 100%; text-align: center;">
        <tbody>
            <tr>
                <td style="width: 49.9318%;">&nbsp;<strong style="font-size: 24pt;">BIODATA PESERTA</strong></td>
            </tr>
            <tr>
                <td style="width: 49.9318%;">&nbsp;<strong style="font-size: 14pt;">BIMBINGAN TEKNIS</strong></td>
            </tr>
            <tr>
                <td style="width: 49.9318%;">&nbsp;<strong style="font-size: 14pt;">PEMANFAATAN TIK UNTUK PENINGKATAN MUTU DIRI GTK PAUD DAN DIKMAS</strong></td>
            </tr>
            <tr>
                <td style="width: 49.9318%;">&nbsp;<strong style="font-size: 14pt;">PP PAUD DAN DIKMAS JAWA TENGAH</strong></td>
            </tr>
            <tr>
                <td style="width: 49.9318%;">&nbsp;<strong style="font-size: 14pt;">Di Kotel Lorin Karanganyar, Tanggal 21 s.d 23 Oktober 2019</strong></td>
            </tr>
        </tbody>
    </table>
    <!-- DivTable.com -->

    <table style="width: 100%;">
        <tbody>
            <tr style="height: 23px;">
                <td style="height: 23px; width: 182px;" colspan="2">&nbsp;</td>
                <td style="height: 23px; width: 12px;">&nbsp;</td>
                <td style="height: 23px; width: 805px;">&nbsp;</td>
            </tr>
            <tr style="height: 23px;">
                <td style="height: 23px; width: 182px;" colspan="2">NAMA</td>
                <td style="height: 23px; width: 805px;">:
                    <?php echo $nama ?>
                </td>
                <td style="height: 23px; width: 805px;">&nbsp;</td>
            </tr>
            <tr style="height: 23px;">
                <td style="height: 23px; width: 182px;" colspan="2">NIP</td>
                <td style="height: 23px; width: 805px;">: {{ $nip }}</td>
                <td style="height: 23px; width: 805px;">&nbsp;</td>
            </tr>
            <tr style="height: 23px;">
                <td style="height: 23px; width: 182px;" colspan="2">NPWP&nbsp;</td>
                <td style="height: 23px; width: 805px;">: {{ $npwp }}</td>
                <td style="height: 23px; width: 805px;">&nbsp;</td>
            </tr>
            <tr style="height: 23px;">
                <td style="height: 23px; width: 182px;" colspan="2">TEMPAT/TGL LAHIR&nbsp;</td>
                <td style="height: 23px; width: 805px;">: {{ $ttl }}</td>
                <td style="height: 23px; width: 805px;">&nbsp;</td>
            </tr>
            <tr style="height: 23px;">
                <td style="height: 23px; width: 182px;" colspan="2">JENIS KELAMIN&nbsp;</td>
                <td style="height: 23px; width: 805px;">: {{ $jk }}</td>
                <td style="height: 23px; width: 805px;">&nbsp;</td>
            </tr>
            <tr style="height: 23px;">
                <td style="height: 23px; width: 182px;" colspan="2">PANGKAT/GOLONGAN&nbsp;</td>
                <td style="height: 23px; width: 805px;">: {{ $pangkat }}/{{ $golongan }}</td>
                <td style="height: 23px; width: 805px;">&nbsp;</td>
            </tr>
            <tr style="height: 23px;">
                <td style="height: 23px; width: 182px;" colspan="2">JABATAN&nbsp;</td>
                <td style="height: 23px; width: 805px;">: {{ $jabatan }}</td>
                <td style="height: 23px; width: 805px;">&nbsp;</td>
            </tr>
            <tr style="height: 23px;">
                <td style="height: 23px; width: 182px;" colspan="2">UNIT KERJA&nbsp;</td>
                <td style="height: 23px; width: 805px;">: {{ $unit_kerja }}</td>
                <td style="height: 23px; width: 805px;">&nbsp;</td>
            </tr>
            <tr style="height: 23px;">
                <td style="height: 23px; width: 182px;" colspan="2">ALAMAT&nbsp;</td>
                <td style="height: 23px; width: 805px;">: {{ $alamat_unit_kerja }}</td>
                <td style="height: 23px; width: 805px;">&nbsp;</td>
            </tr>
            <tr style="height: 23px;">
                <td style="height: 23px; width: 39px;">&nbsp;</td>
                <td style="height: 23px; width: 143px;">KAB/KOTA</td>
                <td style="height: 23px; width: 805px;">: {{ $kabkota }}</td>
                <td style="height: 23px; width: 805px;">&nbsp;</td>
            </tr>
            <tr style="height: 23px;">
                <td style="height: 23px; width: 39px;">&nbsp;</td>
                <td style="height: 23px; width: 143px;">PROPINSI</td>
                <td style="height: 23px; width: 805px;">: {{ $propinsi }}</td>
                <td style="height: 23px; width: 805px;">&nbsp;</td>
            </tr>
            <tr style="height: 23px;">
                <td style="height: 23px; width: 39px;">&nbsp;</td>
                <td style="height: 23px; width: 143px;">TELP KANTOR</td>
                <td style="height: 23px; width: 805px;">: {{ $tlp_kantor }}</td>
                <td style="height: 23px; width: 805px;">&nbsp;</td>
            </tr>
            <tr style="height: 23px;">
                <td style="height: 23px; width: 39px;">&nbsp;</td>
                <td style="height: 23px; width: 143px;">NO HP</td>
                <td style="height: 23px; width: 805px;">: {{ $no_hp }}</td>
                <td style="height: 23px; width: 805px;">&nbsp;</td>
            </tr>
            <tr style="height: 23px;">
                <td style="height: 23px; width: 182px;" colspan="2">PENDIDIKAN TERAKHIR</td>
                <td style="height: 23px; width: 805px;">: {{ $pendidikan }}</td>
                <td style="height: 23px; width: 805px;">&nbsp;</td>
            </tr>
            <tr style="height: 23px;">
                <td style="height: 23px; width: 182px;" colspan="2">EMAIL</td>
                <td style="height: 23px; width: 805px;">: {{ $email }}</td>
                <td style="height: 23px; width: 805px;">&nbsp;</td>
            </tr>
            <tr style="height: 23px;">
                <td style="height: 23px; width: 182px;" colspan="2">BARCODE<br /><img src="data:image/png;base64,{{DNS1D::getBarcodePNG($id, 'C39',3,75)}}" alt="barcode" /></td>
                <td style="height: 23px; width: 805px;">&nbsp;</td>
                <td style="height: 23px; width: 805px;">&nbsp;</td>
            </tr>
        </tbody>
    </table>
    <!-- DivTable.com -->

    <table style="width: 100%;">
        <tbody>
            <tr style="height: 23px;">
                <td style="width: 53.6385%; height: 109px;" rowspan="5"><img src="{{ public_path('storage/images/footer.png') }}" style="width: 300px; height: 80px;"></td>
                <td style="width: 22.3615%; height: 23px;">Karanganyar, 21 Oktober 2019</td>
            </tr>
            <tr style="height: 23px;">
                <td style="width: 10%; height: 23px;">&nbsp;</td>
            </tr>
            <tr style="height: 17px;">
                <td style="width: 10%; height: 17px;">&nbsp;</td>
            </tr>
            <tr style="height: 23px;">
                <td style="width: 10%; height: 23px;">{{ $nama }}</td>
            </tr>
            <tr style="height: 23px;">
                <td style="width: 10%; height: 23px;">NIP. {{ $nip }}</td>
            </tr>
        </tbody>
    </table>


    <div class="page-break"></div>
    {{-- PAGE 2 --}}


    <table style="width: 688px;">
        <tbody>
            <tr>
                <td style="width: 649px;"><img src="{{ public_path('storage/images/kop.png') }}" style="width: 600px; height: 100px;"></td>
                <td><a style="font-size: 5pt;">No : {{ $id }}</a></td>
            </tr>
        </tbody>
    </table>
    <!-- DivTable.com -->
    <table style="width: 100%; text-align: center;">
        <tbody>
            <tr>
                <td style="width: 49.9318%;">&nbsp;<strong style="font-size: 24pt;">TANDA TERIMA ATK</strong></td>
            </tr>
            <tr>
                <td style="width: 49.9318%;">&nbsp;<strong style="font-size: 14pt;">BIMBINGAN TEKNIS</strong></td>
            </tr>
            <tr>
                <td style="width: 49.9318%;">&nbsp;<strong style="font-size: 14pt;">PEMANFAATAN TIK UNTUK PENINGKATAN MUTU DIRI GTK PAUD DAN DIKMAS</strong></td>
            </tr>
            <tr>
                <td style="width: 49.9318%;">&nbsp;<strong style="font-size: 14pt;">PP PAUD DAN DIKMAS JAWA TENGAH</strong></td>
            </tr>
            <tr>
                <td style="width: 49.9318%;">&nbsp;<strong style="font-size: 14pt;">Di Kotel Lorin Karanganyar, Tanggal 21 s.d 23 Oktober 2019</strong></td>
            </tr>
            <tr>
                <td></td>
            </tr>
        </tbody>
    </table>
    <!-- DivTable.com -->

    <table style="width: 100%;">
        <tbody>
            <tr>
                <td style="text-align: center;"><img src="{{ public_path('storage/images/atk.png') }}" style="width: 600px; height: 250px;"></td>
            </tr>
            <tr>
                <td></td>
            </tr>
        </tbody>
    </table>
    <!-- DivTable.com -->


    <table style="width: 100%;">
        <tbody>
            <tr style="height: 23px;">
                <td style="width: 53.6385%; height: 109px;" rowspan="5"><img src="{{ public_path('storage/images/footer.png') }}" style="width: 300px; height: 80px;"></td>
                <td style="width: 22.3615%; height: 23px;">Karanganyar, 21 Oktober 2019</td>
            </tr>
            <tr style="height: 23px;">
                <td style="width: 10%; height: 23px;">&nbsp;</td>
            </tr>
            <tr style="height: 17px;">
                <td style="width: 10%; height: 17px;">&nbsp;</td>
            </tr>
            <tr style="height: 23px;">
                <td style="width: 10%; height: 23px;">{{ $nama }}</td>
            </tr>
            <tr style="height: 23px;">
                <td style="width: 10%; height: 23px;">NIP. {{ $nip }}</td>
            </tr>
        </tbody>
    </table>

</body>

</html>