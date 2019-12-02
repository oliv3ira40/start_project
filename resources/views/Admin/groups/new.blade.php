@extends('Admin.layout.layout')
@section('title', 'Novo Grupo')

@section('content')

    <div class="row heading-bg height-auto pt-0 pb-0">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 onclick="javascript:history.back()">
                <a class="text-primary font-bold" href="#">Voltar</a>
            </h5>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Novo Grupo</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap row">
                            {!! Form::open(['url'=>route('adm.groups.save')]) !!}
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="control-label txt-trans-initial mb-10 text-left">
                                            Nome*
                                            @if ($errors->has('name'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('name') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('name', null, ['class'=>'form-control', 'id'=>'first_name']) !!}
                                    </div>

                                    <label for="tag_color" class="control-label txt-trans-initial mb-10 text-left">
                                        Cor da tag*
                                        @if ($errors->has('tag_color'))
                                            <small class="txt-danger txt-trans-initial font-bold">
                                                {{ $errors->first('tag_color') }}
                                            </small>
                                        @endif
                                        <div class="colorpicker input-group colorpicker-component">
                                            <input type="text" name="tag_color" value="#000000" class="form-control" />
                                            <span class="input-group-addon"><i></i></span>
                                        </div>
                                    </label>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="permissions" class="control-label txt-trans-initial mb-10 text-left">
                                            Permissões*
                                            @if ($errors->has('permissions'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('permissions') }}
                                                </small>
                                            @endif
                                        </label>
                                        <select id='pre-selected-options' name="permissions[]" multiple='multiple'>
                                            @foreach ($created_permissions as $permission)
                                                <option value='{{ $permission->id }}'>{{ $permission->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mb-10 col-md-12">
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox2" checked type="checkbox" name="stay_on_page">
                                        <label for="checkbox2">
                                            Permanecer na página
                                        </label>
                                    </div>	
                                </div>

                                <div class="form-group mb-0 col-md-12">
                                    {!! Form::submit('Salvar', ['class'=>'btn btn-xs btn-block btn-primary']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection