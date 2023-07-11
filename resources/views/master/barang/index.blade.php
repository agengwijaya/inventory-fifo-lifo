@extends('layouts.main')

@section('content')
  <section id="content" class="content">
    <div class="content__header content__boxed rounded-0">
      <div class="content__wrap">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Data Master</a></li>
            <li class="breadcrumb-item"><a href="#">Data Barang</a></li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="content__boxed">
      <div class="content__wrap">
        <section>
          <div class="row">
            <div class="col-md-6 mb-3">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row row-cols-auto justify-content-between mb-3">
                    <div class="col">
                      <h5 class="card-title">List Jenis Barang</h5>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <button type="button" class="btn btn-primary form-control" data-bs-toggle="modal" data-bs-target="#modalAddJenisBarang"><i class="fa fa-plus"></i> Tambah Jenis</button>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <table id="table_jenis" class="nowrap table table-bordered display" style="width: 100%; color: black;">
                        <thead style="background-color: #ddd;">
                          <tr>
                            <th class="text-center" style="width: 10px">No</th>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($jenis_barang as $item)
                            <tr>
                              <td class="text-center">{{ $loop->iteration }}</td>
                              <td class="text-center">{{ $item->kode }}</td>
                              <td>{{ $item->nama }}</td>
                              <td class="d-flex gap-1 justify-content-center">
                                <button class="btn btn-danger btn-xs" id="btn_delete" data-bs-target="#modalDeleteConfirmJenis" data-bs-toggle="modal" data-id="{{ $item->id }}"><i class="fa fa-trash"></i></button>
                                <button class="btn btn-warning btn-xs" id="btn_edit" data-bs-target="#modalEditJenisBarang" data-bs-toggle="modal" data-data='{{ $item }}'><i class="fa fa-pencil"></i></button>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row row-cols-auto justify-content-between mb-3">
                    <div class="col">
                      <h5 class="card-title">List Satuan Barang</h5>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <button type="button" class="btn btn-primary form-control" data-bs-toggle="modal" data-bs-target="#modalAddSatuanBarang"><i class="fa fa-plus"></i> Tambah Satuan</button>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <table id="table_satuan" class="nowrap table table-bordered display" style="width: 100%; color: black;">
                        <thead style="background-color: #ddd;">
                          <tr>
                            <th class="text-center" style="width: 10px">No</th>
                            <th class="text-center">Kode Satuan</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($satuan_barang as $item)
                            <tr>
                              <td class="text-center">{{ $loop->iteration }}</td>
                              <td class="text-center">{{ $item->kode_nama }}</td>
                              <td>{{ $item->nama }}</td>
                              <td class="d-flex gap-1 justify-content-center">
                                <button class="btn btn-danger btn-xs" id="btn_delete" data-bs-target="#modalDeleteConfirmSatuan" data-bs-toggle="modal" data-id="{{ $item->id }}"><i class="fa fa-trash"></i></button>
                                <button class="btn btn-warning btn-xs" id="btn_edit" data-bs-target="#modalEditSatuanBarang" data-bs-toggle="modal" data-data='{{ $item }}'><i class="fa fa-pencil"></i></button>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 mb-3">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row row-cols-auto justify-content-between mb-3">
                    <div class="col">
                      <h5 class="card-title">List Barang</h5>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <button type="button" class="btn btn-primary form-control" data-bs-toggle="modal" data-bs-target="#modalAddBarang"><i class="fa fa-plus"></i> Tambah Barang</button>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <table id="barang" class="nowrap table table-bordered display" style="width: 100%; color: black;">
                        <thead style="background-color: #ddd;">
                          <tr>
                            <th class="text-center" style="width: 10px">No</th>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Jenis Barang</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Satuan</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($barang as $item)
                            <tr>
                              <td class="text-center">{{ $loop->iteration }}</td>
                              <td class="text-center">{{ $item->kode }}</td>
                              <td>{{ $item->jenis_barang->nama }}</td>
                              <td>{{ $item->nama }}</td>
                              <td class="text-center">{{ $item->t_satuan_barang->nama }} ({{ $item->t_satuan_barang->kode_nama }})</td>
                              <td class="d-flex gap-1 justify-content-center">
                                <button class="btn btn-danger btn-xs" id="btn_delete" data-bs-target="#modalDeleteConfirmBarang" data-bs-toggle="modal" data-id="{{ $item->id }}"><i class="fa fa-trash"></i></button>
                                <button class="btn btn-warning btn-xs" id="btn_edit" data-bs-target="#modalEditBarang" data-bs-toggle="modal" data-data='{{ $item }}'><i class="fa fa-pencil"></i></button>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>

  <!-- Modal -->
  <div class="modal fade" id="modalAddJenisBarang" tabindex="-1" aria-labelledby="modalAddJenisBarangLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form action="{{ url('data-master/data-barang/store-jenis-barang') }}" method="POST">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="modalAddJenisBarangLabel">Form Tambah Jenis Barang</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="mb-3">
                  <label for="kode" class="form-label">Kode</label>
                  <input type="text" class="form-control" id="kode" name="kode" readonly value="{{ $code_jenis_barang }}">
                </div>
              </div>
              <div class="col-12">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Jenis Barang</label>
                  <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalEditJenisBarang" tabindex="-1" aria-labelledby="modalEditJenisBarangLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form method="POST" id="form_edit_jenis_barang">
          @method('put')
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="modalEditJenisBarangLabel">Edit Jenis Barang</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="mb-3">
                  <label for="kode" class="form-label">Kode</label>
                  <input type="text" class="form-control" id="kode_jenis_edit" name="kode" readonly>
                </div>
              </div>
              <div class="col-12">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Jenis Barang</label>
                  <input type="text" class="form-control" id="nama_jenis_edit" name="nama" required>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalAddSatuanBarang" tabindex="-1" aria-labelledby="modalAddSatuanBarangLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form action="{{ url('data-master/data-barang/store-satuan-barang') }}" method="POST">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="modalAddSatuanBarangLabel">Form Tambah Data Satuan Barang</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="mb-3">
                  <label for="kode_nama" class="form-label">Kode Nama Satuan</label>
                  <input type="text" class="form-control" id="kode_nama" name="kode_nama" required>
                </div>
              </div>
              <div class="col-12">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Satuan</label>
                  <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalEditSatuanBarang" tabindex="-1" aria-labelledby="modalEditSatuanBarangLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form method="POST" id="form_edit_satuan_barang">
          @method('put')
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="modalEditSatuanBarangLabel">Edit Data Satuan Barang</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="mb-3">
                  <label for="kode_nama" class="form-label">Kode Nama Satuan</label>
                  <input type="text" class="form-control" id="kode_nama_edit" name="kode_nama" required>
                </div>
              </div>
              <div class="col-12">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Satuan</label>
                  <input type="text" class="form-control" id="nama_satuan_edit" name="nama" required>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalAddBarang" tabindex="-1" aria-labelledby="modalAddBarangLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form action="{{ url('data-master/data-barang') }}" method="POST">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="modalAddBarangLabel">Form Tambah Data Barang</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12 col-md-6 mb-3">
                <div class="mb-3">
                  <label for="kode" class="form-label">Kode</label>
                  <input type="text" class="form-control" id="kode" name="kode" readonly value="{{ $code_barang }}">
                </div>
              </div>
              <div class="col-12 col-md-6 mb-3">
                <label for="exampleFormControlInput1" class="form-label">Jenis Barang</label>
                <select class="form-select" name="jenis_barang_id" required>
                  <option value="" selected disabled>pilih</option>
                  @foreach ($jenis_barang as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-12 col-md-6 mb-3">
                <label for="exampleFormControlInput1" class="form-label">Satuan Barang</label>
                <select class="form-select" name="satuan_barang" required>
                  <option value="" selected disabled>pilih</option>
                  @foreach ($satuan_barang as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }} ({{ $item->kode_nama }})</option>
                  @endforeach
                </select>
              </div>
              <div class="col-12 col-md-6">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Barang</label>
                  <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="modalEditBarang" tabindex="-1" aria-labelledby="modalEditBarangLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form method="POST" id="form_edit_barang">
          @method('put')
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="modalAddBarangLabel">Edit Data Barang</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12 col-md-6 mb-3">
                <div class="mb-3">
                  <label for="kode" class="form-label">Kode</label>
                  <input type="text" class="form-control" id="kode_barang_edit" name="kode" readonly>
                </div>
              </div>
              <div class="col-12 col-md-6 mb-3">
                <label for="exampleFormControlInput1" class="form-label">Jenis Barang</label>
                <select class="form-select" id="jenis_barang_id_edit" name="jenis_barang_id" required>
                  <option value="" selected disabled>pilih</option>
                  @foreach ($jenis_barang as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-12 col-md-6 mb-3">
                <label for="exampleFormControlInput1" class="form-label">Satuan Barang</label>
                <select class="form-select" name="satuan_barang" id="satuan_barang_edit" required>
                  <option value="" selected disabled>pilih</option>
                  @foreach ($satuan_barang as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }} ({{ $item->kode_nama }})</option>
                  @endforeach
                </select>
              </div>
              <div class="col-12 col-md-6">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Barang</label>
                  <input type="text" class="form-control" id="nama_barang_edit" name="nama" required>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalDeleteConfirmJenis" tabindex="-1" aria-labelledby="modalDeleteConfirmJenisLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form method="POST" id="form_delete_jenis">
          @method('delete')
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="modalDeleteConfirmJenisLabel">Konfirmasi Hapus</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Apakah anda ingin menghapus data ini secara permanen?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalDeleteConfirmSatuan" tabindex="-1" aria-labelledby="modalDeleteConfirmSatuanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form method="POST" id="form_delete_satuan">
          @method('delete')
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="modalDeleteConfirmSatuanLabel">Konfirmasi Hapus</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Apakah anda ingin menghapus data ini secara permanen?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalDeleteConfirmBarang" tabindex="-1" aria-labelledby="modalDeleteConfirmBarangLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form method="POST" id="form_delete_barang">
          @method('delete')
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="modalDeleteConfirmBarangLabel">Konfirmasi Hapus</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Apakah anda ingin menghapus data ini secara permanen?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    $('#table_jenis').on('click', 'tbody td #btn_edit', function() {
      let data = $(this).data('data');
      $('#form_edit_jenis_barang').attr('action', "{{ url('data-master/data-barang/update-jenis-barang/') }}" + '/' + data.id);
      $('#kode_jenis_edit').val(data.kode);
      $('#nama_jenis_edit').val(data.nama);
    })

    $('#table_satuan').on('click', 'tbody td #btn_edit', function() {
      let data = $(this).data('data');
      $('#form_edit_satuan_barang').attr('action', "{{ url('data-master/data-barang/update-satuan-barang/') }}" + '/' + data.id);
      $('#kode_nama_edit').val(data.kode_nama);
      $('#nama_satuan_edit').val(data.nama);
    })

    $('#barang').on('click', 'tbody td #btn_edit', function() {
      let data = $(this).data('data');
      $('#form_edit_barang').attr('action', "{{ url('data-master/data-barang/') }}" + '/' + data.id);
      $('#kode_barang_edit').val(data.kode);
      $('#nama_barang_edit').val(data.nama);
      $('#jenis_barang_id_edit').val(data.barang_jenis_id);
      $('#satuan_barang_edit').val(data.barang_satuan_id);
    })

    $('#table_jenis').on('click', 'tbody td #btn_delete', function() {
      let id = $(this).attr('data-id');
      $('#form_delete_jenis').attr('action', "{{ url('data-master/data-barang/destroy-jenis-barang/') }}" + '/' + id);
    })

    $('#table_satuan').on('click', 'tbody td #btn_delete', function() {
      let id = $(this).attr('data-id');
      $('#form_delete_satuan').attr('action', "{{ url('data-master/data-barang/destroy-satuan-barang/') }}" + '/' + id);
    })

    $('#barang').on('click', 'tbody td #btn_delete', function() {
      let id = $(this).attr('data-id');
      $('#form_delete_barang').attr('action', "{{ url('data-master/data-barang/') }}" + '/' + id);
    })

    $(function() {
      let table_jenis = $('#table_jenis').DataTable({
        scrollX: true
      });
      let table_satuan = $('#table_satuan').DataTable({
        scrollX: true
      });
      let table = $('#barang').DataTable({
        scrollX: true
      });
    })
  </script>
@endsection
