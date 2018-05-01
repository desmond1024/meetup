@extends('layouts.app')

@section('content')
<div class="detail">
    <div class="am-g am-container">
        <div class="am-u-lg-12">
            <h1 class="detail-h1">重置密码</h1>
        </div>
    </div>
</div>

<div class="am-g">
    <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
        @if (session('status'))
            <div class="am-alert am-alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form method="post" class="am-form" action="{{ route('password.email') }}">
            {{csrf_field()}}
            <div class="am-form-group am-form-icon am-form-feedback {{ $errors->has('email') ? ' am-form-error' : '' }}" >
                <label class="am-form-label" for="email">邮箱地址： </label>
                <input type="text" id="email" name="email" class="am-form-field" placeholder="输入你的邮箱地址" value="{{old('email')}}">

                @if ($errors->has('email'))
                    <span class="am-icon-warning">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="am-cf">
                <button type="submit" name="" class="am-btn am-btn-secondary am-fr ">发送密码重置邮件</button>
            </div>
        </form>
        <br>
    </div>
</div>
@endsection
