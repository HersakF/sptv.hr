<script type="text/javascript">

    $(".editFilesItem").on("click", function() {
        var id = $(this).attr('data-id');
        $.ajax({
            type:'GET',
            url:'/cms/files/get-item-info',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "id" : id},
            success:function (response) {
                // POPULATE DATA
                $( '#editFilesItemModal #defModalHead' ).text(jQuery.parseJSON(response).title);
                $( '#editFilesItemModal input[name="title"]' ).val(jQuery.parseJSON(response).title);
                $( '#editFilesItemForm').attr('action', '/cms/files/'+jQuery.parseJSON(response).id);

                // SHOW MODAL
                $( '#editFilesItemModal').modal('show');
            },
            error: function(response){
                noty({text: 'Došlo je do pogreške.', layout: 'topRight', type: 'error', timeout: 2000});
            }
        });
    });

</script>