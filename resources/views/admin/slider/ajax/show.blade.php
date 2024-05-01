@if (!empty($slider) && $slider->count() > 0)
@foreach ($slider as $key=>$row)
<tr>
    <th scope="row">{{ $key+1 }}</th>
    <td>{{ $row->intro }}</td>
    <td>{{ $row->title }}</td>
    <td>{{ $row->sub_title }}</td>
    <td>
        <img src="{{ asset('storage/'.$row->image) }}" alt="" style="height: 50px;width:40px">
    </td>
    {{-- <td>{{ $row->created_at->format('d-M-Y') }}</td> --}}
    <td>
        <button type="button" id="edit" dataId="{{ $row->id }}" intro="{{ $row->intro }}" title="{{ $row->title }}" sub_title="{{ $row->sub_title }}" image="{{ $row->image }}" data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-square btn-outline-warning m-2">
            <i class="fa fa-edit"></i>
        </button>
        <button type="button" id="delete" data="{{ $row->id }}" class="btn btn-square btn-outline-danger m-2"><i class="fa fa-trash"></i></button>
    </td>
</tr>
@endforeach
@endif
