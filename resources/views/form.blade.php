<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <style>
        /* Root CSS Variables for Colors */
        :root {
            --primary-color: #4CAF50;
            --secondary-color: #333;
            --accent-color: #f1f1f1;
            --hover-color: #f1f1f1;
            --background-color: #f9fafb;
            --shadow-light: rgba(0, 0, 0, 0.1);
            --button-hover-color: #45a049;
            --border-color: #ddd;
            --card-bg: #ffffff;
            --button-bg: #4CAF50;
            --button-text-color: white;
            --button-border-radius: 30px;
            --font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Global Styles */
        body {
            font-family: var(--font-family);
            margin: 0;
            padding: 0;
            background-color: var(--background-color);
            color: var(--secondary-color);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #f9fafb, #e3e9e5);
        }

        h1 {
            text-align: center;
            color: var(--primary-color);
            margin: 40px 0;
            font-size: 2.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Container */
        .container {
            width: 100%;
            max-width: 900px;
            padding: 20px;
            margin-top: 40px;
        }

        /* Card Styles */
        .student-details-card {
            background-color: var(--card-bg);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 30px;
            margin-top: 40px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .student-details-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .student-details-header {
            text-align: left;
            margin-bottom: 30px;
            flex-basis: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .student-details-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-right: 20px;
            object-fit: cover;
            border: 3px solid var(--primary-color);
        }

        .student-details-header h2 {
            font-size: 2.2rem;
            color: var(--primary-color);
            margin-bottom: 10px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .student-details-header p {
            font-size: 1.1rem;
            color: var(--secondary-color);
            font-style: italic;
        }

        /* Student Details Body */
        .student-details-body {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 40px;
            width: 100%;
        }

        .student-details-body .row {
            width: 48%;
        }

        .student-details-body .row p {
            font-size: 1rem;
            color: var(--secondary-color);
            margin: 8px 0;
            line-height: 1.6;
        }

        .student-details-body .row strong {
            font-weight: 600;
            color: var(--primary-color);
        }

        /* Buttons */
        .student-details-actions {
            text-align: center;
            margin-top: 40px;
            flex-basis: 100%;
        }

        .button {
            padding: 12px 30px;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            border-radius: var(--button-border-radius);
            display: inline-block;
            transition: all 0.3s ease;
            margin: 0 10px;
            text-transform: uppercase;
        }

        .button.primary {
            background-color: var(--button-bg);
            color: var(--button-text-color);
            border: none;
        }

        .button.primary:hover {
            background-color: var(--button-hover-color);
            transform: translateY(-3px);
        }

        .button.secondary {
            background-color: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .button.secondary:hover {
            background-color: var(--primary-color);
            color: #fff;
            transform: translateY(-3px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .student-details-card {
                flex-direction: column;
            }

            .student-details-body {
                flex-direction: column;
            }

            .student-details-header img {
                margin-right: 0;
                margin-bottom: 20px;
            }

            .student-details-header h2 {
                font-size: 1.8rem;
            }

            .student-details-actions {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .button {
                width: 100%;
                margin-bottom: 10px;
            }
        }

    </style>
</head>
<body>

    <div class="container">
        <h1>Student Information</h1>

        <div class="student-details-card">
            <div class="student-details-header">
                <div>
                    <h2>{{$student->name}}</h2>
                    <p>{{$student->fname}}'s Son/Daughter</p>
                </div>
                <!-- Dummy Image -->
                <img src="https://via.placeholder.com/120" alt="Student Image">
            </div>

            <div class="student-details-body">
                <div class="row">
                    <p><strong>Full Name:</strong> {{$student->name}}</p>
                    <p><strong>Father's Name:</strong> {{$student->fname}}</p>
                    <p><strong>Gender:</strong> {{$student->gender}}</p>
                </div>

                <div class="row">
                    <p><strong>Email:</strong> {{$student->email}}</p>
                    <p><strong>Phone:</strong> {{$student->phone}}</p>
                    <p><strong>Address:</strong> {{$student->address}}</p>
                </div>

                <div class="row">
                    <p><strong>Created At:</strong> {{ \Carbon\Carbon::parse($student->created_at)->format('M d, Y h:i A') }}</p>
                    <p><strong>Last Updated:</strong> {{ \Carbon\Carbon::parse($student->updated_at)->format('M d, Y h:i A') }}</p>
                </div>
            </div>

            <div class="student-details-actions">
                <a href="{{ url('index') }}" class="button primary">Back to Students</a>
                <a href="#" class="button secondary">Edit Student</a>
            </div>
        </div>
    </div>

</body>
</html>
