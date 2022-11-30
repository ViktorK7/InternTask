@extends('master')
@section('content')

    <div class="col">
        <strong>Filters</strong>
        <div class="col-3">
            <label for="priceFilterSelect">Price:</label>
            <select id="priceFilterSelect">
                @foreach($priceOptions as $priceOption)
                        <option
                            value="{{$priceOption}}"
                            @if ($selectedPriceFilter == $priceOption)
                                selected
                            @endif
                        >
                            {{$priceOption}}
                        </option>
                @endforeach
            </select>
        </div>
        <div class="col-3">
            <label for="dateFilterSelect">Products per Page:</label>
            <select id="dateFilterSelect">
                @foreach($dateOptions as $dateOption)
                    <option
                        value="{{$dateOption}}"
                        @if ($selectedDateFilter == $dateOption)
                            selected
                        @endif
                    >
                        {{$dateOption}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-3">
            <button onclick="filter()" class="btn btn-success">filter</button>
        </div>
    </div>

    @foreach($products as $product)
        <div class="Products">
            <div class="col-sm-3">
                <div class="DisplayProduct">
                    <h2 style="text-align: center">{{$product->getName()}}</h2>
                    <div>
                        <label>Product Weight: {{$product->getWeight()}}</label>
                    </div>
                    <div>
                        <label>Product Price: {{$product->getPrice()}}</label>
                    </div>
                    <div>
                        <label>Created At: {{date('d-m-Y', strtotime($product->getDate()))}}</label>
                    </div>
                    <div style="text-align: right">
                        <input
                        type="button"
                        class="btn btn-danger"
                        onclick="window.location.href = '/delete/{{$product->getId()}}'"
                        value="Delete"
                        >
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <script>
        @if($message)
            alert("{{$message}}");
        @endif

        function filter() {
            let filter = '';

            let priceElement = document.getElementById("priceFilterSelect");
            let priceFilterValue = priceElement.options[priceElement.selectedIndex].value;
            if (priceFilterValue) {
                filter = `/?priceFilter=${priceFilterValue}`;
            }

            let dateElement = document.getElementById("dateFilterSelect");
            let dateFilterValue = dateElement.options[dateElement.selectedIndex].value;
            if (dateFilterValue) {
                filter += filter == '' ? `/?dateFilter=${dateFilterValue}` : `&dateFilter=${dateFilterValue}`;
            }

            window.location.href = filter;
        }
    </script>
@endsection
@section('footer')
    <footer>
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            @foreach($pages as $page)
                <li class="page-item">
                    <a
                        class="page-link"
                        @if ((int) $page !== 1)
                            href="/?p={{$page}}"
                        @else
                            href="/"
                        @endif
                    >
                        {{$page}}
                    </a>
                </li>
            @endforeach
            <li class="page-item">

            <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </footer>
@endsection

