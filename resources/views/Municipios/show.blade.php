{{-- {{ $municipios }} --}}

{{-- <datalist id="municipios"> --}}
 @foreach ($municipios as $municipio)
 	<option>{{ $municipio->municipio }}</option>
 @endforeach
{{-- </datalist> --}}


