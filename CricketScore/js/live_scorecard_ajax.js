$(document).ready(function () {
    function fetchScorecard() {
        $.ajax({
            url: 'fetch_scorecard.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.error) {
                    $("#scorecard").html('<tr><td colspan="3">' + data.error + '</td></tr>');
                    return;
                }
                let html = '';
                data.forEach(player => {
                    html += `<tr>
                        <td>${player.player_name}</td>
                        <td>${player.runs}</td>
                        <td>${player.wickets}</td>
                    </tr>`;
                });
                $("#scorecard").html(html);
            },
            error: function () {
                $("#scorecard").html('<tr><td colspan="3">Error loading scorecard</td></tr>');
            }
        });
    }

    // Fetch the scorecard every 5 seconds
    fetchScorecard();
    setInterval(fetchScorecard, 5000);
});
