<?= $this->extend('mainmitra'); ?>

<?= $this->section('menu'); ?>

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="<?= base_url('/mitra/mitra'); ?>" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
                Dashboard
            </p>
        </a>
    </li>
    <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link active">
            <i class="nav-icon fas fa fa-sitemap"></i>
            <p>
                Master
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview ">
            <li class="nav-item">
                <a href="<?= base_url('mitra/nasabah'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Nasabah</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('mitra/sampah'); ?>" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sampah</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa fa-receipt"></i>
            <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview ">
            <li class="nav-item">
                <a href="<?= base_url('mitra/penjualan'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Penjualan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('mitra/penarikan'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Penarikan</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa fa-chart-area"></i>
            <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview ">
            <li class="nav-item">
                <a href="<?= base_url('mitra/laporan-master'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Laporan Master</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('mitra/laporan-transaksi'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Laporan Transaksi</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="<?= base_url('mitra/profil'); ?>" class="nav-link">
            <i class="nav-icon far fa fa-user"></i>
            <p>
                Profil
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?= base_url('mitra/logout'); ?>" class="nav-link">
            <i class="nav-icon fa fa-sign-out-alt"></i>
            <p>
                Logout
            </p>
        </a>
    </li>
</ul>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active">Sampah</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <?php if (session()->getFlashdata('success')) { ?>
            <div class="alert alert-success icons-alert m-2">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo session()->getFlashdata('success'); ?>
            </div>
        <?php } else if (session()->getFlashdata('failed')) { ?>
            <div class="alert alert-danger icons-alert m-2">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo session()->getFlashdata('failed'); ?>
            </div>
        <?php } ?>
        <div class="card-header">
            <a data-toggle="modal" data-target="#addModal" class="btn btn-sm btn-success" ><i class="fa fa-plus mr-2"></i> Data Baru</a>
            <a href="<?= base_url('mitra/sampah/report'); ?>" target="__blank" class="btn btn-sm btn-info"><i class="fa fa-print mr-2"></i> Cetak</a>
        </div>
        <div class="card-body">
            <table id="table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach ($sampah as $row) : $no++ ?>
                        <tr>
                            <td> <?= $no; ?></td>
                            <td> <?= $row['sampah_nama']; ?></td>
                            <td> <?= $row['kategori_nama']; ?></td>
                            <td> <?= $row['sampah_satuan']; ?></td>
                            <td> <?= $row['sampah_harga']; ?></td>
                            <td>
                                <?php if ($row['sampah_status'] == 1) { ?>
                                <span class="badge bg-success">Active</span>
                                <?php } else if ($row['sampah_status'] == 0) { ?>
                                <span class="badge bg-info">Non Active</span>
                                <?php } ?>
                            </td>
                            <td style="text-align: center;">
                                <a style="cursor: pointer;" data-toggle="modal" data-target="#updateModal<?= $row['sampah_id']; ?>"
                                    class="btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                <a style="cursor: pointer;" class="btn-sm btn-danger btn-delete" data-toggle="modal"
                                    data-target="#deleteModal<?= $row['sampah_id']; ?>"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<form action="<?= base_url('mitra/sampah/save'); ?>" enctype="multipart/form-data" method="POST">
    <?= csrf_field(); ?>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Tambah sampah</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label>Nama</label>
                                <input type="text" class="form-control" placeholder="Masukan nama" id="nama" name="nama" required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label>Kategori</label>
                                <select name="kategori" id="kategori" required class="form-control ">
                                    <?php foreach ($kategori as $data) : ?>
                                        <option value="<?= $data['kategori_id'] ?>"><?= $data['kategori_nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label>Satuan</label>
                                <input type="text" class="form-control" placeholder="Masukan satuan" id="satuan" name="satuan" required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label>Harga</label>
                                <div class="input-group mb-3">
                                    <span class="btn btn-success">Rp</span>
                                    <input type="text" class="form-control" placeholder="Masukan harga" id="harga" name="harga" required autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label>Status</label>
                                <select name="status" id="status" required class="form-control ">
                                    <option value="1">Active</option>
                                    <option value="0">Non Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label>Gambar</label>
                                <input type="file" class="form-control" id="gambar" name="gambar" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label>Deskripsi</label>
                                <input type="text" class="form-control" placeholder="Masukan deskripsi" id="deskripsi" name="deskripsi" required autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mt-2 mb-2" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success mt-2 mb-2 mr-2">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php foreach ($sampah as $row) : ?>
    <form action="<?= base_url('mitra/sampah/edit'); ?>" enctype="multipart/form-data" method="POST">
        <?= csrf_field(); ?>
        <div class="modal fade" id="updateModal<?= $row['sampah_id']; ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Edit sampah</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id" value="<?= $row['sampah_id']; ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" value="<?= $row['sampah_nama']; ?>" placeholder="Masukan nama" id="nama" name="nama" required autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Kategori</label>
                                    <select name="kategori" id="kategori" required class="form-control ">
                                        <?php foreach ($kategori as $data) : ?>
                                            <?php if ($row['sampah_kategori_id'] == $data['kategori_id']) { ?>
                                                <option selected value="<?= $data['kategori_id'] ?>"><?= $data['kategori_nama'] ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $data['kategori_id'] ?>"><?= $data['kategori_nama'] ?></option>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Satuan</label>
                                    <input type="text" class="form-control" value="<?= $row['sampah_satuan']; ?>" placeholder="Masukan satuan" id="satuan" name="satuan" required autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Harga</label>
                                    <div class="input-group mb-3">
                                        <span class="btn btn-success">Rp</span>
                                        <input type="text" class="form-control" value="<?= $row['sampah_harga']; ?>" placeholder="Masukan harga" id="harga" name="harga" required autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Status</label>
                                    <select name="status" id="status" required class="form-control">
                                        <?php if ($row['sampah_status'] == 1) { ?>
                                            <option selected value="1">Active</option>
                                            <option value="0">Non Active</option>
                                        <?php } else { ?>
                                            <option value="1">Active</option>
                                            <option selected value="0">Non Active</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Gambar</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label>Deskripsi</label>
                                    <input type="text" class="form-control" value="<?= $row['sampah_deskripsi']; ?>" placeholder="Masukan deskripsi" id="deskripsi" name="deskripsi" required autocomplete="off">
                                </div>
                            </div>
                            <input type="hidden" id="filelama" name="filelama" value="<?= $row['sampah_gambar']; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary mt-2 mb-2" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success mt-2 mb-2 mr-2">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="<?= base_url('mitra/sampah/delete'); ?>" enctype="multipart/form-data" method="POST">
        <?= csrf_field(); ?>
        <div class="modal" tabindex="-1" id="deleteModal<?= $row['sampah_id']; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Konfirmasi hapus</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" required value="<?= $row['sampah_id']; ?>" />
                        <h6>Yakin ingin menghapus data <strong><?= $row['sampah_nama']; ?></strong>?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-sm btn-success mr-2">Yakin</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php endforeach; ?>

<?= $this->endSection(); ?>