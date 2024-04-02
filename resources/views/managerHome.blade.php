<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- Example: Include jQuyery from a CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Dashboard</title>
 <style>
*{
    padding: 0;
    margin: 0;
    color: white;
    font-family: sans-serif;
}
body{
    background-color:#001;
    display: flex;
  
  }
  .profile{
    display: flex;
    align-items: center;
    gap: 30px;
  }
  .profile h2{
    font-size: 20px;
    text-transform: capitalize;
  }
  .img-box{
    width: 50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
    border: 3px solid white;
    flex-shrink: 0;
  }
  .img-box img{
    width: 100%;
  }
  
  .menu{
    background-color: #123;
    width: 60px;
    height: 100vh;
    padding: 20px;
    overflow: hidden;
    transition: 0.5s;
  }
  .menu:hover{
    width: 260px;
  }
  ul{
    list-style: none;
    position: relative;
    height: 95%;
  }
  ul li a{
    display: block;
    text-decoration: none;
    padding: 10px;
    margin: 10px 0;
    border-radius: 8px;
    display: flex;
    gap: 40px;
    align-items: center;
    transition: 0.5s;
  
  }
  ul li a:hover, .active , .box:hover, td:hover{
    background-color: #ffffff55;
  }
  .log-out{
    position: absolute;
    bottom: 0;
    width: 100%;
  
  }
  .log-out a{
    background-color:#a00 ;
  }
  ul li a i{
    font-size: 30px;
  }
  .content{
    width: 100%;
    margin: 10px;
  }
  .title-info{
    background-color: #0481ff;
    padding: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-radius: 8px;
    margin: 10px 0;
  }
  .data-info{
    display:flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 10px;
  
  }
  .box{
    background-color: #123;
    height: 150px;
    flex-basis: 150px;
    flex-grow: 1;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: space-around;
  
  }
  
  .box i{
    font-size:40px
  }
  .box .data{
    text-align: center;
  }
  
  .box .data span{
    font-size: 30px;
  }
  table{
    width: 100%;
    text-align: center;
    border-spacing: 8px;
  
  }
  th,td{
    background-color: #123;
    height: 40px;
    border-radius: 8px;
  }
  th{
    background-color: #0481ff;
  }
  .price , .count{
    padding: 6px;
    border-radius: 6px;
  }
  .price{
    background-color: green;
  }
  .count{
    background-color: gold;
    color: black;
  }

  .search-form {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px; /* Adjusts the space between form elements */
    margin: 20px auto; /* Centers the form and adds some margin */
    max-width: 600px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-control {
    padding: 8px;
    border: 1px solid #ccc; /* Light grey border */
    border-radius: 4px; /* Rounded corners */
    width: 100%;
    margin-bottom: 10px; /* Space between input fields */
}

.form-button {
    padding: 8px 16px;
    background-color: #007bff; /* Bootstrap primary color */
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Custom styling for Flatpickr */
.flatpickr-calendar {
    /* Styles for the calendar popup */
}

.flatpickr-input {
    /* Styles for the input field */
    color: white; /* This styles the input text, not the placeholder */
}

.search-form, .form-group, .form-button {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #04AA6D;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .no-data {
            text-align: center;
            margin-top: 20px;
        }

        /* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

.form-group {
    margin-bottom: 10px;
}

.save-btn {
    background-color: #04AA6D;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
}

/* Updated CSS for the form elements */
.form-group input[type="text"],
.form-group input[type="tel"],
.form-group input[type="email"],
.save-btn {
    width: calc(100% - 20px); /* Adjust width as necessary */
    padding: 10px;
    margin-top: 5px;
    border-radius: 40px; /* Set border-radius as specified */
    border: 1px solid #ccc; /* Light grey border */
    box-sizing: border-box; /* Makes sure padding doesn't affect the total width */
    color:black;
}

.form-group input[type="text"]::placeholder,
.form-group input[type="tel"]::placeholder,
.form-group input[type="email"]::placeholder {
    color: #999; /* Placeholder text color */
}

.save-btn {
    background-color: #04AA6D; /* Button background color */
    color: white; /* Button text color */
    border: none; /* No border for the button */
    cursor: pointer; /* Cursor changes to pointer to indicate it's clickable */
    transition: background-color 0.3s; /* Smooth transition for hover effect */
}

.save-btn:hover {
    background-color: #037F58; /* Darker shade when hovered */
}

/* Ensure modals and other elements maintain their previous styles */
.modal-content {
    width: 50%; /* Adjust modal width to fit content better */
}



        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
            justify-content: center;
        }

        label {
            margin-right: 10px;
        }

        input[type="date"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f8f8f8;
            transition: all 0.3s;
            color:black;
        }

        input[type="date"]:focus {
            border-color: #117bff;
            background-color: black;
            outline: none;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            color: #fff;
            background-color: #007bff;
            cursor: pointer;
            transition: background-color 0.2s;
            margin-left: auto; /* Aligns the button to the right */
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            form {
                flex-direction: column;
            }

            label, input[type="date"] {
                margin: 5px 0;
            }

            button {
                margin-left: 0; /* Resets the alignment for smaller screens */
            }
        }

                .pagination {
            list-style: none;
            display: flex;
            justify-content: center;
        }

        .pagination .page-item {
            margin: 0 5px;
        }

        .pagination .page-link {
            text-decoration: none;
            color: #007bff;
        }

        .pagination .disabled .page-link {
            color: #ccc;
            pointer-events: none;
        }


 </style>
</head>

<body>
    <div class="menu">
        <ul>
            <li class="profile">
                <div class="img-box">
                    <img src="https://i.postimg.cc/SxbYPS5c/userimg.webp" alt="image">
                </div>
                <h2>user</h2>
            </li>
            <li>
                <a href="#" class="active">
                    <i class="fas fa-home"></i>
                    <p>dashboard</p>
                </a>
            </li>
            
            <li class="temperature-monitoring">
                <a href="#">
                    <i class="fas fa-user-group"></i>
                    <p>Temperature Monitoring</p>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-table"></i>
                    <p>Alarm Settings</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-chart-pie"></i>
                    <p>Notification Settings</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-pen"></i>
                    <p>Scheduling</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-star"></i>
                    <p>System Settings</p>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <p>Reports</p>
                </a>
            </li>

            <li>
                <a href="#">
                <i class="fas fa-life-ring"></i>
                    <p>Support</p>
                </a>
            </li>


            <li class="log-out">
                <a href="#">
                    <i class="fas fa-sign-out"></i>
                    <p>Log Out</p>
                </a>
            </li>
        </ul>
    </div>

            <!-- Modal -->
            <div id="temperatureModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Add Temperature Monitor Contact</h2>
                    <form id="tempMonitorForm" action="{{ route('temperature-monitor-contacts.store') }}" method="POST">
                      @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                            <label for="jobTitle">Job Title:</label>
                            <input type="text" id="jobTitle" name="jobTitle" placeholder="Enter Job Title" required>
                        </div>
                        <div class="form-group">
                            <label for="phoneNumber">Phone Number:</label>
                            <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter Phone Number" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" placeholder="Enter Email" required>
                        </div>
                        <button type="submit" class="save-btn">Save</button>
                    </form>
                </div>
            </div>

  

    <div class="content">

    <div class="title-info">
        <p>Environmental Monitoring Dashboard</p>
        <i class="fas fa-thermometer-half"></i>
    </div>

    
     <div class="data-info">
        <!-- Current Temperature Reading -->
        <div class="box">
            <i class="fas fa-thermometer-full"></i>
            <div class="data">
                <p>Current Temperature</p>
                <span>-5°C</span> <!-- Example reading; this should be dynamic -->
            </div>
        </div>

        <!-- System Status -->
        <div class="box">
            <i class="fas fa-sync-alt"></i>
            <div class="data">
                <p>System Status</p>
                <span>Active</span>
            </div>
        </div>

        <!-- Recent Flagellation Check -->
        <div class="box">
            <i class="fas fa-calendar-check"></i>
            <div class="data">
                <p>Last Check</p>
                <span>2024-03-08 14:00</span> <!-- Example date; should be dynamic -->
            </div>
        </div>

        
       <!-- Active Alerts -->
       <div class="box">
            <i class="fas fa-bell"></i>
            <div class="data">
                <p>Active Alerts</p>
                <span>2</span> <!-- Example; this should be dynamic -->
            </div>
        </div>
        
     </div>
     <h1>Select Date Range for Temperature Monitoring</h1>
    <form action="{{ route('temperatures.show') }}" method="GET">
        <div>
            <label style="color:black;" for="start_date">Start Date:</label>
            <input type="date"  id="start_date" name="start_date" required>
        </div>
   
        <div>
            <label style="color:black;" for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" required>
        </div>
        <button type="submit">Show Temperatures</button>
    </form>

    <hr>
   
    @if (is_null($temperatures))
    <p>Please select a date range to display temperatures.</p>
@elseif ($temperatures->isEmpty())
    <p>No temperature data found for the selected date range.</p>
@else
    <table id="monitoringData">
        <thead>
            <tr>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Start Temperature</th>
                <th>Current Temperature</th>
                <th>Todo Notification</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($temperatures as $temperature)
                <tr>
                    <td>{{ $temperature->date }}</td>
                    <td>{{ $temperature->date }}</td>
                    <td>{{ $temperature->start_temperature }}</td>
                    <td>{{ $temperature->current_temperature }}</td>
                    <td><!-- Todo Notification --></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Pagination Links -->
 
    <div id="paginationControls">
    <button onclick="changePage(-1)">Previous</button>
    <span id="currentPage">1</span>
    <button onclick="changePage(1)">Next</button>
</div> 
@endif

<script>
document.addEventListener('DOMContentLoaded', function () {
    const prevButton = document.querySelector("#paginationControls button:first-child");
    const nextButton = document.querySelector("#paginationControls button:last-child");
    let currentPage = 1;

    function fetchTemperatures(page) {
        // Construct the URL to which we will send the request
        // Adjust the URL as necessary to match your application's routes
        const url = `/your-route-to-fetch-temperatures?page=${page}`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                currentPage = page;
                updateTable(data);
                // Update current page display
                document.getElementById('currentPage').textContent = page;
            }).catch(error => console.error('Error fetching data:', error));
    }

    function updateTable(data) {
        const tableBody = document.getElementById('monitoringData').querySelector('tbody');
        tableBody.innerHTML = ''; // Clear current table body

        // Assuming `data` contains the paginated temperatures and their HTML
        data.temperatures.forEach(temperature => {
            const row = `<tr>
                            <td>${temperature.date}</td>
                            <td>${temperature.date}</td>
                            <td>${temperature.start_temperature}</td>
                            <td>${temperature.current_temperature}</td>
                            <td><!-- Todo Notification --></td>
                         </tr>`;
            tableBody.innerHTML += row;
        });

        // Optionally, adjust the visibility of the Previous/Next buttons based on the pagination data
        prevButton.disabled = currentPage === 1;
        nextButton.disabled = currentPage === data.last_page; // Assuming `data.last_page` contains the last page number
    }

    // Event listeners for Previous/Next buttons
    prevButton.addEventListener('click', () => {
        if (currentPage > 1) {
            fetchTemperatures(currentPage - 1);
        }
    });

    nextButton.addEventListener('click', () => {
        fetchTemperatures(currentPage + 1);
    });

    // Initial fetch
    fetchTemperatures(currentPage);
});
</script>
     <div style="width:400px; height:200px;">
    <canvas id="activityChart"></canvas>
</div>
    </div>
    <script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('searchForm').addEventListener('submit', function (event) {
            const startDate = document.getElementById('start_date').value;
            const endDate = document.getElementById('end_date').value;

            if (!startDate || !endDate) {
                alert('Please select both start and end dates.');
                event.preventDefault();
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#searchForm').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: "{{ route('temperature-monitorings.index') }}",
                type: "GET",
                data: formData,
                success: function(response) {
                    $('#monitoringData tbody').html(response);
                    $('#noDataMessage').hide();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>

    </script>

    <script>
        <script>
        document.getElementById('searchForm').onsubmit = function(event) {
            event.preventDefault();
            const startDate = document.getElementById('start_date').value;
            const endDate = document.getElementById('end_date').value;

            if (!startDate || !endDate) {
                document.getElementById('noDataMessage').innerHTML = 'Picked date is none. Please select a date range.';
                return;
            }

            // Here you would typically make an AJAX request to your server to fetch
            // the data based on the selected dates and then dynamically fill in the table rows.
            // The below is a placeholder for such logic.

            // Example dynamic row insertion (simulate fetched data)
            const tbody = document.getElementById('monitoringData').getElementsByTagName('tbody')[0];
            tbody.innerHTML = ''; // Clear existing rows
            const row = tbody.insertRow();
            row.insertCell(0).innerText = startDate;
            row.insertCell(1).innerText = endDate;
            row.insertCell(2).innerText = '10°C'; // Example start temperature
            row.insertCell(3).innerText = '15°C'; // Example current temperature
            row.insertCell(4).innerText = 'No immediate actions required.'; // Example todo notification

            document.getElementById('noDataMessage').innerHTML = ''; // Clear no data message
        };
    </script>
    </script>

 <script>
        document.addEventListener('DOMContentLoaded', function() {
        flatpickr(".datepicker", {
            dateFormat: "d m Y",
            "locale": {
                "firstDayOfWeek": 1 // start week on Monday
            },
            onChange: function(selectedDates, dateStr, instance) {
                // When a date is selected, change the input's text color to black
                instance.input.style.color = 'black';
            },
            onReady: function(selectedDates, dateStr, instance) {
                // If the input already has a value, ensure the text color is black
                if (instance.input.value !== '') {
                    instance.input.style.color = 'black';
                } else {
                    // If no date is selected (e.g., on initial load), you can set a different color
                    // For example, setting it to light grey to mimic a placeholder color
                    instance.input.style.color = 'lightgrey';
                }
            }
        });
        });
 </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Example Chart.js initialization
    var ctx = document.getElementById('activityChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'], // Placeholder labels
            datasets: [{
                label: '# of Activities',
                data: [12, 19, 3, 5], // Placeholder data
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });


</script>
<script>
    // Get the modal
    var modal = document.getElementById("temperatureModal");

    // Get the <li> element that opens the modal
    var li = document.querySelector("li.temperature-monitoring");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the li, open the modal
    li.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>   
</body>
</html>
