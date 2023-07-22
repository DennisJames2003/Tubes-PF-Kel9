<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agent List</title>
    <style>
        html {
            font-size: 12px;
        }

        .table {
            border-collapse: collapse !important;
            width: 100%;
        }

        .table-bordered th,
        .table-bordered td {
            padding: 0.5rem;
            border: 1px solid black !important;
        }
    </style>
</head>
<body>
    <h1>Agent List</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Position</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($agents as $index => $agent)
                <tr>
                    <td align="center">{{ $index + 1 }}</td>
                    <td>{{ $agent->firstname }}</td>
                    <td>{{ $agent->lastname }}</td>
                    <td>{{ $agent->email }}</td>
                    <td align="center">{{ $agent->age }}</td>
                    <td>{{ $agent->position->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
