<?php

function rupiah($amount) {
    return 'Rp. '.number_format($amount, 0, ",", ".");
}

function kirimWhatsapp($number, $message, $analisis, $type = null) {

    $device_id = "3e0b4d0da0255b4d04650c643de5b12f";

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $curlUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 'device_id='.$device_id.'&number='.$number.'&message='.$message.'&analisis='.$analisis,
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($response);
    return $result;
}

function waThanksSD($number, $nama, $type = null) {

    $device_id = "3e0b4d0da0255b4d04650c643de5b12f";

    // $message = 
    // "Data Skrining Kesehatan Atas Nama ".$nama." asal sekolah ".$sekolah." Belum Lengkap! Mohon dilengkapi terlebih dahulu.. Silahkan gunakan link dibawah ini :\n\n
    // Skrining : bit.ly/SkriningKesehatanSiswa-JO\n\n
    // Atau, Jika Data Identitas Anda Di Server Kami SALAH, Silahkan gunakan Link Aduan berikut\n
    // - Link Aduan Identitas Salah : bit.ly/DATASALAH-UKS-PKMJO\n\n
    // Atau jika ingin pertanyaan/konsultasinya Dijawab Langsung Oleh Petugas puskesmas kami, silahkan tekan link dibawah ini..\n\n
    // Konsultasi Langsung : bit.ly/KonsultasiPKMJO\n\n
    // Terima Kasih";

    $message = 
    "Terima kasih ".$nama." Telah menggunakan fitur kami..\n\nAgar layanan kami dapat di tingkatkan, kami mohon untuk Bpk/Ibu dapat memberikan masukan dan sarannya kepada kami melalui link berikut. silahkan tekan link berikut ini untuk memberikan masukan dan saran\n\nLink : bit.ly/SARAN-JO\n\nSemoga kami dapat menjadi Fasilitas Kesehatan yang lebih baik lagi..\n\nTerima Kasih.. 😊\n\n- ARJUNA A.I.";
    $curlUrl = 'https://app.whacenter.com/api/send';

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $curlUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 'device_id='.$device_id.'&number='.$number.'&message='.$message,
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($response);
    return $result;
}

function analisisSD($number, $dataUserData, $dataQuestion, $type = null) {

    $device_id = "3e0b4d0da0255b4d04650c643de5b12f";
    
    $analisis =
    "Halo, Berikut hasil Skrining Kesehatan Online Atas Nama ".$dataUserData->nama." dalam program E-UKS Puskesmas Jurangombo..\n\n
    Data anda :
    Nama : ".$dataUserData->nama."
    Tgl Lahir : ".$dataUserData->tanggal_lahir."
    Asal Sekolah : ".$dataUserData->sekolah->nama."
    Kelas : ".$dataUserData->kelas."..\n

    1. Status Imunisasi : ".$dataUserData->riwImDas."
    2. Perilaku Beresiko : ".$dataUserData."
    - Sarapan : ".$dataUserData->apKamSar."
    - Jajan : ".$dataUserData->apKamJajSek."
    - Merokok : ".$dataUserData->apKamMer."
    - Orang Tua Merokok : ".$dataUserData->apOrtuMer." 
    - Orang Tua Minum alkohol : ".$dataUserData->apOrAl."
    3. Gangguan Kesehatan Reproduksi :".$dataUserData->kesRep."..\n

    PEMERIKSAAN MENTAL EMOSIONAL
    1. Emosional : ".$dataQuestion."
    2. Perilaku : ".$dataQuestion."
    3. Hiperaktivitas : ".$dataQuestion."
    4. Masalah Teman Sebaya : ".$dataQuestion."
    5. Kekuatan Sosial : ".$dataQuestion."..\n

    MODALITAS BELAJAR
    1. Audio : ".$dataQuestion."
    2. Visual : ".$dataQuestion."
    3. Kinestetik : ".$dataQuestion."..\n

    DOMINASI OTAK : ".$dataQuestion."..\n

    TINDAK LANJUT
    1. Pemantauan Orang Tua/Guru : ".$dataQuestion."..\n

    Jika ada pertanyaan terkait kegiatan UKS dari Puskesmas Jurangombo, Silahkan gunakan Link berikut\n

    Link Bertanya/konsultasi : bit.ly/KonsultasiPKMJO\n

    Jika anda ingin Menilai Status Gizi anda (Normal/Tidaknya berat dan tinggi badan anda), Silahkan Gunakan Link Berikut : bit.ly/Status-Gizi-PKMJO\n

    Terima Kasih, semoga sehat selalu\n

    *- ARJUNA AI Puskesmas Jurangombo*";
    $curlUrl = 'https://app.whacenter.com/api/send';

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $curlUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 'device_id='.$device_id.'&number='.$number.'&analisis='.$analisis,
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($response);
    return $result;
}