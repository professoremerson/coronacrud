@extends('coronas.layout')

@section('title',__('Corona (CRUD Laravel)'))

@push('css')
<style>
    /* Personalizar layout */
</style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between w-100">
                        <span>@lang('Corona (CRUD Laravel)')</span>
                        <a href="{{ url('cases/create') }}" class="btn-primary btn-sm">
                            <i class="fa fa-plus"></i> @lang('Criar Novo')
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>@lang('Nome do País')</td>
                                <td>@lang('Total de Casos')</td>
                                <td>@lang('Total de Mortes')</td>
                                <td colspan="3" class="text-center">@lang('Ações')</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($coronaCases as $case)
                            <tr>
                                <td>{{$case->id}}</td>
                                <td>{{$case->country_name}}</td>
                                <td>{{number_format($case->symptoms,0,",",".")}}</td>
                                <td>{{number_format($case->cases,0,",",".")}}</td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('cases.show', $case->id)}}"
                                        class="btn btn-info btn-sm">@lang('Abrir')
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('cases.edit', $case->id)}}"
                                        class="btn btn-primary btn-sm">@lang('Editar')
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <form action="{{ route('cases.destroy', $case->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    // Script personalizado
</script>
@endpush