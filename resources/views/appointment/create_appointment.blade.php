<!DOCTYPE html>
<html>

<head>
    <title>Create patient</title>
    <style>
    body {
        background-color: #bbbb;
        background-image: url("tt.jpg");
        background-size: cover;
    }



    div {
        background-color: paleturquoise;
        width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        /* background-color: #f9f9f9; */
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .edit-link,
    .delete-link {
        text-decoration: none;
        padding: 5px 10px;
        background-color: #4CAF50;
        color: white;
        border-radius: 3px;
    }

    .delete-link {
        background-color: #f44336;
    }
    </style>
</head>

<body>

    <div>
        <h2>Insert appoiotment</h2>
        <form action="{{ route('create_appoin') }}" method="post">
            @csrf
            doctor: <select name="doctor_id">
                @foreach ($doctors as $doctor )
                <option value="{{$doctor->id}}">{{ $doctor->name }}</option>
                @endforeach
            </select><br><br>
            patient: <select name="patient_id">
                @foreach ($pats as $pat )
                <option value="{{$pat->id}}">{{ $pat->name }}</option>
                @endforeach
            </select><br><br>
            date: <input name="when" type="datetime-local" /><br><br>
            status: <input name="status" value="1" type="checkbox" /><br><br>
            <input type="submit" value="Add">
        </form>
    </div>
</body>

</html>
