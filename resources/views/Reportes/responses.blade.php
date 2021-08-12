
@if ($metric == 'm_1')
	<ul class="list-group list-group-flush">
		<li class="list-group-item">Detección de casos {{ strtoupper($case).'S' }}: <span class="font-monospace fs-5">{{ $total }}</span></li>
		<li class="list-group-item">Tasa de detección de casos {{ strtoupper($case).'S' }}: 
			<span class="font-monospace fs-5">{{ ( is_numeric($tasa) )?  round($tasa, 3) : '-' }}</span></li>
	</ul>
@endif

@if ($metric == 'm_2')
	<ul class="list-group list-group-flush">
		<li class="list-group-item">Casos {{ strtoupper($case).'S' }} en TRATAMIENTO: <span class="font-monospace fs-5">{{ $total }}</span></li>
		<li class="list-group-item">Tasa de casos  {{ strtoupper($case).'S' }} en TRATAMIENTO: 
			<span class="font-monospace fs-5">{{ ( is_numeric($tasa) )?  round($tasa, 3) : '-' }}</span></li>
	</ul>
@endif
@if ($metric == 'm_3')
	<ul class="list-group list-group-flush">
		<li class="list-group-item">Proporcion de casos {{ strtoupper($case).'S' }} con DG2:<br> <span class="font-monospace fs-5">{{ (is_numeric($proportion)? round($proportion,2). '% del total de casos detectados' :$proportion )  }}</span></li>
		{{-- <li class="list-group-item">Tasa de casos  {{ strtoupper($case).'S' }} en : 
			<span class="font-monospace fs-5">{{ ( is_numeric($tasa) )?  round($tasa, 3) : '-' }}</span></li> --}}
	</ul>
@endif
@if ($metric == 'm_4')
	<ul class="list-group list-group-flush">
		<li class="list-group-item">Proporcion de casos {{ strtoupper($case).'S' }} de {{ is_numeric($edad)? 'MENORES ': 'MAYORES ' }} de 15 años: <br> <span class="font-monospace fs-5">{{ (is_numeric($proportion)? round($proportion,2). '% del total de casos detectados' :$proportion )  }}</span></li>
		{{-- <li class="list-group-item">Tasa de casos  {{ strtoupper($case).'S' }} en : 
			<span class="font-monospace fs-5">{{ ( is_numeric($tasa) )?  round($tasa, 3) : '-' }}</span></li> --}}
	</ul>
@endif

@if ($metric == 'm_5')
	<ul class="list-group list-group-flush">
		<li class="list-group-item">Proporcion de casos MB, {{ strtoupper($case).'S' }}: <br> <span class="font-monospace fs-5">{{ (is_numeric($proportion)? round($proportion,2). '% del total de casos detectados' :$proportion )  }}</span></li>
		{{-- <li class="list-group-item">Tasa de casos  {{ strtoupper($case).'S' }} en : 
			<span class="font-monospace fs-5">{{ ( is_numeric($tasa) )?  round($tasa, 3) : '-' }}</span></li> --}}
	</ul>
@endif