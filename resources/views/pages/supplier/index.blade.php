@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
                    <strong><i class="fa-solid fa-people-group"></i> List Supplier</strong>
                </div>
                <div class="col-lg-6">
                    @livewire('supplier.add')
                </div>
            </div>
        </div>
        <div class="card-body">
            @livewire('supplier.table')
        </div>
    </div>
@endsection

@push('livewire-styles')
    @livewireStyles
@endpush

@push('livewire-scripts')
    @livewireScripts
@endpush
