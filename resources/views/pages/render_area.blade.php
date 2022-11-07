@foreach ($areas as $key => $area)
    @if ($key % 2 == 0)
        <tr class="odd">
            <td>{{ $area->district_name }}</td>
            <td>{{ $area->district_code }}</td>
            <td>{{ $area->taluk_name }}</td>
            <td>{{ $area->taluk_code }}</td>
            <td>
                <div class="action_container">
                    <button class="view_btn" data-bs-target=".view_area_modal" data-bs-toggle="modal"
                        data-area-id={{ $area->id }}>
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="edit_btn" data-bs-target=".edit_area_modal" data-bs-toggle="modal"
                        data-area-id={{ $area->id }}>
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="delete_btn" class="delete_btn" data-area-id={{ $area->id }}>
                        <i class="fas text-danger fa-trash-alt"></i>
                    </button>
                </div>
            </td>
        </tr>
    @else
        <tr class="even">
            <td>{{ $area->district_name }}</td>
            <td>{{ $area->district_code }}</td>
            <td>{{ $area->taluk_name }}</td>
            <td>{{ $area->taluk_code }}</td>
            <td>
                <div class="action_container">
                    <button class="view_btn" data-bs-target=".view_area_modal" data-bs-toggle="modal"
                        data-area-id={{ $area->id }}>
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="edit_btn" data-bs-target=".edit_area_modal" data-bs-toggle="modal"
                        data-area-id={{ $area->id }}>
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="delete_btn" class="delete_btn" data-area-id={{ $area->id }}>
                        <i class="fas text-danger fa-trash-alt"></i>
                    </button>
                </div>
            </td>
        </tr>
    @endif
@endforeach
