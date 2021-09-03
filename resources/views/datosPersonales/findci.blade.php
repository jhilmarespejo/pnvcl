{{-- {{ $records }} --}}



@if (!empty($records))
    @foreach ($records as $record) 
    <div class="alert-danger"><a href="/paciente/show/{{$record->id}}" class="text-danger text-decoration-none">* ¡El CI {{$record->ci}} ya existe!</a><br></div>
		
	@endforeach
@endisset

