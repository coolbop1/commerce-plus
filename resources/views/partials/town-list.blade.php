@php
    $num = 0;
@endphp
@foreach ($local_govts as $local_govt)
@php
    $num += 1;
@endphp
<tr>
    <td style="display: none;">{{ $num }}</td>
    <td class="footable-first-visible" style="display: table-cell;">
        <span class="footable-toggle fooicon fooicon-plus"></span>
        <input  style="padding: 5px; border-radius: 5px;{{ $local_govt->hub_id ? 'border:green 3px solid' : '' }}" id="town_name_input_{{ $local_govt->id }}" value="{{ $local_govt->name }}" >
    </td>
    
    <td class="text-right footable-last-visible" style="display: table-cell;">
            <a onclick="return addNewTown({{ $local_govt->id }})" class="btn btn-soft-primary btn-icon btn-circle btn-sm" title="Edit">
                <i class="las la-edit"></i>
            </a>
            <a data-onclick="return deleteTown({{ $local_govt->id }})" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-deletes" data-href="/admin/town/destroy/{{ $local_govt->id }}" title="Delete">
                <i class="las la-trash"></i>
            </a>
    </td>
</tr>

@endforeach