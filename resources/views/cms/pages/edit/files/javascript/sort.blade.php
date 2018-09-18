<script type="text/javascript">

    $('#sortableFiles').sortable({
        cursor: "move",
        stop: function(e, ui) {
            sortItems = $('#sortableFiles').sortable('toArray');
            $.ajax({
                type:'POST',
                url:'/cms/locations/sort-items',
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                data: { "sortItems" : sortItems},
                success:function () {
                    noty({text: 'Uspješno ste sortirali datoteke.', layout: 'topRight', type: 'success', timeout: 2000});
                },
                error: function(){
                    noty({text: 'Došlo je do pogreške prilikom sortiranja datoteka.', layout: 'topRight', type: 'error', timeout: 2000});
                }
            });
        }
    });

</script>