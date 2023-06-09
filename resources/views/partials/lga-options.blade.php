<option>--Chose Town --</option>
@if ($is_hub && $local_govts->count() > 0)
<option value="{{ implode(',', $local_govts->pluck('id')->toArray())  }}">Add All Town.</option>
@endif
@foreach ($local_govts as $local_govt)
<option value="{{ $local_govt->id }}">{{ $local_govt->name }}</option>
@endforeach