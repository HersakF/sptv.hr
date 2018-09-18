<script type="text/javascript">

    $(".deleteSchedulesItem").on("click", function() {
        var id = $(this).attr('id');
        $("#deleteItemForm").attr('action', '/cms/schedules/'+id);
        $('#deleteItemForm').append("<input type='hidden' name='_method' value='DELETE'/>");
    });

</script>