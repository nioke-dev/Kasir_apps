@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
                    <i class="fas fa-list"></i> Daftar Barang
                </div>
                <div class="col-lg-6 text-end">
                    @livewire('barang.tambah-barang')
                </div>
            </div>
        </div>
        <div class="card-body">
            @livewire('barang.table-barang')
        </div>
    </div>
@endsection

@push('livewire-styles')
    @livewireStyles
@endpush

@push('livewire-scripts')
    @livewireScripts
@endpush
