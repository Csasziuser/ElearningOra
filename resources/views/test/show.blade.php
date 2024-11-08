<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teszt</title>
</head>

<body>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @if (@session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <h1>{{ $subject->subject_name }} teszt</h1>

    <form action="{{ route('score.store', $subject->subject_name) }}" method="POST">
        @csrf
        <label for="email">E-mail: </label>
        <input type="email" name="email" id="email"><br><br>

        <ul>
            @foreach ($questions as $question)
                <li>
                    <p>{{ $question->question_text }}</p>
                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                    <ul>
                        @php
                            $correctAnswerCount = $question->answers->where('is_correct', 1)->count();
                            $inputType = $correctAnswerCount === 1 ? 'radio' : 'checkbox';
                        @endphp

                        @foreach ($question->answers as $answer)
                            <li>
                                <input type="{{ $inputType }}" name="answers[{{ $question->id }}][]"
                                    value="{{ $answer->id }}" id="answer{{ $answer->id }}">
                                <label for="answer{{ $answer->id }}">{{ $answer->answer_text }}</label>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
        <button type="submit">Beadás</button>
    </form>


</body>

</html>
