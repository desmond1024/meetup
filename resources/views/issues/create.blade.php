@extends('layouts.app')

@section('content')


<div class="am-container">
    <div class="header">
        <div class="am-g">
            <h1>添加新话题</h1>
        </div>
        <hr>
    </div>

    <form class="am-form" action="{{ route('issues.store') }}" method="post">

        {{csrf_field()}}

        <input type="hidden" name="user_id" value="{{Auth::id()}}">

	   <fieldset>
          <div class="am-form-group">
              <label>标题</label>
              <input type="text" placeholder="输入话题标题" name="title" value="{{old('title')}}">
          </div>

          <div class="am-form-group">
              <label>内容</label>
              <textarea rows="5" name="content" >{{old('content')}}</textarea>
          </div>

          <button type="submit" class="am-btn am-btn-default">提交</button>
      </fieldset>
    </form>
</div>
@endsection