<h2><?=$title?></h2>
<form action="/App/task_2.php" enctype="multipart/form-data" method='post'>
    <fieldset >
        <legend>Email testing</legend>
        <div class='container'>

            <label for='name' >Name*:</label><br/>
            <input type="text" id="name" name="name" required /><br>

            <label for='email' >Email (send to)*:</label><br/>
            <input type='email' name='email' id='email' required/><br/>

            <label for='subject' >Subject*:</label><br/>
            <input type='text' id="subject" name='subject' required/><br/>

            <label for='message' >Message*:</label><br/>
            <textarea rows="10" cols="50" name='message' id='message' required></textarea>
            <br>

            Send this file: <input id="file" name="file" type="file" />
            <input type='submit' name='Submit' value='Submit' />
        </div>

    </fieldset>
</form>