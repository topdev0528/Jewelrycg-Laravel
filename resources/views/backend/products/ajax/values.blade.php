<table id="datatable"
    class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table dataTable no-footer"
    role="grid" aria-describedby="datatable_info">
    <thead class="thead-light">
        <tr role="row">
            <th class="table-column-ps-0 sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                aria-label="Color: activate to sort column ascending" style="width: 96px;">Value</th>
            <th class="table-column-ps-0 sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                aria-label="Price: activate to sort column ascending" style="width: 112px;">Price</th>
            <th class="table-column-ps-0 sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                aria-label="Quantity: activate to sort column ascending" style="width: 144px;">Quantity</th>
            <th class="table-column-ps-0 sorting_disabled" rowspan="1" colspan="1" aria-label=""
                style="width: 128.422px;"></th>
        </tr>
    </thead>

    <tbody id="addVariantsContainer">
        @forelse($values as $value)
            <tr role="row" class="odd" id="variantproduct-{{$value->id}}">
                <th class="table-column-ps-0">
                    @if ($type == 1)
                        <span class="dot" style="background:{{ $value->value }}"></span>
                    @elseif($type == 2)
                        {{ $value->name }}
                    @else
                        {{ $value->name }}
                    @endif
                </th>
                <th class="table-column-ps-0">
                    <div class="input-group input-group-merge" style="min-width: 7rem;">
                        <div class="input-group-prepend input-group-text">USD</div>
                        <input type="text" class="form-control">
                    </div>
                </th>
                <th class="table-column-ps-0">
                    <!-- Quantity -->
                    <div class="quantity-counter">
                        <div class="js-quantity-counter-input row align-items-center">
                            <div class="col">
                                <input class="js-result form-control form-control-quantity-counter" type="text"
                                    value="1">
                            </div>
                            <!-- End Col -->

                            <div class="col-auto">
                                <a class="js-minus btn btn-white btn-xs btn-icon rounded-circle" href="javascript:;">
                                    <svg width="8" height="2" viewBox="0 0 8 2" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0 1C0 0.723858 0.223858 0.5 0.5 0.5H7.5C7.77614 0.5 8 0.723858 8 1C8 1.27614 7.77614 1.5 7.5 1.5H0.5C0.223858 1.5 0 1.27614 0 1Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </a>
                                <a class="js-plus btn btn-white btn-xs btn-icon rounded-circle" href="javascript:;">
                                    <svg width="8" height="8" viewBox="0 0 8 8" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4 0C4.27614 0 4.5 0.223858 4.5 0.5V3.5H7.5C7.77614 3.5 8 3.72386 8 4C8 4.27614 7.77614 4.5 7.5 4.5H4.5V7.5C4.5 7.77614 4.27614 8 4 8C3.72386 8 3.5 7.77614 3.5 7.5V4.5H0.5C0.223858 4.5 0 4.27614 0 4C0 3.72386 0.223858 3.5 0.5 3.5H3.5V0.5C3.5 0.223858 3.72386 0 4 0Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </a>
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Quantity -->
                </th>
                <th class="table-column-ps-0">
                    <div class="btn-group" role="group" aria-label="Edit group">
                        <a class="btn btn-white pull-right" href="javascript:;" onclick="deletevarient({{ $value->id }})">
                            <i class="bi-trash"></i>
                        </a>
                    </div>
                </th>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center"> No data found </td>
            </tr>
        @endforelse
    </tbody>
</table>
