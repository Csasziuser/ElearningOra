<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eredmény</title>
</head>
<body>
    <p><strong>Email:</strong> {{$score->email}}</p>
    <p><strong>Tantárgy:</strong> {{$score->subject->subject_name}} </p>
    <p><strong>Pontszám:</strong> {{$score->score}} </p>
</body>
</html>
