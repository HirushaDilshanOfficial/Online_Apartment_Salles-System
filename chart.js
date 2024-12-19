// Get current week labels dynamically
function getCurrentWeek() {
    const today = new Date();
    const dayOfWeek = today.getDay() || 7; // Adjust to make Monday the first day
    today.setHours(0, 0, 0, 0);

    // Calculate Monday's date by subtracting days from the current date
    const monday = new Date(today);
    monday.setDate(today.getDate() - (dayOfWeek - 1));

    const weekDays = [];
    for (let i = 0; i < 7; i++) {
        const nextDay = new Date(monday);
        nextDay.setDate(monday.getDate() + i);
        weekDays.push(nextDay.toLocaleDateString('en-US', { weekday: 'short', month: 'short', day: 'numeric' }));
    }

    return weekDays;
}

// Get current month label 
function getCurrentMonthLabel() {
    const today = new Date();
    return today.toLocaleDateString('en-US', { month: 'long', year: 'numeric' });
}

// Fetch data from fetch_add.php
fetch('fetch_add.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('Fetched data:', data);  // Log the data to check if it's being received correctly

        // Weekly Adds (Bar chart)
        const ctxWeeklyAdds = document.getElementById('chartWeekLyAdds').getContext('2d');
        new Chart(ctxWeeklyAdds, {
            type: 'bar',
            data: {
                labels: getCurrentWeek(),  // Week labels
                datasets: [{
                    label: `No of Adds for the week of ${getCurrentWeek()[0]}`,
                    data: data.weekly.data,  // Use data from the fetched JSON
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        // Monthly Adds (Line chart)
        const ctxMonthlyAdds = document.getElementById('chartMonthlyAdds').getContext('2d');
        new Chart(ctxMonthlyAdds, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],  // Month labels
                datasets: [{
                    label: `No of Adds for ${getCurrentMonthLabel()}`,
                    data: data.monthly.data,  // Use data from the fetched JSON
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });
