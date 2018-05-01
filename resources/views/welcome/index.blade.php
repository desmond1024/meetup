@extends('layouts.app')

@section('content')
<div class="get">
    <div class="am-g">
        <div class="am-u-lg-12">
            <h1 class="get-title stroke">这里是话题Web!<br>欢迎光临!</h1>

            <p>发布话题、聊天交友</p>

            <p>
                <a href="{{route('issues.create')}}" class="am-btn am-btn-success am-round"><i class="am-icon am-icon-heart"></i>发布新话题</a>
            </p>
        </div>
    </div>
</div>

<div class="detail">
    <div class="am-g am-container">
        <div class="am-u-lg-12">
            <h1 class="detail-h1">最新的话题</h1>
        </div>
    </div>
</div>

    @include('shared._issue_list')
@endsection