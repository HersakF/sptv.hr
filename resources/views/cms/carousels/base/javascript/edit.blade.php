<script type="text/javascript">

    $(".editItem").on("click", function() {
        var id = $(this).attr('data-id');
        $.ajax({
            type:'GET',
            url:'/cms/carousels/get-item-info',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "id" : id},
            success:function (response) {
                // POPULATE DATA
                $( '#editItemModal #defModalHead' ).text(jQuery.parseJSON(response).title);
                $( '#editItemModal input[name="title"]' ).val(jQuery.parseJSON(response).title);
                $( '#editItemForm').attr('action', '/cms/carousels/'+jQuery.parseJSON(response).id);

                // SHOW MODAL
                $( '#editItemModal').modal('show');
            },
            error: function(response){
                noty({text: 'An error occurred.', layout: 'topRight', type: 'error', timeout: 2000});
            }
        });
    });

</script>