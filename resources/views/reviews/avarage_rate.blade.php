<!DOCTYPE html>
<html>
<head>
    <title>Reviews</title>
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
    <h1>Reviews</h1>

 
   
        <table>
            <tr>
                <th>Doctor</th>
                <th>AvarageRate</th>
            </tr>
                <tr>

                <tr>
                    <td>{{ $doctor_name }}</td>
                    <td>{{ $avg }}</td>
                </tr>
            
                    
                </tr>
        </table>
<br>
</body>
</html>