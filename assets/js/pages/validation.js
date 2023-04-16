 $('#checkAll').click(function() {
    $('.checkItem').prop('checked', $(this).prop('checked'));
});

$('#btnHapus').click(function() {
    var ids = [];

    $('.checkItem:checked').each(function() {
        ids.push($(this).val());
    });

    if (ids.length > 0) {
        // Kirim permintaan AJAX untuk menghapus baris yang dipilih
    } else {
        alert('Pilih setidaknya satu baris untuk dihapus.');
    }
});