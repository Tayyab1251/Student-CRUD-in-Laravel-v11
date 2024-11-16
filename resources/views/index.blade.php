<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @notifyCss
    <style>
        /* Root CSS Variables for Colors */
        :root {
            --primary-color: #4CAF50;
            --secondary-color: #333;
            --accent-color: #f1f1f1;
            --hover-color: #ddd;
            --background-color: #f9fafb;
            --table-header-bg: #4CAF50;
            --table-row-bg: #ffffff;
            --table-row-alt-bg: #fafafa;
            --table-border-color: #ddd;
            --shadow-light: rgba(0, 0, 0, 0.1);
            --button-border-color: #4CAF50;
        }

        /* Global Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--background-color);
            color: var(--secondary-color);
        }

        /* Container for Header Section */
        .header-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffffff;
            box-shadow: 0 4px 10px var(--shadow-light);
            border-radius: 8px;
        }

        /* Title Styling */
        .title {
            font-size: 2rem;
            color: var(--primary-color);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 0;
        }

        /* Add Button Styling */
        .add-btn {
            padding: 10px 20px;
            font-size: 1rem;
            background-color: var(--primary-color);
            color: white;
            border: 2px solid var(--primary-color);
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            font-weight: 600;
            text-decoration: none;
        }

        .add-btn:hover {
            background-color: darkgreen;
            border-color: darkgreen;
        }
        /* Container for Centered Content */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 10px var(--shadow-light);
            background-color: var(--table-row-bg);
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: var(--table-header-bg);
            color: #ffffff;
            font-weight: 600;
        }

        td {
            background-color: var(--table-row-bg);
            border-bottom: 1px solid var(--table-border-color);
        }

        tr:nth-child(even) td {
            background-color: var(--table-row-alt-bg);
        }

        tr:hover td {
            background-color: var(--hover-color);
        }

        .table-container {
            overflow-x: auto;
            margin-top: 20px;
        }

        /* Action Buttons (View, Edit, Delete) */
        .action-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 10px;
        }

        /* General Button Styling */
        .action-btn {
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: 600;
            text-align: center;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s, border-color 0.3s;
            display: inline-block;
            border: 2px solid transparent;
        }

        /* View Button */
        .view-btn {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .view-btn:hover {
            background-color: darkgreen;
            border-color: darkgreen;
        }

        /* Edit Button */
        .edit-btn {
            background-color: #f1c40f;
            color: white;
            border-color: #f1c40f;
        }

        .edit-btn:hover {
            background-color: #f39c12;
            border-color: #f39c12;
        }

        /* Delete Button */
        .delete-btn {
            background-color: #e74c3c;
            color: white;
            border-color: #e74c3c;
        }

        .delete-btn:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }

        .action-btn:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .action-btn:active {
            background-color: #333;
        }

        /* Responsive Design */
        @media (max-width: 768px) {

            table,
            th,
            td {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .header-container {
                flex-direction: column;
                align-items: flex-start;
                text-align: center;
            }

            .add-btn {
                width: 100%;
                margin-top: 10px;
            }

            th,
            td {
                padding: 8px;
            }

            h1 {
                font-size: 1.5rem;
            }

            table {
                font-size: 0.85rem;
            }
        }

        /* Scrollbar Styling */
        .table-container::-webkit-scrollbar {
            width: 8px;
        }

        .table-container::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 4px;
        }

        .table-container::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <div class="header-container">
        <h1 class="title">Student Information</h1>
        <a href="/create " class="add-btn">Add Student</a>
    </div>
    <div class="container">

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration + (($students->currentPage() - 1) * $students->perPage()) }}</td>
                        <td>{{ ucwords($student->name) }}</td>
                        <td>{{ ucfirst($student->gender) }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>
                            <div class="action-links">
                                <a href="/index/{{ $student->id }}" class="action-btn view-btn">View</a>

                                <a href="/edit/{{ $student->id }}" class="action-btn edit-btn">Edit</a>

                                <form action="/index/{{ $student->id }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn delete-btn">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
       <div class="mt-4"> {{$students->links('pagination::bootstrap-5')}}</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <x-notify::notify />
    @notifyJs
</body>

</html>