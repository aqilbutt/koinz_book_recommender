<!DOCTYPE html>
<html lang="en">
<head>
    <title>Interval Form</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="main-container">

        <div class='left-view'>
            <!-- Submission Form -->
            <form id="interval-form">
                <h1>Submit Pages</h1>
                <!-- Display User and Book dropdown -->
                <div class="common-style">
                    <label for="userId">User Name:</label>
                    <select name="userId" id="userId">
                        @foreach($userData as $id => $value)
                            <option value="{{ $id }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="common-style">
                    <label for="bookId">Book Name:</label>
                    <select name="bookId" id="bookId">
                        @foreach($bookData as $id => $value)
                            <option value="{{ $id }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Section to handle Container -->
                <div id="intervals-container">
                    <div class="interval common-style">
                        <label for="start_page">Start Page:</label>
                        <input type="text" name="start_page[]" class="start_page">
                        <label for="end_page">End Page:</label>
                        <input type="text" name="end_page[]" class="end_page">
                        <button type="button" class="add-interval">+</button>
                    </div>
                </div>
                <button type="submit" class="Submmit">Submit</button>
            </form>
        </div>

        <!-- Display top books -->
        <div class='right-view'>
            <h1>Top 5 Recommended Books</h1>
            <ol>
                @foreach($topBooks as $id => $book)
                    <li>{{ $book }}</li>
                @endforeach
            </ol>
        </div>
    </div>

    <script>
        document.getElementById('interval-form').addEventListener('click', function(event) {
            if (event.target && event.target.classList.contains('add-interval')) {
                const container = document.getElementById('intervals-container');
                const interval = document.createElement('div');
                interval.classList.add('interval');
                interval.innerHTML = `
                    <div class='common-style'>
                        <label for="start_page">Start Page:</label>
                        <input type="text" name="start_page[]" class="start_page">
                        <label for="end_page">End Page:</label>
                        <input type="text" name="end_page[]" class="end_page">
                        <button type="button" class="remove-interval">-</button>
                    </div>
                `;
                container.appendChild(interval);
            } else if (event.target && event.target.classList.contains('remove-interval')) {
                event.target.parentElement.remove();
            }
        });
    </script>
</body>
</html>
