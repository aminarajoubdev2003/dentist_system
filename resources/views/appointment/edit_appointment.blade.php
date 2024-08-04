<!DOCTYPE html>
<html>

<head>
    <title>Edit User</title>
    <style>
    body {
        background-color: #bbbb;
        background-image: url("tt.jpg");
        background-size: cover;
    }

    .edit-form {
        background-color: paleturquoise;

        width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;

        /* background-color: #f9f9f9; */
    }

    .edit-form label {
        font-weight: bold;
    }

    .edit-form input[type="text"] {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
    }

    .edit-form button {
        padding: 5px 10px;
    }
    </style>
</head>

<body>
    <div class="edit-form">
        <h2>Edit appointment</h2>

        <form action="{{ route('edit_appoin',['id' => $Appointment->id]) }}" method="post">
            @csrf
            doctor: <select name="doctor_id">
                @foreach ($doctors as $doctor )
                <option value="{{$doctor->id}}" {{$doctor->id==$Appointment->doctor_id?'selected':""}}>
                    {{ $doctor->name }}</option>
                @endforeach
            </select><br><br>
            patient: <select name="patient_id">
                @foreach ($pats as $pat )
                <option value="{{$pat->id}}" {{$pat->id==$Appointment->patient_id?'selected':""}}>{{ $pat->name }}
                </option>
                @endforeach
            </select><br><br>
            date: <input name="when" value="{{old('when',$Appointment->when)}}" type="datetime-local" /><br><br>
            status: <input name="status" value="1" {{ $Appointment->status?'checked':""}} type="checkbox" /><br><br>
            <input type="submit" value="edit">
        </form>
    </div>
</body>



</html>