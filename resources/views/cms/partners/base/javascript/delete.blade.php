<script type="text/javascript">

    $(".deleteItem").on("click", function() {
        var id = $(this).attr('id');
        $("#deleteItemForm").attr('action', '/cms/partners/'+id);
        $('#deleteItemForm').append("<input type='hidden' name='_method' value='DELETE'/>");
    });

</script>