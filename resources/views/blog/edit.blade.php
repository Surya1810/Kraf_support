@extends('layouts.admin')

@section('title')
    Create Content
@endsection

@push('css')
    <script src="https://cdn.tiny.cloud/1/s7h48tmpx44zenjzuehfwzluynm7n5cv1ty3v2u1suxy4vqv/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#body',
            // plugins: 'powerpaste advcode table lists checklist',
            plugins: 'table lists',
            toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table | alignleft aligncenter alignright alignjustify | outdent indent'
        });
    </script>
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
            <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
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
                                            <label for="body">Content</label>
                                            <textarea class=" form-control @error('body') is-invalid @enderror" rows="4" placeholder="Enter creative brief..."
                                                id="body" name="body">{{ old('body') }}</textarea>
                                            @error('body')
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
                                            <label for="tags">Tags</label>
                                            <div class="select2-orange">
                                                <select
                                                    class="form-control tags select2 @error('tags') is-invalid @enderror"
                                                    multiple="multiple" data-dropdown-css-class="select2-orange"
                                                    style="width: 100%;" id="tags" name="tags[]">
                                                    @if (old('tags') != null)
                                                        @foreach (old('tags') as $key => $data)
                                                            <option value="{{ $data }}"
                                                                {{ collect(old('tags'))->contains($data) ? 'selected' : '' }}>
                                                                {{ $data }}</option>
                                                        @endforeach
                                                    @else
                                                        <option></option>
                                                    @endif
                                                </select>
                                                @error('tags')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="categories">Categories</label>
                                            <select class="form-control categories select2-orange is-invalid"
                                                data-dropdown-css-class="select2-orange" style="width: 100%;"
                                                id="categories" name="categories">
                                                <option></option>
                                                <option></option>
                                                <option value="Event"
                                                    {{ old('categories') == 'Event' ? 'selected' : '' }}>
                                                    Event</option>
                                                <option value="Project"
                                                    {{ old('categories') == 'Project' ? 'selected' : '' }}>
                                                    Project</option>
                                                <option value="Content"
                                                    {{ old('categories') == 'Content' ? 'selected' : '' }}>Content</option>
                                            </select>
                                            @error('categories')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="thumbnail">Thumbnail</label>
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input @error('thumbnail') is-invalid @enderror"
                                                    id="thumbnail" name="thumbnail">
                                                @error('thumbnail')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <label class="custom-file-label" for="thumbnail">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer rounded-kraf">
                                <button type="submit" class="btn btn-success float-right shadow-lg">Publish</button>
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
            $('.tags').select2({
                placeholder: "Create tag",
                allowClear: true,
                tags: true
            })
            $('.categories').select2({
                placeholder: "Choose Categories",
                allowClear: true,
            })
        })
    </script>
@endpush
