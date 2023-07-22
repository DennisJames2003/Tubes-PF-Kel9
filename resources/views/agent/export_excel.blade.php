<table>
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
                <td>{{ $index + 1 }}</td>
                <td>{{ $agent->firstname }}</td>
                <td>{{ $agent->lastname }}</td>
                <td>{{ $agent->email }}</td>
                <td>{{ $agent->age }}</td>
                <td>{{ $agent->position->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
