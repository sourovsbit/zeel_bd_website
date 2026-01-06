<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Excel</title>
</head>
<body>

    <form method="post" action="{{ url('upload_excel') }}" enctype="multipart/form-data">
        @csrf
        <input type="file" name="excel" id="excel">
        <button type="submit">Submit</button>
    </form>

</body>
</html>
