@extends('admin.layouts.main')
@section('content')
    <table class="table table-striped" id="history-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>From</th>
            <th>To</th>
            <th>Quantity</th>
            <th>Total Amount</th>
            <th>Product</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Links</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($histories as $history)
            <tr>
                <td>{{ $history->id }}</td>
                <td>{{ $history->from }}</td>
                <td>{{ $history->to }}</td>
                <td>{{ $history->qty }}</td>
                <td>{{ $history->total_amount}}</td>
                <td>{{ $history->product }}</td>
                <td>{!! \QH\Core\Base\Helpers\Helper::active($history->status)  !!}</td>
                <td>{{ $history->created_at}}</td>
                <td>
                    <a href="{{ $history->links }}"><i class="fa-solid fa-circle-info" style="color: #e6ea10;"></i></a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
@section('footer')
    <script>
        $(document).ready(function () {
            $('#history-table').DataTable();
        });
    </script>
@endsection
