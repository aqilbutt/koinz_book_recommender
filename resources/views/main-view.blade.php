<!DOCTYPE html>
<html lang="en">
<head>
    <title>Main View</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="main-container">
        <div class='left-view'>
            <!-- Submission Form -->
            <form id='interval-form' action="{{ route('kbr.store') }}" method="post">
                @csrf
                <h1>Submit Pages</h1>
                <!-- Display User and Book dropdown -->
                <div class="common-style">
                    <label for="userId">User Name:</label>
                    <select name="userId" id="userId">
                        <option value="">Selected User</option>
                        @foreach($userData as $id => $value)
                            <option value="{{ $id }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="common-style">
                    <label for="bookId">Book Name:</label>
                    <select name="bookId" id="bookId">
                        <option value="">Selected Book</option>
                        @foreach($bookData as $id => $value)
                            <option value="{{ $id }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Section to handle Container -->
                <div id="intervals-container">
                    <div class="interval common-style">
                        <label>Start Page:</label>
                        <input type="text" name="start_page[]" class="start_page">
                        <label>End Page:</label>
                        <input type="text" name="end_page[]" class="end_page">
                        <button type="button" class="add-interval">+</button>
                    </div>
                </div>
                <button type="submit" class="Submmit">Submit</button>
            </form>

            @error('userId')
                <div class="common-style alert alert-danger">{{ $message }}</div>
            @enderror

            @error('bookId')
                <div class="common-style alert alert-danger">{{ $message }}</div>
            @enderror

            @error('start_page.*')
                <div class="common-style alert alert-danger">{{ $message }}</div>
            @enderror

            @error('end_page.*')
                <div class="common-style alert alert-danger">{{ $message }}</div>
            @enderror

            @if (session('success'))
                <div id='save-message' class="common-style alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <!-- Display top books -->
        <div class='right-view'>
            <h1>Top 5 Recommended Books</h1>
            <ol>
                @foreach($topBooks as $book)
                    <li>{{ $book->book_name }} -> {{ $book->num_of_read_pages }} pages</li>
                @endforeach
            </ol>
        </div>
    </div>

    <script>
        // Hide save message after 3 seconds if showed
        var saveMessage = document.getElementById('save-message');
        if (saveMessage) {
            setTimeout(function() {
                saveMessage.style.display = 'none';
            }, 3000);
        }

        // Script to add multiple intervals
        document.getElementById('interval-form').addEventListener('click', function(event) {
            if (event.target && event.target.classList.contains('add-interval')) {
                const container = document.getElementById('intervals-container');
                const interval = document.createElement('div');
                interval.classList.add('interval');
                interval.innerHTML = `
                    <div class='common-style'>
                        <label> Start Page:</label>
                        <input type="text" name="start_page[]" class="start_page">
                        <label> End Page:</label>
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
