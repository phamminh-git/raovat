<option value="{{ $category->id }}">{{$text}}{{ $category->name }}</option>
@if($category->children)
    @foreach ($category->children as $childCategory)
        @include('user.article.category_item', ['category' => $childCategory, 'text' => '---- '.$text])
    @endforeach
@endif
