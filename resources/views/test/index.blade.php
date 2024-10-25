<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Témakör</title>
</head>
<body>
    <h1>Válasszon tantárgyat</h1>

    <ul>
        @foreach ($subjects as $subject)
            <li><a href="{{route('test.show', $subject->subject_name)}}">{{$subject->subject_name}}</a></li>
        @endforeach
    </ul>
</body>
</html>
