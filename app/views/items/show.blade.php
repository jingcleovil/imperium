<table class="table table-bordered" width="100%">
	<tbody>
		<!-- <tr>
			<td colspan="2">{{ $icon }} {{ $item['name_japanese'] }} [ {{ $item['id'] }} ]</td>
		</tr> -->
		<tr>
			<td><b>Item Script</b></td>
		</tr>
		<tr>
			<td>{ {{ nl2br($item['script']) }} }</td>
		</tr>
		<tr>
			<td><b>Description</b></td>
		</tr>
		<tr>
			<td>{{ nl2br($item['description']) }}</td>
		</tr>
	</tbody>
</table>