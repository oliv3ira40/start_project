@extends('auth.layout.layout')
@section('title', 'Login')


@section('content')
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    
    <div class="wrapper  pa-0">
        <header class="sp-header">
            <div class="sp-logo-wrap pull-left">
                <a href="index.html">
                    <img class="brand-img mr-10" src="{{asset('admin_theme/img/logo.png') }}" alt="brand"/>
                    <span class="brand-text">ADM</span>
                </a>
            </div>
            <div class="form-group mb-0 pull-right">
                <span class="inline-block pr-10">Não possui uma conta?</span>
                <a class="inline-block btn btn-primary btn-rounded btn-outline" href="{{ route('register') }}">Registre-se</a>
            </div>
            <div class="clearfix"></div>
        </header>
        
        <div style="background-color: #f5f5f5; min-height: 452px;" class="page-wrapper pa-0 ma-0 auth-page">
            <div class="container-fluid">

                <div class="table-struct full-width full-height">
                    <div class="table-cell vertical-align-middle auth-form-wrap">
                        <div class="auth-form  ml-auto mr-auto no-float">
                            <div style="background-color: white; border-radius: 10px; border: solid 2px #e4e4e4;" class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="mb-30">
                                        <h3 class="text-center txt-dark mt-10 mb-10">Login</h3>
                                        <h6 class="text-center nonecase-font txt-grey">Digite seus dados abaixo</h6>
                                    </div>	
                                    <div class="form-wrap">
                                        {!! Form::open(['url'=> 'login']) !!}

                                            <div class="form-group">
                                                <label class="control-label mb-5" for="email">E-mail</label>
                                                {!! Form::email('email', null, ['class'=>'form-control', 'id'=>'email']) !!}
                                                @if ($errors->has('email'))
                                                    <small class="pl-0 txt-danger txt-trans-initial font-12 font-bold">
                                                        {{ $errors->first('email') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="pull-left control-label mb-5" for="password">Senha</label>

                                                <a class="txt-primary block mb-5 pull-right font-12 font-bold" href="forgot-password.html">Esqueceu a senha ?</a>
                                                <div class="clearfix"></div>
                                                
                                                {!! Form::password('password', ['class'=>'form-control', 'id'=>'password']) !!}
                                                @if ($errors->has('password'))
                                                    <small class="txt-danger txt-trans-initial font-12 font-bold">
                                                        {{ $errors->first('password') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-block btn-primary">Entrar</button>
                                            </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>	
                            </div>
                        </div>
                    </div>
                </div>	
            </div>
            
        </div>
    
    </div>
@endsection