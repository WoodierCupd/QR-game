<!DOCTYPE html>
<html>
<head>
    <title>QR-Codes PDF</title>
</head>
<body>
<h1>{{ $title }}</h1>
<div>
@foreach($questions as $question)
    <div>
        <h3>{{$question['original_id']}}</h3>
        <img src="{{ public_path("{$question['qr_path']}") }}" style="width: 200px; height: 200px">
    </div>
@endforeach
</div>
</body>
</html>
