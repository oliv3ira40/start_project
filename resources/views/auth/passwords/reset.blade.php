@extends('auth.layout.layout')
@section('title', 'Esqueci a senha')


@section('content')
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    
    <div class="wrapper  pa-0">
        <header class="sp-header">
            <div class="form-group mb-0 pull-right">
                <span class="inline-block pr-10">Já possui uma conta?</span>
                <a class="inline-block btn btn-primary btn-rounded btn-outline" href="{{ route('login') }}">Login</a>
            </div>
            <div class="clearfix"></div>
        </header>
        
        <div style="background-color: #f5f5f5; min-height: 452px;" class="page-wrapper pa-0 ma-0 auth-page">
            <div class="container-fluid">

                <div class="table-struct full-width full-height">
                    <div class="table-cell vertical-align-middle auth-form-wrap">
                        <div class="auth-form ml-auto mr-auto no-float">
                            <div style="background-color: white; border-radius: 10px; border: solid 2px #e4e4e4;" class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="col-md-12 col-xs-12 pl-0 pr-0 mt-10 mb-20">
                                        <div class="col-md-6 col-xs-6 pl-0 text-left">
                                            <a href="{{ route('adm.index') }}">
                                                <!-- <img class="brand-img" src="{{ asset('blueeye/logo-black.png') }}" alt="brand"/> -->
                                                logo
                                            </a>
                                        </div>
                                        <div style="border-left: solid black 2px; margin-top: 18px;" class="col-md-6 col-xs-6 text-left">
                                            <h4 class="txt-dark mt-10 mb-10 txt-trans-initial">Resetar senha</h4>
                                        </div>
                                    </div>
                                    <div class="form-wrap">
                                        {!! Form::open(['url'=> route('adm.send_new_password')]) !!}

                                            <div class="form-group">
                                                <label class="control-label nonecase-font mb-5" for="email">E-mail</label>
                                                {!! Form::email('email', null, ['class'=>'form-control', 'id'=>'email']) !!}
                                                @if ($errors->has('email'))
                                                    <small class="pl-0 txt-danger txt-trans-initial font-12 font-bold">
                                                        {{ $errors->first('email') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-block btn-primary txt-trans-initial">Avançar</button>
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