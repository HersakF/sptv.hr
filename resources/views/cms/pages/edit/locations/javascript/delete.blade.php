<script type="text/javascript">

    $(".deleteLocationsItem").on("click", function() {
        var id = $(this).attr('id');
        $("#deleteItemForm").attr('action', '/cms/locations/'+id);
        $('#deleteItemForm').append("<input type='hidden' name='_method' value='DELETE'/>");
    });

</script>