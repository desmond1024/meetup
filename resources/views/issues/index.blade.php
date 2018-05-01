@extends('layouts.app')
@section('content')

<div class="detail">
    <div class="am-g am-container">
        <div class="am-u-lg-12">
            <h1 class="detail-h1">已发布的话题都在下面了...</h1>
        </div>
    </div>
</div>
@include('shared._issue_list')
{{$issues->links()}}

@endsection