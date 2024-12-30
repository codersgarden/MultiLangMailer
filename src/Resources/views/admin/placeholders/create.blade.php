@extends('email-templates::layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1>{{ __('email-templates::messages.create_placeholder') }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.placeholders.store') }}" method="POST">'
            @csrf
            <div class="form-group">
                <label for="name">{{ __('email-templates::messages.name') }}</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">{{ __('email-templates::messages.description') }}</label>
                <input type="text" name="description" id="description" class="form-control">
            </div>
            <div>
                <label for="type">{{ __('email-templates::messages.type') }}</label>
                <select name="data_type" id="type" class="form-control">
                    @foreach (config('email-templates.placeholder_data_types') as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('email-templates::messages.create') }}</button>
            <a href="{{ route('admin.placeholders.index') }}"
                class="btn btn-secondary">{{ __('email-templates::messages.cancel') }}</a>
        </form>
    </div>
@endsection
