@extends('layouts.app')

@section('title', $tDay->title)
@section('meta_keywords', $tDay->meta_keywords)
@section('meta_description', $tDay->meta_description)

@section('content')
<div class="bg-dark">
  <div class="iframe-wrapper">
    <iframe class="d-none d-md-block" src="{{ url('/'). '/' . $tDay->body }}" height="100%" width="100%" border="none" sandbox="allow-scripts allow-same-origin" seamless></iframe>
    <div class="not-supported d-block d-md-none" style="height: calc(100vh - 56px);">
      <div class="container h-100 d-flex align-items-center">
        <div class="row d-flex flex-column justify-content-center align-items-center">
          <div class="col-12">
            <h4 class="text-light text-center mb-4">Упс, ваше устройство не поддерживается</h4><img class="w-100" src="{{ asset('images/not-supported.svg') }}">
            <h4 class="text-light text-center mt-4">Попробуйте зайти с компьютера</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('footer')

@endsection

@section('script')

@endsection
