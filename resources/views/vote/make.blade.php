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
      <form method="post" action="/">
        {{ csrf_field() }}
        <div>
          Constituency:
          <select name="constituency">
            @foreach($constituencies as $constituency)
              <option value="{{ $constituency->id }}">{{ $constituency->name }}</option>
            @endforeach
          </select>
        </div>
        <div>
          Party:
          <select name="party">
            @foreach($parties as $party)
            <option value="{{ $party->id }}">{{ $party->name }}</option>
            @endforeach
          </select>
        </div>
        <div>
          Do You Intend to Vote?
          <select name="voting">
            <option value="1">Yes</option>
            <option value="0">No</option>
          </select>
        </div>
        <div>
          <input type="submit" value="Submit Choice" />
        </div>
      </form>
    </body>
</html>
