<html>
<head>
    <title>Cetak PDF</title>
    <style>
body {
  background-color: white;
}

th {
  display: table-cell;
  vertical-align: inherit;
  font-weight: bold;
  text-align: left;
  font-family: Times New Roman, serif;
  font-style: normal;
  font-weight: normal;
}
</style>
</head>
    <body>
             <?php 
                
                $b=$vhc->row_array();
                
                if ($vhc->num_rows() < 1) {
                    redirect('admin/hakcipta');
                }
            ?>

        <table border="0" width="100%">
            <tr>
                
                 <th colspan="4" align="right">
                    
                </th>
                <th colspan="1" align="left">
                    <br><br>
                    Lampiran I <br> Peraturan Menteri Kehakiman R.I. <br>Nomor : M.01-HC.03.01 Tahun 1987
                    <br><br><br>
                </th>
            </tr>
            <tr>
                
            <th colspan="5" style="text-align: center;"><h4><u>PERMOHONAN PENDAFTARAN CIPTAAN</u></h4></th>
                
            </tr>
           
            <tr>
                <th colspan="1" align="left"  style="line-height: 1;">I.</th>
                <th colspan="4" align="left"  style="line-height: 1;">Pencipta :</th>
                
            </tr>
            <tr>
                <th width="5%" colspan="1" align="left"></th>
                <th width="41%" colspan="1" align="left">1. Nama</th>
                <th align="left">:</th>
                <th width="54%" colspan="2" align="left"><?php echo $b['hc_nama']; ?></th>
                
            </tr>
            <tr>
                <th colspan="1" align="left"></th>
                <th colspan="1" align="left">2. Kewarganegaraan</th>
                <th align="left">:</th>
                <th colspan="2" align="left"><?php echo $b['hc_warganegara']; ?></th>
                
            </tr>

            <tr>
                <th colspan="1" align="left"></th>
                <th colspan="1" align="left">3. Alamat</th>
                <th align="left">:</th>
                <th colspan="2" align="left"><?php echo $b['hc_alamat']; ?></th>
               
            </tr>
            <tr>
                <th colspan="1" align="left"></th>
                <th colspan="1" align="left">4. Kabupaten/Kota</th>
                <th align="left">:</th>
                <th colspan="2" align="left" style="text-transform: capitalize;"><?php echo strtolower($b['namakabkota']); ?></th>
               
            </tr>
             <tr>
                <th colspan="1" align="left"></th>
                <th colspan="1" align="left">5. Provinsi</th>
                <th align="left">:</th>
                <th colspan="2" align="left" style="text-transform: capitalize;"><?php echo strtolower($b['namaprov']); ?></th>
               
            </tr>
            <tr>
                <th colspan="1" align="left"></th>
                <th colspan="1" align="left"></th>
                <th align="left"></th>
                <th colspan="2" align="left">Klinik HKI Kementerian Perindustrian<br>Jl. Jend. Gatot Subroto Kav. 52-53 Jakarta Selatan <br>(Alamat Surat Menyurat) </th>
                
            </tr>
            <tr>
                <th colspan="1" align="left" style="line-height: 2;">II.</th>
                <th colspan="4" align="left" style="line-height: 2;">Pemegang Hak Cipta :</th>
                
            </tr>
            <tr>
                <th colspan="1" align="left"></th>
                <th colspan="1" align="left">1. Nama</th>
                <th align="left">:</th>
                <th colspan="2" align="left"><?php echo $b['hc_namapmg']; ?></th>
                
            </tr>
            <tr>
                <th colspan="1" align="left"></th>
                <th colspan="1" align="left">2. Kewarganegaraan</th>
                <th align="left">:</th>
                <th colspan="2" align="left"><?php echo $b['hc_warganegarapmg']; ?></th>
                
            </tr>
            <tr>
                <th colspan="1" align="left"></th>
                <th colspan="1" align="left">3. Alamat</th>
                <th align="left">:</th>
                <th colspan="2" align="left"><?php echo $b['hc_alamatpmg']; ?></th>
                
            </tr>
            <tr>
                <th colspan="1" align="left" style="line-height: 2;">III.</th>
                <th colspan="4" align="left" style="line-height: 2;">Kuasa :</th>
                
            </tr>
            <tr>
                <th colspan="1" align="left"></th>
                <th colspan="1" align="left">1. Nama</th>
                <th align="left">:</th>
                <th colspan="2" align="left"><?php echo $b['hc_namakuasa']; ?></th>
                
            </tr>
            <tr>
                <th colspan="1" align="left"></th>
                <th colspan="1" align="left">2. Kewarganegaraan</th>
                <th align="left">:</th>
                <th colspan="2" align="left"><?php echo $b['hc_warganegarakuasa']; ?></th>
                
            </tr>
            <tr>
                <th colspan="1" align="left"></th>
                <th colspan="1" align="left">3. Alamat</th>
                <th align="left">:</th>
                <th colspan="2" align="left"><?php echo $b['hc_alamatkuasa']; ?></th>
                
            </tr>
            
                        
            <tr>
                <th align="left" style="line-height: 3; padding-bottom: 15;">IV.</th>
                <th colspan="1" align="left">Jenis dari judul ciptaan yang dimohonkan</th>
                <th align="left">:</th>
                <th colspan="3" align="left"><?php echo $b['namacipta']; ?></th>
            </tr>
            <tr>
                <th colspan="1" style="vertical-align:text-top;">V.</th>
                <th colspan="1" style="vertical-align:text-top;">Tanggal dan tempat di-umumkan <br> untuk pertama kali di wilayah<br> Indonesia atau di luar wilayah Indonesia </th>
                <th style="vertical-align:text-top;">:</th>
                <th colspan="2" style="vertical-align:text-top;"><?php echo $b['hc_tempat'] .", ". $b['hc_tglhc']; ?></th>
            </tr>
            <tr>
                <th colspan="1" style="vertical-align:text-top;">VI.</th>
                <th colspan="1" style="vertical-align:text-top;">Uraian ciptaan </th>
                <th style="vertical-align:text-top;">:</th>
                <th colspan="2" align="left" style="text-align: justify;height:320px; vertical-align: text-top;"><?php echo $b['hc_uraian']; ?></th>
            </tr>
             <tr>
                <th colspan="3" align="left"></th>
                <th colspan="2" align="left" style="line-height: 7; padding-bottom: 15;"><h4 style="text-align: left;margin-left:25">-----------------------, ------------------------ 20.... </u></h4></th>
            </tr>
            <tr>
                <th colspan="3" align="left"></th>
                <th colspan="2" align="left"><h6 style="text-align: left;margin-left:85">Materai 6000</h6></th>
            </tr>
             <tr>
                <th colspan="3" align="left"></th>
                <th colspan="2" align="left"><h4 style="text-align: left;margin-left:25">Tanda Tangan  :<hr style="width:87%;text-align:left;margin-left:0">Nama Lengkap  :</h4></th>
            </tr>
        </table>

    </body>
</html>