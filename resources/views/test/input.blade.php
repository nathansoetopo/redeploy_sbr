<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Test Input Product</title>
</head>

<body>
    <!-- You can actually customize padding on a select element: -->
    <form action="#" method="POST">
        @csrf
        <select name="multiple[]" id="" multiple>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <button type="submit">Submit</button>
    </form>
</body>

</html>