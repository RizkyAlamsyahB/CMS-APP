function showPreloader() {
    document.getElementById("preloader").style.display = "block";
}

// Panggil showPreloader() untuk menampilkan preloader saat halaman dimuat
showPreloader();

setTimeout(function () {
    hidePreloader();
}, 1000);

function hidePreloader() {
    document.getElementById("preloader").style.display = "none";

}
$(document).ready(function() {
    // Ketika tombol Hapus diklik
    $("#delete-category").click(function() {
        // Kirim request DELETE ke route categories.destroy
        $.ajax({
            url: "{{ route('categories.destroy', $category->id) }}",
            type: "DELETE",
            data: {
                _token: "{{ csrf_token() }}",
            },
            success: function() {
                // Reload halaman
                location.reload();
            },
            error: function(err) {
                // Tampilkan pesan error
                alert(err.responseJSON.message);
            },
        });
    });
});

tinymce.init({
    selector: '#content',
    plugins: 'textcolor code',
    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect forecolor backcolor | alignleft aligncenter alignright alignjustify | code',
    menubar: 'file edit view format',
});
