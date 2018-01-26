@extends('layouts.master')
@section('nav')

            <div class="logo">
                <label class="simple-text">
                    Admin Informasi
                </label>
            </div>

            <ul class="nav">
                <li>
                    <a href="{{ url('/home') }}">
                        <i class="pe-7s-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-id"></i>
                        <p>Regis Guru</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-users"></i>
                        <p>Regis Siswa</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('guru.index') }}">
                        <i class="pe-7s-wallet"></i>
                        <p>Tambah Data Guru</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('siswa.index') }}">
                        <i class="pe-7s-notebook"></i>
                        <p>Tambah Data Siswa</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('mapel.index') }}">
                        <i class="pe-7s-news-paper"></i>
                        <p>Tambah Mapel</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('kelas.index') }}">
                        <i class="pe-7s-culture"></i>
                        <p>Tambah Kelas</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('jurusan.index') }}">
                        <i class="pe-7s-tools"></i>
                        <p>Tambah Jurusan</p>
                    </a>
                </li>
                <li>
                    <a href="/nilai">
                        <i class="pe-7s-file"></i>
                        <p>Lihat Nilai Siswa</p>
                    </a>
                </li>
                
            </ul>
        </div>

@endsection

@section('profil')
    <li>
        <a href="{{ url('/settings/profile') }}">
            <i class="pe-7s-config"></i> Profil
        </a> 
    </li>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Data Siswa
                </div>
                <div class="panel-body">
                @if(Session::has('alert-success'))
                        <div class="alert alert-success">
                            {{ Session::get('alert-success') }}
                        </div>
                    @endif
                    <a href="{{route('siswa.create')}}" class="btn btn-info pull-left">Tambah Data</a>
                    <table class="table table-hover">
                            <tr>
                                <th>Id</th>
                                <th>NIS</th>
                                <th>Foto</th>
                                <th>Nama Siswa</th>
                                <th>Jenis kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Alamat</th>
                                <th>No Telpon</th>
                                <th colspan="2">action</th>
                             </tr>
                        @foreach ($siswas as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->nis}}</td>
                            <td>
                                <img src="{{ asset('/img/'.$data->foto.'') }}" width="100px" height="100px">
                            </td>
                            <td>{{$data->nama_siswa}}</td>
                            <td>{{$data->jenis_kelamin}}</td>
                            <td>{{$data->tanggal_lahir}}</td>
                            <td>{{$data->kelas->kelas}}</td>
                            <td>{{$data->jurusan->jurusan}}</td>
                            <td>{{$data->alamat}}</td>
                            <td>{{$data->no_telepon}}</td>
                        <td>
                                <form method="POST" action="{{ route('siswa.destroy', $data->id) }}" accept-charset="UTF-8">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <a href="{{route('siswa.edit', $data->id)}}" class="btn btn-warning">Edit</a>
                                    <input type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ?');" value="Delete">
                                </form>
                            </td>
                      </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection