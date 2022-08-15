$(document).ready(function() {
    let $body = $('body');

    $body.on('click', '.activate-partner, .deactivate-partner', function() {
        let $this = $(this);
        let name = $('.name', $this.closest('tr')).text();

        let msg = 'Подтвердите активацию партнёра ' + name;
        if ($this.hasClass('deactivate-partner')) {
            msg = msg.replace('активацию', 'деактивацию');
        }

        if (!confirm(msg)) {
            return false;
        }

        let url = '/admin/partners/activate?id=' + $this.parents('tr').data('key');
        if ($this.hasClass('deactivate-partner')) {
            url = url.replace('activate', 'deactivate');
        }

        $.get(url, function(response) {
            $this.closest('td').html(response);
        });
    });
});