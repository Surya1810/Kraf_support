@extends('layouts.admin')

@section('title')
    Project Detail
@endsection

@push('css')
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Primary Outline</h3>
            </div>
            <div class="card-body">
                The body of the card
            </div>
        </div>

    </section>
@endsection

@push('scripts')
@endpush
