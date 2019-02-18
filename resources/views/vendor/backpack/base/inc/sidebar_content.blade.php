<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
<li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
<li><a href='{{ url(config('backpack.base.route_prefix', 'admin') . '/setting') }}'><i class='fa fa-cog'></i> <span>Настройки</span></a></li>
<li><a href="{{backpack_url('page') }}"><i class="fa fa-file-o"></i> <span>Страницы</span></a></li>
<li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/menu-item') }}"><i class="fa fa-list"></i> <span>Меню</span></a></li>
<!-- <li><a href='{{ url(config('backpack.base.route_prefix', 'admin').'/backup') }}'><i class='fa fa-hdd-o'></i> <span>Backup'ы</span></a></li> -->
<!-- <li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
    <i class="fa fa-globe"></i> Переводчик<span class="caret"></span>
  </a>
  <ul class="dropdown-menu" role="menu">
    <li class=""><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/language') }}"><i class="fa fa-flag-checkered"></i> Языки</a></li>
    <li class=""><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/language/texts') }}"><i class="fa fa-language"></i> Тексты</a></li>
  </ul>
</li> -->

<li><a href="{{ url('admin/day') }}"><i class='fa fa-sun-o'></i> <span>Дни</span></a></li>
<li><a href="{{ url('admin/email') }}"><i class='fa fa-envelope'></i> <span>Рассылка</span></a></li>

<li class="treeview">
  <a href="#"><i class="fa fa-newspaper-o"></i> <span>Новости</span> <i class="fa fa-angle-left pull-right"></i></a>
  <ul class="treeview-menu">
    <li><a href="{{ url('admin/article') }}"><i class="fa fa-newspaper-o"></i> <span>Контент</span></a></li>
    <li><a href="{{ url('admin/category') }}"><i class="fa fa-list"></i> <span>Категории</span></a></li>
    <li><a href="{{ url('admin/tag') }}"><i class="fa fa-tag"></i> <span>Теги</span></a></li>
  </ul>
</li>