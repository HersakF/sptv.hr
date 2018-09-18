<script type="text/javascript">

    $(".editGalleriesItem").on("click", function() {
        var id = $(this).attr('data-id');
        $.ajax({
            type:'GET',
            url:'/cms/galleries-fragments/get-item-info',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "id" : id},
            success:function (response) {
                // POPULATE DATA
                $( '#editGalleriesItemModal #defModalHead' ).text(jQuery.parseJSON(response).title);
                $( '#editGalleriesItemModal input[name="title"]' ).val(jQuery.parseJSON(response).title);
                $( '#editGalleriesItemModal input[name="subtitle"]' ).val(jQuery.parseJSON(response).subtitle);
                $( '#editGalleriesItemForm').attr('action', '/cms/galleries-fragments/'+jQuery.parseJSON(response).id);

                // SHOW MODAL
                $( '#editGalleriesItemModal').modal('show');
            },
            error: function(response){
                noty({text: 'An error occurred.', layout: 'topRight', type: 'error', timeout: 2000});
            }
        });
    });

</script>