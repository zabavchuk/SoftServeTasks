<h2><?=$title?></h2>
<form action="/App/task_5.php" enctype="multipart/form-data" method='post'>
    <fieldset >
        <legend>Export database table to PDF</legend>
        <div class='container'>

            <input type='submit' name='export' value='Export database' class="btn btn-primary btn-ghost"/>

            <div class="success"><?=$massage?></div>
        </div>
    </fieldset>
</form>