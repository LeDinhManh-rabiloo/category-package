@extends('backs.layouts.app')

@section('title', __('Create New Role'))

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>@yield('title')</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.account.index') }}" class="btn btn-outline-secondary">{{ __('Back to list')}}</a>
        </div>
    </div>

    <div class="card ">
        <div class="card-body">
            {!! Form::open(['url' => route('admin.categories.update', $id), 'method' => 'PUT']) !!}
            @foreach($category->categoryLang as $cate)
                @if($cate->lang_id == 1)
                    <div class="form-group">
                        {!! Form::label('name', __('Name')) !!}
                        {!! Form::text('name', $cate->name, ['class' => "form-control"]) !!}
                        {!! Form::errors('name') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', __('Description')) !!}
                        {!! Form::text('description', $cate->description, ['class' => 'form-control']) !!}
                        {!! Form::errors('description') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('meta_description', __('Meta Description')) !!}
                        {!! Form::text('meta_description', $cate->meta_description, ['class' => 'form-control']) !!}
                        {!! Form::errors('meta_description') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('meta_title', __('Meta Title')) !!}
                        {!! Form::text('meta_title', $cate->meta_title, ['class' => 'form-control']) !!}
                        {!! Form::errors('meta_title') !!}
                    </div>
                @endif
            @endforeach
            <div class="form-group">
                {!! Form::label('select_activate', __('select Activate')) !!}
                <div class="ml-2 ml-md-4">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        {!! Form::radio('activate', 1, null, [
                            'id' => 'activate',
                            'class' => 'custom-control-input',
                            $category->activate == 1 ? 'checked' : ''
                        ]) !!}
                        <label class="custom-control-label" for="activate">
                            {{ ucfirst('Activate') }}
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        {!! Form::radio('activate', 0, null, [
                            'id' => 'deactivate',
                            'class' => 'custom-control-input',
                            $category->activate == 0 ? 'checked' : ''
                        ]) !!}
                        <label class="custom-control-label" for="deactivate">
                            {{ ucfirst('Deactivate') }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group border-top pt-3 mb-0">
                <button type="submit" class="btn btn-primary mr-2">
                    <i class="far fa-save"></i> {{ __('Save') }}
                </button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times"></i>
                    {{__('Cancel') }}
                </a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
