@props(['data'])

<style>
    .th-text {
        font-size: 25px;
        font-weight: 700;
        line-height: 35.01px;
    }

    .tb-text {
        font-size: 20px;
        font-weight: 350;
    }

    @media only screen and (max-width: 992px) {
        .th-text {
            font-size: 20px;
            font-weight: 700;
            line-height: 35.01px;
        }

        .tb-text {
            font-size: 15px;
            font-weight: 350;
        }
    }

    @media only screen and (max-width: 576px) {
        .th-text {
            font-size: 14px;
            font-weight: 700;
            line-height: 35.01px;
        }

        .tb-text {
            font-size: 12px;
            font-weight: 350;
        }
    }
</style>
@php
    $total = 0;
@endphp
<div class="container px-xl-5 mx-xl-5 m-0 p-0">
    <div class="section-topic mt-2 mb-4 text-center">Cost of Education in USA</div>
    <div class="mx-lg-4 mx-lg-2 mx-xl-5 px-xl-5 px-lg-4 px-lg-2 px-0 mx-0">
        <table class="table">
            <thead class="table-active table-dark th-text align-middle">
                <tr>
                    <th scope="col" class="ps-1 ps-sm-5">Type of Expenses</th>
                    <th scope="col" class="text-end pe-1 pe-sm-5">Anual Expenses in USD</th>
                </tr>
            </thead>
            <tbody class="tb-text">
                @foreach ($data as $item)
                    <tr>
                        <td scope="row" class="ps-1 ps-sm-5">{{ ucWords($item->name) }}</td>
                        <td class="text-end pe-1 pe-sm-5">{{ $item->cost }}</td>
                        @php
                            $total = $total + $item->cost;
                        @endphp
                    </tr>
                @endforeach
            </tbody>
            <thead class="table-active table-dark th-text">
                <tr>
                    <th scope="col" class="ps-1 ps-sm-5">Total Expenses</th>
                    <th scope="col" class="text-end pe-1 pe-sm-5">{{ $total }}</th>
                </tr>
            </thead>
        </table>
    </div>




</div>
