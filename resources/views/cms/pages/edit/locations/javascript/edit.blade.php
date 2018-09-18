<script type="text/javascript">

    $(".editLocationsItem").on("click", function() {
        var id = $(this).attr('data-id');
        $.ajax({
            type:'GET',
            url:'/cms/locations/get-item-info',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "id" : id},
            success:function (response) {
                // POPULATE DATA
                $( '#editLocationsItemModal #defModalHead' ).text(jQuery.parseJSON(response).title);
                $( '#editLocationsItemModal input[name="title"]' ).val(jQuery.parseJSON(response).title);
                $( '#editLocationsItemModal input[name="address"]' ).val(jQuery.parseJSON(response).address);
                $( '#editLocationsItemForm').attr('action', '/cms/locations/'+jQuery.parseJSON(response).id);

                // SHOW MODAL
                $( '#editLocationsItemModal').modal('show');
            },
            error: function(response){
                noty({text: 'An error occurred.', layout: 'topRight', type: 'error', timeout: 2000});
            }
        });
    });

</script>