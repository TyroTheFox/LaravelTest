<div>
    <table class="table-auto">
      <thead>
        <tr>
            @foreach( $headers as $header )
                <th class="bg-blue-100 border text-left px-3 py-4">{{$header}}</th>
            @endforeach
        </tr>
      </thead>
      <tbody>
        @foreach( $tableRows as $row )
            <tr>
            @foreach($row as $key)
                <td class="border px-3 py-4">{{$key}}</td>
            @endforeach
            </tr>
        @endforeach
      </tbody>
    </table>
</div>
