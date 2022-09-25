@extends('layouts.app')

@section('title')
    Data Guru
@endsection

@section('content')
<section class="section">
    <h5 class="mt-2 mb-4">Data Guru</h5>
    <div class="card mt-2">
        <div class="card-body">
            <div class="card-title  ">
                <h5>Data Guru</h5>
                <hr>
                <a class="btn btn-sm btn-primary float-end" href="{{ route('guru.create')}}"><i class="fa fa-plus"></i></a>
                <form action="/guru" class="d-flex" role="search" method="GET">
                    <input class="form-control" type="search" name="search" placeholder="Cari Guru" aria-label="Search" style="width: 200px;">
                    <button class="btn btn-outline-secondary mx-1" type="submit">Cari</button>
                </form>
            </div>
        </div>
    
        {{-- Judul Data Guru --}}
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" width="50px">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Mapel ID</th>
                        <th scope="col" width="84px">Action</th>
                    </tr>
                </thead>
        
        {{-- Data Guru --}}
                <tbody class="table-group-divide">
                    @foreach ($guru as $key => $item)
                    <tr>
                        <th scope="row">{{ $guru -> firstItem() + $key }}</th>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ ! empty($item->mapel->mapel) ?  $item->mapel->mapel : '' }}</td>
                        <td>
                            <a href="/guru/edit/{{$item->id}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="/guru/hapus/{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="container" style="width: 100%; bottom: 0px;">
                {{ $guru->links() }}
            </div>
            
        </div>
    </div>
</section>
@endsection