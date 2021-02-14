$(document).ready(function () {
    $('.detailPerlombaan').click(function () {
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/php-mvc/public/home/lihat_data',
            method: 'post',
            dataType: 'json',
            data: { id: id },
            success: function (response) {
                $('#nama_ketua').html(response.nama_ketua);
                $('#asal_sekolah').html(response.asal_sekolah);
                $('#no_hp').html(response.no_hp);
                $('#perlombaan').html(response.perlombaan);
                $('#nama_tim').html(response.nama_tim == '' ? '-' : response.nama_tim);
                $('#jumlah_anggota').html(response.jumlah_anggota == '' ? '-' : response.jumlah_anggota);
            }
        })
    });

    $('.editPerlombaan').click(function () {
        $('#modalLabel').html('Edit Pendaftar Perlombaan');

        const id = $(this).data('id');
        $('.form').attr('action', 'http://localhost/php-mvc/public/home/ubah_data/');
        $.ajax({
            url: 'http://localhost/php-mvc/public/home/lihat_data',
            method: 'post',
            dataType: 'json',
            data: { id: id },
            success: function (response) {
                $('[name="nama_ketua"]').val(response.nama_ketua);
                $('[name="asal_sekolah"]').val(response.asal_sekolah);
                $('[name="no_hp"]').val(response.no_hp);
                $('[name="lomba_diikuti"]').val(response.lomba_diikuti);
                $('[name="nama_tim"]').val(response.nama_tim);
                $('[name="jumlah_anggota"]').val(response.jumlah_anggota);
                $('[name="id"]').val(response.idPendaftar);
            }
        })
    })

    $('.tambahPerlombaan').click(function () {
        $('#modalLabel').html('Tambah Pendaftar Perlombaan');
        $('.form').attr('action', 'http://localhost/php-mvc/public/home/tambah_data');
    })
})