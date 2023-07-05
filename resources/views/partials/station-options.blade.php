<option>--Chose Station --</option>
@foreach ($stations as $station)
<option value="{{ $station->id }}">{{ $station->name }}</option>
@endforeach