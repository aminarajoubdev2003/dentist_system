<!DOCTYPE html>
<html>
<head>
    <title>Avarage Reviews</title>
    <style>
      
        body {
 
 
            background-image: url("tt.jpg");
            background-size: cover;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
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
<h2>Avarage Reviews</h2>
        <form method="POST" action="{{ route('view_doctorrate') }}">
            @csrf

            <div class="form-group">
            <label for="doctor_id">Doctor Name:</label>
            <select name="doctor_id" id="doctor_id">
                @foreach ( $doctors as $doctor )
                <option value="{{ $doctor->id }}" >{{ $doctor->name }}</option>
                @endforeach
            </select>
            </div>
             
            <button type="submit">choose</button>
        </form>
</body>
</html>