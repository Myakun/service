$(document).ready(function() {
    let $body = $('body');

    $body.on('click', '.set-next-status', function() {
        let $this = $(this);

        if (!confirm('Подтвердите смену статуса')) {
            return false;
        }

        let url = '/partner/orders/set-next-status?id=' + $this.parents('tr').data('key');
        $.get(url, function(response) {
            $this.closest('td').html(response);
        });

        return false;
    });

    $body.on('click', '.set-status-new', function() {
        let $this = $(this);

        if (!confirm('Подтвердите отказ от заказа')) {
            return false;
        }

        let url = '/partner/orders/set-status-new?id=' + $this.parents('tr').data('key');
        $.get(url, function() {
            $this.closest('tr').addClass('d-none');
        });

        return false;
    });
});