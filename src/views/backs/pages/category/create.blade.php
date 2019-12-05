@extends("backs.layouts.app")

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>@yield('title')</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">{{ __('Back to list')}}</a>
        </div>
    </div>

    <div class="card ">
        <div class="card-body">
            <div class="card-header">
                <h3 class="title-edit-cate">
                    Tạo danh mục
                </h3>
            </div>
            <div class="card-body overflow-auto" style="height: 60vh">
                {!! Form::open(['url' => route('admin.categories.store'), 'method' => 'POST']) !!}
                <div class="form-group">
                    {!! Form::label('name', __('Name')) !!}
                    {!! Form::text('name', null, ['class' => "form-control"]) !!}
                    {!! Form::errors('name') !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', __('Description')) !!}
                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                    {!! Form::errors('description') !!}
                </div>
                <div class="form-group">
                    {!! Form::label('meta_description', __('Meta Description')) !!}
                    {!! Form::text('meta_description', null, ['class' => 'form-control']) !!}
                    {!! Form::errors('meta_description') !!}
                </div>
                <div class="form-group">
                    {!! Form::label('meta_title', __('Meta Title')) !!}
                    {!! Form::text('meta_title', null, ['class' => 'form-control']) !!}
                    {!! Form::errors('meta_title') !!}
                </div>
                <div class="form-group">
                    {!! Form::label('select_activate ', __('Select Activate')) !!}
                    <div class="ml-2 ml-md-4">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            {!! Form::radio('activate', 1, null, [
                                'id' => 'activate',
                                'class' => 'custom-control-input',
                            ]) !!}
                            <label class="custom-control-label" for="activate">
                                {{ ucfirst('Activate') }}
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            {!! Form::radio('activate', 0, null, [
                                'id' => 'deactivate',
                                'class' => 'custom-control-input',
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
    </div>
@endsection

@section('page-script')

@endsection

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('css/backs.css') }}">
@endsection
