@extends('paises.layout')

@section('title',__('Criar (Corona CRUD Laravel)'))

@push('css')
<style>
    /* Personalizar layout*/
</style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between w-100">
                        <span>@lang('Criar (Corona CRUD Laravel)')</span>
                        <a href="{{ url('crud') }}" class="btn-info btn-sm">
                            <i class="fa fa-arrow-left"></i> @lang('Voltar')
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    {!! Form::open(['action' =>'PaisController@store', 'method' => 'POST'])!!}

                    <div class="form-group">
                        {!! Form::label(__('Nome do País:')) !!}
                        {!! Form::text("nome_pais", null ,["class"=>"form-control","required"=>"required"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label(__('Sigla:')) !!}
                        {!! Form::text("sigla", null ,["class"=>"form-control","required"=>"required"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label(__('Continente:')) !!}
                        {!! Form::text("continente", null ,["class"=>"form-control","required"=>"required"]) !!}
                    </div>

                    <div class="well well-sm clearfix">
                        <button class="btn btn-success pull-right" title="@lang('Salvar')"
                            type="submit">@lang('Adicionar')</button>
                    </div>

                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script language='JavaScript'>
    $(".mmss").focusout(function () {
        var id = $(this).attr('id');
        var vall = $(this).val();
        var regex = /[^0-9]/gm;
        const result = vall.replace(regex, ``);
        $('#' + id).val(result);
    });
</script>
@endpush