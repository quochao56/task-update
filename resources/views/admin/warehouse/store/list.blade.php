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
                        <option value="1">Chọn kho</option>
                        @foreach($warehouses as $wh)
                            <option value="{{$wh->id}}">({{$wh->id}}) - {{$wh->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="store" class="form-label">Select a Store:</label>
                    <select id="store" name="store" class="form-select">
                        <option value="1">Chọn cửa hàng</option>
                        @foreach($stores as $st)
                            <option value="{{$st->id}}">{{$st->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>
    <div class="container m-3">
        <div class="row">
            <div class="col-md-6">
                <div class="product-info">
                    <span class="font-weight-bold">Total Products:</span>
                    <span class="product-count" id="total-products">{{$total}}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-info">
                    <span class="font-weight-bold">Total Products in Warehouse:</span>
                    <span class="product-count" id="total-products-in-warehouse">0</span>
                </div>
            </div>
        </div>
    </div>
<div class="container">
    <table class="table table-striped" id="product-warehouse-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Total Quantity</th>
            <th>Warehouse Quantity</th>
            <th>Category</th>
            <th>Thumb</th>
        </tr>
        </thead>

        <tbody>
        <!-- Content loaded via AJAX -->
        </tbody>
    </table>
</div>

@endsection

@section('footer')
    <script>
        $(document).ready(function () {
            const productTable = $('#product-warehouse-table').DataTable({
                // Define columns for your DataTable
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'price' },
                    { data: 'qty' }, // Assuming 'qty' is the total quantity
                    { data: 'productQuantity', defaultContent: '0' }, // Warehouse Quantity
                    { data: 'category.name' }, // Assuming 'category' is the relationship
                    {
                        data: 'thumb',
                        render: function (data) {
                            return '<img src="' + data + '" width="60" alt="">';
                        },
                    },
                ],
            });
            const warehouseSelect = $('#warehouse');

            // Event handler for changing the warehouse selection
            warehouseSelect.on('change', function () {
                const selectedWarehouseId = $(this).val();

                // Make an AJAX request to fetch products for the selected warehouse
                $.ajax({
                    url: "{{ route('admin.stores.fetch') }}",
                    method: "GET",
                    data: { warehouse: selectedWarehouseId },
                    success: function (data) {
                        // Update the totalQuantity in the view
                        $('#total-products-in-warehouse').text(data.totalWQuantity);
                        // Clear the existing DataTable content
                        productTable.clear();

                        // Add the new products to the DataTable directly from 'data.products'
                        productTable.rows.add(data.products).draw();
                    },
                    error: function (error) {
                        console.error('Error fetching products:', error);
                    },
                });
            });
        });
    </script>
@endsection
