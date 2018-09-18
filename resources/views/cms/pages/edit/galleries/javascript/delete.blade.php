<script type="text/javascript">

    $(".deleteGalleriesItem").on("click", function() {
        var id = $(this).attr('id');
        $("#deleteItemForm").attr('action', '/cms/galleries-fragments/'+id);
        $('#deleteItemForm').append("<input type='hidden' name='_method' value='DELETE'/>");
    });

</script>