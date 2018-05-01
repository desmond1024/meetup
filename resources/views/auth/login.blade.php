@extends('layouts.app')

@section('content')

<div class="detail">
    <div class="am-g am-container">
        <div class="am-u-lg-12">
            <h1 class="detail-h1">登陆</h1>
        </div>
    </div>
</div>

<div class="am-g">
    <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">

        <form method="post" class="am-form" action="{{ route('login') }}">
            {{csrf_field()}}
            <div class="am-form-group am-form-icon am-form-feedback {{ $errors->has('email') ? ' am-form-error' : '' }}" >
                <label class="am-form-label" for="email">邮箱: </label>
                <input type="text" id="email" name="email" class="am-form-field" placeholder="输入你的邮箱" value="{{old('email')}}">

                @if ($errors->has('email'))
                    <span class="am-icon-warning">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="am-form-group am-form-icon am-form-feedback {{ $errors->has('password') ? ' am-form-error' : '' }}">
                <label class="am-form-label" for="password">密码（<a href="{{ route('password.request') }}">忘记密码</a>）: </label>
                <input type="password" name="password" id="password" class="am-form-field" placeholder="输入你的密码">

                @if($errors->has('password'))
                    <span class="am-icon-warning">{{$errors->first('password')}}</span>
                @endif
            </div>


            <!-- <div class="am-form-group am-form-icon am-form-feedback">
                <label class="am-form-label" for="captcha">验证码: </label>

                <div class="am-g doc-am-g">
                    <div class="am-u-sm-9">
                        <input type="text" name="captcha" id="captcha" class="am-form-field" placeholder="输入你的验证码">
                    </div>
                    <div class="am-u-sm-3">
                        <img src="assets/img/captcha.png" alt="" style="cursor: pointer;">
                    </div>
                </div>
            </div> -->

            <label for="remember-me">
                <input id="remember-me" type="checkbox" name="remember">
                记住密码
            </label>
            <br>

            <hr>
            <div class="am-cf">
                <input type="submit" value="登陆" class="am-btn am-btn-secondary am-btn-sm am-fr">
                <!-- <input type="submit" name="" value="Forget Password ^_^? "
                       class="am-btn am-btn-default am-btn-sm am-fr"> -->
            </div>
        </form>
        <br>
    </div>
</div>

@endsection
