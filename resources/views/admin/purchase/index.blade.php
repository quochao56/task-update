@extends('admin.layouts.main')

@section('content')
    <div>
        <form action="{{ route('admin.orders.store') }}" method="POST" id="orderForm">
            @csrf <!-- Add Laravel CSRF token field -->

            <div class="max-w-md mx-auto bg-white p-4 rounded shadow mb-4">
                <label for="mySelect" class="block text-gray-700 font-semibold mb-2">Select a product:</label>
                <select id="mySelect" class="w-full p-2 border rounded focus:ring focus:ring-blue-300">
                    <option value="">Select a product</option>
                    @foreach ($products as $product)
                        <option value="{{ json_encode($product) }}">({{ $product->id }}) - {{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="container-fluid">
                <table class="table table-responsive-xl mt-4 bg-white p-4 rounded shadow">
                    <thead>
                    <tr>
                        <th class="col-1 border px-4 py-2">ID</th>
                        <th class="col-2 border px-4 py-2">Name</th>
                        <th class="col-2 border px-4 py-2">Price</th>
                        <th class="col-1 border px-4 py-2">Quantity</th>
                        <th class="col-2 border px-4 py-2">Total</th>
                        <th class="col-2 border px-4 py-2">Warehouse</th>
                        <th class="col-2 border px-4 py-2">Action</th>
                    </tr>
                    </thead>
                    <tbody id="selectedOptionsTableBody">
                    <!-- Selected options will be added here -->
                    </tbody>
                </table>
            </div>
            <div class="summary">
                <p class="summary-info"><span class="title">Số lượng: </span><b class="total-quantity">0</b></p>
                <input type="hidden" name="total_qty">
                <p class="summary-info"><span class="title">Shipping: </span><b class="index">Free Shipping</b></p>
                <p class="summary-info "><span class="title">Tổng cộng: </span><b class="total">0</b></p>
                <input type="hidden" name="total_end">
            </div>
            <div class="form-group pt-4">
                <label>Note</label>
                <textarea name="note" id="note" class="form-control"></textarea>
            </div>
            <div class="mt-4 text-center">
                <button type="submit" name="submit" class="btn btn-primary text-white px-4 py-2 rounded">Submit Order</button>
            </div>
        </form>
    </div>
@endsection

@section('footer')
    <script>
        $(document).ready(function () {
            // Search on select
            var selectElement = $('#mySelect');

            selectElement.select2();
            var totalEnd = 0;
            var totalQuantity = 0;

            // Function to update totalEnd and totalQuantity
            function updateTotals() {
                totalEnd = 0;
                totalQuantity = 0;

                // Loop through each row in the table
                $('#selectedOptionsTableBody tr').each(function () {
                    var quantity = parseInt($(this).find('input[name="num_product[]"]').val());
                    var price = parseFloat($(this).find('td:eq(2)').text());
                    totalQuantity += quantity;
                    totalEnd += quantity * price;
                });

                // Update the displayed totals
                $('.total-quantity').text(totalQuantity);
                $('.total').text(totalEnd);

                // Update the hidden input fields
                $('input[name="total_qty"]').val(totalQuantity);
                $('input[name="total_end"]').val(totalEnd);
            }

            $('html,input').on('change', function () {
                updateTotals();
            });

            selectElement.on('change', function () {
                var selectedProductData = this.value;
                if (selectedProductData) {
                    var product = JSON.parse(selectedProductData);
                    addProductToTable(product);
                    this.value = '';
                    selectElement.val(null).trigger('change');
                }
            });

            // Add product into the table
            var tableBody = $('#selectedOptionsTableBody');

            tableBody.on('click', '[data-delete-row]', function () {
                // Remove the entire row when the "Delete" button is clicked
                $(this).closest('tr').remove();
                updateTotals(); // Update totals when a row is deleted
            });

            // Function to add a product to the table
            function addProductToTable(product) {
                var newRow = $('<tr>');
                newRow.append('<td>' + product.id + '</td>');
                newRow.append('<td>' + product.name + '</td>');
                newRow.append('<td>' + product.price + '</td>');

                var quantityInput = $('<input class="w-16 border rounded text-center" data-max="120" min="1" pattern="[0-9]*" ' +
                    'type="number" name="num_product[]" value="1">');

                var productIdInput = $('<input type="hidden" name="product_id[]" value="' + product.id + '">');

                var totalCell = $('<td>' + (product.price * parseInt(quantityInput.val())) + '</td>');

                quantityInput.on('input', function () {
                    var quantity = parseInt($(this).val());
                    totalCell.text(product.price * quantity);
                    updateTotals(); // Update totals when quantity changes
                });

                var warehouseSelect = $('<select class="form-select" data-placeholder="Chọn kho" name="warehouse_id[]"></select>');
                @foreach($warehouses as $warehouse)
                warehouseSelect.append('<option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>');
                @endforeach

                var warehouseTd = $('<td>').append(warehouseSelect);

                var deleteButton = $('<button class="btn btn-lg" type="button" data-delete-row><i class="fa-solid fa-circle-minus text-red-600"></i></button>');

                var actionTd = $('<td>').append(deleteButton);

                newRow.append(quantityInput);
                newRow.append(productIdInput);
                newRow.append(totalCell);
                newRow.append(warehouseTd);
                newRow.append(actionTd);

                tableBody.append(newRow);
                updateTotals(); // Update totals when a new row is added
            }

            // Add CSRF token to the AJAX request headers
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
@endsection
