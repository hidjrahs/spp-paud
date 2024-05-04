@extends('layouts.app')

@section('page-name', 'Dashboard')

@section('content')
    <div class="page-header">
        <h1 class="page-title">
            Dashboard
        </h1>
    </div>
    <div class="row">
        <div class="col-6 col-sm-4 col-lg-4">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="h1 m-0">Rp{{ format_idr($total_uang) }}</div>
                    <div class="text-muted mb-4">Total Uang</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-lg-4">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="h1 m-0">Rp{{ format_idr($total_uang_masuk) }}</div>
                    <div class="text-muted mb-4">Total Uang Masuk</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-lg-4">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="h1 m-0">Rp{{ format_idr($total_uang_keluar) }}</div>
                    <div class="text-muted mb-4">Total Uang Keluar</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-lg-4">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="h1 m-0">Rp{{ format_idr($total_uang_tabungan) }}</div>
                    <div class="text-muted mb-4">Total Uang Tabungan</div>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-lg-4">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="h1 m-0">{{ $siswa }}</div>
                    <div class="text-muted mb-4">Siswa</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-lg-4">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="h1 m-0">{{ $kelas }}</div>
                    <div class="text-muted mb-4">Kelas</div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Mutasi tabungan</h3>
                    <div class="card-options">
                        <a href="{{ route('tabungan.export') }}" class="btn btn-primary btn-sm ml-2" download="true">Export</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-hover table-vcenter text-wrap">
                        <thead>
                        <tr>
                            <th class="w-1">No.</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>KD</th>
                            <th>Keterangan</th>
                            <th>Jumlah</th>
                            <th>Cetak</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($tabungan as $index => $item)
                            <tr>
                                <td><span class="text-muted">{{ $index+1 }}</span></td>
                                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('siswa.show', $item->siswa->id) }}" target="_blank">
                                        {{ $item->siswa->nama }} -
                                        {{ $item->siswa->kelas->nama }} -
                                        {{ isset($item->siswa->kelas->periode) ? $item->siswa->kelas->periode->nama : '' }}
                                    </a>
                                </td>
                                <td>
                                    @if($item->tipe == 'in')
                                        Menabung
                                    @elseif($item->tipe == 'out')
                                        Penarikan
                                    @endif
                                </td>
                                <td style="max-width:150px;">{{ $item->keperluan }}</td>
                                <td>IDR. {{ format_idr($item->jumlah) }}</td>
                                <td>
                                    <a class="btn btn-outline-primary btn-sm" target="_blank" href="{{ route('tabungan.transaksicetak', $item->id)}}">
                                        Cetak
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="d-flex">
                        <div class="ml-auto mb-0">
                            {{ $tabungan->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
@section('js')
    <script>
        require(['jquery', 'selectize', 'datepicker'], function($, selectize) {
            $(document).ready(function() {
                $('[data-toggle="datepicker"]').datepicker({
                    format: 'dd-MM-yyyy'
                });
                $('#btn-cetak-spp').on('click', function() {
                    var form = document.createElement("form");
                    form.setAttribute("style", "display: none");
                    form.setAttribute("method", "post");
                    form.setAttribute("action", "{{ route('laporan-harian.cetak') }}");
                    form.setAttribute("target", "_blank");

                    var token = document.createElement("input");
                    token.setAttribute("name", "_token");
                    token.setAttribute("value", "{{ csrf_token() }}");

                    var dateForm = document.createElement("input");
                    dateForm.setAttribute("name", "date");
                    dateForm.setAttribute("value", $('#date').val());

                    form.appendChild(token);
                    form.appendChild(dateForm);
                    document.body.appendChild(form);
                    form.submit();
                })
                $('#btn-export-spp').on('click', function() {
                    var form = document.createElement("form");
                    form.setAttribute("style", "display: none");
                    form.setAttribute("method", "post");
                    form.setAttribute("action", "{{ route('laporan-harian.export') }}");
                    form.setAttribute("target", "_blank");

                    var token = document.createElement("input");
                    token.setAttribute("name", "_token");
                    token.setAttribute("value", "{{ csrf_token() }}");

                    var dateForm = document.createElement("input");
                    dateForm.setAttribute("name", "date");
                    dateForm.setAttribute("value", $('#date').val());

                    form.appendChild(token);
                    form.appendChild(dateForm);
                    document.body.appendChild(form);
                    form.submit();
                })
            });
        });
    </script>
@endsection
