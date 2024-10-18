<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Új kérdés</title>
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

    <h1>Új kérdés</h1>

    <form action="{{route('question.store')}}" method="POST">
        @csrf
        <label for="subject">Tantárgy</label>
        <select name="subject_id" id="subject_id">
            @foreach ($subjects as $subject )
                <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
            @endforeach
        </select><br><br>

        <label for="question_text">Kérdés: </label>
        <textarea name="question_text" id="question_text"></textarea><br><br>

        <label for="answer1">Válasz 1</label>
        <input type="text" name="answer[0][answer]" id="answer1" placeholder="Válasz 1" required>
        <input type="hidden" name="answer[0][is_correct]" value="0">
        <input type="checkbox" name="answer[0][is_correct]" value="1" id="answer1"> Helyes válasz<br><br>

        <label for="answer2">Válasz 2</label>
        <input type="text" name="answer[1][answer]" id="answer2" placeholder="Válasz 2" required>
        <input type="hidden" name="answer[1][is_correct]" value="0">
        <input type="checkbox" name="answer[1][is_correct]" value="1" id="answer2">Helyes válasz<br><br>

        <label for="answer3">Válasz 3</label>
        <input type="text" name="answer[2][answer]" id="answer3" placeholder="Válasz 3">
        <input type="hidden" name="answer[2][is_correct]" value="0">
        <input type="checkbox" name="answer[2][is_correct]" value="1" id="answer3">Helyes válasz<br><br>

        <label for="answer4">Válasz 4</label>
        <input type="text" name="answer[3][answer]" id="answer4" placeholder="Válasz 4">
        <input type="hidden" name="answer[3][is_correct]" value="0">
        <input type="checkbox" name="answer[3][is_correct]" value="1" id="answer4">Helyes válasz <br><br>

        <button>Mentés</button>
    </form>
</body>
</html>
