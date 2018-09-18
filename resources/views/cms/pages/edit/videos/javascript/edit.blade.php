<script type="text/javascript">

    $(".editVideosItem").on("click", function() {
        var id = $(this).attr('data-id');
        $.ajax({
            type:'GET',
            url:'/cms/videos/get-item-info',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "id" : id},
            success:function (response) {
                // POPULATE DATA
                $( '#editVideosItemModal #defModalHead' ).text(jQuery.parseJSON(response).title);
                $( '#editVideosItemModal input[name="title"]' ).val(jQuery.parseJSON(response).title);
                $( '#editVideosItemModal input[name="standard_url"]' ).val(jQuery.parseJSON(response).standard_url);
                $( '#editVideosItemForm').attr('action', '/cms/videos/'+jQuery.parseJSON(response).id);

                // SHOW MODAL
                $( '#editVideosItemModal').modal('show');
            },
            error: function(response){
                noty({text: 'An error occurred.', layout: 'topRight', type: 'error', timeout: 2000});
            }
        });
    });

</script>