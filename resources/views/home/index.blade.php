@extends('layouts.app')

@section('content')
<div>
    <form action="{{ route('homePage') }}" method="get">
        <category-selector></category-selector>
        <button type="submit">Loc</button>
    </form>
    @foreach ($articles as $article)
    <div>
        <h3>{{$article->title}} @if ($article->is_vip)
            <span>VIP</span>
        @endif</h3>
    </div>
    @endforeach
</div>
@endsection
