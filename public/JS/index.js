// Siirry poista-sivulle
$(document).on('click', '.poista-linkki', function () {
    var id = $(this).attr('poista-linkki');

    bootbox.confirm({

        message: "<h4>Oletko varma?</h4>",
        buttons: {
            confirm: {
                label: '<i class="fa fa-check"></i>Kyllä',
                className: 'btn-danger'
            },
            cancel: {
                label: '<i class="fa fa-check"></i>Ei',
                className: 'btn-primary'
            }
        },

        callback: function (result) {
            // Painettiinko Kyllä-painiketta?
            if (result == true) {
                // Kyllä painettiin, joten siirrytään poista-sivulle
                var url = "/pelote/poista/" + id;

                $(location).attr('href', url);
            }
        }
    });
    return false;
});
