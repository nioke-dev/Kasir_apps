@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <strong><i class="fa-solid fa-people-group"></i> Tambah Kategori Barang</strong>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @livewire('barang.add-kategori-barang')
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <strong><i class="fa-solid fa-people-group"></i> List Kategori Barang</strong>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @livewire('barang.kategori-barang-table')
                </div>
            </div>
        </div>
    </div>
@endsection

@push('livewire-styles')
    @livewireStyles
@endpush

@push('livewire-scripts')
    @livewireScripts
@endpush
