<div class="container mt-3">
    <button class="btn btn-dark mb-3 tambahPerlombaan" data-toggle="modal" data-target="#modal">Tambah Data</button>
    <?= Flasher::getFlashdata(); ?>
    <div class="card">
        <div class="card-header bg-dark text-white">
            List Pendaftar Perlombaan
        </div>
        <div class="card-body">
            <table class="table table-striped" id="mytable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama/Ketua</th>
                        <th>Asal Sekolah</th>
                        <th>No HP</th>
                        <th>Lomba Ikuti</th>
                        <th>Nama Tim</th>
                        <th>Jumlah Anggota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data['perlombaan'] as $pendaftar) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $pendaftar['nama_ketua'] ?></td>
                            <td><?= $pendaftar['asal_sekolah'] ?></td>
                            <td><?= $pendaftar['no_hp'] ?></td>
                            <td><?= $pendaftar['perlombaan'] ?></td>
                            <td><?= $pendaftar['nama_tim'] == null ? '-' : $pendaftar['nama_tim'] ?></td>
                            <td><?= $pendaftar['jumlah_anggota'] == null ? '-' : $pendaftar['jumlah_anggota'] ?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a data-toggle="modal" data-target="#detailModal" class="btn btn-primary btn-sm detailPerlombaan" data-id="<?= $pendaftar['idPendaftar'] ?>">Detail</a>
                                    <a href="<?= base_url ?>/home/ubah_data/<?= $pendaftar['idPendaftar'] ?>" data-toggle="modal" data-target="#modal" class="btn btn-warning btn-sm editPerlombaan" data-id="<?= $pendaftar['idPendaftar'] ?>">Edit</a>
                                    <a href="<?= base_url ?>/home/hapus_data/<?= $pendaftar['idPendaftar'] ?>" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Pendaftar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="showDetail">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Nama Ketua</td>
                            <td id="nama_ketua"></td>
                        </tr>
                        <tr>
                            <td>Asal Sekolah</td>
                            <td id="asal_sekolah"></td>
                        </tr>
                        <tr>
                            <td>No Hp</td>
                            <td id="no_hp"></td>
                        </tr>
                        <tr>
                            <td>Perlombaan</td>
                            <td id="perlombaan"></td>
                        </tr>
                        <tr>
                            <td>Nama Tim</td>
                            <td id="nama_tim"></td>
                        </tr>
                        <tr>
                            <td>Jumlah Anggota</td>
                            <td id="jumlah_anggota"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah&Edit -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Tambah Pendaftar Perlombaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="showBody">
                <form action="<?= base_url ?>/home/tambah_data" class="form" method="post">
                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nama Ketua</label>
                                <input type="text" name="nama_ketua" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Asal Sekolah</label>
                                <input type="text" name="asal_sekolah" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>No Hp</label>
                                <input type="text" name="no_hp" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Lomba Yang Ingin Di Ikuti</label>
                                <select class="custom-select" name="lomba_diikuti" id="inlineFormCustomSelectPref">
                                    <option selected disabled>Choose...</option>
                                    <?php $val = 1;
                                    foreach ($data['jenisPerlombaan'] as $perlombaan) : ?>
                                        <option value="<?= $val++ ?>"><?= $perlombaan['perlombaan'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Tim</label>
                                <input type="text" name="nama_tim" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Jumlah Anggota</label>
                                <input type="text" name="jumlah_anggota" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer ml-auto">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>