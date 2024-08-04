<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> all appointment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>


<body>
    <div class="container mt-5">
        <h2>all appointment</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>doctor</th>
                    <th>patient</th>
                    <th> date</th>
                    <th> satus</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all as $all_ap)
                <td>{{ $name[0]->name}}</td>
                <td>{{  App\Models\Patient::where('id',"=",$all_ap->patient_id)->get('name')[0]->name }}</td>
                <td>{{ $all_ap->when }}</td>
                <td>{{ $all_ap->status }}</td>
                <td>
                    <!-- زر للتعديل -->
                    <a href="{{route('edit_appoin',['id' => $all_ap->id])}}" style=" background-color: paleturquoise"
                        class=btn btn-warning btn-sm">edit</a>

                    <!-- زر للحذف -->
                    <form action="{{route('delete_appoin',['id' => $all_ap->id])}}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('هل أنت متأكد من أنك تريد الحذف؟')">delete</button>
                    </form>
                </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>




</html>
