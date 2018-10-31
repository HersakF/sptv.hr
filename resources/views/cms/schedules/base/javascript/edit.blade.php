<script type="text/javascript">

    $(".editItem").on("click", function() {
        var id = $(this).attr('data-id');
        $.ajax({
            type:'GET',
            url:'/cms/schedules/get-item-info',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "id" : id},
            success:function (response) {
                // POPULATE DATA
                $( '#editItemModal #defModalHead' ).text(jQuery.parseJSON(response)[0][0].title);
                $( '#editItemModal input[name="title"]' ).val(jQuery.parseJSON(response)[0][0].title);
                CKEDITOR.instances.description.setData(jQuery.parseJSON(response)[0][0].description);
                $( '#editItemModal input[name="date"]' ).val(jQuery.parseJSON(response)[0][0].date);
                $( '#editItemModal input[name="time"]' ).val(jQuery.parseJSON(response)[0][0].time);
                $( '#editItemForm').attr('action', '/cms/schedules/'+jQuery.parseJSON(response)[0][0].id);

                // POPULATE LINKED PAGE URLS
                var $select = $('select[name="linked_page_url"]');
                var linkedPageURL = jQuery.parseJSON(response)[0][0].linked_page_url;
                $select.find('option').remove();

                $.each(jQuery.parseJSON(response)[0][1], function(key, value) {
                    if (key === 0) {
                        $select.append('<option value="">Nothing selected</option>');
                    }
                    if(linkedPageURL === value.url) {
                        $select.append('<option value=' + value.url + ' selected>' + value.title + ' <strong>(' + moment(value.created_at).format('DD.MM.YYYY.') + ')</strong></option>');
                    } else {
                        $select.append('<option value=' + value.url + '>' + value.title + ' <strongs>(' + moment(value.created_at).format('DD.MM.YYYY.') + ')</strongs></option>');
                    }
                });

                $select.selectpicker('refresh');

                // SHOW MODAL
                $( '#editItemModal').modal('show');
            },
            error: function(response){
                noty({text: 'An error has occurred.', layout: 'topRight', type: 'error', timeout: 2000});
            }
        });
    });

</script>