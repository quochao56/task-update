@extends('admin.layouts.main')

@section('content')
    <div>
        @if(session()->has('alert'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('alert') }}
            </div>
        @else
            <p class="text-danger">Vui lòng check thông tin trước khi chọn sản phẩm</p>
        @endif
        @php
            $customerArray = json_decode(session('customer'), true);
        @endphp

        {{--        @if (isset($customerArray['email']))--}}
        {{--            @php--}}
        {{--                $email = $customerArray['email'];--}}
        {{--            @endphp--}}
        {{--            {{ $email }}--}}
        {{--        @else--}}
        {{--            Email not found in the customer data.--}}
        {{--        @endif--}}
        <form action="{{route('admin.sale.check_customer')}}" method="post">
            @csrf <!-- Add Laravel CSRF token field -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Name"
                       class="form-control @error("name") border border-danger @enderror"
                       value="{{ $customerArray['name'] ?? old('name') }}">
                @error("name")
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="email@gmail.com"
                       class="form-control @error("email") border border-danger @enderror"
                       value="{{$customerArray['email'] ?? old('email') }}">
                @error("email")
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" placeholder="Number Phone"
                       class="form-control @error("phone") border border-danger @enderror"
                       value="{{ $customerArray['phone'] ?? old('phone') }}">
                @error("phone")
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" placeholder="Address"
                       class="form-control @error("address") border border-danger @enderror"
                       value="{{ $customerArray['address'] ?? old('address') }}">
                @error("address")
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4 text-center">
                <button type="submit" name="submit" class="btn btn-success text-white px-4 py-2 rounded">Check
                </button>
            </div>
        </form>
        <form action="{{ route('admin.sale.store') }}" method="POST" id="orderForm">
            @csrf
            <div class="form-group">
                <label for="select-warehous">Select a warehouse:</label>
                <select id="select-warehouse" name="warehouse_id"
                        class="w-full p-2 border rounded focus:ring focus:ring-blue-300">
                    <option value="">Select a warehouse</option>
                    @foreach ($warehouses as $warehouse)
                        <option value="{{ $warehouse->id }}">({{ $warehouse->id }}) - {{ $warehouse->name }}</option>
                    @endforeach
                </select>
                @error("warehouse_id")
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div id="select-products">
                <div class="form-group">
                    <label for="mySelect">Select a product:</label>
                    <select id="mySelect" class="w-full p-2 border rounded focus:ring focus:ring-blue-300">
                        <option value="">Select a product</option>
                        @foreach ($products as $product)
                            <option value="{{ json_encode($product) }}">({{ $product->id }})
                                - {{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="container-fluid">
                    <table class="table table-responsive-xl mt-4 bg-white p-4 rounded shadow">
                        <thead>
                        <tr>
                            <th class="col-1 border px-4 py-2" id="idColumnHeader">
                                <div class="d-flex align-items-center">
                                    <span class="mr-2">ID</span>
                                    <div>
                                        <i class="fa-solid fa-sort"></i>
                                    </div>
                                </div>
                            </th>

                            <th class="col-2 border px-4 py-2">Name</th>
                            <th class="col-2 border px-4 py-2">Price</th>
                            <th class="col-1 border px-4 py-2">Quantity</th>
                            <th class="col-2 border px-4 py-2">Total</th>
                            <th class="col-2 border px-4 py-2">Action</th>
                        </tr>
                        </thead>
                        <tbody id="selectedOptionsTableBody">
                        <!-- Check if there are selected products in the session -->
                        </tbody>
                    </table>
                </div>
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
            @if(session()->has('customer'))
                <input type="hidden" name="customer" value="{{session('customer')}}">
            @endif
            <div class="mt-4 text-center">
                <button type="submit" name="submit" class="btn btn-primary text-white px-4 py-2 rounded">Submit
                    Order
                </button>
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
            // end seach on select

            // sort
            // Flag to toggle sorting order
            var ascendingOrder = true;

            // Add click event to the ID column header
            $('#idColumnHeader').click(function () {
                sortTableByID(ascendingOrder);
                ascendingOrder = !ascendingOrder; // Toggle sorting order
            });
            // end sort

            $('#select-products').css('display', 'none'); // Hide the element initially

            $('#select-warehouse').on('change', function () {
                var selectedWarehouseId = $(this).val();
                // Assuming you want to show #select-products when the warehouse selection changes
                $('#select-products').css('display', ''); // Display the element

                // Clear the options in the product select element
                $('#mySelect').empty();

                // Add back the "Select a product" option
                $('#mySelect').append($('<option>', {
                    value: '',
                    text: 'Select a product'
                }));

                // Make an AJAX request to retrieve filtered products
                $.ajax({
                    url: 'sale/get-products/' + selectedWarehouseId,
                    method: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        // Populate the product select element with fetched products
                        $.each(data, function (index, product) {
                            $('#mySelect').append($('<option>', {
                                value: JSON.stringify(product),
                                text: '(' + product.id + ') - ' + product.name
                            }));
                        });
                    },
                    error: function (error) {
                        console.error('Error fetching products:', error);
                    }
                });
            });


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

            // sort table
            function sortTableByID(ascending) {
                var rows = $('#selectedOptionsTableBody tr').get();

                rows.sort(function (a, b) {
                    var valA = parseInt($(a).find('td:eq(0)').text());
                    var valB = parseInt($(b).find('td:eq(0)').text());

                    if (ascending) {
                        return valA - valB;
                    } else {
                        return valB - valA;
                    }
                });

                $.each(rows, function (index, row) {
                    $('#selectedOptionsTableBody').append(row);
                });
            }

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

                var deleteButton = $('<button class="btn btn-lg" type="button" data-delete-row><i class="fa-solid fa-circle-minus text-red-600"></i></button>');

                var actionTd = $('<td>').append(deleteButton);

                newRow.append(quantityInput);
                newRow.append(productIdInput);
                newRow.append(totalCell);
                newRow.append(actionTd);

                tableBody.append(newRow);
                // Create an object to represent the selected product
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
