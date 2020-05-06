@extends('auth.layout.layout')
@section('title', 'Login')

@section('content')
    <div class="m-t-20 card-box">
        <div class="text-center">
            <h4 class="text-uppercase font-bold mb-0">Login</h4>
        </div>
        <div class="p-20 p-t-10 p-b-10">
            {!! Form::open(['url'=>route('login'), 'class'=>'form-horizontal mt-0']) !!}
                <div class="form-group pt-0">
                    <div class="col-xs-12">
                        <label for="email">
                            E-mail<br>
                            
                            @if ($errors->has('email'))
                                <small class="pl-0 text-danger txt-trans-initial font-12 font-bold">
                                    {{ $errors->first('email') }}
                                </small>
                            @endif
                        </label>
                        {!! Form::email('email', null, ['class'=>'form-control', 'id'=>'email', 'autofocus'=>'true']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="password">
                            Senha<br>

                            @if ($errors->has('password'))
                                <small class="pl-0 text-danger txt-trans-initial font-12 font-bold">
                                    {{ $errors->first('password') }}
                                </small>
                            @endif
                        </label>
                        {!! Form::password('password', ['class'=>'form-control', 'id'=>'password']) !!}
                    </div>
                </div>

                <div class="form-group text-center m-t-5">
                    <div class="col-xs-12">
                        <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">
                            Acessar
                        </button>
                    </div>
                </div>

                <div class="form-group m-t-10 mb-0">
                    <div class="col-md-12 pl-0">
                        <a href="{{ route('adm.reset_password') }}" class="text-muted">
                            <i class="fa fa-lock m-r-5"></i>
                            Esqueceu sua senha?
                        </a>
                    </div>
                </div>
            {!! Form::close() !!}

        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 text-center">
            <p class="text-muted">Não possui uma conta?
                <a href="{{ route('register') }}" class="text-primary m-l-5">
                    <b>Registre-se</b>
                </a>
            </p>
        </div>
    </div>
@endsection