<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{$title}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            @if($menu1 != null)
            <li class="breadcrumb-item"><a href="/{{$link1}}">{{$menu1}}</a></li>
            @endif
            @if($menu2 != null)
            <li class="breadcrumb-item active"><a href="/{{$link2}}">{{$menu2}}</a></li>
            @endif

            @if($menu3 != null)
            <li class="breadcrumb-item active">{{$menu3}}</li>
            @endif
          </ol>
        </div>
      </div>
    </div>
</section>