let dateTime = (params)=>{
    let date = new Date(Date.parse(params));

    let tahun = date.getFullYear(),bulan = date.getMonth(),tanggal = date.getDate(),hari = date.getDay(),jam = date.getHours(),menit = date.getMinutes(),detik = date.getSeconds();

    switch(hari) {
    case 0: hari = "Minggu"; break;
    case 1: hari = "Senin"; break;
    case 2: hari = "Selasa"; break;
    case 3: hari = "Rabu"; break;
    case 4: hari = "Kamis"; break;
    case 5: hari = "Jum'at"; break;
    case 6: hari = "Sabtu"; break;
    }
    switch(bulan) {
    case 0: bulan = "Januari"; break;
    case 1: bulan = "Februari"; break;
    case 2: bulan = "Maret"; break;
    case 3: bulan = "April"; break;
    case 4: bulan = "Mei"; break;
    case 5: bulan = "Juni"; break;
    case 6: bulan = "Juli"; break;
    case 7: bulan = "Agustus"; break;
    case 8: bulan = "September"; break;
    case 9: bulan = "Oktober"; break;
    case 10: bulan = "November"; break;
    case 11: bulan = "Desember"; break;
    }

    let tampil = hari + ", " + tanggal + " " + bulan + " " + tahun+' '+jam + ":" + menit + ":" + detik;
    return tampil;
}