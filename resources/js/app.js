import './bootstrap';


document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.delete-btn').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            var commentId = this.dataset.id;

            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        document.querySelector(`form[action="/comments/${commentId}"]`).submit();
                    }
                });
        });
    });
});
