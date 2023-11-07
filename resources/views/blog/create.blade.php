@extends('layouts.admin')

@section('title')
    Create Content
@endsection

@push('css')
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Content</h1>
                    <ol class="breadcrumb text-black-50">
                        <li class="breadcrumb-item"><a class="text-black-50" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-black-50" href="{{ route('blog.index') }}">Blog</a>
                        </li>
                        <li class="breadcrumb-item active"><strong>Create</strong></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="row mb-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-success float-right shadow-lg">Publish</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="card rounded-kraf card-outline card-orange w-100">
                            <div class="card-header">
                                <h3 class="card-title">Content Create</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                id="title" name="title" placeholder="Enter content title"
                                                value="{{ old('title') }}">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="creative_brief">Content</label>
                                            <textarea class="form-control @error('creative_brief') is-invalid @enderror" rows="4"
                                                placeholder="Enter creative brief..." id="creative_brief" name="creative_brief">{{ old('creative_brief') }}</textarea>
                                            <form method="post">
                                                <textarea id="myeditorinstance">Hello, World!</textarea>
                                            </form>
                                            @error('creative_brief')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="card rounded-kraf card-outline card-orange w-100">
                            <div class="card-header">
                                <h3 class="card-title">Post Setting</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name">Tags</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="name" name="name" placeholder="Enter project name"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="client">Client name</label>
                                            <input type="text" class="form-control @error('client') is-invalid @enderror"
                                                id="client" name="client" placeholder="Enter client name"
                                                value="{{ old('client') }}">
                                            @error('client')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="creative_brief">Thumbnail</label>
                                            <input type="file" class="form-control @error('client') is-invalid @enderror"
                                                id="client" name="client" placeholder="Enter client name"
                                                value="{{ old('client') }}">
                                            @error('creative_brief')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.pic').select2({
                placeholder: "Select PIC",
                allowClear: true,
            })
        })
    </script>
@endpush
