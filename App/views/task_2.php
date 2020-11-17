<h2><?=$title?></h2>
<form action="/App/task_2.php" enctype="multipart/form-data" method='post'>
    <fieldset >
        <legend>Email testing</legend>
        <div class='container'>

            <label for='name' >Name*:</label>
            <input type="text" id="name" name="name" required />

            <label for='email' >Email (send to)*:</label>
            <input type='email' name='email' id='email' required/>

            <label for='subject' >Subject*:</label>
            <input type='text' id="subject" name='subject' required/>

            <label for='message' >Message*:</label>
            <textarea rows="10" cols="50" name='message' id='message' required></textarea>


            Send this file: <input id="file" name="file" type="file" />
            <input type='submit' name='Submit' value='Submit' />
        </div>

    </fieldset>
</form>