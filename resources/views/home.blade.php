@extends('layout.layout')
@section('content')
<style>

/* Styling untuk box biodata */
.box {
    width: 60%;
    margin: 0 auto;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Styling untuk bagian header box */
.box-header {
    background-color: #eb0800;
    color: #ffffff;
    padding: 20px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

/* Styling untuk konten dalam box */
.box-content {
    padding: 20px;
}

/* Styling untuk gambar profil */
.profile-picture img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    display: block;
    margin: 0 auto 20px;
}

/* Styling untuk detail biodata */
.profile-details p {
    margin-bottom: 10px;
}

</style>
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <div class="content-body">
                <div class="row page-titles mx-0">
                    <div class="col p-md-0">
                        <div class="box">
                            <div class="box-header">
                                <h2 class="text-center">Kartu nama</h2>
                            </div>
                            <div class="box-content">
                                <div class="profile-picture">
                                    <img src="/images/foto.jpeg" alt="Profile Picture">
                                </div>
                                <div class="profile-details">
                                    <p><strong>Nama Lengkap:</strong> Rendy hermansyah </p>
                                    <p><strong>NIM Mahasiswa:</strong> 1204220001 </p>
                                    <p><strong>Prodi mahasiswa:</strong> Sistem informasi</p>
                                    <p><strong>Tempat,Tanggal Lahir:</strong> Surabaya, 26 Juni 2001</p>
                                    <p><strong>Usia:</strong> 23 Tahun</p>
                                    <p><strong>Jenis Kelamin: </strong> Pria</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
    </div>
    <!-- #/ container -->
</div>
@endsection
