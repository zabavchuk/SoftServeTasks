<h2>Send email from php with attachment</h2>
<form action="/App/task_2.php" enctype="multipart/form-data" method='post' >
    <fieldset>
        <legend>Email testing</legend>
        <div class='container'>

            <div class="form-input-material">
                <label for='name'>Name*:</label>
                <input type="text" id="name" name="name" class="form-control-material" required/>
            </div>
            <div class="form-input-material">
                <label for='email'>Email (send to)*:</label>
                <input type='email' name='email' id='email' class="form-control-material" required/>
            </div>
            <div class="form-input-material">
                <label for='subject'>Subject*:</label>
                <input type='text' id="subject" name='subject' class="form-control-material" required/>
            </div>
            <div class="form-input-material">
                <label for='message'>Message*:</label>
                <textarea rows="10" cols="50" name='message' id='message' class="form-control-material" required></textarea>
            </div>
            <label for='message'>
                Send this file:<input id="file" class="btn btn-primary btn-ghost" name="file" type="file"/>
            </label>
            <input class="btn btn-primary btn-ghost" type='submit' name='Submit' value='Submit'/>

            <div class="success"><?=isset($message_sent) ? $message_sent : ''?></div>
        </div>

    </fieldset>
</form>
