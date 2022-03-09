<div class="card single_post2">
    <img class="img-fluid" style="max-width: 300px;" src="{{asset('storage/blogs'.$item->image) }}" alt="img">
    <div class="body">
        <div class="content">
            <h4 class="title">{{ $item->title }}</h4>
            <p class="date">
                <small>{{ $item->created_at->format('F d , Y') }}</small>
            </p>
            <p class="text">{{ Str::limit(strip_tags($item->text), 214, $end='...')}}</p>
{{--            <a class="btn btn-primary" href="javascript:void(0)">READ MORE</a>--}}
            <div style="display: flex; justify-content: space-between; ">
            <a class="btn btn-primary" href="{{ route('admin.blogs.edit', ['blog'=>$item->id]) }}">EDIT</a>
{{--            <a class="btn btn-danger" href="{{ route('admin.blogs.destroy', ['blog'=>$item->id]) }}">DELETE</a>--}}
                <form action="{{ route('admin.blogs.destroy', ['blog'=>$item->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-block">DELETE</button>
                </form>
            </div>
        </div>
    </div>
</div>
