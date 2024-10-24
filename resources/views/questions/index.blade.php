<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kérdések</title>
</head>
<body>
    <h1>Kérdések listája</h1>
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

    <a href="{{route('question.create')}}">Hozzon létre új kérdést!</a>

    <table>
        <thead>
            <tr>
            <th>TANTÁRGY</th>
            <th>KÉRDÉS</th>
            <th>VÁLASZ</th>
            <th>MŰVELETEK</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{$question->subject->subject_name}}</td>
                    <td>{{$question->question_text}}</td>
                    <td>
                        <ul>
                            @foreach ($question->answers as $answer)
                                <li>{{$answer->answer_text}} - {{$answer->is_correct ? 'Helyes válasz' : 'Rossz válasz'}}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>