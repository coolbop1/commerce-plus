<option>--Chose Local Govt. Area --</option>
@foreach ($local_govts as $local_govt)
<option value="{{ $local_govt->id }}">{{ $local_govt->name }}</option>
@endforeach