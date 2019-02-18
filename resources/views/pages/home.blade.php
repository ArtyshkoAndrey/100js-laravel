@extends('layouts.app')

@section('title', $page->title)
@section('meta_keywords', $page->meta_keywords)
@section('meta_description', $page->meta_description)


@section('content')
<div class="container mt-xl-5">
    <div class="row">
      <div class="col-xl-7 mt-5">
        <div class="d-none d-sm-block">
          	<h1 class="display-4 text-light">{!! strip_tags($page->content_title, '<br><br/>') !!}<br>by <a href="{{$page->by_link}}" class="alert-link text-secondary">{{$page->by}}</a></h1><a class="btn btn-outline-secondary mt-4" href="/days">Посмотреть</a>
        </div>
        <div class="d-block d-sm-none mt-3">
          	<h1 class="display-6 text-light">{!! strip_tags($page->content_title, '<br><br/>') !!}<br>by <a href="{{$page->by_link}}" class="alert-link text-secondary">{{$page->by}}</a></h1><a class="btn btn-outline-secondary mt-4" href="/days">Посмотреть</a>
		</div>
      </div>
    </div>
</div>
@endsection

@section('footer')

@endsection