$(document).ready(function() {
    $('#listePatient').DataTable({
        language: {
            url: '/js/dataTables.french.json'
        },
        "aoColumnDefs": [
            { 'bSortable': false, 'aTargets': [ 6 ] }
        ]
    });
});

$(document).ready(function() {
    $('#listeRdv').DataTable({
        language: {
            url: '/js/dataTables.french.json'
        },
        "aoColumnDefs": [
            { 'bSortable': false, 'aTargets': [ 3 ] }
        ]
    });
});