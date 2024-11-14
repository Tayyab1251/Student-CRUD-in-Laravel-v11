<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Details</title>
    <style>
        /* Root CSS Variables for Colors */
        :root {
            --primary-color: #4CAF50;
            --secondary-color: #333;
            --accent-color: #f1f1f1;
            --hover-color: #ddd;
            --background-color: #f9fafb;
            --input-border-color: #ddd;
            --input-focus-border-color: var(--primary-color);
            --shadow-light: rgba(0, 0, 0, 0.1);
        }

        /* Global Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--background-color);
            color: var(--secondary-color);
        }

        h1 {
            text-align: center;
            color: var(--primary-color);
            margin: 40px 0;
            font-size: 2.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Container for Centered Content */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 10px var(--shadow-light);
            border-radius: 8px;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }

        .form-group {
            flex: 1;
            min-width: 250px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--secondary-color);
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--input-border-color);
            border-radius: 6px;
            font-size: 1rem;
            color: var(--secondary-color);
            background-color: var(--accent-color);
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--input-focus-border-color);
            outline: none;
        }

        .form-group textarea {
            height: 120px;
            resize: vertical;
        }

        .form-button {
            width: 100%;
            padding: 15px;
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-button:hover {
            background-color: darkgreen;
        }
        .error-msg{
            color: red;
            font-size: 0.875rem; 
            margin-top: 0.25rem;
        }

        @media (max-width: 768px) {
            .form-group {
                flex: 1 1 100%;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Student Details</h1>
        <form method="POST" action="{{ url('edit/' . $student->id) }}">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter full name" value="{{ old('name', $student->name) }}">
                <span class="error-msg">@error('name')
                    {{$message}}
                @enderror</span>
            </div>

            <div class="form-group">
                <label for="fname">Father's Name</label>
                <input type="text" id="fname" name="fname" placeholder="Enter father's name" value="{{ old('fname', $student->fname) }}">
                <span class="error-msg">@error('fname')
                    {{$message}}
                @enderror</span>
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender">
                    <option value="">Select Gender</option>
                    <option value="male" {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender', $student->gender) == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                <span class="error-msg">@error('gender')
                    {{$message}}
                @enderror</span>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter email" value="{{ old('email', $student->email) }}">
                <span class="error-msg">@error('email')
                    {{$message}}
                @enderror</span>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" placeholder="Enter phone number" value="{{ old('phone', $student->phone) }}">
                <span class="error-msg">@error('phone')
                    {{$message}}
                @enderror</span>
            </div>

            <div class="form-group" style="flex: 1 1 100%;">
                <label for="address">Address</label>
                <textarea id="address" name="address" placeholder="Enter address">{{ old('address', $student->address) }}</textarea>
                <span class="error-msg">@error('address')
                    {{$message}}
                @enderror</span>
            </div>

            <button type="submit" class="form-button">Update</button>
        </form>
    </div>
</body>
</html>
