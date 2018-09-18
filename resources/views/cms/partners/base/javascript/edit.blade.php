<script type="text/javascript">

    $(".editItem").on("click", function() {
        var id = $(this).attr('data-id');
        $.ajax({
            type:'GET',
            url:'/cms/partners/get-item-info',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "id" : id},
            success:function (response) {
                // POPULATE DATA
                $( '#editItemModal #defModalHead' ).text(jQuery.parseJSON(response).title);
                $( '#editItemModal input[name="title"]' ).val(jQuery.parseJSON(response).title);
                $( '#editItemModal select[name="category"]' ).val(jQuery.parseJSON(response).category).change();
                $( '#editItemModal input[name="url"]' ).val(jQuery.parseJSON(response).url);
                $( '#editItemForm').attr('action', '/cms/partners/'+jQuery.parseJSON(response).id);

                // SHOW MODAL
                $( '#editItemModal').modal('show');
            },
            error: function(response){
                noty({text: 'An error occurred.', layout: 'topRight', type: 'error', timeout: 2000});
            }
        });
    });

    $(".editItemPhoto").on("click", function() {
        var id = $(this).attr('data-photo-id');
        $.ajax({
            type:'GET',
            url:'/cms/photos/get-item-info',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "id" : id},
            success:function (response) {
                // POPULATE DATA
                $( '#editItemPhotoModal #defModalHead' ).text(jQuery.parseJSON(response).caption);
                $( '#editItemPhotoModal input[name="caption"]' ).val(jQuery.parseJSON(response).caption);
                $( '#editItemPhotoModal input[name="alt"]' ).val(jQuery.parseJSON(response).alt);
                $( '#editItemPhotoModal input[name="source"]' ).val(jQuery.parseJSON(response).source);
                $( '#editItemPhotoForm').attr('action', '/cms/photos/'+jQuery.parseJSON(response).id);

                // SHOW MODAL
                $( '#editItemPhotoModal').modal('show');
            },
            error: function(response){
                noty({text: 'An error occurred.', layout: 'topRight', type: 'error', timeout: 2000});
            }
        });
    });

</script>