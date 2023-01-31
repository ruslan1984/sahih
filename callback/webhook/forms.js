
function form_submit(event){
    var r = false;
	var $target = $(event.target);
    var $form = null;
	if($target.get(0).tagName == 'FORM' || $target.hasClass('.form')){
		$form = $target;
	}
	else{
		$form = $(event.target).parents('.form');
	}
    if($form.length == 0){
        return r;
    }
    if (($form.data('is_wait') || false) == true){
        return r;
    }
    try{
        $form.data('is_wait', true);

        var data = {};
        $form.find('input, textarea, select').each(function(){
            var $input = $(this);
            data[$input.attr('name')] = $input.val();
        });
        data['site_url'] = window.location.href;

        $.ajax({
            url: './callback.php',
            type: 'post',
            data: data,
            complete: function(data) {
                $form.data('is_wait', false);
                r = true;
                $('#moda-success').modal('show');
            },
            error: function(request, status, error){
                $form.data('is_wait', false);
                console.log(request, status, error);
            }
        });
    }
    catch(er){
        $form.data('is_wait', false);
    }
    return r;
}
