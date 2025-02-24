$(document).ready(function () {
    function fetchPlayers() {
        $.ajax({
            url: 'fetch_players.php',  // PHP file to fetch player list
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                let html = '';
                if (data.error) {
                    $("#player-list").html('<tr><td colspan="2">' + data.error + '</td></tr>');
                    return;
                }
                data.forEach(player => {
                    html += `<tr>
                        <td>${player.player_name}</td>
                        <td>${player.team_name}</td>
                    </tr>`;
                });
                $("#player-list").html(html);
            },
            error: function () {
                $("#player-list").html('<tr><td colspan="2">Error loading players</td></tr>');
            }
        });
    }

    // Fetch players data initially and refresh every 5 seconds
    fetchPlayers();
    setInterval(fetchPlayers, 5000);
});
