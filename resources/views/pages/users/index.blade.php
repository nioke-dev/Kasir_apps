@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    Add User
                </div>
                <div class="card-body">
                    @livewire('users.add')
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    List User
                </div>
                <div class="card-body">
                    @livewire('users.list-user-table')
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
