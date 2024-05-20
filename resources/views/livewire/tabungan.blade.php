<div id="app">
    <div id="main" class="layout-horizontal">
        <x-navigations-menu />

        <div class="content-wrapper container">

            <div class="page-heading">
                <h3>Form Menabung</h3>
            </div>

            <div class="page-content">
                <!-- Basic Horizontal form layout section start -->
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-6 col-12">
                            <div class="card">

                                <div class="card-content">

                                   <x-flash-message />
                                    <div class="card-body">
                                        <form wire:submit="store" class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="first-name-horizontal">Nama Siswa</label>
                                                    </div>
                                                    <livewire:get-siswa :$siswa />
                                                    {{-- <x-get-siswa :siswa="$siswa" /> --}}
                                                    {{-- <select wire:model="siswaID" class="choices form-select">
                                                            @foreach ($siswa as $item)
                                                                <option value="{{ $item->id }}">{{ $item->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select> --}}
                                                    {{-- @json($siswa) --}}
                                                    <div class="col-md-4">
                                                        <label for="email-horizontal">Jumlah Uang</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input wire:model="jumlah" type="number" class="form-control"
                                                            placeholder="uang yang di tabung" required>
                                                    </div>
                                                    <div class="col-sm-12 d-flex justify-content-between">
                                                        <em>
                                                            @if ($saldo > 0)
                                                            <h4>Saldo: <span class="badge bg-danger me-3">{{ format_idr($saldo) }}</span></h4>

                                                            @endif
                                                        </em>
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Submit</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <em>
                                            User: {{ $siswaID }}
                                        </em><br>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
                <!-- // Basic Horizontal form layout section end -->
            </div>

        </div>

        <footer>
            <div class="container">
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="https://saugi.me">Saugi</a></p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
