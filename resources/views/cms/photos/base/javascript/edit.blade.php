<script type="text/javascript">

    $(".editItem").on("click", function() {
        var id = $(this).attr('data-id');
        $.ajax({
            type:'GET',
            url:'/cms/photos/get-item-info',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "id" : id},
            success:function (response) {
                // POPULATE DATA
                $( '#editItemModal #defModalHead' ).text(jQuery.parseJSON(response).caption);
                $( '#editItemModal input[name="caption"]' ).val(jQuery.parseJSON(response).caption);
                $( '#editItemModal input[name="alt"]' ).val(jQuery.parseJSON(response).alt);
                $( '#editItemModal input[name="source"]' ).val(jQuery.parseJSON(response).source);
                $( '#editItemForm').attr('action', '/cms/photos/'+jQuery.parseJSON(response).id);

                // SHOW MODAL
                $( '#editItemModal').modal('show');
            },
            error: function(response){
                noty({text: 'An error occurred.', layout: 'topRight', type: 'error', timeout: 2000});
            }
        });
    });

</script>