<!DOCTYPE html>
<html>
<head>
    <title>QR-Codes PDF</title>
</head>
<body>
<h1>{{ $title }}</h1>
@foreach($questions as $question)
    <div class="flex flex-wrap w-full md:w-1/2 lg:w-1/3 mb-3">
        <h3 class="text-3xl text-white">{{$question['original_id']}}</h3>
        <div class="w-full p-1 md:p-2">
            <img class="block object-cover object-center w-full h-full rounded-lg" src="{{ public_path("{$question['qr_path']}") }}" style="width: 200px; height: 200px">
        </div>
    </div>
@endforeach
</body>
</html>
