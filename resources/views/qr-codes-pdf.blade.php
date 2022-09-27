<!DOCTYPE html>
<html>
<head>
    <title>QR-Codes PDF</title>
</head>
<body>
<h1>{{ $title }}</h1>
<div class="w-full flex flex-col justify-center">
@foreach($questions as $question)
    <div>
        <h3 class="text-3xl text-center">{{$question['original_id']}}</h3>
        <img class="block object-cover object-center w-full h-full" src="{{ public_path("{$question['qr_path']}") }}" style="width: 200px; height: 200px">
    </div>
@endforeach
</div>
</body>
</html>
