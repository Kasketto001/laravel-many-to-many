@extends('layouts.admin')

@section('content')
    <div class="container mt-5 d-flex justify-content-between">
        <h1>New Project</h1>
    </div>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input
                    type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    name="title"
                    id="title"
                    aria-describedby="titleHelp"
                    placeholder="Project Title"
                    value="{{ old('title') }}"
                />
                <small id="titleHelp" class="form-text text-muted">Write the project title</small>
                @error('title')
                <div class="text-danger py-3">
                    {{ $message }}
                </div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea
                    class="form-control @error('description') is-invalid @enderror"
                    name="description"
                    id="description"
                    rows="3"
                    aria-describedby="descriptionHelp"
                    placeholder="Project Description"
                >{{ old('description') }}</textarea>
                <small id="descriptionHelp" class="form-text text-muted">Write the project description</small>
                @error('description')
                <div class="text-danger py-3">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input
                    type="text"
                    class="form-control @error('author') is-invalid @enderror"
                    name="author"
                    id="author"
                    aria-describedby="authorHelp"
                    placeholder="Author Name"
                    value="{{ old('author') }}"
                />
                <small id="authorHelp" class="form-text text-muted">Write the author's name (optional)</small>
                @error('author')
                <div class="text-danger py-3">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Add Thumbnail</label>
                <input
                    type="file"
                    class="form-control"
                    name="thumb"
                    id="thumb"
                    placeholder="Add Thumbnail"
                    aria-describedby="thumbHelpId"
                />
                <div id="thumbHelpId" class="form-text">Upload your thumbnail of project</div>
            </div>

            <div class="mb-3">
                <label for="type_id">Type</label>
                <select name="type_id" id="type_id" class="form-control">
                    <option value="">Select Type</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            

            <div class="mb-3">
                @foreach ($technologies as $technology)
                    <div class="form-check">
                        <input name="technologies[]" class="form-check-input" type="checkbox" value="{{ $technology->id }}" id="technology-{{ $technology->id }}" />
                        <label class="form-check-label" for="technology-{{ $technology->id }}"> {{ $technology->name }} </label>
                    </div>
                @endforeach
            </div>
            


            <div class="mb-3">
                <label for="author" class="form-label">Repository Link</label>
                <input
                    type="text"
                    class="form-control @error('link_repository') is-invalid @enderror"
                    name="link_repository"
                    id="link_repository"
                    aria-describedby="link_repositoryHelp"
                    placeholder="Link github repository"
                />
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Live Preview Link</label>
                <input
                    type="text"
                    class="form-control @error('link_preview') is-invalid @enderror"
                    name="link_preview"
                    id="link_preview"
                    aria-describedby="link_previewHelp"
                    placeholder="live preview link"
                />
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
