function showDailyPass() {
    document.getElementById('daily-pass').style.display = 'flex';
    document.getElementById('three-day-pass').style.display = 'none';
    document.getElementById('daily-pass-btn').classList.add('active');
    document.getElementById('three-day-pass-btn').classList.remove('active');
}

function showThreeDayPass() {
    document.getElementById('daily-pass').style.display = 'none';
    document.getElementById('three-day-pass').style.display = 'flex';
    document.getElementById('daily-pass-btn').classList.remove('active');
    document.getElementById('three-day-pass-btn').classList.add('active');
}

