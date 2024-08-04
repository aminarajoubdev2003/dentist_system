<!DOCTYPE html>
<html>
<head>
    <title>Review</title>
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
    <h1>Review</h1>

 
   
        <table>
            <tr>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Rate</th>
                <th>Comment</th>
            </tr>
                <tr>
                <td>{{ $review->patient->name }}</td>
                    <td>{{ $review->doctor->name }}</td>
                    <td>{{ $review->rate }}</td>
                    <td>{{ $review->comment }}</td>
                    <td>
                    <a class="delete-link" href=" {{ route('delete_review', $review->id) }}">Delete</a>
                    </td>
                </tr>
        </table>
  
</body>
</html>