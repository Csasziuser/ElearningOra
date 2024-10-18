<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Új tantárgy</title>
</head>
<body>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    @if (@session('success'))
        <p>{{session('success')}}</p>
    @endif


    <h1>Új tárgy</h1>

    <form action="{{route('subject.store')}}" method="POST">
        @csrf
        <label for="subject_name">Tantárgy neve: </label>
        <input type="text" name="subject_name" id="subject_name">
        <button>Mentés</button>
    </form>
</body>
</html>
