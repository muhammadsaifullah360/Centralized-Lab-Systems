<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div class="container">
    <form action="{{ route('store.test') }}" method="POST">
        @csrf
        <div class="justify-content-center">
            <div class="form-outline mb-4">
                <input name="text" type="Text" id="contact"
                       class="form-control" required/>
                <label class="form-label"></label>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <div class="form-outline mb-4">
                <input name="num" type="Text" id="contact"
                       class="form-control" required/>
                <label class="form-label"></label>
            </div>
        </div>
    </form>
</div>

</body>
</html>
