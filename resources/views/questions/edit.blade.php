<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kérdés Módosítása</title>
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

    <h1>Kérdés módosítása</h1>

    <form action="{{route('question.update', $question->id)}}" method="POST">
        @csrf
        @method('PUT')

        <label for="subject_id">Tantárgy</label>
        <select name="subject_id" id="subject_id" required>
            <option value="" disabled>Válasszon tantárgyat</option>
            @foreach ($subjects as $subject)
                <option value="{{$subject->id}}" {{$subject->id == $question->subject_id ? 'selected' : ''}}>{{$subject->subject_name}}</option>
            @endforeach
        </select><br><br>

        <label for="question_text"></label>
        <textarea name="question_text" id="question_text">{{$question->question_text}}</textarea><br><br>

        @foreach ($question->answers as $index => $answer)
            <input type="hidden" name="answer[{{$index}}][id]" value="{{$answer->id}}">
            <input type="text" name="answer[{{$index}}][answer_text]" value="{{$answer->answer_text}}" required>
            <input type="checkbox" name="answer[{{$index}}][is_correct]" value="1" {{$answer->is_correct ? 'checked' : ''}}>
            <br><br>
        @endforeach
        <br><br>
        <button>Kérdés módosítása</button>
    </form>
</body>
</html>
