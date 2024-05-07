@extends('layouts.dashboard')

@section('tab_tittle', 'Dashboard')

@section('content')
    <div class="row row-cols-1">
        <div class="overflow-hidden d-slider1 ">
            <ul class="p-0 m-0 mb-2 swiper-wrapper list-inline">
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                    <div class="card-body">
                        <div class="progress-widget">

                            <div class="progress-detail">
                                <p class="mb-2">Total Uang</p>
                                <h4 class="counter">Rp{{ format_idr($total_uang) }}</h4>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                    <div class="card-body">
                        <div class="progress-widget">

                            <div class="progress-detail">
                                <p class="mb-2">Total Uang Masuk</p>
                                <h4 class="counter">Rp{{ format_idr($total_uang_masuk) }}</h4>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                    <div class="card-body">
                        <div class="progress-widget">

                            <div class="progress-detail">
                                <p class="mb-2">Total Uang Keluar</p>
                                <h4 class="counter">Rp{{ format_idr($total_uang_keluar) }}</h4>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1000">
                    <div class="card-body">
                        <div class="progress-widget">

                            <div class="progress-detail">
                                <p class="mb-2">Total Uang Tabungan</p>
                                <h4 class="counter">Rp{{ format_idr($total_uang_tabungan) }}</h4>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1100">
                    <div class="card-body">
                        <div class="progress-widget">

                            <div class="progress-detail">
                                <p class="mb-2">Jumlah Siswa</p>
                                <h4 class="counter">{{ $siswa }}</h4>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1200">
                    <div class="card-body">
                        <div class="progress-widget">

                            <div class="progress-detail">
                                <p class="mb-2">Jumlah Kelas</p>
                                <h4 class="counter">{{ $kelas }}</h4>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
            <div class="swiper-button swiper-button-next"></div>
            <div class="swiper-button swiper-button-prev"></div>


        </div>


    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Mutasi tabungan</h4>
                    </div>
                </div>
                <div class="card-body">
                    <p>Data transaksi keuangan tabungan. <code>Periksa kembali setiap melakukan perubahan data.</code></p>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>KD</th>
                                    <th>Keterangan</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($tabungan as $index => $item)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                    <td><a href="{{ route('siswa.show', $item->siswa->id) }}" target="_blank">
                                        {{ $item->siswa->nama }} -
                                        {{ $item->siswa->kelas->nama }} -
                                        {{ isset($item->siswa->kelas->periode) ? $item->siswa->kelas->periode->nama : '' }}
                                    </a></td>
                                    <td> @if($item->tipe == 'in')
                                        Menabung
                                    @elseif($item->tipe == 'out')
                                        Penarikan
                                    @endif</td>
                                    <td>{{ $item->keperluan }}</td>
                                    <td>Rp{{ format_idr($item->jumlah) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>NO</th>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>KD</th>
                                    <th>Keterangan</th>
                                    <th>Jumlah</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
