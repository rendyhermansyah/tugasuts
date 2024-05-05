@extends('layout.layout')
@section('content')
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $title }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $title }}</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-self-center">
                            <h4 class="card-title">{{ $title }}</h4>
                            <div class="ml-auto">
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                    data-target="#modalCreate"><i class="fa fa-plus"></i> Tambah Data</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Kode Barang</th>
                                        <th>Stock</th>
                                        <th>Harga</th>
                                        <th>Deskripsi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($data_barang as $row)

                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->nama_barang }}</td>
                                        <td>{{ $row->nama_jenis }}</td>
                                        <td>{{ $row->stock }}</td>
                                        <td>Rp. {{ number_format($row->harga) }}</td>
                                        <td>{{ $row->description }}</td>
                                        <td>

                                            <a href="#" data-toggle="modal" onclick="showBarang('{{$row}}', '{{route('barang.show', $row->id)}}')" class="btn btn-xs btn-secondary"><i
                                                class="fa fa-eye"></i>Show</a>
                                            <a href="#" onclick="editBarang('{{$row}}', '{{route('barang.update', $row->id)}}')" data-toggle="modal" class="btn btn-xs btn-primary"><i
                                                    class="fa fa-edit"></i>Edit</a>
                                            <a href="#" data-toggle="modal" onclick="deleteBarang('{{$row}}', '{{route('barang.delete', $row->id)}}')" class="btn btn-xs btn-danger"><i
                                                    class="fa fa-trash"></i>Hapus</a>
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
    <!-- #/ container -->
</div>

<div class="modal fade bd-example-modal-lg" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="/barang/store" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang..." required>
                    </div>
                    <div class="form-group">
                        <label>Kode Barang</label>
                        <select class="form-control" name="id_jenis" required>
                            <option value="" hidden>-- Pilih Jenis Barang --</option>
                            @foreach ($data_jenis as $j)
                            <option value="{{ $j->id }}">{{ $j->nama_jenis }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input type="number" name="stock" class="form-control" placeholder="Stock..." required>
                        <div class="input-group-append"><span class="input-group-text">Pcs</span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend"><span class="input-group-text">Rp</span>
                        </div>
                        <input type="number" name="harga" class="form-control" placeholder="Harga..." required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control" name="description" placeholder="Deskripsi.." required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                    <button type="submit" class="btn btn-primary" onclick="reloadPage()"><i class="fa fa-save"></i> Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="modalShow" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Show {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form id="form_show" method="POST">
                @csrf
                @method('GET')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" value="{{ $row->nama_barang }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" class="form-control" value="{{ $row->nama_jenis }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="text" class="form-control" value="{{ $row->stock }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" value="{{ $row->harga }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" value="{{ $row->description }}" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade bd-example-modal-lg" id="modalEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form id="form_edit" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang..." required>
                    </div>
                    <div class="form-group">
                        <label>Kode Barang</label>
                        <select class="form-control" name="id_jenis" required>
                            @foreach ($data_jenis as $b)
                            <option value="{{ $b->id }}">{{ $b->nama_jenis }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input type="number" name="stock" class="form-control" placeholder="Stock..." required>
                        <div class="input-group-append"><span class="input-group-text">Pcs</span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend"><span class="input-group-text">Rp</span>
                        </div>
                        <input type="number" name="harga" class="form-control" placeholder="Harga..." required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="description" placeholder="Deskripsi.." required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                    <button type="submit" class="btn btn-primary" "><i class="fa fa-save"></i> Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="modalHapus" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form id="form_delete" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="form-group">
                        <h5>Apakah anda ingin menghapus data ini?</h5>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
