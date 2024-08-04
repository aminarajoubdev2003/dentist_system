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
        <h2>Insert patient</h2>
        <form action="{{ route('create_pat') }}" method="post">
            @csrf
            name: <input type="text" name="name" placeholder="Please insert patient name" /><br /><br />
            phone: <input type="text" name="phone" placeholder="Please insert patient phone" /><br /><br />
            birthdate: <input type="date" name="born" placeholder="Please insert birthdate" /><br /><br />
            <input type="submit" value="Add">
        </form>
    </div>
</body>


</html>
