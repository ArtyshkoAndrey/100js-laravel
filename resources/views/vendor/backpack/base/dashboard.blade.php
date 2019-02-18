@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        {{ trans('backpack::base.dashboard') }}<small>{{ trans('backpack::base.first_page_you_see') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')

  <div class="row">
    <div class="col-md-4">
      <div class="info-box bg-red">
        <span class="info-box-icon"><i class="fa fa-sun-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Days</span>
          <span class="info-box-number">{{$countDays}}</span>
          <!-- The progress section is optional -->
          <div class="progress">
            <div class="progress-bar" style="width: {{$countDays}}%"></div>
          </div>
          <span class="progress-description">
            {{$countDays}}% Increase in all time
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div>
    <div class="col-md-4">
      <div class="info-box">
        <!-- Apply any bg-* class to to the icon to color it -->
        <span class="info-box-icon bg-blue"><i class="fa fa-user-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Admins</span>
          <span class="info-box-number">{{$countAdmins}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div>
    <div class="col-md-4">
      <div class="info-box">
        <!-- Apply any bg-* class to to the icon to color it -->
        <span class="info-box-icon bg-green"><i class="fa fa-star-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">views</span>
          <span class="info-box-number">{{$countViews}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div>
    <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <div class="box-title">{{ trans('backpack::base.login_status') }}</div>
        </div>
        <div class="box-body">{{ trans('backpack::base.logged_in') }}</div>
      </div>
    </div>
    <div class="col-md-6" style="height: 400px">
      <div id="chart1"></div>
    </div>
    <div class="col-md-6">
      <div id="chart2"></div>
    </div>
    <div class="col-md-12" style="padding-top: 20px; height: 100%;">
      <div class="row" style=" background: #fff; margin-right: 5px; margin-left: 5px;">
        <div class="col-md-6">
          <div id="chart3"></div>
        </div>
        <div class="col-md-6">
          <ul style="padding-top: 15px; padding-bottom: 15px">
            @foreach($topPages as $topPage)
              <li>
                {{url($topPage['url'])}} - {{$topPage['pageviews']}}
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-6" style="padding-top: 20px;">
      <div id="chart4"></div>
    </div>
  </div>
@endsection

@section('after_scripts')
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script>
    $('#chart1').highcharts({
      chart: {
          type: 'spline'
      },
      title: {
          text: 'Активность посетителей за последние 30 дней'
      },
      xAxis: {
          categories: {!! $userViews['dateArray'] !!}
      },
      yAxis: {
          title: {
              text: 'Количество'
          },
          plotLines: [{
              value: 0,
              width: 1,
              color: '#808080'
          }]
      },
      series: {!! $userViews['dataArray'] !!}
    });
    $('#chart2').highcharts({
    chart: {
        type: 'pie'
    },
    lang: {
        drillUpText: 'Вернуться к разбивке по странам'
    },
    title: {
        text: 'География посещений за неделю - Страны'
    },
    subtitle: {
        text: 'Нажмите на страну, чтобы перейти к разбивке по областям'
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y}'
            }
        }
    },

    tooltip: {
        headerFormat: '{series.name}',
        pointFormat: '{point.name}: {point.y} визитов'
    },
    series: [{
        name: 'Страна',
        colorByPoint: true,
        data: {!! $geoRegionPie['dataArray'] !!}
    }],
    drilldown: {
        series: {!! $geoRegionPie['drilldownArray'] !!}
    }
});

// Create the chart
$('#chart3').highcharts({  
  chart: {
    type: 'column'
  },
  title: {
    text: 'Топ просмативаемых страниц'
  },
  xAxis: {
    type: 'category'
  },
  yAxis: {
    title: {
      text: 'Топ просмативаемых страниц'
    }

  },
  legend: {
    enabled: false
  },
  plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: true,
        format: '{point.y:.1f}'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
  },

  "series": [
    {
      "name": "Страница",
      "colorByPoint": true,
      "data": [
        @foreach($topPages as $topPage)
          {
            "name": "{{ $topPage['title'] }}",
            "y": {{ $topPage['pageviews'] }},
            "drilldown": "{{ $topPage['title'] }}",
          },
        @endforeach
      ],
    }
  ]
  });
  </script>
  <script>
    $('#chart4').highcharts({  
  chart: {
    type: 'column'
  },
  title: {
    text: 'Топ популярных брауезров'
  },
  xAxis: {
    type: 'category'
  },
  yAxis: {
    title: {
      text: 'Топ популярных брауезров'
    }

  },
  legend: {
    enabled: false
  },
  plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: true,
        format: '{point.y:.1f}'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
  },

  "series": [
    {
      "name": "Браузер",
      "colorByPoint": true,
      "data": [
        @foreach($topPlatforms['data'] as $topPlatform)
          {
            "name": "{{ $topPlatform['browser'] }}",
            "y": {{ $topPlatform['visits'] }},
            "drilldown": "{{ $topPlatform['browser'] }}",
          },
        @endforeach
      ],
    }
  ]
  });
  </script>
  <script>
    $('#my-todo-list').todoList({
  onCheck: function(checkbox) {
    // Do something when the checkbox is checked
  },
  onUnCheck: function(checkbox) {
    // Do something after the checkbox has been unchecked
  }
})
  </script>
@endsection
