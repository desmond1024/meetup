@extends('layouts.app')

@section('content')
<div class="detail">
    <div class="am-g am-container">
        <div class="am-u-lg-12">
            <h1 class="detail-h1">编辑资料</h1>
        </div>
    </div>
</div>

<div class="am-g">
    <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
        
        <form method="post" class="am-form" action="{{ route('users.update',$user->id) }}">
            {{csrf_field()}}
            {{method_field('PUT')}}

                <div class="am-form-group am-form-icon am-form-feedback {{ $errors->has('username') ? ' am-form-error' : '' }}">
                    <label class="am-form-label" for="username">新账号名: </label>
                    <input type="text" id="username" name="username" class="am-form-field" placeholder="输入你的新账号名" value="{{ $user->username }}">

                    @if ($errors->has('username'))
                        <span class="am-icon-warning">{{$errors->first('username')}}</span>
                    @endif
                </div>

                <div class="am-form-group am-form-icon am-form-feedback">
                    <label class="am-form-label" for="email">邮箱: </label>
                    <input type="text" id="email" name="email" class="am-form-field" placeholder="输入你的邮箱" value="{{ $user->email }}" disabled>
                </div>

                <div class="am-form-group am-form-icon am-form-feedback {{ $errors->has('password') ? ' am-form-error' : '' }}">
                    <label class="am-form-label" for="password">新密码: </label>
                    <input type="password" id="password" name="password" class="am-form-field" placeholder="输入你的新密码">

                    @if ($errors->has('password'))
                        <span class="am-icon-warning">{{$errors->first('password')}}</span>
                    @endif
                </div>

                <div class="am-form-group am-form-icon am-form-feedback {{ $errors->has('password_confirmation') ? ' am-form-error' : '' }}">
                    <label class="am-form-label" for="password_confirmation">重复新密码: </label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="am-form-field" placeholder="请重新输入你的新密码">
                </div>

            <div class="am-cf">
                <button type="submit" name="" class="am-btn am-btn-secondary am-fr ">更新</button>
            </div>
        </form>
        <br>
    </div>
</div>
@endsection