var urls = [];
$(function(){
    $('#form').submit(function(e){
        e.preventDefault();
        showLoader();
        $this = $(this);
        init();
        $.post($this.attr('action'), $this.serialize(), function(data){
            $.each(data, function(index, value){
                urls.push(value);
            });
            processUrl(urls[0], 0);  
        }, 'json');
    })
});

function showLoader() {
    $('button').attr('disabled', true);
    $('#loader').show();
}

function hideLoader() {
    $('button').attr('disabled', false);
    $('#loader').hide();
}

function init()
{
    $('#progress-text').html('');
    $('#result').html('');
    $('#results-header').remove();
    urls = [];
}

function processUrl(url, ind) {
    var keyword = $('#keyword').val();
    if(ind == urls.length){
        hideLoader();
        return;
    }
    $.post('index.php/process', {url: url, keyword: keyword}, function(data){
        if(data == 1) {
            if(!$('#result').hasClass('processing')){
                $('#result').addClass('processing');
                $('#result').before('<h3 id="results-header">Results found</h3>');
            }
            $('#result').prepend('<li><a href="'+url+'" target="_blank" class="text-danger">'+url+'</a></li>');
        }
        $('#progress-text').html( (ind+1) + ' of ' + urls.length + ' processed' );
        processUrl(urls[ind+1], ind+1);
    });
}