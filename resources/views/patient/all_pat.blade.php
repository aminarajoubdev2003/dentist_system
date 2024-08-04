<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> all patient</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>all patient</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>name</th>
                    <th>phone</th>
                    <th> born</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all as $all_pat)

                <td>{{ $all_pat->name }}</td>
                <td>{{ $all_pat->phone }}</td>
                <td>{{ $all_pat->born}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>


</html>
