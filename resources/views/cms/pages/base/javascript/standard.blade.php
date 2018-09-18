<script type="text/javascript">

    $(".set-visibility").on("change", function() {
        var id          = $(this).attr('id');
        var visibility  = $(this).val();

        $.ajax({
            type:'POST',
            url:'/cms/pages/set-visibility/'+id,
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "visibility" : visibility, "id" : id },
            success:function () {
                noty({text: 'Visibility updated.', layout: 'topRight', type: 'success', timeout: 2000});
            },
            error: function(){
                noty({text: 'An error occurred while trying set item visibility.', layout: 'topRight', type: 'error', timeout: 2000});
            }
        });
    });

    $(".set-navigation").on("change", function() {
        var id          = $(this).attr('id');
        var navigation  = $(this).val();

        $.ajax({
            type:'POST',
            url:'/cms/pages/set-navigation/'+id,
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "navigation" : navigation, "id" : id },
            success:function () {
                noty({text: 'Navigation updated.', layout: 'topRight', type: 'success', timeout: 2000});
            },
            error: function(){
                noty({text: 'An error occurred while trying set item navigation category.', layout: 'topRight', type: 'error', timeout: 2000});
            }
        });
    });

    $(".set-multiplicity").on("change", function() {
        var id          = $(this).attr('id');
        var multiplicity   = $(this).val();

        $.ajax({
            type:'POST',
            url:'/cms/pages/set-multiplicity/'+id,
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "multiplicity" : multiplicity, "id" : id },
            success:function () {
                noty({text: 'Multiplicity updated.', layout: 'topRight', type: 'success', timeout: 2000});
                if(multiplicity == 0){ $("#page_"+id+" .editItemSubpages").addClass("disabled"); }else{ $("#page_"+id+" .editItemSubpages").removeClass("disabled"); }
            },
            error: function(){
                noty({text: 'An error occurred.', layout: 'topRight', type: 'error', timeout: 2000});
            }
        });
    });

    $(".set-removability").on("change", function() {
        var id = $(this).attr('id');
        var removability = $(this).val();

        $.ajax({
            type:'POST',
            url:'/cms/pages/set-multiplicity/'+id,
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "removability" : removability, "id" : id },
            success:function () {
                noty({text: 'Removability updated.', layout: 'topRight', type: 'success', timeout: 2000});
                if(removability == 0){ $("#page_"+id+" .deleteItem").addClass("disabled"); }else{ $("#page_"+id+" .deleteItem").removeClass("disabled"); }
            },
            error: function(){
                noty({text: 'An error occurred.', layout: 'topRight', type: 'error', timeout: 2000});
            }
        });
    });

    $(".set-sortability").on("change", function() {
        var id          = $(this).attr('id');
        var sortability  = $(this).val();

        $.ajax({
            type:'POST',
            url:'/cms/pages/set-sortability/'+id,
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "sortability" : sortability, "id" : id },
            success:function () {
                noty({text: 'Sortability updated.', layout: 'topRight', type: 'success', timeout: 2000});
            },
            error: function(){
                noty({text: 'An error occurred while trying set item visibility.', layout: 'topRight', type: 'error', timeout: 2000});
            }
        });
    });

    $( "input[name='title']" ).keyup(function() {
        $("input[name='url']").val( string_to_slug($(this).val()) );
    });

    function string_to_slug(str) {
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        str = str.toLowerCase();

        // remove accents, swap ñ for n, etc
        var from = "čćžšđáäâèéëêìíïîòóöôùúüûñç·/_,:;";
        var to   = "cczsdaaaaeeeeiiiioooouuuunc------";
        for (var i=0, l=from.length ; i<l ; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }

        str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
            .replace(/\s+/g, '-') // collapse whitespace and replace by -
            .replace(/-+/g, '-'); // collapse dashes

        return str;
    }

</script>