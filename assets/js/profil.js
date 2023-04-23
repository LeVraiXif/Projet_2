$(document).ready(function() {
    let userIdToToggleBan;
    let userFirstName;
    let userBanned;
    // Ouvrir le modal de confirmation lorsqu'on clique sur le lien "Bannir/Débannir cet utilisateur"
    $('.toggle-ban-user').on('click', function() {
        userIdToToggleBan = $(this).data('id');
        userFirstName = $(this).data('firstname');
        userBanned = $(this).data('banned');
        $('#confirmationText').text((userBanned ? 'Débannir' : 'Bannir') + ' ' + userFirstName + ' ?');
        $('#confirmationModal').modal('show');
    });
    
    // Lorsque l'utilisateur confirme le bannissement/débannissement
    $('#confirmToggleBan').on('click', function() {
        let isBanned = $('#toggleBanModal').data('banned') === 1;
        console.log("isBanned:", isBanned); 
        let url = '../assets/php/toggle_ban_user.php?id=' + userIdToToggleBan + '&banned=' + (isBanned ? 0 : 1);
        console.log("URL:", url);
    
        $.ajax({
            url: url,
            method: 'GET',
            success: function() {
                console.log("Succès");
                $('#toggleBanModal').modal('hide');
                location.reload();
            }
        });
    });
    });