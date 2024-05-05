@extends('layouts.app')

@section('page-name','Siswa')

@section('content')
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@yield('page-name')</h3>
                </div>
                <div class="card-body">
                    <p><b>Kelas</b> : {{$siswa->kelas->nama}} </p>
                    <p>
                        <b>Nama</b> : {{$siswa->nama}}
                        @if($siswa->is_yatim)
                            <span class="tag tag-green">Yatim</span>
                        @endif
                    </p>
                    <p><b>Tempat, Tanggal Lahir</b> : {{$siswa->tempat_lahir.', '.$siswa->tanggal_lahir}} </p>
                    <p><b>Alamat</b> : {{$siswa->alamat}} </p>
                    <p><b>Nama Wali</b> : {{$siswa->nama_wali}} </p>
                    <p><b>No. Telp Wali</b> : {{$siswa->telp_wali}} </p>
                    <p><b>Pekerjaan Wali</b> : {{$siswa->pekerjaan_wali}} </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabungan</h3>
                    @if($saldo != '0')
                    <div class="card-options">
                        <a href="{{ route('tabungan.cetak', $siswa->id) }}" target="_blank" class="btn btn-primary mr-1">Cetak</a>
                        <a href="{{ route('tabungan.siswa.export', $siswa->id) }}" target="_blank" class="btn btn-primary">Export</a>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <p><b>Saldo : </b>Rp{{$saldo}}</p>
                    <table class="table card-table table-hover table-vcenter text-wrap">
                        <tr>
                            <th>Tanggal</th>
                            <th>KD</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                        </tr>
                        @foreach($tabungan as $item)
                        <tr>
                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                            <td>
                                @if($item->tipe == 'in')
                                    Menabung
                                @elseif($item->tipe == 'out')
                                    Penarikan
                                @endif
                            </td>
                            <td style="min-width: 100px">Rp{{ format_idr($item->jumlah) }}</td>
                            <td style="max-width: 100px">{{ $item->keperluan }}</td>
                        </tr>
                        @endforeach
                    </table>
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
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/daterangepicker.css') }}" />
@endsection
@section('js')
<script>
    require(['jquery', 'moment','daterangepicker'], function ($, moment, daterangepicker) {
        $(document).ready(function () {
            $('input[name="dates"]').daterangepicker();
        });
        $('#btn-cetak-spp').on('click', function(){
            //form print
            var form = document.createElement("form");
            form.setAttribute("style", "display: none");
            form.setAttribute("method", "post");
            form.setAttribute("action", "{{ route('spp.print') }}/" + this.value);
            form.setAttribute("target", "_blank");

            var token = document.createElement("input");
            token.setAttribute("name", "_token");
            token.setAttribute("value", "{{csrf_token()}}");

            var dateForm = document.createElement("input");
            dateForm.setAttribute("name", "dates");
            dateForm.setAttribute("value", $('#daterange').val());

            form.appendChild(token);
            form.appendChild(dateForm);
            document.body.appendChild(form);
            form.submit();

            console.log($('#daterange').val())
        })

        $('#btn-export-spp').on('click', function(){
            //form print
            var form = document.createElement("form");
            form.setAttribute("style", "display: none");
            form.setAttribute("method", "post");
            form.setAttribute("action", "{{ route('spp.export') }}/" + this.value);
            form.setAttribute("target", "_blank");

            var token = document.createElement("input");
            token.setAttribute("name", "_token");
            token.setAttribute("value", "{{csrf_token()}}");

            var dateForm = document.createElement("input");
            dateForm.setAttribute("name", "dates");
            dateForm.setAttribute("value", $('#daterange').val());

            form.appendChild(token);
            form.appendChild(dateForm);
            document.body.appendChild(form);
            form.submit();

            console.log($('#daterange').val())
        })
    });
</script>
@endsection
