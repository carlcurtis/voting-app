<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Voting App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>
    <body>
      <!-- Display National Stats Per Party -->
      <h2>National Results</h2>
      <table>
        <tr>
          <th>Party</th>
          <th>Intend To Vote</th>
          <th>Intend Not To Vote</th>
        </tr>
        @foreach($nationalResults as $i => $rowData)
          <tr>
            <td>{{ $rowData->party }}</td>
            <td>{{ $rowData->intend_to_vote ? $rowData->intend_to_vote : '0' }}</td>
            <td>{{ $rowData->non_voters ? $rowData->non_voters : '0' }}</td>
          </tr>
        @endforeach
      </table>


      <!-- Display Stats Per Constituency and Party-->
      <h2>Results Per Constituency</h2>
      <table>
        <tr>
          <th>Constituency</th>
          <th>Party</th>
          <th>Intend To Vote</th>
          <th>Intend Not To Vote</th>
        </tr>
        @php
          $prevConstit = '';
        @endphp
        @foreach($constituencyResults as $i => $rowData)
          <tr>
            @if ($rowData->constit != $prevConstit )
              <td>{{ $rowData->constit }}</td>
            @else
              <td>&nbsp;</td>
            @endif
            <td>{{ $rowData->party }}</td>
            <td>{{ $rowData->intend_to_vote ? $rowData->intend_to_vote : '0' }}</td>
            <td>{{ $rowData->non_voters ? $rowData->non_voters : '0' }}</td>
          </tr>

          @php
            $prevConstit = $rowData->constit;
          @endphp
        @endforeach
      </table>

    </body>
</html>
