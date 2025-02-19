<nav aria-label="breadcrumb" class="d-none d-md-inline-block">
    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
        <li class="breadcrumb-item">
            <a href="{{ route($homeRoute) }}">
                <i class="fa-solid fa-house"></i>
            </a>
        </li>
        @foreach ($middleLinks ?? [] as $link)
            <li class="breadcrumb-item">
                <a href="{{ route($link['route']) }}">{{ $link['text'] }}</a>
            </li>
        @endforeach
        <li class="breadcrumb-item active" aria-current="page">
            <a href="#">{{ $activeTitle }}</a>
        </li>
    </ol>
</nav>