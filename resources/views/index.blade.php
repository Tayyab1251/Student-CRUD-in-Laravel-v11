<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students Information</title>
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
            text-decoration: none
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

        th, td {
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

        /* Action Links */
        .action-links {
            display: flex;
            gap: 15px;
        }

        .action-links a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .action-links a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            table, th, td {
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

            th, td {
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
        {{-- <button class="add-btn">Add Student</button> --}}
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
                    <!-- Example row 1 -->
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>  <!-- Automatically increments row number -->
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>
                            <div class="action-links">
                                <!-- View link with dynamic URL containing student ID -->
                                <a href="/index/{{ $student->id }}">View</a>
                                <a href="#">Edit</a>
                                <a href="/index/{{ $student->id }}">Delete</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>

</body>
</html>
