    <script src="{{ asset('admin-assets/js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/grid.js') }}"></script>
    <script src="{{ asset('admin-assets/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin-assets/sweetalert/sweetalert2.min.js') }}"></script>
    <script>
        let notificationDropdown = document.getElementById('header-notification-toggle');
        notificationDropdown.addEventListener('click', function(){
            console.log('yes');

            $.ajax({
                type : "POST",
                url : '/admin/notification/read-all',
                data : {_token: "{{ csrf_token() }}" },
                success : function(){
                    console.log('yes');
                }
            })
        });
    </script>