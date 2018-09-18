<script type="text/javascript">

    $(".editItem").on("click", function() {
        var id = $(this).attr('data-id');
        $.ajax({
            type:'GET',
            url:'/cms/users/get-item-info',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "id" : id},
            success:function (response) {
                // POPULATE DATA
                $( '#editItemModal #defModalHead' ).text(jQuery.parseJSON(response).name);
                $( '#editItemModal input[name="name"]' ).val(jQuery.parseJSON(response).name);
                $( '#editItemModal input[name="email"]' ).val(jQuery.parseJSON(response).email);
                $( '#editItemModal select[name="role"]' ).val(jQuery.parseJSON(response).role).change();
                $( '#editItemForm').attr('action', '/cms/users/'+jQuery.parseJSON(response).id);

                // SHOW MODAL
                $( '#editItemModal').modal('show');
            },
            error: function(response){
                noty({text: 'An error occurred.', layout: 'topRight', type: 'error', timeout: 2000});
            }
        });
    });

</script>