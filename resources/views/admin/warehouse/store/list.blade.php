@extends('admin.layouts.main')
@section('content')
    <style>
        .summary-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-right: 5px;
        }

        .title {
            margin-right: 5px;
        }

        .index {
            font-weight: bold;
        }

        .num-product {
            width: 80px;
        }
    </style>
    <div class="container m-3">
        <form>
            <div class="row">
                <div class="col-md-6">
                    <label for="warehouse" class="form-label">Select a Warehouse:</label>
                    <select id="warehouse" name="warehouse" class="form-select">
                        @foreach($warehouses as $wh)
                            <option value="{{$wh->id}}">{{$wh->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="store" class="form-label">Select a Store:</label>
                    <select id="store" name="store" class="form-select">
                        @foreach($stores as $st)
                            <option value="{{$st->id}}">{{$st->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Thumb</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->productWarehouses->first()->qty }}</td>
                <td>{{ $product->category->name }}</td>
                <td><img src="{{ $product->thumb }}" width="60" alt=""></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $products->links('admin.layouts.pagination') !!}
    </div>
@endsection

@section('footer')
    <script>
        $(function() {
            // Function to get the current query parameters as an object
            function getUrlParams() {
                const urlParams = new URLSearchParams(window.location.search);
                const params = {};
                for (const [key, value] of urlParams) {
                    params[key] = value;
                }
                return params;
            }

            // Function to update the selected option in a <select> element
            function updateSelectValue(selectElement, value) {
                selectElement.val(value);
            }

            const warehouseSelect = $('select[name="warehouse"]');
            const storeSelect = $('select[name="store"]');
            const urlParams = getUrlParams();

            // Update the selected options based on the URL parameters
            if (urlParams.warehouse) {
                updateSelectValue(warehouseSelect, urlParams.warehouse);
            }
            if (urlParams.store) {
                updateSelectValue(storeSelect, urlParams.store);
            }

            // Event handler for changing the warehouse <select>
            warehouseSelect.on('change', function() {
                const selectedWarehouseId = $(this).val();
                urlParams.warehouse = selectedWarehouseId; // Update the warehouse query parameter
                const queryString = $.param(urlParams);
                const newUrl = `?${queryString}`;

                // Redirect to the new URL
                window.location.href = newUrl;
            });

            // Event handler for changing the store <select>
            storeSelect.on('change', function() {
                const selectedStoreId = $(this).val();
                urlParams.store = selectedStoreId; // Update the store query parameter
                const queryString = $.param(urlParams);
                const newUrl = `?${queryString}`;

                // Redirect to the new URL
                window.location.href = newUrl;
            });
        });
    </script>
@endsection
