<div class="description">
    <h2>Send text to telegram bot user</h2>
    <h3>To testing bot you need to open this link:</h3>
    <a href="https://t.me/TestforSoftServeBot" target="_blank">TestforSoftServeBot</a>
    <h4 class="warning">Notice! While testing bot you can't leave this page</h4>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $(function () {

        setInterval(function () {
            $.post(
                '/App/task_4.php',
                {
                    check: 1
                },
                function (response) {

                },
                'json'
            );
        }, 7000)
    });
</script>