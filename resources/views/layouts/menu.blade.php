<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column text-sm" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->

    <li class="nav-header">Menu</li>

    @foreach(menu() as $list)
            
      @if(jml_submenu($list->id) == 0)
        <li class="nav-item">
          <a href="/{{$list->url}}" class="nav-link {{setActive($list->url)}}">
            <i class="nav-icon {{$list->icon}}"></i>
            <p>{{$list->nama_menu}}</p>
          </a>
        </li>
      @else
      <li class="nav-item {{openMenu($list->url)}}">
        <a href="{{$list->url}}" class="nav-link {{setActive($list->url)}}">
          <i class="nav-icon {{$list->icon}}"></i>
          <p>
            {{$list->nama_menu}}
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          @foreach(submenu($list->id) as $lsub)
          <li class="nav-item">
            <a href="/{{$lsub->url}}" class="nav-link {{setActive($lsub->url)}}">
              <i class="far fa-circle nav-icon"></i>
              <p>{{$lsub->nama_menu}} </p>
            </a>
          </li>
          @endforeach
        </ul>
      </li>
      @endif

    @endforeach

  </ul>
</nav>