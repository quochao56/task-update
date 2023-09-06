@extends('admin.layouts.main')

@section('content')
    <table id="article-table" class="table">
        <thead>
        <tr>
            <th>Thumbnail</th>
            <th>Title</th>
            <th>Original Author Name</th>
            <th>Author Name</th>
            <th>Created Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>
                    <img src="{{ asset('qh/blog/images/') }}/{{ $post->thumb }}" class="img-fluid" alt="" width="100px">
                </td>

                <td class="text-uppercase">{{$post->title}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->author_name}}</td>
                <td>{{date('jS M Y', strtotime($post->updated_at))}}</td>
                <td>
                    <a href="{{route('admin.blogs.show',$post->slug)}}" class="btn btn-info btn-sm rounded-pill">Find Out More</a>
                    <a href="{{ route('admin.blogs.edit', $post->slug) }}" class="btn btn-link text-secondary">
                        <i class="fas fa-pencil-alt"></i> Edit
                    </a>
                    <form action="{{ route('admin.blogs.destroy', $post->slug) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-link text-danger" onclick="return confirm('Are you sure you want to delete this post?')">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('footer')

    <script>
        $(document).ready(function () {
            $('#article-table').DataTable();
        });

    </script>
@endsection
