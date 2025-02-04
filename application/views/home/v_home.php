<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fastprint | <?php echo $title;?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">
        <img src="https://fastprint.co.id/cdn/shop/t/3/assets/logo.png?v=37021879728213879011522638925" alt="Fastprint" width="270" height="60" class="d-inline-block align-text-top"></a>
    </div>
    </nav>
    <div class="container">
        <div class="col-12 mt-5">
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#add_product">Tambah Produk</button>
        </div>
        <div class="col-12">
            <table id="datatable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Name Produk</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($product->result() as $pkey => $pvalue) {?>
                        <tr>
                            <td><?php echo $pvalue->nama_produk?></td>
                            <td>Rp&nbsp;<?php echo number_format($pvalue->harga)?></td>
                            <td><?php echo $pvalue->nama_kategori?></td>
                            <td><?php echo $pvalue->nama_status?></td>
                            <td><button data-id="<?php echo $pvalue->id_produk?>" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProduct">Edit</button><a type="button" class="btn btn-danger btn-sm" onclick="deleteConfirm('<?php echo base_url('home/delete/'.$pvalue->id_produk) ?>')">Hapus</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
        <!-- Modal Add Product-->
        <div class="modal fade" id="add_product" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Tambah Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-add" method="post" action="home/add">
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk">
                    <div class="invalid-feedback" id="error_name_produk"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga">
                    <div class="invalid-feedback" id="error_harga"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select class="form-select" id="kategori_id" name="kategori_id">
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach($kategori->result() as $kkey => $kvalue){?>
                        <option value="<?php echo $kvalue->id_kategori?>"><?php echo $kvalue->nama_kategori?></option>
                    <?php } ?>
                    </select>
                    <div class="invalid-feedback" id="error_kategori_id"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" id="status_id" name="status_id">
                    <option value="">-- Pilih Status --</option>
                    <?php foreach($status->result() as $skey => $svalue){?>
                        <option value="<?php echo $svalue->id_status?>"><?php echo $svalue->nama_status?></option>
                    <?php } ?>
                    </select>
                    <div class="invalid-feedback" id="error_status_id"></div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-save">Simpan</button>
                </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    <!-- End -->
    <!-- Modal Edit Product -->
    <div class="modal fade" id="editProduct" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Edit Produk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-edit" method="post" action="">
                        <input type="hidden" name="id_produk" id="edit_id_produk">
                        <div class="mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="edit_nama_produk" name="nama_produk">
                            <div class="invalid-feedback" id="edit_error_name_produk"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="text" class="form-control" id="edit_harga" name="harga">
                            <div class="invalid-feedback" id="edit_error_harga"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select class="form-select" id="edit_kategori_id" name="kategori_id">
                                <option value="">-- Pilih Kategori --</option>
                                <?php foreach ($kategori->result() as $kkey => $kvalue) { ?>
                                    <option value="<?= $kvalue->id_kategori ?>"><?= $kvalue->nama_kategori ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback" id="edit_error_kategori_id"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" id="edit_status_id" name="status_id">
                                <option value="">-- Pilih Status --</option>
                                <?php foreach ($status->result() as $skey => $svalue) { ?>
                                    <option value="<?= $svalue->id_status ?>"><?= $svalue->nama_status ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback" id="edit_error_status_id"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary btn-update">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->
    <!-- Start Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apa Anda Yakin?</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                    <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->

    <div class="container">
        <footer class="py-3 my-4 text-center">
            <p class="text-center"><p> Made with <i class="bi bi-cup-hot-fill"></i> By <a href="https://www.linkedin.com/in/syahrul-izha-63662819b/" class="text-dark fw-bold">Syahrul Izha Mahendra</a></p></p>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap5.js"></script>
    <script>
// Select the edit form
const editForm = document.querySelector('.form-edit');

const edit_nama_produk = document.getElementById('edit_nama_produk');
const edit_harga = document.getElementById('edit_harga');
const edit_kategori_id = document.getElementById('edit_kategori_id');
const edit_status_id = document.getElementById('edit_status_id');

const edit_error_name_produk = document.getElementById('edit_error_name_produk');
const edit_error_harga = document.getElementById('edit_error_harga');
const edit_error_kategori_id = document.getElementById('edit_error_kategori_id');
const edit_error_status_id = document.getElementById('edit_error_status_id');

// Add event listener for the edit form submission
editForm.addEventListener('submit', (e) => {
    let hasError = false;

    edit_error_name_produk.innerText = '';
    edit_error_harga.innerText = '';
    edit_error_kategori_id.innerText = '';
    edit_error_status_id.innerText = '';

    if (edit_nama_produk.value.trim() === '') {
        edit_error_name_produk.innerText = 'Nama produk harus diisi!';
        edit_nama_produk.classList.add('is-invalid');
        hasError = true;
    } else {
        edit_nama_produk.classList.remove('is-invalid');
    }

    if (edit_harga.value.trim() === '') {
        edit_error_harga.innerText = 'Harga harus diisi!';
        edit_harga.classList.add('is-invalid');
        hasError = true;
    } else if (isNaN(edit_harga.value.trim())) {
        edit_error_harga.innerText = 'Harga harus berupa angka!';
        edit_harga.classList.add('is-invalid');
        hasError = true;
    } else {
        edit_harga.classList.remove('is-invalid');
    }

    if (edit_kategori_id.value === '') {
        edit_error_kategori_id.innerText = 'Pilih kategori!';
        edit_kategori_id.classList.add('is-invalid');
        hasError = true;
    } else {
        edit_kategori_id.classList.remove('is-invalid');
    }

    if (edit_status_id.value === '') {
        edit_error_status_id.innerText = 'Pilih status!';
        edit_status_id.classList.add('is-invalid');
        hasError = true;
    } else {
        edit_status_id.classList.remove('is-invalid');
    }

    if (hasError) {
        e.preventDefault();
    }
});
// End

      $(document).ready(function () {
        $('#datatable').DataTable();

        $(document).on('click', '.btn-primary', function () {
            const productId = $(this).data('id'); // Get product ID from data-id attribute

            // Fetch product details via AJAX
            $.ajax({
                url: '<?= base_url("home/get_edit/") ?>' + productId, // URL to fetch product details
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    if (response.error) {
                        alert(response.error); // Show error message
                    } else {
                        // Populate the Edit Modal fields with the fetched data
                        $('#editProduct input[name="nama_produk"]').val(response.nama_produk);
                        $('#editProduct input[name="harga"]').val(response.harga);
                        $('#editProduct select[name="kategori_id"]').val(response.kategori_id);
                        $('#editProduct select[name="status_id"]').val(response.status_id);

                        // Set the form action to update the product
                        $('#editProduct form').attr('action', '<?= base_url("home/update/") ?>' + productId);

                        // Show the Edit Modal
                        $('#editProduct').modal('show');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX error:', error); // Debugging
                    alert('Terjadi kesalahan: ' + error);
                }
            });
        });
      });

    const form = document.querySelector('.form-add');
    const nama_produk = document.getElementById('nama_produk');
    const harga = document.getElementById('harga');
    const kategori_id = document.getElementById('kategori_id');
    const status_id = document.getElementById('status_id');
    const error_name_produk = document.getElementById('error_name_produk');
    const error_harga = document.getElementById('error_harga');
    const error_kategori_id = document.getElementById('error_kategori_id');
    const error_status_id = document.getElementById('error_status_id');

    form.addEventListener('submit', (e) => {
        let hasError = false;

        error_name_produk.innerText = '';
        error_harga.innerText = '';
        error_kategori_id.innerText = '';
        error_status_id.innerText = '';

        if (nama_produk.value.trim() === '') {
            error_name_produk.innerText = 'Nama produk harus diisi!';
            nama_produk.classList.add('is-invalid');
            hasError = true;
        } else {
            nama_produk.classList.remove('is-invalid');
        }

        if (harga.value.trim() === '') {
            error_harga.innerText = 'Harga harus diisi!';
            harga.classList.add('is-invalid');
            hasError = true;
        } else if (isNaN(harga.value.trim())) {
            error_harga.innerText = 'Harga harus berupa angka!';
            harga.classList.add('is-invalid');
            hasError = true;
        } else {
            harga.classList.remove('is-invalid');
        }

        if (kategori_id.value === '') {
            error_kategori_id.innerText = 'Pilih kategori!';
            kategori_id.classList.add('is-invalid');
            hasError = true;
        } else {
            kategori_id.classList.remove('is-invalid');
        }

        if (status_id.value === '') {
            error_status_id.innerText = 'Pilih status!';
            status_id.classList.add('is-invalid');
            hasError = true;
        } else {
            status_id.classList.remove('is-invalid');
        }

        if (hasError) {
            e.preventDefault();
        }
    });

    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal('show');
    }
    </script>
  </body>
</html>