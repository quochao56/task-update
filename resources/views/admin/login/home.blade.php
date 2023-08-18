@extends('admin.layouts.main')

@section('content')
    <div class="col-md-5">
        @if(Session::has('success'))
            <div class="alert alert-light" role="alert">{{Session::get('success')}}</div>
        @endif
        <table class="table table-responsive">
            <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
            </thead>
            <tr>
            <tr>
                <td>
                    {{Auth::guard('admin')->user()->name}}
                </td>
                <td>
                    {{Auth::guard('admin')->user()->email}}
                </td>
                <td>
                    <a href="{{route('admin.logout')}}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form action="{{route('admin.logout')}}" method="POST" id="logout-form">
                        @csrf
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
