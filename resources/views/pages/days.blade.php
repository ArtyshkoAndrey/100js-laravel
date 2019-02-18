@inject('days', 'App\Http\Controllers\DayController')
@extends('layouts.app')

@section('title', $page->title)
@section('meta_keywords', $page->meta_keywords)
@section('meta_description', $page->meta_description)

@section('style')
  <style>
    .text-success{
      color: #129228 !important;
    }
  </style>
@endsection

@section('content')
  <div class="container mt-2 mt-md-4">
      <div class="row">
        <div class="col-md-6">
          <h2>{{$page->content_title}}</h2>
          {!! $page->content !!}
        </div>
        <div class="col-md-6 d-flex">
          <div class="card align-self-center">
            <div class="card-body">
              <h6 class="card-title">Узнавайте о выходе нового дня первым! Подпишитесь на рассылку!</h6>
              <form type="post" id="addemail">
                {{ csrf_field() }}
                <div class="from-group mb-3">
                  <label for="emailInput">Введите email</label>
                  <input class="form-control" type="email" id="emailInput" aria-describedby="emailHelp" placeholder="Введите email" name="email">
                  <small class="form-text text-muted" id="emailHelp">Мы не будем распространять ваш email.</small>
                  <small class="form-text font-weight-bold" id="emailValid"></small>
                </div>
                <button class="btn btn-secondary" type="submit">Отправить</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container mt-5 mb-5">
      <div class="row">
        <div class="col-sm-12">
          <h1>100 Days of JavaScript</h1>
        </div>
        <? $i = count($days->index()); ?>
        @foreach($days->index() as $day)
        <div class="col-sm-12 col-md-6 col-lg-4 d-flex align-items-stretch">
          <div class="card mt-4 w-100">
            <div class="card-body d-flex align-items-start flex-column">
              <h4 class="card-title">{{ 'Day ' . $i . ' - ' . $day->title }}</h4>
              <p class="card-text">{!! $day->short_description !!}</p>
              <div class="mt-auto d-flex w-100"><a class="btn btn-secondary mr-2" href="{{ route('day.show', $day->slug) }}">Посмотреть</a><a class="btn btn-secondary mr-2" href="{{ $day->git_link }}"><span class="fa fa-github-alt mr-2"></span><span class="d-xl-inline-block">GitHub</span></a>
                <div class="ml-auto d-none d-sm-flex d-lg-none d-xl-flex">
                  <p class="my-auto"><span class="fa fa-eye mr-1"></span><span class="fixedNumber">{{ $day->views }}</span></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <? $i--; ?>
        @endforeach
      </div>
    </div>
@endsection

@section('footer')
    <footer class="ht-footer bg-dark w-100 position-absolute p-3 text-light h-15">
      <div class="container">
        <div class="row d-flex align-items-stretch">
          <div class="col-md-4 d-flex flex-column text-center text-md-left order-2 order-md-1 mb-2 mb-md-0">
            <div class="pb-1 pb-md-2">Copyright by <a href="https://hugant.github.io" target="_blank" class="text-secondary">Hugant Mirron</a></div>
            <div>Supported by <a href="https://artyshko.ru" target="_blank" class="text-secondary"> Fulliton</a></div>
          </div>
          <div class="col-md-4 d-flex align-items-center justify-content-center order-1 order-md-2 mb-2 mb-md-0"><a class="navbar-brand text-light m-0" href="{{ url('/') }}">100 Days of JavaScript</a></div>
          <div class="col-md-4 d-flex align-items-center justify-content-center order-3 justify-content-md-end">
            <div>Main in details</div>
          </div>
        </div>
      </div>
    </footer>
@endsection

@section('script')
  <script>
      var labels = $(".fixedNumber");
      
      function fixNumber(number) {
        if (number > 999999)
          if ((number / 1000000).toFixed(1).length > 3)
            return (number / 1000000).toFixed(0) + "M"
          else
            return (number / 1000000).toFixed(1) + "M";
        else if (number > 999)
          if ((number / 1000).toFixed(1).length > 3)
            return (number / 1000).toFixed(0) + "K"
          else
            return (number / 1000).toFixed(1) + "K";
      
        return number;
      }
      
      labels.each(function() {
        $(this)[0].innerHTML = fixNumber($(this)[0].innerHTML);
      });
      
  </script>
  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $(document).ready(function(){
      $('#addemail').on('submit', function(e){
          e.preventDefault();
          var email = $("input[name=email]").val();
          // console.log(text);
          $.ajax({
            type: 'POST',
            url: '/days',
            data: {email:email},
            success: function(param)
            {
              console.log(param['success']);
              if(param['success'] === undefined) {
                $('#emailValid').removeClass('text-success').addClass('text-danger');
                $('#emailValid').text('Данная почта уже существует');
              }
              else if(param['error'] === undefined) {
                $('#emailValid').removeClass('text-danger').addClass('text-success');
                $('#emailValid').text('Почта добавлена');
              }
            },
          });
      });
  });
  </script>
@endsection
