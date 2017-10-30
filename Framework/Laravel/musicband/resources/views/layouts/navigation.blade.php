<div id="navbar" class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
        @foreach($categories as $category)
            <li class="active"><a href="{{route('product_by_cat', ['id'=> $category->id])}}">{{$category->nom}}</a></li>
        @endforeach
        <li role="separator" class="divider"></li>
        <li><a href="{{route('panier')}}">Panier <span class="label label-info">{{$total_articles_panier}}</span></a>
        </li>
        <li><a href="{{route('backend_homepage')}}">Backend</a></li>
{{--
        @if()
--}}
            <li><a href="{{route('home')}}">Se Log</a></li>
{{--
        @else
--}}
{{--
            <li><a href="{{route('home')}}">Se Déconnecter</a></li>
--}}
{{--
        @endif
--}}
    </ul>
</div><!--/.nav-collapse -->

